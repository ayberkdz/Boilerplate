<?php

$app->router->controller('/', 'Home');

$app->router->any('/login', 'Auth@login', ['before' => 'CheckNotAuth']);
$app->router->any('/register', 'Auth@register', ['before' => 'CheckNotAuth']);
$app->router->get('/logout', 'Auth@logout');

$app->router->get('/u/:slug', function($username){
    return "user : $username";
});

$app->router->group('/admin', function($router){
    $router->get('/', function(){
        return 'admin anasayfa';
    });

    $router->get('/posts', function(){
        return 'post anasayfa';
    });
});

$app->router->get('/api/posts', 'API@posts');

$app->router->notFound(function(){
    return '404';
});

$app->run();

?>