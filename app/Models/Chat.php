<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'chat_type_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'chat_users');
    }

    public function getUser()
    {
        return $this->belongsToMany(User::class, 'chat_users')
            ->where('user_id', '!=', auth()->user()->id)->first();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function getUnreadMessages() //for notify in contaclist
    {
        return $this->hasMany(Message::class)
            ->where('user_id', '!=', auth()->user()->id)
            ->where('read', '=', '0');
    }

    public function chatType()
    {
        return $this->belongsTo(ChatType::class);
    }

    public function getChatsByType($type)
    {
        return $this->whereRelation('chattype', 'chat_type', $type)->get();
    }

    public function getChatsWithModerators()
    {
        return $this->getChatsByType('user_to_moderator');
    }
}
