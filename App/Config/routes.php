<?php

use Slim\Routing\RouteCollectorProxy;

/** @var \Slim\App $app */

$app->group("/", function (RouteCollectorProxy $app) {
    $app->get('', '\App\Modules\Home\Home:home');
    $app->get('/{id:\d+}', '\App\Modules\Home\Home:showId');
});


$app->get('/about','\App\Modules\Home\Home:about');
$app->get('/form', '\App\Modules\Form\Controller:show');
$app->post('/form', '\App\Modules\Form\Controller:create');
