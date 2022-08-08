@extends('components.base')

@section('title',"Просмотр обьявления")

@section('content')

<div class="mt-5 mb-5">
</div>

<div>
    <div class="d-flex">
        <div>
            <div style="font-size: x-large" class="mb-3">{{ $ad->title }}</div>
            <div>
                <div>
                    <p>Категория: {{ $ad->category->title }} в {{ $ad->city->name }}</p>
                    <p>Автор: {{ $ad->user->name }}</p>
                    <p>Дата создания: {{ $ad['created_at'] }}</p>
                </div>
                <p>Описание: {{ $ad['text'] }}</p>
            </div>
        </div>
        <div>
            <img src="{{ asset('storage/'.$ad->image) }}" height="400" alt="image">
        </div>
    </div>
    @if(auth()->user())
    <div>
        <button class="btn btn-success">Хочу это</button>
        <button class="btn btn-success">Добавить В избранное</button>
        <button class="btn btn-info">Написать автору</button>
    </div>
    @endif

</div>