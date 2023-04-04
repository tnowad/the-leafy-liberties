<?php
namespace Core;

use App\Models\User;

trait AuthTrait
{
  public function authenticate($username, $password)
  {
    $user = User::where('username', $username)[0];

    if (!$user) {
      return false;
    }

    if (password_verify($password, $user->password)) {
      $_SESSION['user'] = $user;
      return true;
    }

    return false;
  }

  public function isLoggedIn()
  {
    return isset($_SESSION['user']);
  }

  public function requireLogin(Request $request, Response $response)
  {
    if (!$this->isLoggedIn()) {
      $response->redirect('/login');
    }
  }
}