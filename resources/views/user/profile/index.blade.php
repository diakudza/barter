@extends('components.base')

@section('title',"Личный кабинет")

@section('content')

<section class="container users-office">

    <h2 class="users-office__heading heading">Личный кабинет 😜</h2>
    <div class="line"></div>

    <div class="users-office__wrapper">

{{--        <div class="users-office__menu">--}}
{{--            <ul class="users-office__list">--}}
{{--               <li class="users-office__item">--}}
{{--                   <a href="#" class="users-office__link">Информация о профиле</a>--}}
{{--               </li>--}}
{{--            </ul>--}}

{{--        </div>--}}


{{--{{ dd(Auth::user()-av) }}--}}


                <div>
                    <img src="
                    @if(count($user->avatar))
                {{ Storage::url($user->avatar[0]->path) }}
                @else
                {{ Storage::url('images/clean.webp') }}
                @endif
                    " alt="image" height="400">
                </div>
                <div>
                    <div class="user-name">
                        {{ $user->name }}
                    </div>

                    <div class="user-email">
                        {{ $user->email }}
                    </div>

                    <div class="user-phone">
                        {{ $user->phone }}
                    </div>



                </div>







{{--        <div class="users-office__content">--}}
{{--            <div class="d-flex gap-5 ">--}}

{{--                <div class="row gap-5 w-100" style="height: 300px;">--}}
{{--                    <div class="col">--}}
{{--                        <p>Вам понравилось:</p>--}}
{{--                        <div>--}}
{{--                            @forelse($wishes as $ad)--}}
{{--                                @include('components.cardsTemplate.adCartLKHorizont')--}}
{{--                            @empty--}}
{{--                                Вы пока ничего не добавили--}}
{{--                            @endforelse--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <p>В избранном:</p>--}}
{{--                        <div class="overflow-hidden">--}}
{{--                            @forelse($favorites as $ad)--}}
{{--                                @include('components.cardsTemplate.adCartLKHorizont')--}}
{{--                            @empty--}}
{{--                                Пока ничего--}}
{{--                            @endforelse--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col d-flex flex-column gap-1">--}}
{{--                        <p>Действия</p>--}}
{{--                        <a href="{{ route ('user.profile.createAd' )}}" class="btn btn-info">Новое объявление</a>--}}
{{--                        <a href="{{ route('user.profile.personalData') }}" class="btn btn-info">Изменить данные</a>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--            <div class="mt-5">--}}
{{--                <h3>Ваши обьявления</h3>--}}
{{--                <div class="d-flex flex-row flex-wrap justify-content-between">--}}
{{--                    @forelse ($ads as $ad)--}}
{{--                        @include('components.adCartLK')--}}
{{--                    @empty--}}
{{--                        Пока ничего--}}
{{--                    @endforelse--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>

</section>


@endsection
