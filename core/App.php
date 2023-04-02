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
    try {
      Route::resolve();
    } catch (Exception $e) {
      $this->notFound($e->getMessage());
    }
  }

  private function notFound(string $message = 'Page not found')
  {
    self::view(['view' => 'errors/404', 'layout' => ['header' => 'layouts/default/header']], ['message' => $message]);
  }
  public static function view(array $view, array $data = [])
  {
    $viewName = $view['view'] ?? 'pages/index';
    $layout = $view['layout'] ?? null;

    $viewPath = str_replace('/', DIRECTORY_SEPARATOR, $viewName);
    $viewPath = __DIR__ . '/../views/' . $viewPath . '.php';

    if (!file_exists($viewPath)) {
      die('View not found');
    }

    $viewContent = self::render($viewPath, $data);

    if ($layout) {
      $layoutHeader = $layout['header'] ?? 'layouts/default/header';
      $layoutFooter = $layout['footer'] ?? 'layouts/default/footer';

      $layoutHeaderPath = str_replace('/', DIRECTORY_SEPARATOR, $layoutHeader);
      $layoutHeaderPath = __DIR__ . '/../views/' . $layoutHeaderPath . '.php';
      $layoutFooterPath = str_replace('/', DIRECTORY_SEPARATOR, $layoutFooter);
      $layoutFooterPath = __DIR__ . '/../views/' . $layoutFooterPath . '.php';

      if (!file_exists($layoutHeaderPath)) {
        die('Layout header not found');
      }
      if (!file_exists($layoutFooterPath)) {
        die('Layout footer not found');
      }

      $layoutData = ['content' => $viewContent];
      $layoutContent = self::render($layoutHeaderPath, array_merge($data, $layoutData)) . $viewContent . self::render($layoutFooterPath, array_merge($data, $layoutData));

      echo $layoutContent;
    } else {
      echo $viewContent;
    }
  }

  private static function render($path, $data = [])
  {
    extract($data);
    ob_start();
    require $path;
    return ob_get_clean();
  }

}