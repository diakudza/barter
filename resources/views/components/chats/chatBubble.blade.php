<div class="
    @if(auth()->user()->id == $message->user_id)
        chats__chat_messages-item_i
    @else
        chats__chat_messages-item
    @endif
">
        @if( auth()->user()->id !== $message->user_id)
            <div class="chats__chat_messages-item_heading">
                <div class="chats__chat_messages-item_avatar">{{ $message->avatar }}</div>
                <div class="chats__chat_messages-item_name">{{ $message->author }}</div>
            </div>
        @endif
        <div class="
            @if(auth()->user()->id == $message->user_id)
                chats__chat_messages-item_i_message
            @else
                chats__chat_messages-item_message
            @endif
        ">
            <div class="chats__chat_messages-item_info">
                <div>
                    <p>{{ $message->text }}</p>
                </div>
                <div class="chats__chat_messages-item_info-row">
                    <div>
                        {{ $message->created_at }}
                    </div>
                    <div>
                        @if($message->read === 1)
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1919_6651)">
                                    <path d="M4.16667 9.99998L8.33334 14.1666L16.6667 5.83331" stroke="#23262F" stroke-opacity="0.5" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_1919_6651">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        @else($message->read === 2)
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1919_6635)">
                                    <path d="M5.83333 9.99998L9.99999 14.1666L18.3333 5.83331" stroke="#58BD7D" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 9.99998L14.1667 5.83331M1.66667 9.99998L5.83334 14.1666L1.66667 9.99998Z" stroke="#58BD7D" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_1919_6635">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</div>
