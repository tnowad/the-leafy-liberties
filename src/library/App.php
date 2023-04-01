<?php

namespace Library;

use Library\Database;
use Library\DotEnv;

class App
{
  private static $instance = null;
  private static $routes = [];

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
    $this->handleRequest();
  }

  private function initDotEnv()
  {
    DotEnv::load();
  }

  private function initDatabase()
  {
    $database = Database::getInstance();
    if (!$database->getConnection()) {
      die('Database connection failed');
    }
  }

  private function initRoutes()
  {
    self::$routes = [
      'GET' => [
        '/' => 'HomeController@index',
        '/about' => 'HomeController@about',
        '/contact' => 'HomeController@contact',
        '/login' => 'AuthController@login',
        '/register' => 'AuthController@register',
        '/logout' => 'AuthController@logout',
        '/profile' => 'ProfileController@index',
        '/profile/edit' => 'ProfileController@edit',
        '/profile/update' => 'ProfileController@update',
        '/profile/delete' => 'ProfileController@delete',
        '/posts' => 'PostController@index',
        '/posts/create' => 'PostController@create',
        '/posts/store' => 'PostController@store',
        '/posts/edit' => 'PostController@edit',
        '/posts/update' => 'PostController@update',
        '/posts/delete' => 'PostController@delete',
      ],
      'POST' => [
        '/login' => 'AuthController@login',
        '/register' => 'AuthController@register',
        '/profile/update' => 'ProfileController@update',
        '/profile/delete' => 'ProfileController@delete',
        '/posts/store' => 'PostController@store',
        '/posts/update' => 'PostController@update',
        '/posts/delete' => 'PostController@delete',
      ],
    ];
  }

  private function handleRequest()
  {
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $requestUri = $_SERVER['REQUEST_URI'];
    $requestUri = explode('?', $requestUri)[0];
    $requestUri = rtrim($requestUri, '/');
    if (array_key_exists($requestUri, self::$routes[$requestMethod])) {
      $controllerAction = explode('@', self::$routes[$requestMethod][$requestUri]);
      $controllerName = 'App\\Controllers\\' . $controllerAction[0];
      $actionName = $controllerAction[1];
      $controller = new $controllerName();
      $controller->$actionName();
    } else {
      $this->notFound();
    }
  }

  private function notFound()
  {
    self::view([
      'view' => 'errors/404',
      'layout' => [
        'header' => 'layouts/default/header',
      ],
    ], [
        'url' => $_SERVER['REQUEST_URI'],
        'method' => $_SERVER['REQUEST_METHOD'],
      ]);
  }


  public static function view($view, $data = [])
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
      $layoutContent = self::render($layoutHeaderPath, $layoutData) . $viewContent . self::render($layoutFooterPath, $layoutData);

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
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
  }
}