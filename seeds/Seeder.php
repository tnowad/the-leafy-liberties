<?php
namespace Seeds;

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