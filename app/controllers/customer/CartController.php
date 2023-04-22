<?php

namespace App\Controllers\Customer;

use App\Models\Author;
use App\Models\Cart;
use App\Models\Product;
use Core\Application;
use Core\Controller;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\View;

class CartController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->isAuthenticated()) {
      return $response->redirect(BASE_URI . "/login");
    }
    $cartItems = Cart::findAll(["user_id" => $auth->getUser()->id]);
    return $response->setBody(
      View::renderWithLayout(new View("pages/cart"), [
        "title" => "Cart",
        "cartItems" => $cartItems,
      ])
    );
  }
  public function add(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->isAuthenticated()) {
      $response->jsonResponse([
        "type" => "error",
        "message" => "You are not authenticated",
      ]);
      return;
    }

    $user = $auth->getUser();

    $product = Product::find($request->getBody()["id"]);

    if (!$product) {
      $response->jsonResponse([
        "type" => "error",
        "message" => "Product not found",
      ]);
      return;
    }

    $cart = Cart::findOne([
      "product_id" => $product->id,
      "user_id" => $user->id,
    ]);

    if ($cart) {
      // $cart->delete();/
      $response->jsonResponse([
        "type" => "info",
        "message" => "Product is already in cart",
      ]);
      return;
    }

    $cart = new Cart();
    $cart->user_id = $user->id;
    $cart->product_id = $product->id;
    $cart->quantity = 1;
    $cart->save();
    // dd($wishlist);
    $response->jsonResponse([
      "type" => "success",
      "message" => "Product added to cart",
    ]);
  }
  public function remove(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->isAuthenticated()) {
      $response->jsonResponse([
        "type" => "error",
        "message" => "You are not authenticated",
      ]);
      return;
    }

    $user = $auth->getUser();

    $product = Product::find($request->getBody()["id"]);

    if (!$product) {
      $response->jsonResponse([
        "type" => "error",
        "message" => "Product not found",
      ]);
      return;
    }

    $cart = Cart::findOne([
      "product_id" => $product->id,
      "user_id" => $user->id,
    ]);

    if (!$cart) {
      $response->jsonResponse([
        "type" => "info",
        "message" => "Product not in cart",
      ]);
      return;
    }

    $cart->delete();

    $response->jsonResponse([
      "type" => "success",
      "message" => "Product removed from cart",
    ]);
  }
  public function empty(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->isAuthenticated()) {
      $response->jsonResponse([
        "type" => "error",
        "message" => "You are not authenticated",
      ]);
      return;
    }

    $user = $auth->getUser();

    $carts = Cart::findAll([
      "user_id" => $user->id,
    ]);

    foreach ($carts as $cart) {
      $cart->delete();
    }

    $response->jsonResponse([
      "type" => "success",
      "message" => "Cart emptied",
    ]);
  }
}
