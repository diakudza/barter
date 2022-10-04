<?php

namespace App\Providers;

use App\Providers\NewModerator;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Chat;
use App\Models\User;

class AddNewModeratorToModeratorChats
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\NewModerator  $event
     * @return void
     */
    public function handle(NewModerator $event)
    {
        $chats = Chat::whereRelation('chattype', 'chat_type', 'user_to_moderator')->get();
        foreach ($chats as $chat) {
            $chat->users()->save($event->user);
        }
    }
}
