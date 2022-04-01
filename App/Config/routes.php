<?php

use App\Modules\Home\Ho;
use App\Modules\Home\Home;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;



$app->get('/', Home::class . ':home');
$app->get('/about', Home::class . ':about');
$app->get('/form', '\App\Modules\Form\Controller:show');
$app->post('/form', '\App\Modules\Form\Controller:create');
