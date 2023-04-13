<?php

namespace App\Controllers\Frontend;

use App\Models\Product;
use Core\Controller;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\View;


class ProductController extends Controller
{

  public function index(Request $request, Response $response)
  {
    try {
      $products = Product::all();
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/products'), [
      'title' => 'Shop',
      'products' => $products,
    ]));
  }

  public function show(Request $request, Response $response)
  {
    if ($request->getQuery('id')) {
      $response->setStatusCode(404);
      $response->redirect(BASE_URI . '/');
      return;
    }
    try {

      $product = Product::find($request->getQuery('id'));
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
    dd($product);
    if (!$product) {
      $response->setStatusCode(404);
      $response->redirect(BASE_URI . '/');
      return;
    }
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/product'), [
      'product' => $product,
    ]));
  }

  public function filter(Request $request, Response $response)
  {
    // Get query from request and create list products
    // return with json
    $response->setBody(json_encode($request->getQueries()));
  }
  // public function index(Request $request, Response $response)
  // {
  //   if (!Application::getInstance()->getAuthentication()->check()) {
  //     $response->redirect('/login');
  //   }
  //   header("Access-Control-Allow-Origin: *");
  //   $user = Application::getInstance()->getAuthentication()->getUser();
  //   $response->setStatusCode(200);
  //   // $response->setBody(View::renderWithLayout(new View('pages/profile'), [
  //   //   'user' => $user,
  //   //   'footer' => ''
  //   // ]));
  //   $userList = User::all();
  //   // echo json_encode($userList);
  //   $userListJson = array_map(function ($user) {
  //     return [
  //       "name" => $user->name,
  //       "email" => $user->email
  //     ];
  //   }, $userList);

  //   $response->json($userListJson);
  //   // dd($userList);
  // }
}
