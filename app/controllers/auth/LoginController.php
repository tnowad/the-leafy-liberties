<?php
namespace App\Controllers\Auth;

use App\Models\User;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;
use Exception;

class LoginController extends Controller
{

  public function index(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/auth/login'), [
      'header' => '',
      'footer' => '',
    ]));
  }

  public function login(Request $request, Response $response)
  {
    $email = $request->getParam('email');
    $password = $request->getParam('password');
    try {
      $users = User::findAll(['email' => $email]);
      $user = $users ? $users[0] : null;
    } catch (Exception $e) {
      $user = null;
    }
    if ($user && password_verify($password, $user->password)) {
      $response->setStatusCode(200);
      Application::getInstance()->getAuthentication()->setUser($user);
      $response->redirect(BASE_URI . '/', 200, [
        'toast' => [
          'type' => 'success',
          'message' => "Login success",
        ]
      ]);
    } else {
      $response->setStatusCode(200);
      $response->redirect(BASE_URI . '/login', 200, [
        'toast' => [
          'type' => 'error',
          'message' => "Login failed",
        ]
      ]);
    }
  }

  public function logout(Request $request, Response $response)
  {
    Application::getInstance()->getSession()->destroy();
    $response->setStatusCode(200);
    $response->redirect(BASE_URI . '/', 200, [
      'toast' => [
        'type' => 'success',
        'message' => "Logout success",
      ]
    ]);
  }
}