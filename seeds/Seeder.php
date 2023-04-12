<?php
namespace Seeds;

use Core\ISeeder;
use Seeds\CategorySeeder;

class Seeder
{
  public static function run()
  {
    try {
      CategorySeeder::run();
      TagSeeder::run();
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }
}