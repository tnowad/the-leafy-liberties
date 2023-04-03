<?php

namespace App\Controllers\Frontend;

use Core\Controller;
use Core\View;

class HomeController extends Controller
{
  public function index($request, $response)
  {
    return $this->renderWithLayout(new View('pages/index'));
  }
}