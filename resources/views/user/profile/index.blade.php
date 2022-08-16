@extends('components.base')

@section('title',"Личный кабинет")

@section('content')
    <div class="container">
        <h3>Личный кабинет пользователя</h3>

        <div class="d-flex gap-5">

            <a href="{{route ('user.profile.createAd')}}" class="btn btn-info">Новое объявление</a>

            <a href="{{ route('user.profile.personalData') }}" class="btn btn-info">Личные данные</a>

        </div>

        <div class="mt-5">
            <h3>Ваши обьявления</h3>
            <div class="row ">

                @forelse ($ads as $ad)
                    @include('components.adCartLK')
                @empty
                    <h3>Вы пока не разместили ни одного объявления</h3>
                @endforelse
            </div>
        </div>
    </div>

@endsection
