<?php

namespace App\Controllers\Frontend;

use App\Models\User;
use Core\Controller;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\View;
use Exception;

class HomeController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $response->setStatusCode(200);

    $tagName = [
      "best-seller",
      "new",
      "popular",
      "sale"
    ];



    // $authors = array_slice(Author::orderBy('updated_at', 'desc'), 0, 6);

    $authors = [
      [
        "id" => 1,
        "name" => "Author 1",
        "avatar" => "https://picsum.photos/200/300",
        "description" => ""
      ],
      [
        "id" => 2,
        "name" => "Author 2",
        "avatar" => "https://picsum.photos/200/300",
        "description" => ""
      ],
      [
        "id" => 3,
        "name" => "Author 3",
        "avatar" => "https://picsum.photos/200/300",
        "description" => ""
      ],
      [
        "id" => 4,
        "name" => "Author 4",
        "avatar" => "https://picsum.photos/200/300",
        "description" => ""
      ],
      [
        "id" => 5,
        "name" => "Author 5",
        "avatar" => "https://picsum.photos/200/300",
        "description" => ""
      ],
      [
        "id" => 6,
        "name" => "Author 6",
        "avatar" => "https://picsum.photos/200/300",
        "description" => ""
      ],
    ];

    // $slides = array_slice(Slides::orderBy('update_at', 'decs'), 0, 5);

    $slides = [
      [
        "id" => 1,
        "image" => "https://picsum.photos/200/300",
        "title" => "Slide 1",
        "description" => "Slide 1 description",
        "link" => "https://picsum.photos/200/300"
      ],
      [
        "id" => 2,
        "image" => "https://picsum.photos/200/300",
        "title" => "Slide 2",
        "description" => "Slide 2 description",
        "link" => "https://picsum.photos/200/300"
      ],
      [
        "id" => 3,
        "image" => "https://picsum.photos/200/300",
        "title" => "Slide 3",
        "description" => "Slide 3 description",
        "link" => "https://picsum.photos/200/300"
      ],
      [
        "id" => 4,
        "image" => "https://picsum.photos/200/300",
        "title" => "Slide 4",
        "description" => "Slide 4 description",
        "link" => "https://picsum.photos/200/300"
      ],
      [
        "id" => 5,
        "image" => "https://picsum.photos/200/300",
        "title" => "Slide 5",
        "description" => "Slide 5 description",
        "link" => "https://picsum.photos/200/300"
      ],
    ];

    $response->setBody(View::renderWithLayout(new View('pages/index'), compact('authors', 'slides', 'tagName')));
  }

  public function about(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/about'), [
      'title' => 'About'
    ]));
  }

  public function cart(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/cart'), [
      'title' => 'Cart'
    ]));
  }

  public function shop(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/shop'), [
      'title' => 'Shop'
    ]));
  }

  public function wishlist(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/wishlist'), [
      'title' => 'Wishlist'
    ]));
  }
  public function product(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/product'), [
      'title' => 'Product'
    ]));
  }
  public function profile(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/profile'), [
      'title' => 'Profile'
    ]));
  }

  public function checkout(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/checkout'), [
      'title' => 'Checkout'
    ]));
  }
  public function dashboard(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/dashboard'), [
      'title' => 'Dashboard'
    ]));
  }
  public function customerDashboard(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/customer'), [
      'title' => 'Customer Dashboard'
    ]));
  }
  public function productDashboard(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/product'), [
      'title' => 'Product Dashboard'
    ]));
  }
  public function couponDashboard(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/coupon'), [
      'title' => 'Coupon Dashboard'
    ]));
  }
  public function sliderDashboard(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/slider'), [
      'title' => 'Slider Dashboard'
    ]));
  }
  public function commentDashboard(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/comment'), [
      'title' => 'Comment Dashboard'
    ]));
  }
}
