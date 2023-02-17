<?php

namespace Middlewares;

class CheckAuth
{
    public function handle()
    {
        // sayfa yüklenmeden önceki kontroller
        if(auth()->isLoggedIn()) {
            return true;
        }
        return false;
    }
}
?>