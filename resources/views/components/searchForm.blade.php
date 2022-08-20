<form class="search-form" action="{{ route('search') }}" method="POST" name="search-form">
    @csrf

    <div class="dropdown">
        <div class="textBox">Все категории</div>

        <span class="option">

            @foreach($categories as $category)
            <div>
                {{ $category['title'] }}
            </div>
            @endforeach

        </span>
    </div>

    <input type="text" placeholder="Наименование" name="product-name">

    <div class="dropdown">
        <div class="textBox">Тип обмена</div>

        <span class="option">

            @foreach($barter_types as $barter_type)
            <div>
                {{ $barter_type[1] }}
            </div>
            @endforeach

        </span>
    </div>

    <div class="dropdown">

        <div class="textBox">Все города</div>

        <span class="option">

            @foreach($cities as $city)
            <div>
                {{ $city['name'] }}
            </div>
            @endforeach

        </span>
    </div>

    <button type="submit">
        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="8.80492" cy="8.8055" r="7.49047" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M14.0156 14.4043L16.9523 17.3333" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <input class="form-control-checkbox" type="checkbox" name="status" @if(isset($archived_checked)) checked @endif>

    <!-- @if(session('alert'))
    <div class="alert-danger">
        {{ session('alert') }}
    </div>
    @endif -->

    <!-- Поиск -->
    <!-- <div class="form-group">
        <input type="text" class="form-control-input" @if(isset($searchWord)) value="{{$searchWord}}" @endif placeholder="Наименование" name="name">
    </div> -->

    <!-- город -->
    <!-- <div class="form-group">
        <select class="form-control-input" name="city">
            <option value="" selected>город не выбран</option>
            @foreach($cities as $city)
            <option value="{{ $city['id'] }}" @if(isset($city_selected) && $city_selected==$city['id']) selected @endif>{{ $city['name'] }}</option>
            @endforeach
        </select>
    </div> -->

    <!-- Категория -->
    <!-- тип обмена -->
    <!-- <div class="d-flex justify-content-between ">

        <div class="form-group w">
            <select class="form-control-input" name="category">
                <option value="" selected>категория не выбрана</option>
                @foreach($categories as $category)
                <option value="{{ $category['id'] }}" @if(isset($categorise_selected) && $categorise_selected==$category['id']) selected @endif>{{ $category['title'] }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group w-50">
            <select class="form-control-input" name="barter_type">
                <option value="" selected>Тип обмена не учитывать</option>
                @foreach($barter_types as $barter_type)
                <option value="{{ $barter_type[0] }}" @if(isset($barter_type_selected) && $barter_type_selected==$barter_type[0]) selected @endif>{{ $barter_type[1] }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="d-flex flex-row">
        <button class="form-control-submit-button" type="submit">Поиск</button>
        <div class="d-flex flex-row">

            <input class="form-control-checkbox" type="checkbox" name="status" @if(isset($archived_checked)) checked @endif>
        </div>
        <p>искать Архивные</p>
    </div> -->
</form>