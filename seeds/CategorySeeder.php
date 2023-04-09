<?php
namespace Seeds;

use App\Models\Category;

class CategorySeeder
{
  public function run()
  {
    $categories = [
      'Fiction',
      'Non-Fiction',
      'Biography',
      'Children',
      'Cooking',
      'History',
      'Horror',
      'Mystery',
      'Romance',
      'Science Fiction',
      'Self-Help',
      'Travel',
    ];
    foreach ($categories as $category) {
      echo "Creating category: $category" . PHP_EOL;
      Category::create([
        'name' => $category,
      ]);
    }
  }
}