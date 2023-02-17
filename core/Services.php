<?php

namespace Core;

use Buki\Router\Router;
use Jenssegers\Blade\Blade;
use Valitron\Validator;

class Services
{
    public static function routes(array $params = [])
    {
        return new Router([
            'base_folder' => 'boilerplate',
            'paths' => [
                'controllers' => 'app/controllers',
                'middlewares' => 'app/middlewares',
            ],
            'namespaces' => [
                'controllers' => 'controllers',
                'middlewares' => 'middlewares',
            ]
        ]);
    }

    public static function validator(array $data = [], array $fields = [], null|string $lang = null, null|string $langDir = null)
    {
        return new Validator($data, $fields, $lang, $langDir);
    }

    public static function blade()
    {
        return new Blade(
            dirname(__DIR__) . '/app/views',
            dirname(__DIR__) . '/app/views/cache'
        );
    }
}
?>