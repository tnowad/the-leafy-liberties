<?php
namespace App\Controllers\Dashboard;

use App\Models\Author;
use App\Models\Category;
use App\Models\Import;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\User;
use Core\Application;
use Core\Controller;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\View;
use Utils\FileUploader;

class ImportController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $filter = [
      "keywords" => $request->getQuery("keywords"),
    ];

    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("import.access")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    if (isset($filter)) {
      $imports = Import::filterAdvanced($filter);
    } else {
      $imports = Import::all();

    }
    return $response->setBody(
      View::renderWithDashboardLayout(
        new View("pages/dashboard/import/index"),
        [
          "title" => "Import",
          "imports" => $imports,
          "filter" => $filter,
        ]
      )
    );
  }

  public function create(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("import.create")) {
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
            new View("pages/dashboard/import/create"),
            [
              "title" => "Import Product",
            ]
          )
        );
      case 'POST':
        Database::getInstance()->beginTransaction();
        $import = new Import();
        $import->user_id = $auth->getUser()->id;
        $import->total_price = 0;
        $import->save();

        $products = [];
        for ($i = 0; $i < count($request->getParam('product-id')); $i++) {
          $products[] = [
            'product-id' => $request->getParam('product-id')[$i],
            'quantity' => $request->getParam('quantity')[$i],
            'price' => $request->getParam('price')[$i],
          ];
        }

        foreach ($products as $product) {
          $import->addProduct(
            Product::find($product['product-id']),
            $product['quantity'],
            $product['price'],
          );
        }

        Database::getInstance()->commitTransaction();
        return $response->redirect(BASE_URI . "/dashboard/import", 200, [
          "toast" => [
            "type" => "success",
            "message" => "Import successfully.",
          ],
        ]);
    }
  }

  public function store(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("import.create")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    return $response->redirect(BASE_URI . "/dashboard/import");
  }

  public function show(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("import.access")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $product = Product::find($request->getQuery("id"));
    if (!$product) {
      return $response->redirect(BASE_URI . "/dashboard/import");
    }
    return $response->setBody(
      View::renderWithDashboardLayout(
        new View("pages/dashboard/import/show"),
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
    if (!$auth->hasPermission('import.update')) {
      return $response->redirect(BASE_URI . '/dashboard', 200, [
        'toast' => [
          'type' => 'error',
          'message' => 'You do not have permission to access this page.'
        ]
      ]);
    }
    switch ($request->getMethod()) {
      case "GET":
        $import = Import::findOne(["id" => $request->getQuery("id")]);
        $response->setStatusCode(200);
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/import/update"),
            [
              "title" => "Import Update",
              "import" => $import,
            ]
          )
        );
      case "POST":
        $import = Import::find($request->getParam("id"));
        if (!$import) {
          return $response->redirect(BASE_URI . "/dashboard/import", 200, [
            "toast" => [
              "type" => "error",
              "message" => "Edit import bill fail",
            ],
          ]);
        } else {
          //Viết hàm import trong này

          return $response->redirect(BASE_URI . "/dashboard/import", 200, [
            "toast" => [
              "type" => "success",
              "message" => "Edit import bill successful",
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

    if (!$auth->hasPermission('import.delete')) {
      return $response->redirect(BASE_URI . '/dashboard', 200, [
        'toast' => [
          'type' => 'error',
          'message' => 'You do not have permission to access this page.'
        ]
      ]);
    }

    $import = Import::find($request->getQuery('id'));
    if (!$import) {
      return $response->redirect(BASE_URI . '/dashboard/import', 200, [
        'toast' => [
          'type' => 'error',
          'message' => 'Import not found.'
        ]
      ]);
    }

    $import->delete();

    return $response->redirect(BASE_URI . '/dashboard/import', 200, [
      'toast' => [
        'type' => 'success',
        'message' => 'Import with Id ' . $import->id . ' has been deleted.'
      ]
    ]);
  }
}