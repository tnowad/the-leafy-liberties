<?php
namespace Seeds;

use App\Models\Category;

class CategorySeeder
{
  public function run()
  {
    Category::truncate();
    echo "Truncated categories table" . "<br>";
    echo "Seeding categories" . "<br>";
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
    // foreach ($categories as $category) {
    //   echo "Seeding category: $category" . "<br>";
    //   Category::create([
    //     'name' => $category,
    //   ]);
    // }
  }
}
