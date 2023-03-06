<?php

namespace Middlewares;

class CheckNotAuth
{
    public function handle()
    {
        if(auth()->isLoggedIn()) {
            header('Location:' . redirect('referer'));
            exit;
        }
        return true;
    }
}
?>