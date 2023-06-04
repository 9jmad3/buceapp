<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Devuelve los comentarios del post
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Devuelve el número de likes del post.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Comprueba si el usuario le ha dado like al post
     */
    public function checkLike(User $user)
    {
        return $this->likes->contains('user_id',$user->id);
    }
}
