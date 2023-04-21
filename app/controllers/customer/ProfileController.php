<?php

namespace App\Controllers\Customer;

use App\Models\User;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

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
}