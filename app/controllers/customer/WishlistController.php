<?php

namespace App\Controllers\Frontend;

use App\Models\Wishlist;
use Core\Controller;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\View;


class WishlistController extends Controller
{

  public function index(Request $request, Response $response)
  {
    try {
      $wishlist = Wishlist::all();
    } catch (\Exception $e) {
      dd($e->getMessage());
    }

    $response->setStatusCode(200);
    $response->setBody(View::renderWithLayout(new View('pages/wishlist'), [
      'title' => 'Wishlist',
      'wishlist' => $wishlist,
    ]));
  }
}
