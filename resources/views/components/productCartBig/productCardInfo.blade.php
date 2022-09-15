<div class="info-blocks__list">
    <div class="info-blocks__body">
        <div class="info-blocks__item info-block">
            <div class="info-block__item">
                <svg class="info-block__icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2C17.52 2 22 6.48 22 12Z"
                          stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M15.71 15.18L12.61 13.33C12.07 13.01 11.63 12.24 11.63 11.61V7.51001"
                          stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <p class="info-block__title">Размещено:
                    <span class="info-block__text">{{ $ad->getCreatedDate() }}</span>
                </p>
            </div>

            <div class="info-block__item">
                <svg class="info-block__icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 13.4299C13.7231 13.4299 15.12 12.0331 15.12 10.3099C15.12 8.58681 13.7231 7.18994 12 7.18994C10.2769 7.18994 8.88 8.58681 8.88 10.3099C8.88 12.0331 10.2769 13.4299 12 13.4299Z"
                          stroke="#292D32" stroke-width="1.5"/>
                    <path d="M3.62001 8.49C5.59001 -0.169998 18.42 -0.159997 20.38 8.5C21.53 13.58 18.37 17.88 15.6 20.54C13.59 22.48 10.41 22.48 8.39001 20.54C5.63001 17.88 2.47001 13.57 3.62001 8.49Z"
                          stroke="#292D32" stroke-width="1.5"/>
                </svg>

                <p class="info-block__title">Город:
                    <span class="info-block__text">{{ $ad->city->name }}</span>
                </p>
            </div>

            <div class="info-block__item">
                <svg class="info-block__icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.01 2.92007L18.91 5.54007C20.61 6.29007 20.61 7.53007 18.91 8.28007L13.01 10.9001C12.34 11.2001 11.24 11.2001 10.57 10.9001L4.67 8.28007C2.97 7.53007 2.97 6.29007 4.67 5.54007L10.57 2.92007C11.24 2.62007 12.34 2.62007 13.01 2.92007Z"
                          stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M3 11C3 11.84 3.63 12.81 4.4 13.15L11.19 16.17C11.71 16.4 12.3 16.4 12.81 16.17L19.6 13.15C20.37 12.81 21 11.84 21 11"
                          stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M3 16C3 16.93 3.55 17.77 4.4 18.15L11.19 21.17C11.71 21.4 12.3 21.4 12.81 21.17L19.6 18.15C20.45 17.77 21 16.93 21 16"
                          stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <p class="info-block__title">Категория:
                    <span class="info-block__text">{{ $ad->category->title }}</span>
                </p>
            </div>

            <div class="info-block__item">
                <svg class="info-block__icon" width="24" height="24" viewBox="0 0 24 24"
                     fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 16.15V18.85C11 21.1 10.1 22 7.85 22H5.15C2.9 22 2 21.1 2 18.85V16.15C2 13.9 2.9 13 5.15 13H7.85C10.1 13 11 13.9 11 16.15Z"
                          stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M22 15C22 18.87 18.87 22 15 22L16.05 20.25" stroke="#292D32"
                          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 9C2 5.13 5.13 2 9 2L7.95 3.75" stroke="#292D32"
                          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.5 11C19.9853 11 22 8.98528 22 6.5C22 4.01472 19.9853 2 17.5 2C15.0147 2 13 4.01472 13 6.5C13 8.98528 15.0147 11 17.5 11Z"
                          stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <p class="info-block__title">Тип обмена: </p><span class="info-block__text">
                    @if ($ad->barter_type == 'barter')
                        <p>Обмен на {{$ad->barter_title}}</p>
                        {{-- Тут наверно кнопку сделать на модалку--}}
                        {{--<p>Комментарии к обмену: {{$ad->barter_text}}</p>--}}
                        {{--<p>Категория обмениваемого: {{$ad->barterCategory->title}}</p>--}}
                    @elseif ($ad->barter_type != 'barter')
                          отдам даром
                    @endif
                </span>
            </div>
        </div>

        <div class="info-blocks__line"></div>

        <div class="info-blocks__item info-buttons">

            @if (auth()->user())
                {{-- Начать бартер--}}
                @if (!$userFavorite)
                    <form action="{{ route('favorite.store', ['ad_id' => $ad['id']]) }}" method="post">
                        @method('POST')
                        @csrf

                        <button class="info-buttons__bart btn btn-reset btn-blue">
                            <svg class="info-buttons__icon" width="22" height="22" viewBox="0 0 22 22"
                                 fill="none" xmlns="http://www.w3
                                    .org/2000/svg">
                                <path d="M13.6 11.5799V14.3099C13.6 16.5899 12.69 17.4999 10.41 17.4999H7.69C5.42 17.4999 4.5 16.5899 4.5 14.3099V11.5799C4.5 9.3099 5.41 8.3999 7.69 8.3999H10.42C12.69 8.3999 13.6 9.3099 13.6 11.5799Z"
                                      stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M17.5 7.68V10.41C17.5 12.69 16.59 13.6 14.31 13.6H13.6V11.58C13.6 9.31 12.69 8.4 10.41 8.4H8.39999V7.68C8.39999 5.4 9.30999 4.5 11.59 4.5H14.32C16.59 4.5 17.5 5.41 17.5 7.68Z"
                                      stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M21 14C21 17.87 17.87 21 14 21L15.05 19.25"
                                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1 8C1 4.13 4.13 1 8 1L6.95 2.75" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="info-buttons__text">Бартер</span>
                        </button>
                    </form>
                @else
                    <form action="{{ route('favorite.destroy', $ad->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="ad_id" value="{{ $ad->id }}"/>

                        <button class="info-buttons__bart-del btn btn-reset btn-del">
                            <svg class="info-buttons__icon" width="22" height="22" viewBox="0 0 22 22"
                                 fill="none" xmlns="http://www.w3
                                    .org/2000/svg">
                                <path d="M13.6 11.5799V14.3099C13.6 16.5899 12.69 17.4999 10.41 17.4999H7.69C5.42 17.4999 4.5 16.5899 4.5 14.3099V11.5799C4.5 9.3099 5.41 8.3999 7.69 8.3999H10.42C12.69 8.3999 13.6 9.3099 13.6 11.5799Z"
                                      stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M17.5 7.68V10.41C17.5 12.69 16.59 13.6 14.31 13.6H13.6V11.58C13.6 9.31 12.69 8.4 10.41 8.4H8.39999V7.68C8.39999 5.4 9.30999 4.5 11.59 4.5H14.32C16.59 4.5 17.5 5.41 17.5 7.68Z"
                                      stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M21 14C21 17.87 17.87 21 14 21L15.05 19.25"
                                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1 8C1 4.13 4.13 1 8 1L6.95 2.75" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="info-buttons__text">Отказаться</span>
                        </button>
                    </form>
                @endif

                {{-- Добавить в избранное--}}
                @if (!$userWishes)
                    <form action="{{ route('wishlist.store', ['ad_id' => $ad['id']]) }}" method="post">
                        @method('POST')
                        @csrf
                        <button class="info-buttons__fav btn btn-reset btn-white">
                            <svg class="info-buttons__icon" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" xmlns="http://www.w3
                                    .org/2000/svg">
                                <path d="M9.25 9.05005C11.03 9.70005 12.97 9.70005 14.75 9.05005"
                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M16.8199 2H7.17995C5.04995 2 3.31995 3.74 3.31995 5.86V19.95C3.31995 21.75 4.60995 22.51 6.18995 21.64L11.0699 18.93C11.5899 18.64 12.4299 18.64 12.9399 18.93L17.8199 21.64C19.3999 22.52 20.6899 21.76 20.6899 19.95V5.86C20.6799 3.74 18.9499 2 16.8199 2Z"
                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M16.8199 2H7.17995C5.04995 2 3.31995 3.74 3.31995 5.86V19.95C3.31995 21.75 4.60995 22.51 6.18995 21.64L11.0699 18.93C11.5899 18.64 12.4299 18.64 12.9399 18.93L17.8199 21.64C19.3999 22.52 20.6899 21.76 20.6899 19.95V5.86C20.6799 3.74 18.9499 2 16.8199 2Z"
                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>

                            <span class="info-buttons__text">Добавить в избранное</span>
                        </button>
                    </form>
                @else
                    <form action="{{ route('wishlist.destroy', $ad['id']) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="info-buttons__fav btn btn-reset btn-black">
                            <svg class="info-buttons__icon white" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" xmlns="http://www.w3
                                    .org/2000/svg">
                                <path d="M9.25 9.05005C11.03 9.70005 12.97 9.70005 14.75 9.05005"
                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M16.8199 2H7.17995C5.04995 2 3.31995 3.74 3.31995 5.86V19.95C3.31995 21.75 4.60995 22.51 6.18995 21.64L11.0699 18.93C11.5899 18.64 12.4299 18.64 12.9399 18.93L17.8199 21.64C19.3999 22.52 20.6899 21.76 20.6899 19.95V5.86C20.6799 3.74 18.9499 2 16.8199 2Z"
                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M16.8199 2H7.17995C5.04995 2 3.31995 3.74 3.31995 5.86V19.95C3.31995 21.75 4.60995 22.51 6.18995 21.64L11.0699 18.93C11.5899 18.64 12.4299 18.64 12.9399 18.93L17.8199 21.64C19.3999 22.52 20.6899 21.76 20.6899 19.95V5.86C20.6799 3.74 18.9499 2 16.8199 2Z"
                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>

                            <span class="info-buttons__text">Убрать из избранного</span>
                        </button>
                    </form>
                @endif
            @else
                <p class="info-blocks__notification">Для начала бартера войдите или зарегистрируйтесь!</p>
            @endif

        </div>
    </div>

    <div class="info-blocks__stat info-stat">
        <div class="info-stat__item">
            <svg class="info-stat__icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3
                            .org/2000/svg">
                <path d="M15.58 12C15.58 13.98 13.98 15.58 12 15.58C10.02 15.58 8.42004 13.98 8.42004 12C8.42004 10.02 10.02 8.42004 12 8.42004C13.98 8.42004 15.58 10.02 15.58 12Z"
                      stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M12 20.27C15.53 20.27 18.82 18.19 21.11 14.59C22.01 13.18 22.01 10.81 21.11 9.39997C18.82 5.79997 15.53 3.71997 12 3.71997C8.46997 3.71997 5.17997 5.79997 2.88997 9.39997C1.98997 10.81 1.98997 13.18 2.88997 14.59C5.17997 18.19 8.46997 20.27 12 20.27Z"
                      stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>

            <p class="info-stat__text">
                <span class="info-stat__count">{{$ad->show_count}}</span>
                просмотров
            </p>
        </div>

        <div class="info-stat__item">
            <svg class="info-stat__icon" width="24" height="24" viewBox="0 0 24 24"
                 fill="none" xmlns="http://www.w3
                                    .org/2000/svg">
                <path d="M9.25 9.05005C11.03 9.70005 12.97 9.70005 14.75 9.05005"
                      stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M16.8199 2H7.17995C5.04995 2 3.31995 3.74 3.31995 5.86V19.95C3.31995 21.75 4.60995 22.51 6.18995 21.64L11.0699 18.93C11.5899 18.64 12.4299 18.64 12.9399 18.93L17.8199 21.64C19.3999 22.52 20.6899 21.76 20.6899 19.95V5.86C20.6799 3.74 18.9499 2 16.8199 2Z"
                      stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M16.8199 2H7.17995C5.04995 2 3.31995 3.74 3.31995 5.86V19.95C3.31995 21.75 4.60995 22.51 6.18995 21.64L11.0699 18.93C11.5899 18.64 12.4299 18.64 12.9399 18.93L17.8199 21.64C19.3999 22.52 20.6899 21.76 20.6899 19.95V5.86C20.6799 3.74 18.9499 2 16.8199 2Z"
                      stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>

            <p class="info-stat__text">
                @if ($infavorites)
                    <span class="info-stat__count">{{ $infavorites }} сохранений</span>
                @else
                    <span class="info-stat__count">0</span> сохранений
                @endif
            </p>
        </div>
    </div>
