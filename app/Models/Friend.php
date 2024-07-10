<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function friends()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }

    public function isAccepted()
    {
        return $this->is_accepted;
    }

    public function alreadyFriends(User $user)
    {
        return $this->user_id === $user->id || $this->friend_id === $user->id;
    }

    // apakah dia berteman dengan user yang diberikan
    public function isFriend(User $user)
    {
        return $this->isAccepted() && $this->alreadyFriends($user);
    }
}
