<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatType extends Model
{
    use HasFactory;

    public function getChatsByType(string $type)
    {
        return $this->hasMany(Chat::class, 'chat_type_id', 'id')->whereRelation('chat_type', $type);
    }

    public function getChatsWithModerators()
    {
        return $this->getChatsByType('user_to_moderator');
    }
}
