<?php

namespace App\Controllers\Customer;

use App\Models\Role;
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
    switch ($request->getMethod()) {
      case 'POST':
        $email = $request->getParam('email');
        $password = $request->getParam('password');
        try {
          $users = User::where(['email' => $email]);
          $user = $users ? $users[0] : null;
        } catch (\Exception $e) {
          $user = null;
        }
        if ($user && password_verify($password, $user->password)) {
          $response->setStatusCode(200);
          Application::getInstance()->getAuthentication()->setUser($user);
          $response->redirect('/');
        } else {
          $response->setStatusCode(200);
          $response->setBody(View::renderWithLayout(new View('pages/auth/login'), [
            'toast' => [
              'type' => 'error',
              'message' => "Login failed",
            ],
            'header' => '',
            'footer' => '',
          ]));
        }
        break;
      case 'GET':
        $response->setStatusCode(200);
        $response->setBody(View::renderWithLayout(new View('pages/auth/login'), [
          'header' => '',
          'footer' => '',
        ]));
        break;
      default:
        break;
    }
  }

  public function register(Request $request, Response $response)
  {
    switch ($request->getMethod()) {
      case 'POST':
        $email = $request->getParam('email');
        $name = $request->getParam('name');
        $phone = $request->getParam('phone');
        $password = $request->getParam('password');
        $existingUser = User::where(['email' => $email]);
        if ($existingUser) {
          $response->setStatusCode(200);
          $response->setBody(View::renderWithLayout(new View('pages/auth/register'), [
            'toast' => [
              'type' => 'error',
              'message' => "User already exists",
            ],
            'header' => '',
            'footer' => '',
          ]));
          break;
        } else {
          $user = new User();
          $user->email = $email;
          $user->name = $name;
          $user->phone = $phone;
          $user->password = password_hash($password, PASSWORD_DEFAULT);
          $user->setRole(Role::where(['name' => 'customer'])[0]);
          try {
            $user->save();
            $response->setStatusCode(200);
            Application::getInstance()->getAuthentication()->setUser($user);
            $response->redirect('/');
          } catch (\Exception $e) {
            $response->setStatusCode(500);
            $response->setBody(View::renderWithLayout(new View('pages/auth/register'), [
              'toast' => [
                'type' => 'error',
                'message' => "Registration failed",
              ],
              'header' => '',
              'footer' => '',
            ]));
          }
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
    Application::getInstance()->getSession()->destroy();
    $response->setStatusCode(200);
    $response->setHeaders([
      'Location' => '/'
    ]);
  }
}