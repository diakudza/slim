<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;


//$app->get('/', function (RequestInterface $request,ResponseInterface $response) {
//     $response->getBody()->write('dddddd');
//    return $response;
//});
//$app->get('/', \App\Modules\Home\Home::class);
$app->get('/', '\App\Modules\Home\Home:home');
//$app->get('/form', '\App\Modules\Form\Controller:show');
//$app->post('/form', '\App\Modules\Form\Controller:create');
