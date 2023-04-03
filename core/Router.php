<?php

namespace Core;

use Exception;
use Utils\DotEnv;

class Router
{
  private Request $request;
  private Response $response;
  private array $routes = [];

  public function __construct(Request &$request, Response &$response)
  {
    $this->request = $request;
    $this->response = $response;
  }

  public function get($path, $callback)
  {
    $this->routes['GET'][$path] = $callback;
  }

  public function post($path, $callback)
  {
    $this->routes['POST'][$path] = $callback;
  }

  public function getRoutes($method)
  {
    return $this->routes[$method] ?? [];
  }

  public function getCallback()
  {
    $method = $this->request->getMethod();

    $path = $this->request->getUrl();

    $path = trim($path, '/');

    $routes = $this->getRoutes($method);

    $routeParams = [];

    foreach ($routes as $route => $callback) {
      $route = trim($route, '/');
      $routeName = [];

      if (!$route) {
        continue;
      }

      if (preg_match_all('/\{(\w+)(:[^}]+)?}/', $route, $matches)) {
        $routeNames = $matches[1];
      }

      $route = preg_replace('/\{(\w+)(:[^}]+)?}/', '([^/]+)', $route);

      if (preg_match('/^' . $route . '$/', $path, $matches)) {
        array_shift($matches);

        foreach ($matches as $key => $match) {
          $routeParams[$routeNames[$key]] = $match;
        }

        $this->request->setParams($routeParams);

        return $callback;
      }

    }

    throw new Exception('Route not found', 404);
  }

  public function resolve()
  {
    $method = $this->request->getMethod();
    $path = $this->request->getUrl();
    $callback = $this->routes[$method][$path] ?? false;

    if ($callback === false) {
      $this->response->setStatusCode(404);
      $this->response->setBody('Not found');
      return $this->response;
    }

    if (is_string($callback)) {
      return $this->render($callback);
    }

    if (is_array($callback)) {
      $controller = new $callback[0]();
      $callback[0] = $controller;
    }
  }

  public function render($view, $params = [])
  {
    return Application::getInstance()->view->render($view, $params);
  }

  public function renderWithLayout($view, $params = [])
  {
    return Application::getInstance()->view->renderWithLayout($view, $params);
  }
}