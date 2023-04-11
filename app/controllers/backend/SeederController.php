<?php
namespace App\Controllers\Backend;

use Core\Controller;
use Core\Request;
use Core\Response;
use Seeds\Seeder;
use Utils\DotEnv;

class SeederController extends Controller
{
  public function index(Request $request, Response $response)
  {
    if (DotEnv::get('Seeded') == 'true') {
      return $response->redirect('/');
    } else {
      return $response->redirect('/seeder/run');
    }
  }

  public function run(Request $request, Response $response)
  {
    Seeder::run();
    DotEnv::set('Seeded', 'true');
    DotEnv::save();
  }
}