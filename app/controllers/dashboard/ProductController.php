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
    // $auth = Application::getInstance()->getAuthentication();
    // if (!$auth->hasPermission('products.access')) {
    //   return $response->redirect(BASE_URI . '/dashboard');
    // }
    $products = Product::all();
    return $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/product'), [
      'title' => 'Products',
      'products' => $products,
    ]));
  }

  public function create(Request $request, Response $response)
  {
    // $auth = Application::getInstance()->getAuthentication();
    // if (!$auth->hasPermission('products.create')) {
    //   return $response->redirect(BASE_URI . '/dashboard');
    // }
    $product = new Product();
    $product->name = $request->getParam('name');
    $product->image = $request->getParam('image');
    $product->isbn = $request->getParam('isbn');
    $product->price = $request->getParam('price');
    $product->description = $request->getParam('description');
    $product->quantity = $request->getParam('quantity');
    $product->save();
    return $response->setBody(View::renderWithDashboardLayout(new View('pages/dashboard/product'), [
      'title' => 'Products',
      'toast' => [
        'type' => 'success',
        'message' => "Add product successful",
      ],
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
    // $auth = Application::getInstance()->getAuthentication();
    // if (!$auth->hasPermission('products.update')) {
    //   return $response->redirect(BASE_URI . '/dashboard');
    // }
    $product = Product::find($request->getQuery('id'));

    if (!$product) {
      return $response->redirect(BASE_URI . '/dashboard/product');
    }
    // get from request
    
    $product->save();
    return $response->redirect(BASE_URI . '/dashboard/product');
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
