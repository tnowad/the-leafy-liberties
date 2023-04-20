<?php
namespace App\Controllers\Dashboard;

use App\Models\User;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;
use Utils\FileUploader;

class UserController extends Controller
{
  public function index(Request $request, Response $response)
  {
    // $auth = Application::getInstance()->getAuthentication();
    // if (!$auth->hasPermission('products.access')) {
    //   return $response->redirect(BASE_URI . '/dashboard');
    // }
    $users = User::all();
    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/user/index"), [
        "title" => "Users",
        "users" => $users,
      ])
    );
  }

  public function create(Request $request, Response $response)
  {
    // $auth = Application::getInstance()->getAuthentication();
    // if (!$auth->hasPermission('products.create')) {
    //   return $response->redirect(BASE_URI . '/dashboard');
    // }

    $uploader = new FileUploader([
      "allowedExtensions" => ["jpeg", "jpg", "png"],
      "maxFileSize" => 2097152,
      "uploadPath" => "resources/images/users/",
    ]);

    $result = $uploader->upload($_FILES["image"]);

    if ($result) {
      $request->setParam("image", $result);
    } else {
      return $response->setBody(
        View::renderWithDashboardLayout(new View("pages/dashboard/user"), [
          "title" => "Users",
          "toast" => [
            "type" => "error",
            "message" => "Add user failed!",
          ],
        ])
      );
    }

    $user = new User();
    $user->name = $request->getParam("name");
    $user->image = $request->getParam("image");
    $user->isbn = $request->getParam("isbn");
    $user->price = $request->getParam("price");
    $user->description = $request->getParam("description");
    $user->quantity = $request->getParam("quantity");
    $user->save();
    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/user"), [
        "title" => "Users",
        "toast" => [
          "type" => "success",
          "message" => "Add user successful!",
        ],
      ])
    );
  }

  public function store(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("users.create")) {
      return $response->redirect(BASE_URI . "/dashboard/user");
    }
    $user = new User();
    // get from request
    $user->save();
    return $response->redirect(BASE_URI . "/dashboard/user");
  }

  public function show(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("users.access")) {
      return $response->redirect(BASE_URI . "/dashboard/user");
    }
    $user = User::find($request->getQuery("id"));
    if (!$user) {
      return $response->redirect(BASE_URI . "/dashboard/user");
    }
    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/user/show"), [
        "title" => "Show User",
        "user" => $user,
      ])
    );
  }

  public function update(Request $request, Response $response)
  {
    switch ($request->getMethod()) {
      case "GET":
        $user = User::findOne(["id" => $request->getQuery("id")]);
        // dd($request->getQueries());
        $response->setStatusCode(200);
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/user/update"),
            [
              "title" => "User Update",
              "user" => $user,
            ]
          )
        );
      case "POST":
        $user = User::find($request->getParam("id"));
        if (!$user) {
          return $response->setBody(
            View::renderWithDashboardLayout(
              new View("pages/dashboard/user"),
              [
                "title" => "Users",
                "toast" => [
                  "type" => "error",
                  "message" => "Edit account fail!",
                ],
              ]
            )
          );
        } else {
          // dd($product);
          $user->name = $request->getParam("name");
          $user->image = $request->getParam("image");
          $user->phone = $request->getParam("phone");
          $user->email = $request->getParam("email");
          $user->gender = $request->getParam("gender");
          $user->password = $request->getParam("passowrd");
          $user->save();
          return $response->setBody(
            View::renderWithDashboardLayout(
              new View("pages/dashboard/user"),
              [
                "title" => "Users",
                "toast" => [
                  "type" => "success",
                  "message" => "Edit account successful!",
                ],
              ]
            )
          );
        }
      default:
        break;
    }
    // $auth = Application::getInstance()->getAuthentication();
    // if (!$auth->hasPermission('products.update')) {
    //   return $response->redirect(BASE_URI . '/dashboard');
    // }
    // $product = Product::find($request->getQuery('id'));
    // dd($product);
    // if (!$product) {
    //   return $response->redirect(BASE_URI . '/dashboard/product');
    // }
    // // get from request

    // $product->save();
    // return $response->redirect(BASE_URI . '/dashboard/product');
  }

  public function delete(Request $request, Response $response)
  {
    // $auth = Application::getInstance()->getAuthentication();
    // if (!$auth->hasPermission('products.delete')) {
    //   return $response->redirect(BASE_URI . '/dashboard');
    // }
    // dd($request->getQuery('id'));
    $user = User::find($request->getQuery("id"));
    dd($user);
    if (!$user) {
      return $response->redirect(BASE_URI . "pages/dashboard/user/index");
    }
    // $user->delete();
    return $response->redirect(BASE_URI . "pages/dashboard/user/index");
  }
}
