<?php

namespace Library;

use Exception;
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


  public function handleRequest()
  {
    $appPath = DotEnv::get('APP_PATH');
    $requestUri = $_SERVER['REQUEST_URI'];
    $requestUri = str_replace($appPath, '/', $requestUri);
    $requestUri = rtrim($requestUri, '/');
    $requestUri = $requestUri == '' ? '/' : $requestUri;
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    try {
      if (!isset(self::$routes[$requestMethod][$requestUri])) {
        throw new Exception('Route not found');
      }

      $route = self::$routes[$requestMethod][$requestUri];
      $routeParts = explode('@', $route);
      $controllerName = 'Controllers\\' . $routeParts[0];
      $actionName = $routeParts[1];

      if (!class_exists($controllerName)) {
        throw new Exception('Controller not found');
      }

      $controller = new $controllerName();
      if (!method_exists($controller, $actionName)) {
        throw new Exception('Action not found');
      }

      $controller->$actionName();

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