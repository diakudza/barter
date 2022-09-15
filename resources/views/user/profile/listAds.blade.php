@extends('components.base')

@section('title', 'Мои объявления')

@section('content')

<section class="container">


    @if(count($ads))

        <h2 class="wish-list__title">Мои объявления</h2>

        <div class="wish-list__list">
            @foreach($ads as $item)
                @include('components.cardsTemplate.littelCardHorizontal')
            @endforeach
        </div>

    @else
        <div class="wish-list__empty">
            <h2 class="wish-list__title wish-list__title--empty">У вас пока нет объявлений!</h2>
            <a href="{{route('user.profile.createAd')}}" class="wish-list__btn btn btn-blue">Выставить объявление</a>
        </div>

    @endif


{{--    <h2 class="jumbotron-heading"></h2>--}}


{{--    <div class="album py-5 bg-light">--}}
{{--        <div class="container">--}}
{{--            <div class="col gap-5">--}}
{{--                @forelse ($ads as $ad)--}}
{{--                    --}}
{{--                    <div style="height: 400px;" class="d-flex gap-5 mb-4 box-shadow bg-light ">--}}
{{--                        <div class="w-25">--}}
{{--                            <img class="w-100"--}}
{{--                                 @if(count($ad->imageMain))  src="{{Storage::url($ad->imageMain[0]->path)}}"--}}
{{--                                 @elseif(count($ad->images)) src="{{Storage::url($ad->images[0]->path)}}"--}}
{{--                                 @else src="{{ asset('images/product/placeholder400x400.png' )}}"--}}
{{--                                 @endif--}}
{{--                                 alt="{{ $ad['title'] }}" title="{{ $ad['title'] }}"--}}
{{--                            >--}}
{{--                        </div>--}}


{{--                        @if ( $ad->status->title == 'archived')--}}
{{--                            <h1 class="position-absolute start-50 top-50 opacity-50 text-danger">в архиве</h1>--}}
{{--                        @endif--}}

{{--                        <div class="">--}}

{{--                            <p class="card-text">Название: {{ $ad->title }}</p>--}}
{{--                            <p class="card-text">Город подачи: {{ $ad->city->name }}</p>--}}
{{--                            <p class="card-text">Категория: {{ $ad->category->title }}</p>--}}
{{--                            <div class="d-flex justify-content-between align-items-center">--}}

{{--                                    <a href="{{ route('ad.show', $ad->id) }}" class="btn  btn-outline-secondary">Просмотр</a>--}}
{{--                                    <a href="{{ route('user.profile.editAd', ['ad' => $ad->id]) }}" class="btn  btn-outline-secondary">Редак.</a>--}}
{{--                                    <form action="{{ route('ad.destroy', $ad->id) }}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        @method('delete')--}}
{{--                                        <button type="submit" class="btn btn-danger">Удалить</button>--}}
{{--                                    </form>--}}

{{--                            </div>--}}

{{--                            <div class="d-flex flex-column ">--}}
{{--                                <small class="text-muted">Статус: {{ $ad->status->description }}</small>--}}
{{--                                <small class="text-muted">Просмотрели: {{ $ad->show_count }}</small>--}}
{{--                                <small class="text-muted">Добавили в--}}
{{--                                    избранное: {{ count($ad->favoriteUsers) }}</small>--}}
{{--                                <small class="text-muted">Откликнулись: {{ count($ad->usersWished) }}</small>--}}
{{--                            </div>--}}


{{--                        </div>--}}
{{--                        <div class="w-25">--}}
{{--                            <h5>Кто захотел ваши объявления</h5>--}}
{{--                            <div class="d-flex flex-column gap-1">--}}
{{--                            @forelse ($ad->usersWished as $adAdded)--}}
{{--                                <form action="{{ route('chat.from.ad') }}" method="post">--}}
{{--                                    <input type="hidden" name="ad_user_id" value="{{$adAdded->id}}">--}}
{{--                                    @csrf--}}
{{--                                    @method('POST')--}}
{{--                                    <button type="submit" class="btn btn-success w-100"><p>{{ $adAdded->name }}</p></button>--}}
{{--                                </form>--}}

{{--                            @empty--}}
{{--                                <h3></h3>--}}
{{--                            @endforelse--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                @empty--}}
{{--                <h3>Вы пока не разместили ни одного объявления</h3>--}}
{{--                @endforelse--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
</section>

@endsection
