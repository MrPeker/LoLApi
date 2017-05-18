<?php
namespace App\Production\Http\Controller;

use Database\Databases\Lol\ChampionTable;
use Libs\Connect\Connect;
use duncan3dc\Laravel\Blade;
use Libs\Input\Input;
use System\Core;
use System\Response;
use System\Session;

class Home
{
  use Core;

  public function index()
  {
      if(!Session::exists('login'))
      {
          echo Blade::render('summoner_name');
      }
      else
      {
          $data['title'] = Session::get('summoner') . ' adlı sihirdara ait maçlar.';
          $data['css'] = $this->assets->getAssetsGroup('home')->useAllAssets('css')->returnedData;
          $data['js'] = $this->assets->getAssetsGroup('home')->useAllAssets('js')->returnedData;
          $data['matches'] = api('matchlist/by-summoner/' . Session::get('id') . '', '2.2', 'tr');
          echo Blade::render('home', $data);
      }
  }

    public function indexPost()
    {
        if(!Session::exists('login'))
        {
            $summoner =(strtolower(Input::get('summoner')));
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
