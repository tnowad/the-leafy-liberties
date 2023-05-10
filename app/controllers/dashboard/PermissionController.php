<?php

namespace App\Controllers\Dashboard;

use App\Models\Permission;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class PermissionController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $permissions = Permission::all();
    $response->setBody(
      View::renderWithDashboardLayout(
        new View("pages/dashboard/permission/index"),
        [
          "title" => "Permissions",
          "permissions" => $permissions,
        ]
      )
    );
  }

  public function update(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('permission.update')) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    switch ($request->getMethod()) {
      case 'GET':
        $user = User::findOne(["id" => $request->getQuery("id")]);
        $response->setStatusCode(200);
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/permission/update"),
            [
              "title" => "Update Permission",
              "user" => $user,
            ]
          )
        );
      case 'POST':
        $permission = Permission::find($request->getBody()["id"]);
        $permission->name = $request->getBody()["name"];
        $permission->description = $request->getBody()["description"];
        $permission->save();
        return $response->redirect(BASE_URI . "/dashboard/permission", 200, [
          "toast" => [
            "type" => "success",
            "message" => "Permission updated successfully.",
          ],
        ]);
        break;
      default:
        # code...
        break;
    }

  }
}