<?php
use App\Controllers\Frontend\HomeController;

define('ENVIRONMENT', 'development');
if (ENVIRONMENT == 'development') {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

function autoExecute($folder)
{
  foreach (glob($folder . '/*.php') as $file) {
    require_once $file;
  }
}

if (file_exists('./vendor/autoload.php')) {
  require_once './vendor/autoload.php';
}
if (file_exists('./autoload.php')) {
  require_once './autoload.php';
}

use Core\Application;

Application::getInstance();

$router = Application::getInstance()->getRouter();

$router->get('/', [HomeController::class, 'index']);

Application::getInstance()->handleRequest();