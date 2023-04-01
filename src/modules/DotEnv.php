<?php

namespace Modules;

class DotEnv
{
  private static $config = [];
  public static function get($key)
  {
    if (empty(self::$config)) {
      self::load();
    }
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

  private static function load()
  {
    $env = file_get_contents(__DIR__ . '/../../.env');
    $env = explode("\n", $env);
    foreach ($env as $line) {
      $line = trim($line);
      if (empty($line)) {
        continue;
      }
      // trim by " " or "="
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
}