<?php

namespace App\Controllers\Frontend;

use App\Models\User;
use Core\Controller;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\View;
use Exception;

class HomeController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $user = new User();
    $user->name = 'John Doe';
    $user->email = 'john@example.com';
    $user->password = password_hash('password', PASSWORD_DEFAULT);
    $user->save();

    $users = User::all();

    echo '<pre>';
    print_r($users);
    echo '</pre>';
  }
}