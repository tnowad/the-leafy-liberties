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
        'title' => 'Login',
        'header' => '',
        'footer' => '',
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
    switch ($request->getMethod()) {
      case 'POST':
        $email = $request->getQuery('email');
        $name = $request->getQuery('name');
        $phone = $request->getQuery('phone');
        $password = $request->getQuery('password');
        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->phone = $phone;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        try {
          $user->save();
          $response->setStatusCode(200);
          $response->setBody(View::renderWithLayout(new View('pages/auth/login'), [
            'toast' => [
              'type' => 'success',
              'message' => 'Registered successfully',
            ],
            'header' => '',
            'footer' => '',
          ]));
        } catch (\Exception $e) {
          $response->setStatusCode(500);
          $response->setBody(View::renderWithLayout(new View('pages/auth/register'), [
            'toast' => [
              'type' => 'error',
              'message' => $e->getMessage(),
            ],
            'header' => '',
            'footer' => '',
          ]));
        }
        break;
      case 'GET':
        $response->setStatusCode(200);
        $response->setBody(View::renderWithLayout(new View('pages/auth/register'), [
          'header' => '',
          'footer' => '',
        ]));
        break;
      default:
        break;
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