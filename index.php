<?php
define('ENVIRONMENT', 'development');
if (ENVIRONMENT == 'development') {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

// Auto load all config in config folder
foreach (glob('./config/*.php') as $config) {
  require_once $config;
}

// Auto load third party libraries
if (file_exists('./vendor/autoload.php')) {
  require_once './vendor/autoload.php';
}

// Auto load application classes
require_once './autoload.php';

use Core\App;

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$app = App::getInstance();

$app->handleRequest();