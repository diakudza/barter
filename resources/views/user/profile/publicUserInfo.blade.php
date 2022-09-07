@extends('components.base')

@section('title', 'О пользователе')

@section('content')

    <div class="container">
        <h3>{{ $user->name }}</h3>
        <div>
            <p> Дата регистрации: {{ $user->created_at }}</p>
        </div>
        <div>
            <p>Рейтинг: {{ $user->getRating() }}</p>
        </div>
        @auth
            <form action="{{ route('chat.from.ad') }}" method="post">
                <input type="hidden" name="ad_user_id" value="{{ $user->id }}">
                @csrf @method('POST')
                <button class="writeMessage">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.7139 12.7132C10.6765 14.7508 7.65952 15.191 5.19062 14.0493C4.82615 13.9025 4.52733 13.7839 4.24326 13.7839C3.452 13.7886 2.46712 14.5558 1.95525 14.0446C1.44338 13.5326 2.21118 12.547 2.21118 11.751C2.21118 11.4668 2.09728 11.1734 1.95056 10.8082C0.808228 8.33967 1.24908 5.32171 3.28651 3.28472C5.88741 0.682873 10.113 0.682873 12.7139 3.28405C15.3195 5.88992 15.3148 10.112 12.7139 12.7132Z"
                            stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10.6262 8.27523H10.6322" stroke="white" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M7.95338 8.27523H7.95938" stroke="white" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M5.28053 8.27523H5.28653" stroke="white" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    Написать продавцу
                </button>
            </form>
            <a href="{{ route('user.profile.rateUser', $user->id) }}">Оценить продавца</a>
        @endauth
        <div class="d-flex justify-content-around">
            <div>
                <p>Объявления: </p>
                @include('components.productsLast', ['lastTenAds' => $ads])
            </div>
            <div>
                <p>Отзывы:</p>
                @include('components.reviews', ['reviews' => $reviews])
                <a href="{{ route('complainUser', $user->id) }}" class="link-danger fs-4">Пожаловаться на этого
                    пользователя</a>
            </div>
        </div>

    </div>

@endsection
