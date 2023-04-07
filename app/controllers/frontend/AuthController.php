<?php
namespace App\Controllers\Frontend;

use App\Models\User;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class AuthController extends Controller
{

  public function login(Request $request, Response $response)
  {
    if ($request->getMethod() === 'GET') {
      $response->setStatusCode(200);
      $response->setBody(View::renderWithLayout(new View('pages/auth/login'), [
        'title' => 'Login'
      ]));
    } else {
      $email = $request->getQuery('email');
      $password = $request->getQuery('password');
      $user = User::findOne(['email' => $email]);
      dd($user);
      if (!$user) {
        $response->setStatusCode(401);
        $response->setBody('Invalid credentials');
      }
      if (!password_verify($password, $user->password)) {
        $response->setStatusCode(401);
        $response->setBody('Invalid credentials');
      } else {
        Application::getInstance()->session->set('user', $user);
        $response->setStatusCode(200);
        $response->setBody('Logged in successfully');
      }
    }
  }

  public function register(Request $request, Response $response)
  {
    if ($request->getMethod() === 'POST') {
      $email = $request->getParam('email');
      $password = $request->getParam('password');
      $user = new User();
      $user->email = $email;
      $user->password = password_hash($password, PASSWORD_DEFAULT);
      $user->save();
      if ($user->id) {
        Application::getInstance()->session->set('user', $user);
      } else {
        $response->setStatusCode(401);
        $response->setBody('Invalid credentials');
      }
    }
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/auth/register'), [
      'title' => 'Register'
    ]));
  }

  public function logout(Request $request, Response $response)
  {
    Application::getInstance()->session->destroy();
    $response->setStatusCode(200);
    // Write header to redirect to home pages
    $response->setHeaders([
      'Location' => '/'
    ]);
  }

}