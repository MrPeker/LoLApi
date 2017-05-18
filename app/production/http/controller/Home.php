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
            $data = json_decode(file_get_contents('https://tr1.api.riotgames.com/lol/summoner/v3/summoners/by-name/'. preg_replace('/\s/','%20', Input::get('summoner')) .'?api_key='. API_KEY));
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
