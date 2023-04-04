<?php

namespace App\Controllers\Frontend;

use App\Models\User;
use Core\Controller;
use Core\View;

class AuthController extends Controller
{
  protected function isLoggedIn()
  {
    return isset($_SESSION['user']);
  }
  protected function redirect($url, $statusCode = 303)
  {
    header('Location: ' . $url, true, $statusCode);
    die();
  }

  public function login()
  {
    if ($this->isLoggedIn()) {
      $this->redirect('/');
    }
    return $this->render(new View('app/views/pages/Auth/login'));
  }

  public function postLogin()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = null;
    foreach (User::all() as $u) {
      if ($u->email === $email) {
        $user = $u;
        break;
      }
    }

    if ($user && password_verify($password, $user->password)) {
      $_SESSION['user'] = $user;

      $this->redirect('app/views/layouts');
    } else {
      return $this->render(new View('app/views/pages/Auth/login', ['error' => 'Tên đăng nhập hoặc mật khẩu không chính xác.']));
    }
  }

  public function logout()
  {
    unset($_SESSION['user']);

    $this->redirect('app/views/pages/Auth/login');
  }

  public function register()
  {
    if ($this->isLoggedIn()) {
      $this->redirect('app/views/layouts');
    }

    return $this->render(new View('app/views/pages/Auth/register'));
  }

  public function postRegister()
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    // $user->name = $name;
    // $user->email = $email;
    // $user->password = password_hash($password, PASSWORD_DEFAULT);
    // $user->save();

    $_SESSION['user'] = $user;

    $this->redirect('app/views/layouts');
  }
}
