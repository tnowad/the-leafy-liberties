<?php
namespace Controllers;

use Library\App;

class HomeController
{
  public function index()
  {

    App::view(['view' => 'pages/index', 'layout' => 'layouts/default'], );
  }

}