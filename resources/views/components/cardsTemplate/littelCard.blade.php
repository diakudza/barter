<div class="card">

    <a href="{{ route('ad.show', $item['id']) }}" class="card__link"></a>

    <div class="card__content">
        <div class="card__img">

            <div class="card__info-top">
                @if ($item->barter_type == 'barter')
                    <div class="info-type">
                        <span class="status-info__text">Обменяю</span>
                    </div>
                @elseif ($item->barter_type != 'barter')
                    <div class="info-type">
                        <span class="status-info__text">Отдам даром</span>
                    </div>
                @endif

                @if(Request::is('personal'))
                    @if(isset($var))
                        @if($var == 'yours')
                            <div class="status-info">
                                <div class="status-info__item {{$item->status->title}}">
                                    <span class="status-info__text">{{ $item->status->description}}</span>
                                </div>
                            </div>
                        @endif
                    @endif
                @endif
            </div>

            @if(!Request::is('personal') && auth()->user())
                @if($item->user->id != auth()->user()->id)

                    @if(auth()->user() && $item['status_id'] !== 4)
                        <button class="card__btn-fav btn-reset">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3
        .org/2000/svg">
                                <path d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                      stroke="#23262F" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </button>
                    @endif

                @endif
            @endif

            <img class="card__product-img" @if(count($item->imageMain)) src="{{Storage::url
            ($item->imageMain[0]->path)}}"
                 @elseif(count($item->images)) src="{{Storage::url($item->images[0]->path)}}"
                 @else src="{{ asset('images/product/placeholder400x400.png' )}}"
                 @endif alt="{{ $item['title'] }}" title="{{ $item['title'] }}">

        </div>

        <div class="card__body">

            <div class="card__body-item card__body-top">
                <a class="card__link--title" href="{{ route('ad.show', $item['id']) }}">
                    <h4 class="card__title">{{ Str::limit($item['title'], 55)  }}</h4>
                </a>

                <div class="card__location">
                    <svg class="card__location-icon" width="14" height="18" viewBox="0 0 14 18" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M9.08332 7.7505C9.08332 6.59944 8.15063 5.66675 7.00041 5.66675C5.84935 5.66675 4.91666 6.59944 4.91666 7.7505C4.91666 8.90072 5.84935 9.83341 7.00041 9.83341C8.15063 9.83341 9.08332 8.90072 9.08332 7.7505Z"
                              stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M6.99959 16.5C6.00086 16.5 0.75 12.2486 0.75 7.80274C0.75 4.3222 3.54758 1.5 6.99959 1.5C10.4516 1.5 13.25 4.3222 13.25 7.80274C13.25 12.2486 7.99832 16.5 6.99959 16.5Z"
                              stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    <p class="card__location-text">{{ $item->city->name }}</p>
                </div>

            </div>

            @if(Request::is('personal') && auth()->user())
                @if(isset($var))
                    @if($var == 'yours')
                        <div class="card__body-item  card__body-controls">
                            <a href="{{ route('user.profile.editAd', ['ad' => $item->id]) }}"
                               class="card-btn btn btn-white">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16504 13.1287H13.0001" stroke="#23262F" stroke-width="1.25"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M7.52001 2.02986C8.0371 1.41186 8.96666 1.32124 9.59748 1.82782C9.63236 1.85531 10.753 2.72586 10.753 2.72586C11.446 3.14479 11.6613 4.0354 11.2329 4.71506C11.2102 4.75146 4.87463 12.6763 4.87463 12.6763C4.66385 12.9393 4.34389 13.0945 4.00194 13.0982L1.57569 13.1287L1.02902 10.8149C0.952442 10.4895 1.02902 10.1478 1.2398 9.8849L7.52001 2.02986Z"
                                          stroke="#23262F" stroke-width="1.25" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M6.34766 3.50049L9.98249 6.2919" stroke="#23262F" stroke-width="1.25"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <span class="btn-text">Изменить</span>
                            </a>

                            <form action="{{ route('ad.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-reset btn-del">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.1042 8.39062C16.1042 8.39062 15.6517 14.0031 15.3892 16.3673C15.2642 17.4965 14.5667 18.1581 13.4242 18.179C11.25 18.2181 9.07332 18.2206 6.89999 18.1748C5.80082 18.1523 5.11499 17.4823 4.99249 16.3731C4.72832 13.9881 4.27832 8.39062 4.27832 8.39062"
                                              stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M17.2567 5.69987H3.125" stroke-width="1.5"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M14.5335 5.69998C13.8793 5.69998 13.316 5.23748 13.1877 4.59665L12.9852 3.58331C12.8602 3.11581 12.4368 2.79248 11.9543 2.79248H8.42682C7.94432 2.79248 7.52099 3.11581 7.39599 3.58331L7.19349 4.59665C7.06516 5.23748 6.50182 5.69998 5.84766 5.69998"
                                              stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <div class="card__body-item card__body-info">
                            <div class="info__watch">
                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M11.6354 7.04418C11.6354 8.49918 10.4554 9.67835 9.00038 9.67835C7.54538 9.67835 6.36621 8.49918 6.36621 7.04418C6.36621 5.58835 7.54538 4.40918 9.00038 4.40918C10.4554 4.40918 11.6354 5.58835 11.6354 7.04418Z"
                                          stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M8.99866 13.129C12.172 13.129 15.0745 10.8473 16.7087 7.04398C15.0745 3.24065 12.172 0.958984 8.99866 0.958984H9.00199C5.82866 0.958984 2.92616 3.24065 1.29199 7.04398C2.92616 10.8473 5.82866 13.129 9.00199 13.129H8.99866Z"
                                          stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>

                                <span class="info__text--gray">{{$item->show_count}}</span>
                            </div>

                            <div class="info__fav">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3
        .org/2000/svg">
                                    <path d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                          stroke="#23262F" stroke-width="1.5" stroke-opacity="0.5"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>

                                <span class="info__text--gray">{{ count($item->usersWished) }}</span>
                            </div>

                            <div class="info__bart">
                                <svg class="actions__icon" width="20" height="20" viewBox="0 0 22 22"
                                     fill="none" xmlns="http://www.w3
                                    .org/2000/svg">
                                    <path d="M13.6 11.5799V14.3099C13.6 16.5899 12.69 17.4999 10.41 17.4999H7.69C5.42 17.4999 4.5 16.5899 4.5 14.3099V11.5799C4.5 9.3099 5.41 8.3999 7.69 8.3999H10.42C12.69 8.3999 13.6 9.3099 13.6 11.5799Z"
                                          stroke="#23262F" stroke-width="1.5" stroke-linecap="round"
                                          stroke-opacity="0.5"
                                          stroke-linejoin="round"/>
                                    <path d="M17.5 7.68V10.41C17.5 12.69 16.59 13.6 14.31 13.6H13.6V11.58C13.6 9.31 12.69 8.4 10.41 8.4H8.39999V7.68C8.39999 5.4 9.30999 4.5 11.59 4.5H14.32C16.59 4.5 17.5 5.41 17.5 7.68Z"
                                          stroke="#23262F" stroke-width="1.5" stroke-linecap="round"
                                          stroke-opacity="0.5"
                                          stroke-linejoin="round"/>
                                    <path d="M21 14C21 17.87 17.87 21 14 21L15.05 19.25"
                                          stroke="#23262F" stroke-width="1.5" stroke-linecap="round"
                                          stroke-opacity="0.5"
                                          stroke-linejoin="round"/>
                                    <path d="M1 8C1 4.13 4.13 1 8 1L6.95 2.75" stroke-width="1.5" stroke-opacity="0.5"
                                          stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <span class="info__text--gray">{{ count($item->usersWished) }}</span>
                            </div>
                        </div>

                    @elseif($var == 'wishList')
                        <div class="card__body-item  card__body-controls">
                            <form action="{{route('chat.from.ad')}}" method="post">
                                <input type="hidden" name="ad_user_id" value="{{$item->user->id}}">
                                @csrf @method('POST')

                                <button class="btn btn-reset btn-blue-nofill card-btn">
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

                            <form action="{{ route('wishlist.destroy', $item['id']) }}" method="post">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-reset btn-del">
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
                                </button>
                            </form>
                        </div>

                    @elseif($var == 'favoritList')
                        <div class="card__body-item  card__body-controls">
                            <form action="{{route('chat.from.ad')}}" method="post">
                                <input type="hidden" name="ad_user_id" value="{{$item->user->id}}">
                                @csrf @method('POST')

                                <button class="btn btn-reset btn-blue-nofill card-btn">
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

                            <form action="{{ route('favorite.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-reset btn-del">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3
        .org/2000/svg">
                                        <path d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                              stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endif
                @endif
            @endif

            <div class="card__body-item  card__body-bottom">
                <div class="card__author">
                    <div class="card__author-img">
                        <img class="author-img" @if($item->user->avatar()->first())
                            src="{{Storage::url($item->user->avatar()->first()->path)}}"
                             @elseif(count($item->images)) src="{{Storage::url($item->images[0]->path)}}"
                             @else src="https://via.placeholder.com/40x40"
                             @endif alt="{{ $item->user->name }}" title="{{ $item->user->name }}">
                    </div>

                    <a href="{{ route('user.public', $item->user->id) }}" class="card__author-link">
                        <p class="card__author-name">{{ $item->user->name }}</p>
                    </a>
                </div>

                <div class="card__add">
                    <p class="card__add-text">Опубликовано:</p>
                    <p class="card__add-time">{{ $item->getCreatedDate() }}</p>
                </div>

            </div>

        </div>
    </div>

</div>
