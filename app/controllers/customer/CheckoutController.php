<?php

namespace App\Controllers\Customer;

use App\Models\Cart;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class CheckoutController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->isAuthenticated()) {
      return $response->redirect(BASE_URI . "/login");
    }
    $cartItems = Cart::findAll(["user_id" => $auth->getUser()->id]);
    return $response->setBody(
      View::renderWithLayout(new View("pages/checkout"), [
        "title" => "Checkout",
        "cartItems" => $cartItems,
      ])
    );
  }

  public function confirm(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->isAuthenticated()) {
      return $response->redirect(BASE_URI . "/login");
    }

    dd($request->getParams());
  }
}