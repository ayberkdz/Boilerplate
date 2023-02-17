<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require(__DIR__ . '/vendor/autoload.php');

$app = new Core\Bootstrap();

date_default_timezone_set(config('TIMEZONE', 'Europe/Istanbul'));

require(__DIR__. '/app/config/Routes.php');



$app->run();
?>