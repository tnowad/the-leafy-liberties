<?php

namespace App\Controllers\Dashboard;

use App\Models\Permission;
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
          "permissions" => $permissions,
        ]
      )
    );
  }
}