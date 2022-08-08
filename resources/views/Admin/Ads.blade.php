@extends('components.admin_base')

@section('title',"Объявления")

@section('content')

    <div class="container mt-5 pt-5">
        <table class="table mt-5 w-auto table-bordered">
            <thead>
            <td>id</td>
            <td>Заголовок</td>
            <td>Текст</td>
            <td>Категория</td>
            <td>Статус</td>
            <td>Действия</td>
            </thead>
            @foreach( $ads as $ad)
                <tr>
                    <td class="">{{ $ad['id'] }}</td>
                    <td><a href="{{ route('ad.show', $ad['id']) }}"> {{ $ad['title'] }}</td>
                    <td>{{ $ad['text'] }}</td>
                    <td>
                        <form class="form-group" action="{{ route('adUpdate', $ad['id'])}}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="category_id" class="form-select">
                                @foreach($categories as $category)
                                    <option value="{{ $category['id'] }}"
                                            @if($ad->category->id == $category['id']) selected @endif>{{ $category['title'] }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success" type="submit">Изменить</button>
                        </form>
                    </td>
                    <td>
                        <form class="form-group" action="{{ route('adUpdate', $ad['id'])}}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-select">
                                @foreach($statuses as $status)
                                      <option value="{{ $status['id'] }}"
                                            @if($ad->Status->id == $status['id']) selected @endif>{{ $status['title'] }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success" type="submit">Изменить</button>
                        </form>

                        @if ($ad->Status->title == 'blocked')
                            <form action="{{ route('adUpdate', $ad['id']) }}" method="post">
                                @method('PUT')
                                @csrf
                                <input type="text" name="blocked_message" value="{{$ad['blocked_message']}}" >
                                <Button class="btn btn-danger">Обновить</Button>
                            </form>
                        @endif
                    </td>

                    <td class="d-flex flex-row">
                        <form action="{{ route('adDestroy', $ad['id']) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <Button class="btn btn-danger">Удалить</Button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
        <div class="d-flex">
            {!! $ads->links() !!}
        </div>
    </div>

    </div>

@endsection
