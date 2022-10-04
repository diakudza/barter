<div class="chats__chat_messages">
    @forelse($messages as $message)
        @include('components.chats.chatBubble')
        @empty <p>пока нет сообщений!</p>
    @endforelse
</div>
