<?php

namespace Core;
use Arrilot\DotEnv\DotEnv;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;
use Valitron\Validator;

class Bootstrap
{
    public $router;
    public $view;
    public $validator;

    public function __construct()
    {
        // ENV SETUP
        DotEnv::load(dirname(__DIR__) . '/.env.php');

        // DATE SETUP
        Carbon::setLocale(config('LOCALE', 'tr_TR'));

        // DATABASE SETUP
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => config('DB_DRIVER', 'mysql'),
            'host'      => config('DB_HOST', 'localhost'),
            'database'  => config('DB_NAME'),
            'username'  => config('DB_USER'),
            'password'  => config('DB_PASSWORD'),
            'charset'   => config('DB_CHARSET', 'utf8mb4'),
            'collation' => config('DB_COLLAT', 'utf8mb4_general_ci'),
            'prefix'    => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        // ROUTER SETUP
        $this->router = new \Buki\Router\Router([
            'base_folder' => '/rembp',
            'main_method' => 'index',
            'paths' => [
                'controllers' => 'app/Controllers',
                'middlewares' => 'app/Middlewares',
            ],
            'namespaces' => [
                'controllers' => 'Controllers',
                'middlewares' => 'Middlewares',
            ]
        ]);

        // VALIDATOR SETUP
        $this->validator = new Validator($_POST);
        Validator::langDir(dirname(__DIR__) . '/app/Language/Validator');
        Validator::lang('tr');

        // VIEW SETUP
        $this->view = new View($this->validator);
    }

    public function run()
    {
        $this->router->run();
    }
}
?>