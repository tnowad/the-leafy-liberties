<?php
namespace App\Controllers\Dashboard;

use App\Models\Slide;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class SlideController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission("slide.access")) {
      return $response->redirect(BASE_URI . "/dashboard", 200, [
        "toast" => [
          "type" => "error",
          "message" => "You do not have permission to access this page.",
        ],
      ]);
    }
    $slides = Slide::all();

    // filter and pagination
    $filter = [];

    $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/slide/index"), [
        'title' => 'Slides',
        "slides" => $slides,
        "filter" => $filter,
      ])
    );
  }

  public function show(Request $request, Response $response)
  {
  }
  public function update(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('slide.update')) {
      return $response->redirect(BASE_URI . '/dashboard', 200, [
        'toast' => [
          'type' => 'error',
          'message' => 'You do not have permission to access this page.'
        ]
      ]);
    }
    switch ($request->getMethod()) {
      case "GET":
        $slide = Slide::findOne(["id" => $request->getQuery("id")]);
        $response->setStatusCode(200);
        return $response->setBody(
          View::renderWithDashboardLayout(
            new View("pages/dashboard/slide/update"),
            [
              "title" => "Slide Update",
              "slide" => $slide,
            ]
          )
        );
      case "POST":
        $slide = Slide::find($request->getParam("id"));
        if (!$slide) {
          return $response->redirect(BASE_URI . "/dashboard/slide", 200, [
            "toast" => [
              "type" => "error",
              "message" => "Edit slide fail",
            ],
          ]);
        } else {
          $slide->title = $request->getParam("title");
          $slide->image = $request->getParam("image");
          $slide->location = $request->getParam("locaiton");
          $slide->status = $request->getParam("status");
          $slide->save();
          return $response->redirect(BASE_URI . "/dashboard/slide", 200, [
            "toast" => [
              "type" => "success",
              "message" => "Edit slide successful",
            ],
          ]);
        }
      default:
        break;
    }
  }
}
