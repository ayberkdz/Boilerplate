<?php

$app->router->any('/', 'Home@index');

$app->router->get('/date', 'Home@dates');

$app->router->any('/login', 'Auth@login', [
    'before' => 'CheckNotAuth'
]);

$app->router->any('/register', 'Auth@register');

$app->router->get('/logout', 'Auth@logout');

$app->router->get('/user/@:slug/:id?', 'User@index');

$app->router->get('/about', function(){
    return "about";
});

$app->router->group('/admin', function($router){
    $router->get('/', function(){
        return "admin sayfa";
    });

    $router->get('user', function(){
        return "admin user sayfa";
    });
});

$app->router->notFound(function(){
    die ("<h3>sayfa bulunamadı</h3>");
});

?>