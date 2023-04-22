<?php
namespace App\Controllers\Dashboard;

use App\Models\Coupon;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class CouponController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('coupon.access')) {
      return $response->redirect(BASE_URI . "/dashboard/coupon", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $coupons = Coupon::all();
    return $response->setBody(
      View::renderWithDashboardLayout(
        new View("pages/dashboard/coupon/index"),
        [
          "title" => "Coupons",
          "coupons" => $coupons,
        ]
      )
    );
  }

  public function create(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('coupon.create')) {
      return $response->redirect(BASE_URI . "/dashboard/coupon", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $product = new Coupon();
    $product->code = strtoupper($request->getParam("code"));
    $product->expired = $request->getParam("expired");
    $product->quantity = $request->getParam("quantity");
    $product->description = $request->getParam("description");
    $product->save();
    return $response->setBody(
      View::renderWithDashboardLayout(
        new View("pages/dashboard/coupon/index"),
        [
          "title" => "Coupons",
          "toast" => [
            "type" => "success",
            "message" => "Add coupon successful!",
          ],
        ]
      )
    );
  }

  public function store(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("coupon.create")) {
      return $response->redirect(BASE_URI . "/dashboard/coupon", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $product = new Coupon();
    // get from request
    $product->save();
    return $response->redirect(BASE_URI . "/dashboard/coupon/index");
  }

  public function show(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("coupon.access")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $coupon = Coupon::find($request->getQuery("id"));
    if (!$coupon) {
      return $response->redirect(BASE_URI . "/dashboard/coupon/index");
    }
    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/coupon/show"), [
        "title" => "Show Coupon",
        "coupon" => $coupon,
      ])
    );
  }

  public function update(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("coupon.update")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    switch ($request->getMethod()) {
      case "GET":
        $coupon = Coupon::findOne(["id" => $request->getQuery("id")]);
        // dd($request->getQueries());
        $response->setStatusCode(200);
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/coupon/update"),
            [
              "title" => "Coupon Dashboard",
              "coupon" => $coupon,
            ]
          )
        );
      case "POST":
        $coupon = Coupon::find($request->getParam("id"));
        if (!$coupon) {
          return $response->redirect(BASE_URI . "/dashboard/coupon", 200, [
            "toast" => [
              "type" => "error",
              "message" => "Edit coupon fail",
            ],
          ]);
        } else {
          // dd($coupon);
          $coupon->code = $request->getParam("code");
          $coupon->expired = $request->getParam("expired");
          $coupon->quantity = $request->getParam("quantity");
          $coupon->description = $request->getParam("description");
          $coupon->save();
          return $response->redirect(BASE_URI . "/dashboard/coupon", 200, [
            "toast" => [
              "type" => "success",
              "message" => "Edit coupon success",
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
    if (!$auth->hasPermission("coupon.delete")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    // dd($request->getQuery('id'));
    $coupon = Coupon::find($request->getQuery("id"));
    // dd($product);
    if (!$coupon) {
      return $response->redirect(BASE_URI . 'pages/dashboard/coupon/index');
    }
    $coupon->delete();
    return $response->redirect(BASE_URI . "pages/dashboard/coupon/index");
  }
  public function filterCoupon(Request $request, Response $response)
  {
    switch ($request->getMethod()) {
      case "GET":
        $response->setStatusCode(200);
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/coupon/index"),
            [
              "title" => "Coupons",
            ]
          )
        );
      case "POST":
        // $coupons = Coupon::filterAdvancedCoupon($request->getQuery('searchQuery'));
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/coupon/index"),
            [
              "title" => "Coupons",
            ]
          )
        );
    }
  }
}
