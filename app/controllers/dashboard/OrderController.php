<?php

namespace App\Controllers\Dashboard;

use App\Models\Order;
use App\Models\User;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class OrderController extends Controller
{
  public function index(Request $request, Response $response)
  {
    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/order/index"), [
        "title" => "Orders",
      ])
    );
  }

  public function show(Request $request, Response $response)
  {
  }

  public function create(Request $request, Response $response)
  {
  }

  public function store(Request $request, Response $response)
  {
  }

  public function update(Request $request, Response $response)
  {
    switch ($request->getMethod()) {
      case "GET":
        $user = Application::getInstance()
          ->getAuthentication()
          ->getUser();

        $order = Order::findOne(["id" => $request->getQuery("id")]);
        $response->setStatusCode(200);
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/order/orderReview"),
            [
              "title" => "Order Review",
              "user" => $user,
              "order" => $order,
            ]
          )
        );
      case "POST":
        $order = Order::findOne(["id" => $request->getQuery("id")]);
        // $order = Order::find(25);
        // $order = Order::find($request->getParam("id"));
        if (!$order) {
          return $response->redirect(BASE_URI . "/dashboard/order", 200, [
            "toast" => [
              "type" => "error",
              "message" => "Edit product fail",
            ],
          ]);
        } else {
          $order->status = $request->getParam("status");
          $order->save();
          return $response->redirect(BASE_URI . "/dashboard/order", 200, [
            "toast" => [
              "type" => "success",
              "message" => "Check order successful",
            ],
          ]);
        }
      default:
        break;
    }
  }

  public function delete(Request $request, Response $response)
  {
  }
}
