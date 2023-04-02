<?php

namespace Library;

use Exception;

class View
{
  public static function render(string $view, $data = [], string $layout = null)
  {
    $viewPath = self::getViewPath($view);
    if (!file_exists($viewPath)) {
      throw new Exception('View not found');
    }
    if ($layout != null) {

      $layoutPath = self::getViewPath($layout);
    }

    if (!file_exists($layoutPath)) {
      throw new Exception('Layout not found');
    }

    extract($data);

    ob_start();
    include $viewPath;
    $content = ob_get_clean();

    include $layoutPath;
  }

  private static function getViewPath($view)
  {
    $viewRoot = __DIR__ . '/../views/';
    $viewPath = str_replace('/', DIRECTORY_SEPARATOR, $view);
    return $viewRoot . $viewPath . '.php';
  }
}