@extends('components.base')

@section('title', 'Ваши сообщения')

@section('content')
<section class="container">
    <h3>Ваши сообщения</h3>
    <div class="row">

        <div class="col-3">
            @include('components.chats.chatContactList', ['chats'=> $chats])
        </div>
        <div class="col-9">
            <div>
                @include('components.chats.chatMessageList', ['messages' => $messages->getMessages])
                @include('components.chats.chatSendForm', ['destination_id' => 1, 'chatId' => $chatId])
            </div>
        </div>
    </div>

</section>
@endsection