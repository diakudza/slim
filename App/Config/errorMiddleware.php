<?php

$app->addErrorMiddleware(true, false, false);

/*
use Psr\Http\Message\ServerRequestInterface;

$customErrorHandler = function (
    ServerRequestInterface $request,
    Throwable $exception
) use ($app) {
    return \App\Modules\Page404\Page404::response($app, $exception, $request);
};

if ($container->has('logger'))
    $errorMiddleware = $app->addErrorMiddleware(true, true, true, $container->get('logger'));
else
    $errorMiddleware = $app->addErrorMiddleware(true, true, true);

$errorMiddleware->setDefaultErrorHandler($customErrorHandler);*/
