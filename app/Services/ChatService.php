<?php

namespace App\Services;
use App\Models\User;
use App\Models\Chat;

class ChatService
{
    public function getChatWithModerators($userId){
        $ids = [];
        $ids[] = $userId;
        $moderators = User::whereRelation('getRole', 'role', 'moderator')->get();
        foreach ($moderators as $moderator) {
            $ids[] = $moderator->id;
        }
        $chats = Chat::whereRelation('users', function ($query) use ($ids) {
            $query->whereIn('users.id', $ids);
        })->get();
        foreach ($chats as $chat) {
            $tempIds = [];
            foreach ($chat->users()->select('users.id')->get() as $user) {
                $tempIds[] = $user->id;
            };
            if ($tempIds == $ids) $chatId = $chat->id;
        }
        if(!isset($chatId)){
            $chat = new Chat;
            $chat->save();
            $chat->users()->sync($ids);
            $chatId = $chat->id;
        }
        return $chatId;
    }
}