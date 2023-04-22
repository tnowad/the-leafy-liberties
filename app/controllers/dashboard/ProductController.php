<?php
namespace App\Controllers\Dashboard;

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
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("product.access")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $products = Product::all();
    return $response->setBody(
      View::renderWithDashboardLayout(
        new View("pages/dashboard/product/index"),
        [
          "title" => "Products",
          "products" => $products,
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
            "message" => "Add product failed!",
          ],
        ])
      );
    }

    $product = new Product();
    $product->name = $request->getParam("name");
    $product->image = $request->getParam("image");
    $product->isbn = $request->getParam("isbn");
    $product->price = $request->getParam("price");
    $product->description = $request->getParam("description");
    $product->quantity = $request->getParam("quantity");
    $product->save();
    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/product"), [
        "title" => "Products",
        "toast" => [
          "type" => "success",
          "message" => "Add product successful!",
        ],
      ])
    );
  }

  public function store(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("products.create")) {
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
                  "message" => "Add product failed!",
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
    $product = Product::find($request->getQuery("id"));
    if (!$product) {
      return $response->redirect(BASE_URI . "/dashboard/product");
    }

    switch ($request->getMethod()) {
      case "GET":
        $response->setStatusCode(200);
        $product->delete();
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/product/index"),
            [
              "title" => "Delete Product",
              "product" => $product,
              "toast" => [
                'type' => 'success',
                'message' => 'Delete Product Successfully'
              ]
            ]
          )
        );
      case "POST":
        return $response->redirect(BASE_URI . "/dashboard/products");
    }
  }
  public function filterProduct(Request $request, Response $response)
  {
    switch ($request->getMethod()) {
      case "GET":
        $response->setStatusCode(200);
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/product/index"),
            [
              "title" => "Products",
            ]
          )
        );
      case "POST":
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/product/index"),
            [
              "title" => "Products",
            ]
          )
        );
    }
  }
}
