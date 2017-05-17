<?php
require_once 'secret.php';
require_once 'init.php';

define('API_KEY', 'RGAPI-4a229b4a-40f1-4ebb-9248-fb5e587c1c1c');

function api($url, $ver, $server)
{
    $url = 'https://tr.api.pvp.net/api/lol/'. $server . '/' . $ver . '/' . $url . '?api_key=' . API_KEY;
}

use System\Application;

Application::set('development', '/development', 'ip', ['127.0.0.1', '::1']);
Application::end();
