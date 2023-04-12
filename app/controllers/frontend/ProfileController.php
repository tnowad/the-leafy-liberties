<?php
namespace App\Controllers\Frontend;

use App\Models\User;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class ProfileController extends Controller
{
  public function index(Request $request, Response $response)
  {
    if (!Application::getInstance()->getSession()->get('user')) {
      $response->redirect('/login');
    }
    $user = User::find(Application::getInstance()->getSession()->get('user')->id);
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/profile'), [
      'user' => $user,
    ]));
  }
}