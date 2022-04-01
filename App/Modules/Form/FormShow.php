<?php

/**
 * Вывод формы
 */

namespace App\Modules\Form;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class FormShow
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $body = getTmpl(__DIR__ . '/show.template.php', ['message' => '']);
        $response->getBody()->write($body);

        return $response;
    }
}
