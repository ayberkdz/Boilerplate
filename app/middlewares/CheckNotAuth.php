<?php

namespace Middlewares;

class CheckNotAuth
{
    public function handle()
    {
        // sayfa yüklenmeden önceki kontroller
        if(auth()->isLoggedIn()) {
            header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'http://localhost/Core/'));
            exit;
        }
        return true;
    }
}
?>