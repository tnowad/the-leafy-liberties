<?php
namespace App\Controllers\Frontend;

use Core\Controller;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\View;

class ProductController extends Controller
{

  public function index(Request $request, Response $response)
  {
    dd($request->getQueries());
    // Get all products by where
    // pass in to variable
    // render view
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/products'), [
      'title' => 'Product',
    ]));
  }

  public function show(Request $request, Response $response)
  {
    // Get product by id
    // pass in to variable
    // render view
    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/product'), [
      'title' => 'Product'
    ]));
  }
}