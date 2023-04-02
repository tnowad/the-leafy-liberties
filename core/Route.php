<?php

namespace Core;

use Exception;
use Utils\DotEnv;

class Route
{
  private static $routes = [];

  public static function resolve()
  {
    $requestUri = substr($_SERVER['REQUEST_URI'], strlen(DotEnv::get('BASE_URI')), strlen($_SERVER['REQUEST_URI']));
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $matchedRoute = false;

    foreach (self::$routes[$requestMethod] as $route => $action) {
      $pattern = self::prepareRoutePattern($route);
      if (preg_match($pattern, $requestUri, $matches)) {
        $matchedRoute = true;
        print_r($matches);
        self::executeAction($action, $matches);
        break;
      }
    }

    if (!$matchedRoute) {
      return false;
    }

    return true;
  }

  private static function prepareRoutePattern($route)
  {

    $pattern = '/^' . preg_quote($route, '/') . '$/';
    $pattern = preg_replace('/{([a-zA-Z0-9_]+)}/', '(?P<$1>[^\/]+)', $pattern);
    return $pattern;
  }

  private static function executeAction($action, $matches)
  {
    $controllerName = $action[0];
    $methodName = $action[1];
    if (!class_exists($controllerName)) {
      throw new Exception('Controller not found');
    }

    $controller = new $controllerName();

    if (!method_exists($controller, $methodName)) {
      throw new Exception('Method not found');
    }

    $controller->$methodName(...array_values($matches));
  }

  public static function get($uri, $action)
  {
    self::$routes['GET'][$uri] = $action;
  }

  public static function post($uri, $action)
  {
    self::$routes['POST'][$uri] = $action;
  }

  public static function put($uri, $action)
  {
    self::$routes['PUT'][$uri] = $action;
  }

  public static function delete($uri, $action)
  {
    self::$routes['DELETE'][$uri] = $action;
  }

  public static function patch($uri, $action)
  {
    self::$routes['PATCH'][$uri] = $action;
  }

  public static function options($uri, $action)
  {
    self::$routes['OPTIONS'][$uri] = $action;
  }

  public static function any($uri, $action)
  {
    self::$routes['GET'][$uri] = $action;
    self::$routes['POST'][$uri] = $action;
    self::$routes['PUT'][$uri] = $action;
    self::$routes['DELETE'][$uri] = $action;
    self::$routes['PATCH'][$uri] = $action;
    self::$routes['OPTIONS'][$uri] = $action;
  }
}