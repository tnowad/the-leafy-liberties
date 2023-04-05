<?php
use App\Controllers\Frontend\HomeController;
use Utils\DotEnv;

define('ENVIRONMENT', 'development');
if (ENVIRONMENT == 'development') {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  function dd($data)
  {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
  }
}

if (file_exists('./vendor/autoload.php')) {
  require_once './vendor/autoload.php';
}
if (file_exists('./autoload.php')) {
  require_once './autoload.php';
}

use Core\Application;

define('BASE_URI', DotEnv::get('BASE_URI'));

$app = Application::getInstance();

$router = Application::getInstance()->getRouter();

$router->get('/', [HomeController::class, 'index']);

$app->handleRequest();