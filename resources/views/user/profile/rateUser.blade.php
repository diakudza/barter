@extends('components.base')

@section('title', 'Оценить пользователя')

@section('content')
    <div class="container">
        <form action="{{ route('user.updateUserRating') }}" method="post">
            @csrf
            @method('put')
            <div class="form-control">
                <label for="1">1</label>
                <input type="radio" name="rating" id="1" value="1">
            </div>
            <div class="form-control">
                <label for="2">2</label>
                <input type="radio" name="rating" id="2" value="2">
            </div>
            <div class="form-control">
                <label for="3">3</label>
                <input type="radio" name="rating" id="3" value="3">
            </div>
            <div class="form-control">
                <label for="4">4</label>
                <input type="radio" name="rating" id="4" value="4">
            </div>
            <div class="form-control">
                <label for="5">5</label>
                <input type="radio" name="rating" id="5" value="5">
            </div>
            <input type="hidden" name="voter_id" value="{{ $voterId }}">
            <input type="hidden" name="voted_id" value="{{ $votedId }}">
            <button type="submit">Поставить оценку</button>
            <button type="reset">Отмена</button>
        </form>
    </div>
@endsection
