<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$container->set('logger', function () {
    $log = new Logger('general');
    $log->pushHandler(new StreamHandler(__DIR__ . '/../var/log/app.log', Logger::INFO));
    return $log;
});

$container->set('doctrine', fn($c) => \Doctrine\DBAL\DriverManager::getConnection($c->get('settings')['db']));

