<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function follow()
    {
        return $this->hasMany(FollowUser::class, 'follow_id', 'id');
    }
}
