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
}