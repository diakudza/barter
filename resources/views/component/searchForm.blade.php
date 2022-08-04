<div class="container">
    <form class="d-flex flex-column w-100" action="{{ route('search') }}" method="POST">
        @csrf

        @if(session('alert'))
        <div class="alert-danger">
            {{ session('alert') }}
        </div>
        @endif

        <div class="form-group">
            <input type="text" class="form-control-input" @if(isset($searchWord)) value="{{$searchWord}}" @endif placeholder="Наименование" name="name">
        </div>

        <div class="form-group">
            <select class="form-control-input" name="city">
                <option value="" selected>город не выбран </option>
                @foreach($cities as $city)
                <option value="{{ $city['id'] }}" @if(isset($city_selected) && $city_selected==$city['id']) selected @endif>{{ $city['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <select class="form-control-input" name="category">
                <option value="" selected>категория не выбрана</option>
                @foreach($categories as $category)
                <option value="{{ $category['id'] }}" @if(isset($categorise_selected) && $categorise_selected==$category['id']) selected @endif>{{ $category['title'] }}</option>
                @endforeach
            </select>
        </div>

        <button class="form-control-submit-button" type="submit">Поиск</button>

    </form>
</div>