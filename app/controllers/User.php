<?php

namespace Controllers;

class User
{
    protected $fillable = [
        'name',
        'password'
    ];
    public function index($username, $id = null)
    {
        if(gettype($id) !== null) {
            return '@'.$username . $id;
        }
        return '@'.$username;
    }
}
?>