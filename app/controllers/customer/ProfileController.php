<?php

namespace App\Controllers\Customer;

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
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->isAuthenticated()) {
      return $response->redirect('/login');
    }
    $user = Application::getInstance()->getAuthentication()->getUser();
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/profile'), [
      'user' => $user,
      'footer' => ''
    ]));
  }

  public function update(Request $request, Response $response)
  {
    $user = Application::getInstance()->getAuthentication()->getUser();
    $user->name = $request->getParam('name');
    $user->save();
    $response->redirect('profile');
  }
}
