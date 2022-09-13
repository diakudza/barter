<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatType;
use Illuminate\Http\Request;

class AdminChatController extends Controller
{
    public function index()
    {
        $chatType = new ChatType();
        $chats = $chatType->getChatsWithModerators()->get();
        dd($chats);
        return view('admin.adminChat');
    }
}
