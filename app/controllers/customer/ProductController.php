<?php

namespace App\Controllers\Customer;

use App\Models\Author;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
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

  public function getCategories(Request $request, Response $response)
  {

    $response->setStatusCode(200);

    try {
      $categories = [];
      foreach (Category::all() as $category) {
        $categories[] = $category->getAttributes();
      }
      $response->json($categories);
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
  }

  public function getProductCategories(Request $request, Response $response)
  {

    $response->setStatusCode(200);

    try {
      $productCategories = [];
      foreach (ProductCategory::all() as $productCategory) {
        $productCategories[] = $productCategory->getAttributes();
      }
      $response->json($productCategories);
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
  }

  public function getAuthors(Request $request, Response $response)
  {

    $response->setStatusCode(200);

    try {
      $authors = [];
      foreach (Author::all() as $author) {
        $authors[] = $author->getAttributes();
      }
      $response->json($authors);
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
  }
}
