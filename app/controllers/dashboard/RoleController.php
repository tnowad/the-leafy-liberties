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
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('role.access')) {
      return $response->redirect(BASE_URI . '/dashboard', 200, [
        'toast' => [
          'type' => 'error',
          'message' => 'You do not have permission to access this page.'
        ]
      ]);
    }

    $role = Role::all();

    return $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/role/index'), [
      'title' => 'Roles',
      'roles' => $role,
    ]));
  }

  public function create(Request $request, Response $response)
  {
  }

  public function show(Request $request, Response $response)
  {
  }

  public function update(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('role.update')) {
      return $response->redirect(BASE_URI . '/dashboard', 200, [
        'toast' => [
          'type' => 'error',
          'message' => 'You do not have permission to access this page.'
        ]
      ]);
    }

    if ($request->getMethod() === 'GET') {
      $role = Role::find($request->getQuery('id'));
      if (!$role || !$role instanceof Role) {
        return $response->redirect('/dashboard/roles');
      }

      $rolePermissions = (function () use ($role) {
        $permissions = [];
        foreach ($role->permissions() as $rolePermission) {
          if ($rolePermission->status == '1') {
            $permissions[] = $rolePermission->permission();
          }
        }
        return $permissions;
      })();

      $permissions = Permission::all();
      return $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/role/update'), [
        'title' => 'Update Role',
        'role' => $role,
        'permissions' => $permissions,
        'rolePermissions' => $rolePermissions,
      ]));
    }
    if ($request->getMethod() === 'POST') {
      $role = Role::find($request->getParam('id'));
      $role->name = $request->getParam('name');
      $role->save();
      return $response->redirect('/dashboard/roles');
    }

  }

  public function delete(Request $request, Response $response)
  {
  }
}