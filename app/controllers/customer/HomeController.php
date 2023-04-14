<?php

namespace App\Controllers\Customer;

use App\Models\Product;
use App\Models\Slide;
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
    $slides = Slide::where(['status' => 1]);

    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/index'), [
      'title' => 'Home',
      'slides' => $slides
    ]));
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
  public function editProduct()
  {
    // $product
  }
}