<?php
define('ENVIRONMENT', 'development');
if (ENVIRONMENT == 'development') {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

// Auto load third party libraries
if (file_exists('./../vendor/autoload.php')) {
  require_once './../vendor/autoload.php';
}

// Auto load application classes
require_once './../autoload.php';

use Core\App;

$app = App::getInstance();

$app->handleRequest();