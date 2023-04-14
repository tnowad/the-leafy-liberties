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
      return $response->redirect(BASE_URI . '/login');
    }
    $cartItems = Cart::where(['user_id' => $auth->getUser()->id]);
    $products = [];

    // Get all products in cart
    foreach ($cartItems as $cartItem) {
      $product = Product::find($cartItem->product_id);
      $product->quantity = $cartItem->quantity;
      $products[] = $product;
    }

    return $response->setBody(View::renderWithLayout(new View('pages/cart'), [
      'products' => $products,
      'cartItems' => $cartItems,
    ]));
  }

//   public function addProduct(Request $request, Response $response)
//   {
//     $auth = Application::getInstance()->getAuthentication();
//     if (!$auth->isAuthenticated()) {
//       return $response->redirect( BASE_URI . '/login');
//     }
//     $productId = $request->getParam('product_id');
//     $quantity = $request->getParam('quantity');
//     $cartItems = Cart::where(['user_id' => $auth->getUser()->id]);

//     foreach ($cartItems as $cartItem) {
//       $product = Product::find($cartItem->product_id);
//       $product->quantity = $cartItem->quantity;
//       $products[] = $product;
//     }

//     if ($cartItem) {
//         $cartItem->quantity += $quantity;
//         $cartItem->save();
//     } else {
//         $cartItem = new Cart();
//         $cartItem->user_id = $auth->getUser()->id;
//         $cartItem->product_id = $productId;
//         $cartItem->quantity = $quantity;
//         $cartItem->save();
//     }

//     $cartItems = Cart::where(['user_id' => $auth->getUser()->id]);
//     $products = [];

//     foreach ($cartItems as $cartItem) {
//         $product = Product::find($cartItem->product_id);
//         $product->quantity = $cartItem->quantity;
//         $products[] = $product;
//     }

//     return $response->setBody(View::renderWithLayout(new View('pages/cart'), [
//       'products' => $products,
//       'cartItems' => $cartItems,
//     ]));
//   }
}
