<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../Src/Core/functions.php';

$container = new ContainerBuilder();
$settings = require __DIR__.'/../App/Config/settings.php';
$settings($container);
$container = $container->build();

AppFactory::setContainer($container);
$app = AppFactory::create();

require __DIR__ . '/../App/Config/container.php';
require __DIR__ . '/../App/Config/middleware.php';
require __DIR__ . '/../App/Config/errorMiddleware.php';
require __DIR__ . '/../App/Config/routes.php';

$app->addRoutingMiddleware();
$app->run();
