<?php
namespace Seeds;

use App\Models\Tag;

class TagSeeder extends Seeder
{
  public static function run()
  {
    Tag::truncate();
    echo "Truncated tags table" . "<br>";
    echo "Seeding tags" . "<br>";
    $tags = [
      "Bestselling",
      "Popular",
      "New",
      "Recommended",
    ];

    foreach ($tags as $tag) {
      echo "Seeding tag: $tag" . "<br>";
      Tag::create([
        'name' => $tag,
      ]);
    }
  }
}