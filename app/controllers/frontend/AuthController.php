<?php
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
    if ($request->getMethod() === 'POST') {
      $email = $request->getParam('email');
      $password = $request->getParam('password');
      $user = User::where('email', $email)[0];
      if ($user && password_verify($password, $user->password)) {
        Application::getInstance()->session->set('user', $user);
      } else {
        $response->setStatusCode(401);
        $response->setBody('Invalid credentials');
      }
    }
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('auth/login'), [
      'title' => 'Login'
    ]));
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
      // check if user is saved
      if ($user->id) {
        Application::getInstance()->session->set('user', $user);
      } else {
        $response->setStatusCode(401);
        $response->setBody('Invalid credentials');
      }
    }
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('auth/register'), [
      'title' => 'Register'
    ]));
  }

  public function logout(Request $request, Response $response)
  {
    Application::getInstance()->session->destroy();
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('auth/logout'), [
      'title' => 'Logout'
    ]));
  }

}