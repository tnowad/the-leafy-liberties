<?php
namespace App\Controllers\Dashboard;

use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;
use Utils\FileUploader;

class RoleController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $filter = [
      "keywords" => $request->getQuery("keywords"),
    ];
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("role.access")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    if (isset($filter)) {
      $role = Role::filterAdvanced($filter);
    } else {
      $role = Role::all();

    }

    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/role/index"), [
        "title" => "Roles",
        "roles" => $role,
        "filter" => $filter
      ])
    );
  }

  public function show(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("role.show")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }

    $role = Role::find($request->getQuery("id"));
    if (!$role || !$role instanceof Role) {
      return $response->redirect("/dashboard/roles");
    }

    $rolePermissions = (function () use ($role) {
      $permissions = [];
      foreach ($role->permissions() as $rolePermission) {
        if ($rolePermission->status == "1") {
          $permissions[] = $rolePermission->permission();
        }
      }
      return $permissions;
    })();

    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/role/show"), [
        "title" => "Role",
        "role" => $role,
        "rolePermissions" => $rolePermissions,
      ])
    );
  }

  public function create(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("role.create")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }

    switch ($request->getMethod()) {
      case "POST":
        $role = new Role();
        $role->name = $request->getParam("name");
        $role->save();

        $permissions = $request->getParam("permissions");
        if (is_array($permissions)) {
          foreach ($permissions as $permission) {
            $role->addPermission($permission);
          }
        }
        return $response->redirect("/dashboard/roles");
      case "GET":
        $permissions = Permission::all();
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/role/create"),
            [
              "title" => "Create Role",
              "permissions" => $permissions,
            ]
          )
        );
      default:
        break;
    }
  }

  public function update(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("role.update")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }

    if ($request->getMethod() === "GET") {
      $role = Role::find($request->getQuery("id"));
      if (!$role || !$role instanceof Role) {
        return $response->redirect("/dashboard/roles");
      }

      $rolePermissions = (function () use ($role) {
        $permissions = [];
        foreach ($role->permissions() as $rolePermission) {
          if ($rolePermission->status == "1") {
            $permissions[] = $rolePermission->permission();
          }
        }
        return $permissions;
      })();

      $permissions = Permission::all();
      return $response->setBody(
        View::renderWithDashboardLayout(
          new View("pages/dashboard/role/update"),
          [
            "title" => "Update Role",
            "role" => $role,
            "permissions" => $permissions,
            "rolePermissions" => $rolePermissions,
          ]
        )
      );
    }
    if ($request->getMethod() === "POST") {
      return $response->redirect("/dashboard/roles");
    }
  }

  public function delete(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("role.delete")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }

    switch ($request->getMethod()) {
      case "POST":
        break;
      case "GET":
        $role = Role::find($request->getQuery("id"));
        if (!$role || !$role instanceof Role) {
          return $response->redirect("/dashboard/roles");
        }
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/role/delete"),
            [
              "title" => "Delete Role",
              "role" => $role,
            ]
          )
        );
      default:
        break;
    }
  }
}