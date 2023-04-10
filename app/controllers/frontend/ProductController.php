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

  // public function index(Request $request, Response $response)
  // {
  //   dd($request->getQueries());
  //   // Get all products by where
  //   // pass in to variable
  //   // render view
  //   $response->setStatusCode(200);
  //   $response->setBody(View::renderWithLayout(new View('pages/products'), [
  //     'title' => 'Product',
  //   ]));
  // }


  public function index(Request $request, Response $response)
  {
    $products = Product::all();

    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/products'), [
      'title' => 'Index',
      'products' => $products,
    ]));
  }

  public function show(Request $request, Response $response)
  {
    // if (!$request->getQuery('id')) {
    //   $response->setStatusCode(404);
    //   $response->redirect(BASE_URI . '/');
    //   return;
    // }
    // Get product by id
    // pass in to variable
    // render view

    $product = new Product([
      'name' => 'Product 1',
      'price' => 100,
      'description' => 'Description',
      'image' => 'https://picsum.photos/200/300',
      'author_id' => 1,
      'publisher_id' => 1,
      'quantity' => 10,
      'status' => 1,
      'created_at' => '2021-05-01 00:00:00',
      'updated_at' => '2021-05-01 00:00:00',
    ]);
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/product'), [
      'product' => $product,
    ]));
  }
}