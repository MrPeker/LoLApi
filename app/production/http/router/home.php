<?php
$route->get('/', [
    'call' => 'Home@index',
    'nickname' => 'home'
]);

$route->post('/', [
    'call' => 'Home@indexPost'
]);