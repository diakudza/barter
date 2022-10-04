@extends('components.base')

@section('title', 'Ваши сообщения')

@section('content')
<section class="container">
    <div class="chats">
        <div class="chats__back" onclick="closeChat()">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.54166 10.2287L16.0417 10.2287" stroke="#23262F" stroke-width="1.25001" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8.58325 15.249L3.54155 10.229L8.58325 5.20813" stroke="#23262F" stroke-width="1.25001" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
        <div class="chats__list">
            <div class="chats__list_info">
                <h3 class="chats__list_info-heading">Чаты <p class="chats__list_info-count">({{$chats->count()}})</p>
                </h3>
                <p class="chats__list_info-desc">Здесь находятся все ваши переписки</p>
            </div>
            <div class="chats__list_search">
                <div class="chats__list_search-svg">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9.80548" cy="9.80554" r="7.49048" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M15.0153 15.4043L17.952 18.3334" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <input class="chats__list_search-input" type="text" placeholder="Люди, чаты, ключевые слова... ">
            </div>
            <div class="chats__list_chats">
                @if($chats !== null)
                @include('components.chats.chatContactList', ['chats'=> $chats])
                @else
                <p>Чатов нет</p>
                @endif
            </div>
        </div>
        <div class="chats__chat">
            @if(isset($messages))
            <div class="chats__chat_heading">
                <div class="chats__chat_heading-item">
                    <div class="chats__chat_heading-item_photo">
                        <img src="" alt="">
                    </div>
                    <div class="chats__chat_heading-item_info">
                        <div class="chats__chat_heading-item_cost">$42,290</div>
                        <div class="chats__chat_heading-item_title">Mercedes S-Class</div>
                    </div>
                </div>
                <div class="chats__chat_heading-profile">
                    <div class="chats__chat_heading-profile_avatar">
                        <img src="" alt="">
                    </div>
                    <div class="chats__chat_heading-profile_info">
                        <div class="chats__chat_heading-profile_info_name">
                            John ⚡️
                        </div>
                        <div class="chats__chat_heading-profile_info_online">
                            Заходил в 14:42
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="chats__chat_date">
                    12 мая
                </div>
                <div class="chats__chat_messages">
                    @include('components.chats.chatMessageList', ['messages' => $messages->getMessages])
                </div>
            </div>
            @endif
            @include('components.chats.chatSendForm', ['destination_id' => 1, 'chatId' => $chatId])
        </div>
    </div>
</section>
@endsection