<form class="search-form" action="{{ route('search') }}" method="POST" name="search-form">
    @csrf

    <div class="search-form__container search">

        <!-- Категории -->
        <div class="search__item">
            <select class="form-control-input category" name="category" aria-label="Категория" data-class="search__category">
                <option value="" selected>Все категории</option>

                @foreach($categories as $category)

                <option value="{{ $category['id'] }}" @if(isset($categorise_selected) && $categorise_selected==$category['id']) selected @endif>{{ $category['title'] }}</option>

                @endforeach
            </select>
        </div>

        <!-- Поиск -->
        <div class="search__item search__item--searching">
            <label for="search-input">
                <div class="search__item-icon">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="10.4319" cy="9.7666" r="8.98856" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16.6836 16.4851L20.2076 20" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </div>
            </label>
            <input class="search__item-input" type="text" placeholder="Например: Рюкзак" name="name" id="search-input">
        </div>

        <!-- Тип обмена -->
        <div class="search__item search__item--type">
            <div class="search__item-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="#23262F" />
                    <path d="M11 7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7C14.6569 7 16 8.34315 16 10C16 10.5523 15.5523 11 15 11C14.4477 11 14 10.5523 14 10C14 9.44772 13.5523 9 13 9H10.7434C10.3328 9 10 9.33284 10 9.74342C10 10.0634 10.2048 10.3475 10.5083 10.4487L14.1241 11.6539C15.2444 12.0274 16 13.0757 16 14.2566C16 15.7717 14.7717 17 13.2566 17H13C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C9.34315 17 8 15.6569 8 14C8 13.4477 8.44771 13 9 13C9.55229 13 10 13.4477 10 14C10 14.5523 10.4477 15 11 15H13.2566C13.6672 15 14 14.6672 14 14.2566C14 13.9366 13.7952 13.6525 13.4917 13.5513L9.87587 12.3461C8.75562 11.9726 8 10.9243 8 9.74342C8 8.22827 9.22827 7 10.7434 7H11Z" fill="#23262F" />
                </svg>
            </div>

            <select class="form-control-input" name="barter_type" aria-label="Тип обмена" data-class="search__type">
                <option value="" selected>Тип обмена</option>
                @foreach($barter_types as $barter_type)
                <option value="{{ $barter_type[0] }}" @if(isset($barter_type_selected) && $barter_type_selected==$barter_type[0]) selected @endif>{{ $barter_type[1] }}</option>
                @endforeach
            </select>

        </div>

        <!-- город -->
        <div class="search__item">
            <div class="search__item-icon">
                <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.834 8.50051C10.834 7.11924 9.71475 6 8.33449 6C6.95322 6 5.83398 7.11924 5.83398 8.50051C5.83398 9.88076 6.95322 11 8.33449 11C9.71475 11 10.834 9.88076 10.834 8.50051Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.3335 19C7.13502 19 0.833984 13.8984 0.833984 8.56329C0.833984 4.38664 4.19109 1 8.3335 1C12.4759 1 15.834 4.38664 15.834 8.56329C15.834 13.8984 9.53197 19 8.3335 19Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </div>

            <select class="form-control-input" name="city" aria-label="Выбор города" data-class="search__city">

                <option value="" selected>Все город</option>

                @foreach($cities as $city)
                <option value="{{ $city['id'] }}" @if(isset($city_selected) && $city_selected==$city['id']) selected @endif>{{ $city['name'] }}</option>
                @endforeach

            </select>
        </div>

        <button class="search__btn btn-reset" type="submit">

            <svg class="search__btn-icon" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="8.80492" cy="8.8055" r="7.49047" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M14.0156 14.4043L16.9523 17.3333" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

        </button>
    </div>

    <label for="check">
        <input id="check" class="checkbox search-form__checkbox" type="checkbox" name="status" @if(isset($archived_checked)) checked @endif>
        <span>искать Архивные</span>
    </label>

    <!-- @if(session('alert'))
    <div class="alert-danger">
        {{ session('alert') }}
    </div>
    @endif -->

</form>