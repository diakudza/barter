@extends('components.base')

@section('title', 'Ваши сообщения')

@section('content')
<section class="container">
    <h3>Ваши сообщения</h3>

    <div class="row">
        <div class="col-3">
            @include('components.chats.chatContactList')
        </div>
        <div class="col-9">
            <div>
            </div>
        </div>
    </div>

</section>
@endsection