@extends('components.base')

@section('title',"Личный кабинет")

@section('content')

    <section class="container users-office">

        <h2 class="users-office__heading heading">Личный кабинет 😜</h2>
        <div class="line"></div>

        <div class="users-office__wrapper">

            <div class="user-shop__top">
                <div class="user-shop__info">

                    <div class="user-shop__item info-author">

                        <div class="info-author__avatar">
                            <img class="info-author__img"
                                 @if($user->avatar()->first())
                                     src="{{Storage::url($user->avatar()->first()->path)}}"
                                 @else src="{{ asset('images/icon-avatar.png')}}"
                                 @endif alt="{{ $user->name }}">
                        </div>

                        <div class="info-author__content">
                            <h3 class="info-author__name">{{ $user->name }}</h3>

                            <div class="info-author__item">
                                <svg class="info-author__icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2C17.52 2 22 6.48 22 12Z"
                                          stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M15.71 15.18L12.61 13.33C12.07 13.01 11.63 12.24 11.63 11.61V7.51001"
                                          stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>

                                <p class="info-author__title">Дата регистрации:
                                    <span class="info-author__text">{{ $user->created_at }}</span>
                                </p>
                            </div>

                            <div class="info-author__item feedback">
                                <svg class="info-author__icon" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.73 2.51001L14.49 6.03001C14.73 6.52002 15.37 6.99001 15.91 7.08001L19.1 7.61001C21.14 7.95001 21.62 9.43001 20.15 10.89L17.67 13.37C17.25 13.79 17.02 14.6 17.15 15.18L17.86 18.25C18.42 20.68 17.13 21.62 14.98 20.35L11.99 18.58C11.45 18.26 10.56 18.26 10.01 18.58L7.01997 20.35C4.87997 21.62 3.57997 20.67 4.13997 18.25L4.84997 15.18C4.97997 14.6 4.74997 13.79 4.32997 13.37L1.84997 10.89C0.38997 9.43001 0.85997 7.95001 2.89997 7.61001L6.08997 7.08001C6.61997 6.99001 7.25997 6.52002 7.49997 6.03001L9.25997 2.51001C10.22 0.600015 11.78 0.600015 12.73 2.51001Z"
                                          stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>

                                <div class="feedback__content">
                                    <p class="feedback__point">{{ $user->getRating() }}</p>
                                    <p class="feedback__reviews">
                                        Всего отзывов (<span
                                                class="feedback__reviews-count">{{ $user->getReviewsCount() }}</span>)
                                    </p>
                                </div>

                            </div>


                        </div>

                    </div>

                </div>

                <div class="user-shop__buttons">

                        @if($user->id != auth()->user()->id)
                            <form action="{{route('chat.from.ad')}}" method="post">
                                <input type="hidden" name="ad_user_id" value="{{$user->id}}">
                                @csrf @method('POST')

                                <button class="btn btn-reset btn-blue-nofill">
                                    <svg class="info-buttons__icon" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" xmlns="http://www.w3
                                    .org/2000/svg">
                                        <path d="M8.5 19H8C4 19 2 18 2 13V8C2 4 4 2 8 2H16C20 2 22 4 22 8V13C22 17 20 19 16 19H15.5C15.19 19 14.89 19.15 14.7 19.4L13.2 21.4C12.54 22.28 11.46 22.28 10.8 21.4L9.3 19.4C9.14 19.18 8.77 19 8.5 19Z"
                                              stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.9965 11H16.0054" stroke="#292D32" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11.9955 11H12.0045" stroke="#292D32" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.99451 11H8.00349" stroke="#292D32" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    <span class="info-bottoms__text">Написать продавцу</span>
                                </button>
                            </form>


                    @endauth
                </div>
            </div>


            <div class="user-shop__list">
                @foreach($ads as $item)
                    @include('components.cardsTemplate.littelCard')
                @endforeach()
            </div>


            {{--            <div class="users-office__menu">--}}
            {{--                <ul class="users-office__list">--}}
            {{--                    <li class="users-office__item">--}}
            {{--                        <a href="#" class="users-office__link">Информация о профиле</a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}

            {{--            </div>--}}


            {{--            {{ dd(Auth::user()-av) }}--}}

            {{--            <div class="users-office__content">--}}
            {{--                <div class="d-flex gap-5 ">--}}

            {{--                    <div class="row gap-5 w-100" style="height: 300px;">--}}
            {{--                        <div class="col">--}}
            {{--                            <p>Вам понравилось:</p>--}}
            {{--                            <div>--}}
            {{--                                @forelse($wishes as $ad)--}}
            {{--                                    @include('components.cardsTemplate.adCartLKHorizont')--}}
            {{--                                @empty--}}
            {{--                                    Вы пока ничего не добавили--}}
            {{--                                @endforelse--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col">--}}
            {{--                            <p>В избранном:</p>--}}
            {{--                            <div class="overflow-hidden">--}}
            {{--                                @forelse($favorites as $ad)--}}
            {{--                                    @include('components.cardsTemplate.adCartLKHorizont')--}}
            {{--                                @empty--}}
            {{--                                    Пока ничего--}}
            {{--                                @endforelse--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col d-flex flex-column gap-1">--}}
            {{--                            <p>Действия</p>--}}
            {{--                            <a href="{{ route ('user.profile.createAd' )}}" class="btn btn-info">Новое объявление</a>--}}
            {{--                            <a href="{{ route('user.profile.personalData') }}" class="btn btn-info">Изменить данные</a>--}}
            {{--                        </div>--}}

            {{--                    </div>--}}

            {{--                </div>--}}

            {{--                <div class="mt-5">--}}
            {{--                    <h3>Ваши обьявления</h3>--}}
            {{--                    <div class="d-flex flex-row flex-wrap justify-content-between">--}}
            {{--                        @forelse ($ads as $ad)--}}
            {{--                            @include('components.adCartLK')--}}
            {{--                        @empty--}}
            {{--                            Пока ничего--}}
            {{--                        @endforelse--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

        </div>

    </section>

@endsection
