<?php

/**
 * Вывод главной страницы
 */

namespace App\Modules\Home;

use Doctrine\DBAL\Connection;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Container\ContainerInterface;

class Home
{
    private $container;
    private $connection;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->connection = $container->get('doctrine');
    }

    public function home(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // простой шаблонизатор
        $data = ['name' => 'Вася',
            'container' => 'd',
            'message' => 'home'];
        $body = getTmpl(__DIR__ . '/home.template.php', $data);
        // формируем ответ
        $response->getBody()->write($body);
        return $response;
    }

    public function showId(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        var_dump($request->getAttribute('id'));
        $id = $args['id'];
        $query = $this->connection->createQueryBuilder();
        try {
            $rows = $query
                ->select('fio')
                ->from('test')
                ->where('id = :id')
                ->setParameter('id', $id)
                ->execute()
                ->fetchAll();
        } catch (\Exception $e) {
            $data['error'] = 'ошибка запроса к базу';
            $rows = '';
        }

        // простой шаблонизатор
        $data = ['name' => 'Вася',
            'container' => $rows,
            'message' => 'show'];
        $body = getTmpl(__DIR__ . '/home.template.php', $data);
        // формируем ответ
        $response->getBody()->write($body);
        return $response;
    }

    public function about(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // простой шаблонизатор
        $data = ['name' => 'Вася'];
        $body = getTmpl(__DIR__ . '/about.template.php', $data);
        // формируем ответ
        $response->getBody()->write($body);

        //

        return $response;
    }
}
