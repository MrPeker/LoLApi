<?php
namespace App\Production\Http\Controller;

use Libs\Connect\Connect;
use duncan3dc\Laravel\Blade;
use System\Session;

class Home
{
  public function index()
  {
      if(!Session::exists('login'))
      {
          echo Blade::render('summoner_name');
      }
      else
      {
          echo Blade::render('home');
      }
  }
}
