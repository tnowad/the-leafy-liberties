<?php

namespace Core;

use Exception;
use Core\Database;
use Utils\DotEnv;
use Core\Route;

class App
{
  private static $instance = null;

  private function __construct()
  {
    $this->init();
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new App();
    }
    return self::$instance;
  }

  private function init()
  {
    $this->initDotEnv();
    $this->initDatabase();
    $this->initRoutes();
  }

  private function initDotEnv()
  {
    DotEnv::load();
  }

  private function initDatabase()
  {
    if (Database::getInstance()->getConnection() === null) {
      die('Database connection failed');
    }
  }

  private function initRoutes()
  {
    $routes = glob(__DIR__ . '/../routes/*.php');
    foreach ($routes as $route) {
      require_once $route;
    }
  }

  public function handleRequest()
  {
    Route::resolve();
  }

}