<?php

$logMiddleware = function (RequestInterface $request, RequestHandlerInterface $handler) use ($app) {

    $container = $app->getContainer();

    // если установлен лог, то пишем в него текущий url-путь
    if ($container->has('logger'))
        $container->get('logger')->info($request->getUri()->getPath());

    $response = $handler->handle($request);

    return $response;
};



