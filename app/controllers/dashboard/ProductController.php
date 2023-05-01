<?php
namespace App\Controllers\Dashboard;

use App\Models\Author;
use App\Models\Product;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;
use Utils\FileUploader;

class ProductController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $filter = [
      "keywords" => $request->getQuery("keywords"),
    ];
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("product.access")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    if (isset($filter)) {
      $products = Product::filterAdvanced($filter);
    } else {
      $products = Product::all();

    }
    return $response->setBody(
      View::renderWithDashboardLayout(
        new View("pages/dashboard/product/index"),
        [
          "title" => "Products",
          "products" => $products,
          "filter" => $filter,
        ]
      )
    );
  }

  public function create(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("product.create")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    switch ($request->getMethod()) {
      case 'GET':
        $response->setStatusCode(200);
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/product/create"),
            [
              "title" => "Add Product",
            ]
          )
        );
      case 'POST':
        $uploader = new FileUploader([
          "allowedExtensions" => ["jpeg", "jpg", "png"],
          "maxFileSize" => 2097152,
          "uploadPath" => "resources/images/products/",
        ]);

        $result = $uploader->upload($_FILES["image"]);

        if ($result) {
          $request->setParam("image", $result);
        } else {
          return $response->redirect(BASE_URI . "/dashboard/product", 200, [
            "toast" => [
              "type" => "error",
              "message" => "Add product failed",
            ],
          ]);
        }
        $product = new Product();
        $product->name = $request->getParam("name");
        $product->image = $request->getParam("image");
        $product->isbn = $request->getParam("isbn");
        $product->price = $request->getParam("price");
        $product->description = $request->getParam("description");
        $product->quantity = $request->getParam("quantity");
        if ($request->getParam("author") != null) {
          $product->author_id = $request->getParam("author");
        }
        echo $request->getParam("author-name");
        if ($request->getParam("author-name") != null) {
          $author = new Author();
          $author->name = $request->getParam("author-name");
          $author->save();
          $product->author_id = $author->id;
        }
        $product->publisher_id = $request->getParam("publisher");
        $product->save();
        return $response->redirect(BASE_URI . "/dashboard/product", 200, [
          "toast" => [
            "type" => "success",
            "message" => "Add product successful",
          ],
        ]);

    }
  }

  public function store(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("product.create")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $product = new Product();
    // get from request
    $product->save();
    return $response->redirect(BASE_URI . "/dashboard/products");
  }

  public function show(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("product.access")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $product = Product::find($request->getQuery("id"));
    if (!$product) {
      return $response->redirect(BASE_URI . "/dashboard/products");
    }
    return $response->setBody(
      View::renderWithDashboardLayout(
        new View("pages/dashboard/product/show"),
        [
          "title" => "Show Product",
          "product" => $product,
        ]
      )
    );
  }

  public function update(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('product.update')) {
      return $response->redirect(BASE_URI . '/dashboard', 200, [
        'toast' => [
          'type' => 'error',
          'message' => 'You do not have permission to access this page.'
        ]
      ]);
    }
    switch ($request->getMethod()) {
      case "GET":
        $product = Product::findOne(["id" => $request->getQuery("id")]);
        $response->setStatusCode(200);
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/product/update"),
            [
              "title" => "Products",
              "product" => $product,
            ]
          )
        );
      case "POST":
        $product = Product::find($request->getParam("id"));
        if (!$product) {
          return $response->redirect(BASE_URI . "/dashboard/product", 200, [
            "toast" => [
              "type" => "error",
              "message" => "Edit product fail",
            ],
          ]);
        } else {
          $uploader = new FileUploader([
            "allowedExtensions" => ["jpeg", "jpg", "png"],
            "maxFileSize" => 2097152,
            "uploadPath" => "resources/images/products/",
          ]);

          $result = $uploader->upload($_FILES["image"]);

          if ($result) {
            $request->setParam("image", $result);
          } else {
            return $response->setBody(
              View::renderWithDashboardLayout(new View("pages/dashboard/product"), [
                "title" => "Products",
                "toast" => [
                  "type" => "error",
                  "message" => "Edit product failed!",
                ],
              ])
            );
          }
          $product->name = $request->getParam("name");
          $product->image = $request->getParam("image");
          $product->isbn = $request->getParam("isbn");
          $product->price = $request->getParam("price");
          $product->description = $request->getParam("description");
          $product->quantity = $request->getParam("quantity");
          $product->author_id = $request->getParam("author");
          $product->publisher_id = $request->getParam("publisher");
          $product->save();
          return $response->redirect(BASE_URI . "/dashboard/product", 200, [
            "toast" => [
              "type" => "success",
              "message" => "Edit product successful",
            ],
          ]);
        }
      default:
        break;
    }
  }

  public function delete(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("product.delete")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $product = Product::find($request->getBody()["id"]);
    if (!$product) {
      $response->jsonResponse([
        "type" => "success",
        "message" => "Failed to remove Product removed from table",
      ]);
    }
    // dd($product);
    $product->delete();
    $response->jsonResponse([
      "type" => "success",
      "message" => "Product removed from table",
    ]);
  }
}
