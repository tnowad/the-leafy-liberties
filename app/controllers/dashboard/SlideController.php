<?php
namespace App\Controllers\Dashboard;

use App\Models\Slide;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class SlideController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $slides = Slide::all();

    // filter and pagination
    $filter = [];

    $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/slide/index'), [
      'slides' => $slides,
      'filter' => $filter
    ]));
  }

  public function show(Request $request, Response $response)
  {

  }
}