@extends('components.base')

@section('title',"Личный кабинет")

@section('content')

<div class="container">

    <h3>Личный кабинет пользователя</h3>

    <div class="d-flex gap-5">

        <div class="row gap-5" style="height: 300px;">

            <div class="col">
                <p>Вам понравилось:</p>
                <div>
                    @forelse($wishes as $ad)
                    @include('components.adCartLKHorizont')
                    @empty
                    Вы пока ничего не добавили
                    @endforelse
                </div>
            </div>
            <div class="col">
                <p>В избранном:</p>
                <div class="overflow-hidden">
                    @forelse($favorites as $ad)
                    @include('components.adCartLKHorizont')
                    @empty
                    Пока ничего
                    @endforelse
                </div>
            </div>
            <div class="col d-flex flex-column gap-1">
                <p>Действия</p>
                <a href="{{route ('user.profile.createAd')}}" class="btn btn-info">Новое объявление</a>
                <a href="{{ route('user.profile.personalData') }}" class="btn btn-info">Изменить данные</a>
            </div>

        </div>

    </div>
    <div class="mt-5">
        <h3>Ваши обьявления</h3>
        <div class="d-flex flex-row flex-wrap justify-content-between">
            @forelse ($ads as $ad)
            @include('components.adCartLK')

            @empty
            Пока ничего
            @endforelse
        </div>
    </div>
    <div class="col d-flex flex-column gap-1">
        <p>Действия</p>
        <a href="{{route ('user.profile.createAd')}}" class="btn btn-info">Новое объявление</a>
        <a href="{{ route('user.profile.personalData') }}" class="btn btn-info">Изменить данные</a>
    </div>

</div>
<div class="mt-5">
    <h3>Ваши обьявления</h3>
    <div class="d-flex flex-row flex-wrap justify-content-between">
        @forelse ($ads as $ad)
        @include('components.adCartLK', ['orientation' => 'vertical'])
        @empty
        <h3>Вы пока не разместили ни одного объявления</h3>
        @endforelse
    </div>
</div>
</div>


@endsection