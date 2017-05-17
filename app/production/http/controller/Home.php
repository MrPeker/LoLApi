<?php
namespace App\Production\Http\Controller;

use Libs\Connect\Connect;
use duncan3dc\Laravel\Blade;
use Libs\Input\Input;
use System\Response;
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

    public function indexPost()
    {
        if(!Session::exists('login'))
        {
            $summoner =(strtolower($summoner));
            $data = api('summoner/by-name/' . $summoner, '1.4', 'tr')->$summoner;
            Session::set('login', true);
            Session::set('summoner', $data->name);
            Session::set('id', $data->id);
            Session::set('profile_icon_id', $data->profileIconId);
            Session::set('revision_date', $data->revisionDate);
            Session::set('level', $data->summonerLevel);
        }
        Response::back();
    }

}
