@extends('components.base')

@section('title', 'Личный кабинет - данные пользователя')

@section('content')

    <section class="change-date container">

        <h2 class="change-date__heading heading">Редактирование личных данных</h2>
        <div class="line"></div>


            <form action="{{ route('user.updateUserData') }}" method="post" class="change-date__form"
                  enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="change-date__avatar">
                    <img class="change-date__img"
                         @if($user->avatar()->first())
                             src="{{Storage::url($user->avatar()->first()->path)}}"
                         @else
                             src="{{ asset('images/icon-avatar.png')}}"
                         @endif

                         alt="{{ $user->name }}">
                </div>

                <div class="change-date__list">

                    <div class="change-date__item change-item__item">
                        <label class="change-item__label" for="name">Имя</label>
                        <input class="change-item__input input" type="text" id="name" name="name" value="{{ $user->name }}">
                    </div>

                    <div class="change-date__item change-item__item">
                        <label class="change-item__label" for="email">Электронная почта</label>
                        <input class="change-item__input input" type="email" id="email" name="email" value="{{ $user->email }}">
                    </div>

                    <div class="change-date__item change-item__item">
                        <label class="change-item__label" for="phone">Телефон</label>
                        <input class="change-item__input input" type="phone" id="phone" name="phone" value="{{
                        $user->phone }}" placeholder="Ваш телефон">
                    </div>

                    <div class="change-date__item change-item__item">
                        <input class="change-item__input change-item__input--photo input--hidden" hidden type="file"
                               name="image" id="image" multiple accept=".jpg, .png, .jepg, .gif">

                        <div class="change-item__load-file load-file">
                            <div class="load-file__wrapper">

                                <div class="load-file__previews">
                                    <div class="load-file__icon">
                                        <svg width="26" height="31" viewBox="0 0 26 31" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M17.1048 1.64262H7.12685C4.00685 1.63062 1.45085 4.11612 1.37585 7.23612V23.3416C1.30835 26.4946 3.81035 29.1046 6.96185 29.1721C7.01735 29.1721 7.07285 29.1736 7.12685 29.1721H19.1088C22.2438 29.0611 24.7218 26.4781 24.7038 23.3416V9.55662L17.1048 1.64262Z"
                                                  stroke="#315DF7" stroke-width="2.25" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M16.7119 1.625V5.9885C16.7119 8.1185 18.4354 9.845 20.5654 9.851H24.6964"
                                                  stroke="#315DF7" stroke-width="2.25" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M12.4609 12.3633V21.4248" stroke="#315DF7" stroke-width="2.25"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M15.9798 15.8963L12.4623 12.3638L8.94482 15.8963"
                                                  stroke="#315DF7" stroke-width="2.25" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                        </svg>
                                    </div>

                                    <label for="image" class="load-file__title">Нажмите чтобы загрузить файл</label>

                                    <p class="load-file__text">Формат файла PNG, JPEG, GIF. </p>
                                </div>

                                <img class="prew-img" id="uploadedImage" src="#" alt="name">
                            </div>

                        </div>
                    </div>

{{--                    <label for="removeImage">Удалить фото</label>--}}
{{--                    <input type="checkbox" name="removeImage" id="removeImage"--}}
{{--                           value="@if(count($user->avatar)){{ $user->avatar[0]->id }}@endif">--}}
{{--                    <label for="image">Загрузить фото профиля</label>--}}
{{--                    <input type="file" class="invisible" name="image" id="image">--}}

                    <div class="change-date__controls">
                        <button type="submit" class="change-date__btn btn btn-reset btn-green">Сохранить
                            изменения</button>
                        <button type="reset" class="change-date__btn btn btn-reset btn-del">Отменить
                            изменения</button>
                        <a class="change-date__btn btn btn-black-nofill" href="{{ route('user.profile.resetPassword')
                        }}">Изменить
                            пароль</a>
                    </div>

                </div>

            </form>


    </section>
@endsection
