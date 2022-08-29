@extends('components.admin_base')

@section('title',"Обьявления")

@section('content')

<div class="container mt-5 pt-5">
    <div class="d-flex">
        <div>
            <p>Автор: {{ $ad->user->name }} </p>
            <p>Дата публикации: {{ $ad->created_at }} </p>
            <p>Заголовок: {{ $ad->title }} </p>
            <p>Тип обьявления: {{ $ad->barter_type }} </p>
            <p>Текс обьявления: {{ $ad->text }} </p>
        </div>
        <div>
            @foreach($ad->images as $image)
                @if ($loop->first)
                    <img src="{{ Storage::url($image->path) }}" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="active" aria-current="true" height="200" aria-label="Slide {{ $loop->iteration }}">
                    @continue
                @endif
                <img src="{{ Storage::url($image->path) }}" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" height="200" aria-label="Slide {{ $loop->iteration }}">
            @endforeach
        </div>
    </div>
</div>

@endsection
