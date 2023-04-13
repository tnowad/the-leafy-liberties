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

  // public function filter(Request $request, Response $response)
  // {
  //   // Get query from request and create list products
  //   // return with json
  //   $response->setBody(json_encode($request->getQueries()));
  // }
  public function getProducts(Request $request, Response $response)
  {

    $response->setHeaders("Access-Control-Allow-Origin: *");
    $response->setStatusCode(200);

    $productList = Product::all();
    $productJson = array_map(function ($product) {
      return [
        "id" => $product->id,
        "isbn" => $product->isbn,
        "title" => $product->title,
        "author_id" => $product->author_id,
        "publisher_id" => $product->publisher_id,
        "price" => $product->price,
        "description" => $product->description,
        "image_url" => $product->image_url,
        "quantity" => $product->quantity,
        "deleted_at" => $product->deleted_at
      ];
    }, $productList);

    $response->json($productJson);
  }

  public function create(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/create'), [
      'title' => 'Create Product'
    ]));
  }

  public function update(Request $request, Response $response)
  {
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/update'), [
      'title' => 'Update Product'
    ]));
  }

  public function destroy(Request $request, Response $response)
  {
    $product = Product::find($request->getQuery('id'));
    $product->delete();
  }

}