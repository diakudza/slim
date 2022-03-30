<?php

use Slim\Factory\AppFactory;
use DI\Container;

require BASE_DIR . 'vendor/autoload.php';
require BASE_DIR . 'Src/Core/functions.php';

$container = new Container();

AppFactory::setContainer($container);
$app = AppFactory::create();
$app->addRoutingMiddleware();

//if (SLIM_APP_BASEPATH) $app->setBasePath(SLIM_APP_BASEPATH);

require BASE_DIR . 'App/Config/container.php';
//require BASE_DIR . 'App/Config/settings.php'; //пока отсутствуют
require BASE_DIR . 'App/Config/middleware.php';
require BASE_DIR . 'App/Config/errorMiddleware.php';
require BASE_DIR . 'App/Config/routes.php';

$app->run();
