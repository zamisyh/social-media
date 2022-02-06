<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'text'];

    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function profiles()
    {
        return $this->belongsTo(Profile::class, 'user_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(CommentPost::class, 'comment_id', 'id');
    }
}
