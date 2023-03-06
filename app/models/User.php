<?php
namespace Models;
use Core\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $fillable = [
        'name',
        'password'
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
?>