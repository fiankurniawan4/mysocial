<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function childrens()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function hasLike() {
    //     return $this->hasOne(Like::class)->where('likes.user_id', Auth::user()->id);
    // }

    // public function totalLikes() {
    //     return $this->hasMany(Like::class)->count();
    // }
}
