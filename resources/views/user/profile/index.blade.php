@extends('components.base')

@section('title',"Личный кабинет")

@section('content')

    <section class="container user-office">

        <h2 class="user-office__heading heading">Личный кабинет</h2>
        <div class="line"></div>

        <div class="user-office__wrapper">

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

                                <svg class="info-author__icon"  width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3
                                .org/2000/svg">
                                    <rect x="0.900146" y="4.5" width="22.2" height="15" rx="1.5" stroke="black" stroke-width="1.8"/>
                                    <path d="M22.5 5.25L12.8719 12.1272C12.3503 12.4998 11.6497 12.4998 11.1281 12.1272L1.5 5.25" stroke="#292D32" stroke-width="1.5"/>
                                </svg>


                                <p class="info-author__title">Электронная почта:
                                    <span class="info-author__text">{{ $user->email }}</span>
                                </p>
                            </div>

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

                            <div class="info-author__item feedback">
                                <svg class="info-author__icon" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.73 2.51001L14.49 6.03001C14.73 6.52002 15.37 6.99001 15.91 7.08001L19.1 7.61001C21.14 7.95001 21.62 9.43001 20.15 10.89L17.67 13.37C17.25 13.79 17.02 14.6 17.15 15.18L17.86 18.25C18.42 20.68 17.13 21.62 14.98 20.35L11.99 18.58C11.45 18.26 10.56 18.26 10.01 18.58L7.01997 20.35C4.87997 21.62 3.57997 20.67 4.13997 18.25L4.84997 15.18C4.97997 14.6 4.74997 13.79 4.32997 13.37L1.84997 10.89C0.38997 9.43001 0.85997 7.95001 2.89997 7.61001L6.08997 7.08001C6.61997 6.99001 7.25997 6.52002 7.49997 6.03001L9.25997 2.51001C10.22 0.600015 11.78 0.600015 12.73 2.51001Z"
                                          stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>

                                <div class="feedback__content">
                                    <p class="feedback__reviews">
                                        Баланс: <span
                                            class="feedback__reviews-count"> {{ $user->getBalance()->amount ?? 0}} </span>
                                        руб.
                                    </p> <a href="{{route('payment.form.yookassa')}}"> Пополнить</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="user-shop__buttons">
                    <a href="{{ route ('user.profile.createAd' )}}" class="btn btn-blue-nofill">Новое объявление</a>
                    <a href="{{ route ('user.profile.personalData') }}" class="btn btn-green">Изменить данные</a>
                </div>
            </div>

            <div class="user-office__list">
                <div class="user-office__item">
                    <h3 class="user-office__title">Мои объявления</h3>

                    <div class="user-office__item-wrapper">
                        @forelse ($ads as $item)
                            @include('components.cardsTemplate.littelCard', ['var' => 'yours'])
                        @empty
                            <p class="user-office__subtitle">У вас нет пока объявлений</p>
                        @endforelse
                    </div>
                </div>

                <div class="user-office__item">
                    <h3 class="user-office__title">То что вы хотите получить или на что то поменять</h3>

                    <div class="user-office__item-wrapper">
                        @forelse ($wishes as $item)
                            @include('components.cardsTemplate.littelCard', ['var' => 'wishList'])
                        @empty
                            <p class="user-office__subtitle">Вы пока ничего не добавили</p>
                        @endforelse
                    </div>
                </div>

                <div class="user-office__item">
                    <h3 class="user-office__title">В избранном</h3>

                    <div class="user-office__item-wrapper">
                        @forelse ($favorites as $item)
                            @include('components.cardsTemplate.littelCard', ['var' => 'favoritList'])
                        @empty
                            <p class="user-office__subtitle">Вы пока ничего не добавили</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection
