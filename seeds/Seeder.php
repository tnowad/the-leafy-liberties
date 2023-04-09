<?php
namespace Seeds;

class Seeder
{
  public static function run()
  {
    $seeds = [
      'UserSeeder',
      'CategorySeeder',
      'ProductSeeder',
      'OrderSeeder',
      'OrderDetailSeeder',
      'ReviewSeeder',
      'WishlistSeeder',
      'CartSeeder',
    ];
    foreach ($seeds as $seed) {
      $seed = new $seed();
      $seed->run();
    }
  }
}