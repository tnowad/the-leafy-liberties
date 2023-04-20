<?php

namespace App\Models;

use App\Models\ProductCategory;
use Core\Model;
use App\Models\Author;
use App\Models\ProductTag;
use App\Models\Publisher;
use App\Models\Tag;
use Core\Traits\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    protected $table = "reviews";

    protected $fillable = [
        "id",
        "isbn",
        "author_id",
        "general_comments",
        "review_score"
    ];
}
