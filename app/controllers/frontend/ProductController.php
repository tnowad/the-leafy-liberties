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
    $products = Product::all();

    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/products'), [
      'title' => 'products',
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
    $product = Product::find($request->getQuery('id'));
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
}