<?php

namespace Utils;

class DotEnv
{
  private static $config = [];
  public static function get($key)
  {
    self::load();
    if (isset(self::$config[$key])) {
      return self::$config[$key];
    }
    return null;
  }

  public static function all()
  {
    if (empty(self::$config)) {
      self::load();
    }
    return self::$config;
  }

  public static function set($key, $value)
  {
    self::$config[$key] = $value;
  }

  public static function load()
  {
    $env = file_get_contents(__DIR__ . '/../.env');
    $env = explode("\n", $env);
    foreach ($env as $line) {
      $line = trim($line);
      if (empty($line)) {
        continue;
      }
      $line = preg_split('/\s+|=/', $line);
      $line = array_filter($line);
      $key = trim($line[0]);
      if (!isset($line[1])) {
        $line[1] = '';
      }
      $value = trim($line[1]);
      self::set($key, $value);
    }
  }

  public static function save()
  {
    $env = '';
    foreach (self::$config as $key => $value) {
      $env .= $key . '=' . $value . "\n";
    }
    file_put_contents(__DIR__ . '/../.env', $env);
  }
}