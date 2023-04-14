<?php
namespace App\Controllers\Dashboard;

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
      return $response->redirect(BASE_URI . '/');
    } else {
      return $response->redirect(BASE_URI . '/seeder/run');
    }
  }

  public function run(Request $request, Response $response)
  {
    Seeder::run();
    DotEnv::set('Seeded', 'true');
    DotEnv::save();
  }
}
