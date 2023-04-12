<?php

namespace App\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Core\Controller;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\View;


class CartController extends Controller
{

  public function index(Request $request, Response $response)
  {
    try {
      $cart = Cart::all();
      $products = Product::all();
    } catch (\Exception $e) {
      dd($e->getMessage());
    }

    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/cart'), [
      'title' => 'cart',
      'cart' => $cart,
      'products' => $products,
    ]));
  }
}
