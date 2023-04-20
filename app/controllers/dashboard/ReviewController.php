<?php

namespace App\Controllers\Dashboard;

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
        // $reveiw = Review::all();
        // return $response->setBody(
        //     View::renderWithDashboardLayout(new View("pages/dashboard/review/index"), [
        //         "review" => $reveiw,
        //         "footer" => "",
        //     ])
        // );
        // $review = Review::all();
        return $response->setBody(
            View::renderWithDashboardLayout(new View("pages/dashboard/review/index"), [
                "title" => "reviews",
                // "review" => $review,
            ])
        );
    }
}
