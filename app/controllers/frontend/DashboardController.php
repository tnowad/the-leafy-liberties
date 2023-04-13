<?php
namespace App\Controllers\Frontend;

use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class DashboardController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    $user = $auth->getUser();

    // todo: get list permission contain '.access'

    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/dashboard/index'), [
      'title' => 'Dashboard',
      'user' => $user,
    ], 'layouts/dashboard'));
  }

}