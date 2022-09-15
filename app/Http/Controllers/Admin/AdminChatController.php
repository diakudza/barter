<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class AdminChatController extends Controller
{
    public function index()
    {
        $chat = new Chat();
        $chats = $chat->getChatsWithModerators();
        //dd($chats);
        return view('admin.adminChat', ['chats' => $chats]);
    }
}
