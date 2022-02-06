<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'text', 'type', 'file'];

    public function profiles()
    {
        return $this->belongsTo(Profile::class, 'user_id', 'id');
    }


}
