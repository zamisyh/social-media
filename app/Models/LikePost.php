<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikePost extends Model
{
    use HasFactory;
    protected $table = 'like_post';

    protected $fillable = ['like_id', 'post_id'];
}
