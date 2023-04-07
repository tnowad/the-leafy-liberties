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
      // $email = $request->getQuery('email');
      // $password = $request->getQuery('password');
      // $name = $request->getQuery('name');
      // $phone = $request->getQuery('phone') ?? null;
      $user = new User();
      $user->email = "tnowad@gmail.com";
      $user->name = "Nguyen Minh Tuan";
      $user->phone = "0123456789";
      $user->password = password_hash("123456789", PASSWORD_DEFAULT);

      $user->save();
      if ($user->id) {
        Application::getInstance()->session->set('user', $user);
        $response->setStatusCode(200);
        $response->redirect(BASE_URI . '/');
      } else {
        echo "Error";
        $response->setStatusCode(401);
        $response->setBody('Invalid credentials');
        return;
      }
    } else {
      $response->setStatusCode(200);
      $response->setBody(View::renderWithLayout(new View('pages/auth/register'), [
        'title' => 'Register'
      ]));
    }
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