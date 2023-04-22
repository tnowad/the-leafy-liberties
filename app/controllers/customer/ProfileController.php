<?php

namespace App\Controllers\Customer;

use App\Models\User;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;
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
    if($request->getParam("gender")=="male") {
      $user->gender =1 ;
    }
    else if($request->getParam("gender")=="female") {
      $user->gender =2 ;
    }
    else {
      $user->gender =0 ;
    }
    // $user->birthday = $request->getParam("birthday");
    if ($user->password == Validation::validatePassword($request->getParam('current-password'))) {
      // Validate password
      $user->password = Validation::validatePassword($request->getParam('new-password'));
    }
    // else {
    //   $response->redirect(BASE_URI . "/login");
    // }
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
