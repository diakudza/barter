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
            <div class="form-control">
                <label for="6">6</label>
                <input type="radio" name="rating" id="6" value="6">
            </div>
            <div class="form-control">
                <label for="7">7</label>
                <input type="radio" name="rating" id="7" value="7">
            </div>
            <div class="form-control">
                <label for="8">8</label>
                <input type="radio" name="rating" id="8" value="8">
            </div>
            <div class="form-control">
                <label for="9">9</label>
                <input type="radio" name="rating" id="9" value="9">
            </div>
            <div class="form-control">
                <label for="10">10</label>
                <input type="radio" name="rating" id="10" value="10">
            </div>
            <input type="hidden" name="voter_id" value="{{$voterId}}">
            <input type="hidden" name="voted_id" value="{{$votedId}}">
            <button type="submit">Поставить оценку</button>
            <button type="reset">Отмена</button>
        </form>
    </div>
@endsection
