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
}
