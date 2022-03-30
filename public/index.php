<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use DI\Container;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Factory\AppFactory;
use DI\ContainerBuilder;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$container = new Container();
AppFactory::setContainer($container);
$container->set('logger', function () {
    $log = new Logger('general');
    $log->pushHandler(new StreamHandler(__DIR__ . '/var/log/app.log', Logger::INFO));
    return $log;
});


$app = AppFactory::create();

$app->get('/', function (RequestInterface $request, ResponseInterface $response, array $args) {
$response->getBody()->write('Hello from Slim 4 request handler');
return $response;
});

$app->get('/hello', function (RequestInterface $request, ResponseInterface $response, $args) use ($app){
    $container = $app->getContainer();

    // если установлен лог, то пишем в него сообщение об ошибке
    if ($container->has('logger'))
        $container->get('logger')->info('Hello world! page');

    $response->getBody()->write('Hello world!');
    return $response;
});

$app->addErrorMiddleware(true, false, false);

$app->run();
