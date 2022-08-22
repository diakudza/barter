<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'chat_users');
    }

    public function getUser()
    {
        return $this->belongsToMany(User::class, 'chat_users')
            ->where('user_id', '!=', auth()->user()->id)->first();
    }

    public function getMessages()
    {
        return $this->hasMany(Message::class);
    }

    public function getUnreadMessages()
    {
        return $this->hasMany(Message::class)
            ->where('user_id', '=', auth()->user()->id)
            ->where('read', '!=', '1');
    }
}