</div>

<div class="info-blocks__list ">
    <div class="info-blocks__body">
        <div class="info-blocks__item info-author">

            <div class="info-author__avatar">
                <img class="info-author__img"
                     @if($ad->user->avatar()->first())
                         src="{{Storage::url($ad->user->avatar()->first()->path)}}"
                     @else
                         src="{{ asset('images/icon-avatar.png')}}"
                     @endif
                     alt="{{ $ad->user->name }}">
            </div>

            <div class="info-author__content">
                <a class="info-author__link" href="{{route('user.public', $ad->user->id)}}">
                    <h3 class="info-author__name">{{ $ad->user->name }}</h3>
                </a>

                <div class="info-author__feedback feedback">

                    <svg class="feedback__icon" width="22" height="22" viewBox="0 0 22 22" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.73 2.51001L14.49 6.03001C14.73 6.52002 15.37 6.99001 15.91 7.08001L19.1 7.61001C21.14 7.95001 21.62 9.43001 20.15 10.89L17.67 13.37C17.25 13.79 17.02 14.6 17.15 15.18L17.86 18.25C18.42 20.68 17.13 21.62 14.98 20.35L11.99 18.58C11.45 18.26 10.56 18.26 10.01 18.58L7.01997 20.35C4.87997 21.62 3.57997 20.67 4.13997 18.25L4.84997 15.18C4.97997 14.6 4.74997 13.79 4.32997 13.37L1.84997 10.89C0.38997 9.43001 0.85997 7.95001 2.89997 7.61001L6.08997 7.08001C6.61997 6.99001 7.25997 6.52002 7.49997 6.03001L9.25997 2.51001C10.22 0.600015 11.78 0.600015 12.73 2.51001Z"
                              stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <div class="feedback__content">
                        <p class="feedback__point">{{ $ad->user->getRating() }}</p>
                        <p class="feedback__reviews">
                            Всего отзывов
                            (<span class="feedback__reviews-count">{{ $ad->user->getReviewsCount() }}</span>)
                        </p>
                    </div>

                </div>
            </div>

        </div>

        <div class="info-blocks__line"></div>

        <div class="info-blocks__item">
            <div class="info-block__item">
                <svg class="info-block__icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2C17.52 2 22 6.48 22 12Z"
                          stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M15.71 15.18L12.61 13.33C12.07 13.01 11.63 12.24 11.63 11.61V7.51001"
                          stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <p class="info-block__title">На сайте с
                    <span class="info-block__text">{{ $ad->getCreatedDate() }}</span>
                </p>
            </div>

            @auth
                <form action="{{route('chat.from.ad')}}" method="post">
                    <input type="hidden" name="ad_user_id" value="{{$ad->user->id}}">
                    @csrf @method('POST')

                    <button class="info-buttons__write btn btn-reset btn-blue">
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
</div>

@auth
    <a href="{{ route('complainAd', $ad->id) }}" class="btn btn-del-fill">Пожаловаться на объявление</a>
@endauth
