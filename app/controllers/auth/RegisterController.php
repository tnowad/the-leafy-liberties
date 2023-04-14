<?php
namespace App\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class RegisterController extends Controller
{

  public function index(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/auth/register'), [
      'header' => '',
      'footer' => '',
    ]));
  }

  public function register(Request $request, Response $response)
  {
    $email = $request->getParam('email');
    $name = $request->getParam('name');
    $phone = $request->getParam('phone');
    $password = $request->getParam('password');
    $existingUser = User::where(['email' => $email]);
    if ($existingUser) {
      $response->setStatusCode(200);
      return $response->setBody(View::renderWithLayout(new View('pages/auth/register'), [
        'toast' => [
          'type' => 'error',
          'message' => "User already exists",
        ],
        'header' => '',
        'footer' => '',
      ]));
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
  }

}