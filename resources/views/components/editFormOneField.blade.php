<div class="container mt-5">
    <form class="form-group d-flex " action="{{$route}}" @if ($method !== 'GET') method="POST" @endif">
    @if ($method !== 'GET' || !isset($method) )
        @csrf
    @endif
    @if (isset($method) && $method !== 'GET')
        @method($method)
    @endif
    <input class="form-control" type="text" name="{{ $name }}" value="{{ $value }}">
    <button class="btn btn-danger" type="submit">Обновить</button>
    </form>
</div>
