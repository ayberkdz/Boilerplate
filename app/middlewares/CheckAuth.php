<?php

namespace Middlewares;

class CheckAuth
{
    public function handle()
    {
        if(! auth()->isLoggedIn()) {
            return false;
        }
        return true;
    }
}
?>