<?php

namespace App\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Review;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class ReviewController extends Controller
{
  public function index(Request $request, Response $response)
  {
    // $filter = [
    //   "keywords" => $request->getQuery("keywords"),
    // ];
    // if (isset($filter)) {
    //   $reviews = Review::filterAdvanced($filter);
    // } else {
    //   $reviews = Review::all();

    // }
    $products = Product::all();
    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/review/index"), [
        "title" => "Review",
        "products" => $products,
      ])
    );
  }
  public function reviewDetail(Request $request, Response $response)
  {

    $product = Product::find($request->getQuery("id"));
    $reviews = Review::findAll(["product_id" => $product->id]);
    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/review/reviewDetail"), [
        "title" => "Review",
        "product" => $product,
        "reviews" => $reviews,
      ])
    );
  }

  public function delete(Request $request, Response $response)
  {
    $review = Review::find($request->getQuery("id"));
    $product = Product::find($review->product_id);
    if (!$review) {
      return $response->redirect(BASE_URI . "/dashboard/review/review_detail?id=$product->id", 200, [
        "toast" => [
          "type" => "error",
          "message" => "Delete review failed",
        ],
      ]);
    }
    $reviewId = $review->id;
    $review->delete();
    return $response->redirect(BASE_URI . "/dashboard/review/review_detail?id=$product->id", 200, [
      "toast" => [
        "type" => "success",
        "message" => "Delete review successful",
      ],
    ]);
  }
}
