@extends('component.base')

@section('title',"Просмотр обьявления")

@section('content')

    <div class="mt-5 mb-5 h-25">
    </div>


    <div class="container">
        <div>
            <div style="font-size: x-large" class="mb-3">{{ $ad['title'] }}</div>
            <div class="d-flex flex-row justify-content-sm-between">
                <div>
                    <p>Категория: {{  $ad->category->title }} в {{  $ad->city->name }}</p>
                    <p>Автор: {{ $ad->user->name }}</p>
                    <p>Дата создания: {{ $ad['created_at'] }}</p>
                </div>
                <div>
                    <img src="{{ asset("images/${ad['image']}")}}" height="500" alt="ddd">
                </div>

            </div>
            <p>Описание: {{ $ad['text'] }}</p>
        </div>
        <div>
            <button>Хочу это</button>
            <button>Добавить В избранное</button>
            <button>Написать автору</button>
        </div>
    </div>
@endsection
