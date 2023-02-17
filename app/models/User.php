<?php

namespace Models;

use Core\Model;

class User extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'name',
        'password'
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
?>