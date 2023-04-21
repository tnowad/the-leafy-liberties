<?php
namespace App\Controllers\Dashboard;

use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class SettingController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("setting.access")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/settings/index"), [
          "title" => "settings",
      ])
  );
  }

  public function show(Request $request, Response $response)
  {
  }

  public function create(Request $request, Response $response)
  {
  }

  public function store(Request $request, Response $response)
  {
  }

  public function update(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("setting.update")) {
      return $response->redirect(BASE_URI. "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/settings/update"), [
          "title" => "settings",
      ])
    );
  }

  public function delete(Request $request, Response $response)
  {
  }
}
