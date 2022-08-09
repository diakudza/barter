@extends('components.base')

@section('title',"Просмотр обьявления")

@section('content')

    <div class="mt-5 mb-5">
    </div>


    <div class="container">
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
            @if($inwishlist) <p>Пожелали: {{ $inwishlist }}</p> @endif
            @if($infavorites) <p>Добавили в избранное: {{ $infavorites }}</p> @endif

            @if(auth()->user())
                <div class="d-flex ">
                    <div>
                        @if (!$userWishes)
                            <form action="{{ route('wishlist.store', ['ad_id' => $ad['id']]) }}" method="post">
                                @method('POST')
                                @csrf
                                <button class="btn btn-success">Хочу это</button>
                            </form>
                        @else
                            <form action="{{ route('wishlist.destroy', $ad['id'])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Отказаться</button>
                            </form>
                        @endif
                    </div>
                    <div>
                        @if (!$userFavorite)
                            <form action="{{ route('favorite.store', ['ad_id' => $ad['id']]) }}" method="post">
                                @method('POST')
                                @csrf
                                <button class="btn btn-success">Добавить В избранное</button>
                            </form>
                        @else

                            <form action="{{ route('favorite.destroy', $ad->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="ad_id" value="{{ $ad->id }}"/>
                                <button class="btn btn-danger">Убрать из избранного</button>
                            </form>
                        @endif
                    </div>
                    <div>

                    </div>
                    <button class="btn btn-info">Написать автору</button>
                </div>
            @endif

        </div>
    </div>
@endsection
