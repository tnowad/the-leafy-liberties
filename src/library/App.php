<?php

namespace Library;

use Library\Database;
use Library\DotEnv;

class App
{
  private static $instance = null;
  private static $routes = [];

  private static $views = [];

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
    $this->initViews();
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
    echo '404 Not Found';
  }

  private function initViews()
  {
    self::$views = [
      'layouts' => [
        'default' => [
          'header' => 'layouts/default/header',
          'footer' => 'layouts/default/footer',
        ],
        'dashboard' => [
          'header' => 'layouts/dashboard/header',
          'footer' => 'layouts/dashboard/footer',
        ],
      ],
      'pages' => [
        'home' => [
          'layout' => 'layouts/default',
          'view' => 'pages/index',
        ],
        'about' => [
          'layout' => 'layouts/default',
          'view' => 'pages/about',
        ],
        'contact' => [
          'layout' => 'layouts/default',
          'view' => 'pages/contact',
        ],
        'login' => [
          'layout' => 'layouts/default',
          'view' => 'pages/login',
        ],
        'register' => [
          'layout' => 'layouts/default',
          'view' => 'pages/register',
        ],
        'dashboard' => [
          'layout' => 'layouts/dashboard',
          'view' => 'pages/dashboard/index',
        ],
        'profile' => [
          'layout' => 'layouts/dashboard',
          'view' => 'pages/dashboard/profile',
        ],
      ],
    ];
  }

  public static function view($view, $data = [])
  {
    $view = explode('.', $view);
    $view = self::$views[$view[0]][$view[1]];
    $layout = self::$views[$view['layout']];
    $view = $view['view'];
    require_once __DIR__ . '/../views/' . $layout['header'] . '.php';
    require_once __DIR__ . '/../views/' . $view . '.php';
    require_once __DIR__ . '/../views/' . $layout['footer'] . '.php';
  }
}