<?php

namespace Core;

use Exception;

class View
{
  public static function render(string $view, $data = [])
  {
    $viewPath = self::getViewPath($view);
    if (!file_exists($viewPath)) {
      throw new Exception('View not found');
    }

    extract($data);

    ob_start();
    include $viewPath;
    return ob_get_clean();
  }

  private static function getViewPath($view)
  {
    $viewRoot = __DIR__ . '/../views/';
    $viewPath = str_replace('/', DIRECTORY_SEPARATOR, $view);
    return $viewRoot . $viewPath . '.php';
  }
}