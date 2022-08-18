@extends('components.base')

@section('title', 'Ваши сообщения')

@section('content')
    <div class="container">
        <h3>Ваши сообщения</h3>
        <div class="row">

            <div class="col-3">
                @include('components.chatContactList', ['chats'=> $chats])
            </div>
            <div class="col-9">
                <div>
                    @include('components.chatMessageList', ['messages' => $messages->getMessages])
                    @include('components.chatSendForm', ['destination_id' => 1, 'chatId' => $chatId])
                </div>
            </div>
        </div>

    </div>
@endsection
