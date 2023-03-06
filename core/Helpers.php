<?php
use Arrilot\DotEnv\DotEnv;
use Core\Auth;
use Core\Redirect;
use Core\Upload;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Query\Builder;

if (! function_exists('config')) {
    function config($key, $default = null)
    {
        return DotEnv::get($key, $default);
    }
}

if (! function_exists('auth')) {
    function auth()
    {
        return Auth::getInstance();
    }
}

if (! function_exists('upload')) {
    function upload($name)
    {
        return Upload::getInstance($name);
    }
}

if (! function_exists('db')) {
    function db($table): Builder
    {
        return Manager::table($table);
    }
}

if (! function_exists('redirect')) {
    function redirect($url = null): Redirect
    {
        return Redirect::getInstance($url);
    }
}

if (! function_exists('cookie')) {
    function cookie($name)
    {
        if(isset($_COOKIE[$name])) {
            return rawurldecode($_COOKIE[$name]);
        }
        return false;
    }
}

if (! function_exists('site_url')) {
    function site_url($url = null)
    {
        return config('BASE_URL') . '/' . $url;
    }
}

if (! function_exists('js')) {
    function js($url)
    {
        return site_url('public/js/' . $url);
    }
}

if (! function_exists('css')) {
    function css($url)
    {
        return site_url('public/css/' . $url);
    }
}
?>