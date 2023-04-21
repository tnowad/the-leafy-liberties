<?php
namespace App\Controllers\Dashboard;

use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class CategoryController extends Controller
{
  public function index(Request $request, Response $response)
  {
    return $response->setBody(
      View::renderWithDashboardLayout(new View("pages/dashboard/category/index"), [
          "title" => "Dashboard",
      ])
  );
  }

  public function show(Request $request, Response $response)
  {
  }

  public function create(Request $request, Response $response)
  {
  }

  public function store(Request $request, Response $response)
  {
  }

  public function update(Request $request, Response $response)
  {
  }

  public function delete(Request $request, Response $response)
  {
  }
}
