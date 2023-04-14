<?php
use Core\Application;

use Core\Database;
use Utils\DotEnv;

define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development') {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ALL & ~E_NOTICE);

  function dd()
  {
    $args = func_get_args();
    foreach ($args as $arg) {
      echo '<pre>';
      var_dump($arg);
      echo '</pre>';
    }
  }
}

if (file_exists('./vendor/autoload.php')) {
  require_once './vendor/autoload.php';
}
if (file_exists('./autoload.php')) {
  require_once './autoload.php';
}

define('BASE_URI', DotEnv::get('BASE_URI'));

try {
  Database::getInstance()->getConnection();
} catch (\Exception $e) {
  die("Database connection failed");
}

$app = Application::getInstance();

foreach (glob('./routes/*.php') as $file) {
  require_once $file;
}

$app->handleRequest();