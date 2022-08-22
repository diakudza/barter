<form class="d-flex flex-row w-100" action="{{route('chat.store')}}" method="post">
    @csrf
    @method('POST')
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <input type="hidden" name="chat_id" value="{{ $chatId }}">
    <input type="hidden" name="destination_id" value="{{$destination_id}}">
    <input type="text" class="form-control" name="text" placeholder="Введите ваше сообщение">
    <button class="btn btn-success">отправить</button>
</form>
