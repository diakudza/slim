<?php

/**
 * Получение post от формы
 */

namespace App\Modules\Form;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class FormPost
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // получить данные из формы
        $parsedBody = $request->getParsedBody();

        $message = getTmpl(__DIR__ . '/message.template.php', [
            'name' => $parsedBody['name'],
            'email' => $parsedBody['email'],
        ]);

        $body = getTmpl(__DIR__ . '/show.template.php', ['message' => $message]);

        $response->getBody()->write($body);

        return $response;
    }
}
