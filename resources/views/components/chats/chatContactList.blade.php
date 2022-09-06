    @forelse($chats as $chat)
        <a href="{{ route('chat.show', $chat->id) }}" class="chats__list_chats-chat">
            <img class="chats__list_chats-chat_avatar"
                 @if($chat->getUser()->avatar()->first()) src="{{Storage::url($chat->getUser()->avatar()->first()->path)}}"
                 @else src="{{ asset('images/icon-avatar.png')}}"
                 @endif alt="avatar"
            >
            <div class="chats__list_chats-chat_info">
                <p class="chats__list_chats-chat_info_name">
                @if($chat->getUser()->getRole->role == 'moderator')
                    Переписка с модераторами</p>
                @else
                    {{$chat->getUser()->name }}</p>
                @endif    
                <p class="chats__list_chats-chat_info_last">
                    Последнее сообщение
                </p>
            </div>
            <div class="chats__list_chats-chat_check">
                <div class="chats__list_chats-chat_check_time">
                    03:28
                </div>
                <div class="chats__list_chats-chat_check_read">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1919_6608)">
                            <path d="M4.16667 10L8.33334 14.1667L16.6667 5.83337" stroke="#23262F" stroke-opacity="0.5" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_1919_6608">
                                <rect width="20" height="20" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <!--
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1919_6621)">
                                <path d="M5.83333 10L9.99999 14.1667L18.3333 5.83337" stroke="#58BD7D" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 10L14.1667 5.83337M1.66667 10L5.83334 14.1667L1.66667 10Z" stroke="#58BD7D" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_1919_6621">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    -->
                </div>
            </div>
        </a>
    @empty
        <p>пока нет сообщений!</p>
    @endforelse
