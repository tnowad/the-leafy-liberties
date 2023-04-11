<?php
namespace Seeds;

use Seeds\CategorySeeder;

class Seeder
{
  public static function run()
  {
    $seeds = [
      TagSeeder::class,
      CategorySeeder::class,
    ];
    foreach ($seeds as $seed) {
      $seed::run();
    }
  }
}