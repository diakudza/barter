<p>Сообщения </p>
<div class="d-flex flex-column">
    @forelse($messages as $message)
    @include('components.chats.chatBubble')
    @empty
    <p>пока нет сообщений!</p>
    @endforelse
</div>
</div>
