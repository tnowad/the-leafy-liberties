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
use Utils\Pagination;

class ProductController extends Controller
{
  public function index(Request $request, Response $response)
  {

    $filter = [
      "categories" => $request->getQuery("categories") ?? [],
      "tags" => $request->getQuery("tags") ?? [],
      "author" => $request->getQuery("author"),
      "price" => [
        "min" => $request->getQuery("min-price"),
        "max" => $request->getQuery("max-price"),
      ],
      "keywords" => $request->getQuery("keywords"),
    ];

    $pagination = [
      "page" => $request->getQuery("page") ?? 1,
      "limit" => $request->getQuery("limit") ?? 24,
    ];
    $products = Product::filterAdvanced($filter);

    $pagination["total"] = count($products);

    $pagination["totalPages"] = ceil($pagination["total"] / $pagination["limit"]);

    $pagination["products"] = Pagination::paginate(
      $products,
      $pagination["page"],
      $pagination["limit"]
    );

    $response->setStatusCode(200);
    $response->setBody(
      View::renderWithLayout(new View("pages/products"), [
        "title" => "Shop",
        "products" => $products,
        "filter" => $filter,
        "pagination" => $pagination,
        "footer" => ""
      ])
    );
  }

  public function show(Request $request, Response $response)
  {
    try {
      $product = Product::find($request->getQuery("id"));
      $author = Author::find($product->author_id);
      $product_category = ProductCategory::find($product->id);
      $category = Category::find($product_category->category_id);
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
    $response->setStatusCode(200);
    $response->setBody(
      View::renderWithLayout(new View("pages/product"), [
        "product" => $product,
        "author" => $author,
        "category" => $category,
      ])
    );
  }

  public function getProducts(Request $request, Response $response)
  {
    $response->setStatusCode(200);

    try {
      $products = [];
      foreach (Product::all() as $product) {
        $products[] = $product->toArray();
      }
      $response->jsonResponse($products);
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
        $categories[] = $category->toArray();
      }
      $response->jsonResponse($categories);
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
        $productCategories[] = $productCategory->toArray();
      }
      $response->jsonResponse($productCategories);
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
        $authors[] = $author->toArray();
      }
      $response->jsonResponse($authors);
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
  }
}