<?php
error_reporting(~E_ALL);

require_once(__DIR__ . '/vendor/autoload.php');

date_default_timezone_set(config('TIMEZONE', 'Europe/Istanbul'));

$app = new Core\Bootstrap();

require_once(__DIR__ . '/app/Config/Routes.php');
?>