<?php
namespace App\Controllers\Dashboard;

use App\Models\Category;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;
use Utils\FileUploader;

class CategoryController extends Controller
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
    $categorys = Category::all();
    return $response->setBody(
      View::renderWithDashboardLayout(
        new View("pages/dashboard/category/index"),
        [
          "title" => "Categories",
          "categorys" => $categorys,
        ]
      )
    );
  }

  public function create(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("category.create")) {
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
            new View("pages/dashboard/category/create"),
            [
              "title" => "Add Category",
            ]
          )
        );
      case 'POST':
        $uploader = new FileUploader([
          "allowedExtensions" => ["jpeg", "jpg", "png"],
          "maxFileSize" => 2097152,
          "uploadPath" => "resources/images/categories/",
        ]);

        $result = $uploader->upload($_FILES["image"]);

        if ($result) {
          $request->setParam("image", $result);
        } else {
          return $response->redirect(BASE_URI . "/dashboard/category", 200, [
            "toast" => [
              "type" => "error",
              "message" => "Add category failed",
            ],
          ]);
        }
        $category = new Category();
        $category->name = $request->getParam("name");
        $category->image = $request->getParam("image");
        $category->save();
        return $response->redirect(BASE_URI . "/dashboard/category", 200, [
          "toast" => [
            "type" => "success",
            "message" => "Add category successful",
          ],
        ]);
    }
  }

  public function store(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("category.create")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $category = new Category();
    // get from request
    $category->save();
    return $response->redirect(BASE_URI . "/dashboard/category");
  }

  public function show(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("category.access")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $category = category::find($request->getQuery("id"));
    if (!$category) {
      return $response->redirect(BASE_URI . "/dashboard/category");
    }
    return $response->setBody(
      View::renderWithDashboardLayout(
        new View("pages/dashboard/category/show"),
        [
          "title" => "Show category",
          "category" => $category,
        ]
      )
    );
  }

  public function update(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('category.update')) {
      return $response->redirect(BASE_URI . '/dashboard', 200, [
        'toast' => [
          'type' => 'error',
          'message' => 'You do not have permission to access this page.'
        ]
      ]);
    }
    switch ($request->getMethod()) {
      case "GET":
        $category = category::findOne(["id" => $request->getQuery("id")]);
        $response->setStatusCode(200);
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/category/update"),
            [
              "title" => "category",
              "category" => $category,
            ]
          )
        );
      case "POST":
        $category = Category::find($request->getParam("id"));
        if (!$category) {
          return $response->redirect(BASE_URI . "/dashboard/category", 200, [
            "toast" => [
              "type" => "error",
              "message" => "Edit category failed",
            ],
          ]);
        } else {
          $uploader = new FileUploader([
            "allowedExtensions" => ["jpeg", "jpg", "png"],
            "maxFileSize" => 2097152,
            "uploadPath" => "resources/images/categories/",
          ]);

          $result = $uploader->upload($_FILES["image"]);

          if ($result) {
            $request->setParam("image", $result);
          } else {
            return $response->redirect(BASE_URI . "/dashboard/category", 200, [
              "toast" => [
                "type" => "erro",
                "message" => "Edit category failed",
              ],
            ]);
          }
          $category->name = $request->getParam("name");
          $category->image = $request->getParam("image");
          $category->save();
          return $response->redirect(BASE_URI . "/dashboard/category", 200, [
            "toast" => [
              "type" => "success",
              "message" => "Edit category successful",
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
    if (!$auth->hasPermission("category.delete")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $category = Category::find($request->getQuery("id"));
    if (!$category) {
      return $response->redirect(BASE_URI . "/dashboard/category", 200, [
        "toast" => [
          "type" => "error",
          "message" => "Delete category failed",
        ],
      ]);
    }

    switch ($request->getMethod()) {
      case "GET":
        $response->setStatusCode(200);
        $category->delete();
        return $response->redirect(BASE_URI . "/dashboard/category", 200, [
          "toast" => [
            'type' => 'success',
            'message' => 'Delete category successfully'
          ]
        ]);
      case "POST":
        return $response->redirect(BASE_URI . "/dashboard/category", 200, [
          "toast" => [
            'type' => 'success',
            'message' => 'Delete category successfully'
          ]
        ]);
    }
  }
}
