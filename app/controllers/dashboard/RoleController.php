<?php
namespace App\Controllers\Dashboard;

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

  public function store(Request $request, Response $response)
  {
  }

  public function show(Request $request, Response $response)
  {
  }

  public function update(Request $request, Response $response)
  {
  }

  public function delete(Request $request, Response $response)
  {
  }
  public function filterProduct(Request $request, Response $response)
  {
  }
}