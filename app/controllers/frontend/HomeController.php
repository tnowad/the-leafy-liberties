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
    echo '<pre>';
    var_dump(new User());
    echo '</pre>';
  }

}