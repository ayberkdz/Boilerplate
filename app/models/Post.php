<?php

namespace Models;

use Core\Model;

class Post extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'content',
        'user_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
?>