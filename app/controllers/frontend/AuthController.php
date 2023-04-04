<?php

namespace App\Controllers\Frontend;

use App\Models\User;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;
use Exception;

class AuthController extends Controller
{

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

    $_SESSION['user'] = $user;

    $this->redirect('app/views/layouts');
  }
}