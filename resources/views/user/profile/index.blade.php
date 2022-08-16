@extends('components.base')

@section('title',"Личный кабинет")

@section('content')
    <div class="container">
        <h3>Личный кабинет пользователя</h3>

<<<<<<< HEAD
        <ul>
            <li>
                <a href="{{route ('user.profile.createAd')}}">Новое объявление</a>
            </li>
            <li>
                <a href="{{route ('user.profile.listAds')}}">Мои обьявления</a>
            </li>
            <li>
                <a href="#">Личные данные</a>
            </li>
            <li></li>
            <li></li>
        </ul>
    </div>
=======
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

>>>>>>> 6b1efc58bfd1c26931ac144dd62a7b129b91e88a
@endsection
