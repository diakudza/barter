<p>Список ваших чатов</p>
<div class="d-flex flex-column">

    @forelse($chats as $chat)
        <div class="flex flex-row">
            <a href="{{ route('chat.show', $chat->id) }}">
                <img class="top-profile__avatar"
                @if($chat->getUser()->avatar()->first())
                    src="{{Storage::url($chat->getUser()->avatar()->first()->path)}}"
                @else
                    src="{{ asset('images/icon-avatar.png')}}"
                @endif alt="photo-user">
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
