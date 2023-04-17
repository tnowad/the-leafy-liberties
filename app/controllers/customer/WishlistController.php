<?php

namespace App\Controllers\Customer;

use App\Models\Product;
use App\Models\Wishlist;
use Core\Controller;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\View;


class WishlistController extends Controller
{

  public function index(Request $request, Response $response)
  {
    try {
      $wishlist = Wishlist::all();
    } catch (\Exception $e) {
      dd($e->getMessage());
    }

    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/wishlist'), [
      'title' => 'Wishlist',
      'wishlist' => $wishlist,
    ]));
  }
  public function add(Request $request, Response $response)
  {
    $product = Product::find($request->getQuery('id'));
    dd($product);
    $response->redirect(BASE_URI . '/product');
    // $response->setStatusCode(200);
    // $response->setBody(View::renderWithLayout(new View('pages/product'), [
    //   'title' => 'Product',
    //   'product' => $product,
    // ]));
  }
}
