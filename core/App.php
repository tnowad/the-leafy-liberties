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

  public function handleRequest()
  {
    Route::resolve();
  }

}