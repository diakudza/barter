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
                <option value="" selected>город не выбран</option>
                @foreach($cities as $city)
                <option value="{{ $city['id'] }}" @if(isset($city_selected) && $city_selected==$city['id']) selected @endif>{{ $city['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between ">
            <div class="form-group w-50">
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
        </div>
    </form>
</div>