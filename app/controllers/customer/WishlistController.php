<?php

namespace App\Controllers\Customer;

use App\Models\Product;
use App\Models\Wishlist;
use Core\Application;
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
    $response->setBody(
      View::renderWithLayout(new View("pages/wishlist"), [
        "title" => "Wishlist",
        "wishlist" => $wishlist,
      ])
    );
  }
  public function add(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->isAuthenticated()) {
      $response->setStatusCode(401);
      $response->setBody(
        View::renderWithLayout(new View("pages/401"), [
          "title" => "401",
        ])
      );
      return;
    }

    $user = $auth->getUser();

    $product = Product::find($request->getBody()["id"]);
    $wishlist = new Wishlist();
    $wishlist->product_id = $product->id;
    $wishlist->user_id = $user->id;
    $wishlist->save();

    $response->setStatusCode(200);
    $response->jsonResponse([
      "type" => "success",
      "message" => "Product added to wishlist",
    ]);
  }
}