<?php

use Arrilot\DotEnv\DotEnv;
use Core\Auth;
use Carbon\Carbon;

if(! function_exists('config')) {

    function config($key, $default = null)
    {
        return DotEnv::get($key, $default);
    }
}

if(! function_exists('timeAgo')) {

    function timeAgo($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}

if(! function_exists('auth')) {

    function auth()
    {
        return Auth::getInstance();
    }
}

?>