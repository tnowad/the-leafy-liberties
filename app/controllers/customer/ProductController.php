<?php

namespace App\Controllers\Customer;

use App\Models\Author;
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
      $authors = Author::all();
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/products'), [
      'title' => 'Shop',
      'products' => $products,
      'authors' => $authors,
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
  public function getProducts(Request $request, Response $response)
  {

    $response->setStatusCode(200);

    try {
      $products = [];
      foreach (Product::all() as $product) {
        $products[] = $product->getAttributes();
      }
      $response->json($products);
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
  }
}
