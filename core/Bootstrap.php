<?php

namespace Core;

use Arrilot\DotEnv\DotEnv;
use Carbon\Carbon;
use \Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Valitron\Validator;
use \Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class Bootstrap
{
    public $router;
    public $validator;
    public $view;

    public function __construct()
    {
        DotEnv::load(dirname(__DIR__).'/.env.php');

        if(config('DEVELOPMENT')) {
            $whoops = new Run;
            $whoops->pushHandler(new PrettyPageHandler);
            $whoops->register();
        }

        Carbon::setLocale(config('LOCALE'));

        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'boilerplate',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setEventDispatcher(new Dispatcher(new Container));

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();

        $this->router = Services::routes();

        $this->validator = Services::validator($_POST);
        
        Validator::langDir(dirname(__DIR__) . '/core/language');
        Validator::lang('tr');

        $this->view = new View($this->validator);
    }

    public function run()
    {
        $this->router->run();
    }
}
?>