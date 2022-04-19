<?php

use DI\ContainerBuilder;

return function (ContainerBuilder $container) {
    $settings = [];

    $settings['db'] = [
        'driver' => 'pdo_mysql',
        'host' => getenv('MYSQL_DATABASE_HOST'),
        'dbname' => getenv('MYSQL_DATABASE'),
        'user' => 'root',
        'password' => '123',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
//        'driverOptions' => [
//            // Turn off persistent connections
//            PDO::ATTR_PERSISTENT => false,
//            // Enable exceptions
//            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//            // Emulate prepared statements
//            PDO::ATTR_EMULATE_PREPARES => true,
//            // Set default fetch mode to array
//            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//            // Set character set
//            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
//        ],
    ];

    $container->addDefinitions(['settings' => $settings]);
};
