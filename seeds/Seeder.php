<?php
namespace Seeds;

use Seeds\CategorySeeder;

class Seeder
{
  public static function run()
  {
    $seeds = [
      CategorySeeder::class,
    ];
    foreach ($seeds as $seed) {
      $seed = new $seed();
      $seed->run();
    }
  }
}