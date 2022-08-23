<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.chat.chats', [
            'chats' => auth()->user()->getChats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $message = new Message($request->all());
        $chat = Chat::find($request->input('chat_id'));
        $chat->getMessages()->save($message);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $chat = Chat::find($id);
        $user = User::find(auth()->user()->id);
        $currentUserchat = $user->getChats()->pluck('chat_id')->toArray();
        if (in_array($id, $currentUserchat)) {
            $chat->getMessages()->update(['read' => 1]);
            return view('user.chat.chatSingle', [
                'chats' => auth()->user()->getChats,
                'messages' => $chat,
                'chatId' => $chat->id
            ]);
        }
        return abort(404);
    }

    /**
     * Create new chat from Ad or find chat if exist.
     *
     */
    public function chatFormAd(Request $request)
    {
        $adUser = User::find($request->input('ad_user_id'));

        $chatsWithAdUser = $adUser->getChats();
        if (!$chatsWithAdUser->count()) {
            $chatsWithAdUser = $adUser->getChats()->create();
            DB::table('chat_users')->insert(['chat_id' => $chatsWithAdUser->id,
                'user_id' => auth()->user()->id]);
            return redirect()->route('chat.show', $chatsWithAdUser->id);
        }
        return redirect()->route('chat.show', $chatsWithAdUser->value('chat_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}