<?php

namespace App\Controllers\Customer;

use App\Models\Order;
use App\Models\User;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;
use Exception;
use Utils\Validation;

class ProfileController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();

    if (!$auth->isAuthenticated()) {
      $response->redirect(BASE_URI . "/login");
    }
    $user = Application::getInstance()
      ->getAuthentication()
      ->getUser();
    $response->setStatusCode(200);
    $response->setBody(
      View::renderWithLayout(new View("pages/profile/index"), [
        "user" => $user,
        "footer" => "",
      ])
    );
  }

  public function update(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();

    if (!$auth->isAuthenticated()) {
      $response->redirect("/login");
    }
    $user = $auth->getUser();
    $user->name = $request->getParam("name");
    // Validate email
    $user->email = Validation::validateEmail($request->getParam('email'));
    $user->phone = $request->getParam("phone");
    $user->address = $request->getParam("address");
    if ($request->getParam("gender") == "male") {
      $user->gender = 1;
    } else if ($request->getParam("gender") == "female") {
      $user->gender = 2;
    } else {
      $user->gender = 0;
    }
    // $user->birthday = $request->getParam("birthday");

    if ($user->password = password_hash(Validation::validatePassword($request->getparam('current-password')), PASSWORD_DEFAULT)) {
      $user->password = password_hash(Validation::validatePassword($request->getparam('new-password')), PASSWORD_DEFAULT);
    }

    $user->save();
    $response->redirect(BASE_URI . "/profile");
  }

  public function settings(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();

    if (!$auth->isAuthenticated()) {
      $response->redirect(BASE_URI . "/login");
    }
    $user = Application::getInstance()
      ->getAuthentication()
      ->getUser();
    $response->setStatusCode(200);
    $response->setBody(
      View::renderWithLayout(new View("pages/profile/settings"), [
        "user" => $user,
        "footer" => "",
      ])
    );
  }

  public function payments(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();

    if (!$auth->isAuthenticated()) {
      $response->redirect(BASE_URI . "/login");
    }
    $user = Application::getInstance()
      ->getAuthentication()
      ->getUser();
    $response->setStatusCode(200);
    $response->setBody(
      View::renderWithLayout(new View("pages/profile/payments"), [
        "user" => $user,
        "footer" => "",
      ])
    );
  }
  public function orders(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();

    if (!$auth->isAuthenticated()) {
      $response->redirect(BASE_URI . "/login");
    }
    $user = Application::getInstance()
      ->getAuthentication()
      ->getUser();

    $orders = $user->orders();

    $response->setStatusCode(200);
    $response->setBody(
      View::renderWithLayout(new View("pages/profile/orders"), [
        "orders" => $orders,
        "user" => $user,
      ])
    );
  }

  public function orderDetail(Request $request, Response $response)
  {
    switch ($request->getMethod()) {
      case "GET":
        $user = User::findOne(["id" => $request->getQuery("id")]);
        $order = Order::findOne(["id" => $request->getQuery("id")]);
        // dd($user->id);
        $response->setStatusCode(200);
        return $response->setBody(
          View::renderWithLayout(
            new View("pages/profile/orderDetail"),
            [
              "title" => "Order Detail Update",
              "user" => $user,
              "order" => $order,
            ]
          )
        );
      case "POST":
        dd($request->getParam("id"));
        $user = User::find($request->getParam("id"));
        $order = Order::find($request->getParam("id"));
        if (!$user) {
          return $response->setBody(
            View::renderWithDashboardLayout(
              new View("pages/profile/orders"),
              [
                "title" => "Users",
                "toast" => [
                  "type" => "error",
                  "message" => "Edit account fail!",
                ],
              ]
            )
          );
        }
      default:
        break;
    }
    // $auth = Application::getInstance()->getAuthentication();

    // if (!$auth->isAuthenticated()) {
    //   $response->redirect(BASE_URI . "/login");
    // }
    // $user = Application::getInstance()
    //   ->getAuthentication()
    //   ->getUser();

    // $orders = $user->orders();

    // $response->setStatusCode(200);
    // $response->setBody(
    //   View::renderWithLayout(new View("pages/profile/orderDetail"), [
    //     "orders" => $orders,
    //     "user" => $user,
    //   ])
    // );
  }
}
