<?php
namespace App\Controllers\Dashboard;

use App\Models\Product;
use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\View;

class ProductController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('products.access')) {
      return $response->redirect(BASE_URI . '/dashboard');
    }
    $products = Product::all();
    return $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/product/index'), [
      'title' => 'Products',
      'products' => $products,
    ]));
  }

  public function create(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('products.create')) {
      return $response->redirect(BASE_URI . '/dashboard');
    }
    return $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/product/create'), [
      'title' => 'Create Product',
    ]));
  }

  public function store(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('products.create')) {
      return $response->redirect(BASE_URI . '/dashboard');
    }
    $product = new Product();
    // get from request
    $product->save();
    return $response->redirect(BASE_URI . '/dashboard/products');
  }

  public function show(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('products.access')) {
      return $response->redirect(BASE_URI . '/dashboard');
    }
    $product = Product::find($request->getQuery('id'));
    if (!$product) {
      return $response->redirect(BASE_URI . '/dashboard/products');
    }
    return $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/product/show'), [
      'title' => 'Show Product',
      'product' => $product,
    ]));
  }

  public function update(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('products.update')) {
      return $response->redirect(BASE_URI . '/dashboard');
    }
    $product = Product::find($request->getQuery('id'));
    if (!$product) {
      return $response->redirect(BASE_URI . '/dashboard/products');
    }
    // get from request
    $product->save();
    return $response->redirect(BASE_URI . '/dashboard/products');
  }

  public function destroy(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->hasPermission('products.delete')) {
      return $response->redirect(BASE_URI . '/dashboard');
    }
    $product = Product::find($request->getQuery('id'));
    if (!$product) {
      return $response->redirect(BASE_URI . '/dashboard/products');
    }
    $product->delete();
    return $response->redirect(BASE_URI . '/dashboard/products');
  }
}
