<?php
namespace App\Controllers\Dashboard;

use App\Models\User;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;
use Utils\FileUploader;
use Utils\Validation;

class UserController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $filter = [
      "keywords" => $request->getQuery("keywords"),
    ];
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('user.access')) {
      return $response->redirect(BASE_URI . '/dashboard');
    }
    if (isset($filter)) {
      $users = User::filterAdvanced($filter);
    } else {
      $users = User::all();

    }
    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/user/index"), [
        "title" => "Users",
        "users" => $users,
        "filter" => $filter
      ])
    );
  }

  public function create(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('user.create')) {
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
            new View("pages/dashboard/user/create"),
            [
              "title" => "Add User",
            ]
          )
        );
      case 'POST':
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
        $user->email = $request->getParam("email");
        $user->name = $request->getParam("name");
        $user->image = $request->getParam("image");
        $user->phone = $request->getParam("phone");
        $user->password = password_hash($request->getParam("password"), PASSWORD_DEFAULT);
        $user->role_id = $request->getParam("role");
        $user->status = 1;
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

  }

  public function store(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("user.create")) {
      return $response->redirect(BASE_URI . "/dashboard/user", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $user = new User();
    // get from request
    $user->save();
    return $response->redirect(BASE_URI . "/dashboard/user");
  }

  public function show(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("user.access")) {
      return $response->redirect(BASE_URI . "/dashboard/user", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
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
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('user.update')) {
      return $response->redirect(BASE_URI . "/dashboard/user", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    switch ($request->getMethod()) {
      case "GET":
        $user = User::findOne(["id" => $request->getQuery("id")]);
        // dd($user->id);
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
        // dd($request->getParam("id"));
        $user = User::find($request->getParam("id"));
        if (!$user) {
          return $response->setBody(
            View::renderWithDashboardLayout(
              new View("pages/dashboard/user/index"),
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
          $user->name = Validation::validateName($request->getParam("name"));
          $user->image = $request->getParam("image");
          $user->phone = Validation::validatePhone($request->getParam("phone"));
          $user->email = Validation::validateEmail($request->getParam("email"));
          $user->gender = $request->getParam("gender");
          $user->password = password_hash(Validation::validatePassword($request->getParam("password")), PASSWORD_DEFAULT);
          $user->role_id = $request->getParam("role");
          $user->save();
          return $response->redirect(BASE_URI . "/dashboard/user", 200, [
            "toast" => [
              "type" => "success",
              "message" => "Edit user successful.",
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
    $user = User::find($request->getBody()["id"]);
    if (!$user) {
      $response->jsonResponse([
        "type" => "success",
        "message" => "Failed to remove user removed from table",
      ]);
    }
    // dd($user);
    $user->delete();
    $response->jsonResponse([
      "type" => "success",
      "message" => "user has been removed from table",
    ]);
  }
}