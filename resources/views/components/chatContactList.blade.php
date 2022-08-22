<p>Список ваших чатов</p>
<div class="d-flex flex-column">

    @forelse($chats as $chat)
        <div>
            <a href="{{ route('chat.show', $chat->id) }}">
                <p @if (isset($chatId) && $chat->id == $chatId) class="fw-bold"@endif>

                    @if( $chat->getUser())
                        {{$chat->getUser()->name }}
                        @if (count($chat->getUnreadMessages)) <span>NEW</span>@endif
                    @endif</p>
            </a>
            <h6>
            </h6>

        </div>
    @empty
        <p>пока нет сообщений!</p>
    @endforelse
</div>