@extends('components.admin_base')

@section('title', 'Объявления')

@section('content')

    <div class="container mt-5 pt-5">
        <form action="{{ route('adIndex') }}" method="get">
            @csrf
            <p>Фильтровать сообщения по:</p>
            <p>Статус</p>
            <div class="form-control d-flex flex-column">
                <div>
                    <label for="status1">Активно</label>
                    <input type="checkbox" name="status[]" id="status1" value="1"
                        @if (isset($filterStatuses) && in_array(1, $filterStatuses)) checked @endif>
                </div>
                <div>
                    <label for="status2">Заблокировано</label>
                    <input type="checkbox" name="status[]" id="status2" value="2"
                        @if (isset($filterStatuses) && in_array(2, $filterStatuses)) checked @endif>
                </div>
                <div>
                    <label for="status3">Удалено</label>
                    <input type="checkbox" name="status[]" id="status3" value="3"
                        @if (isset($filterStatuses) && in_array(3, $filterStatuses)) checked @endif>
                </div>
                <div>
                    <label for="status4">В архиве</label>
                    <input type="checkbox" name="status[]" id="status4" value="4"
                        @if (isset($filterStatuses) && in_array(4, $filterStatuses)) checked @endif>
                </div>
                <div>
                    <label for="status5">На модерации</label>
                    <input type="checkbox" name="status[]" id="status5" value="5"
                        @if (isset($filterStatuses) && in_array(5, $filterStatuses)) checked @endif>
                </div>
            </div>
            <div class="form-control">
                <label for="author">Автору (Имя, e-mail)</label>
                <input type="text" name="author" id="author"
                    @if (isset($searchString)) value="{{ $searchString }}" @endif>>
            </div>
            <button type="submit" class="btn btn-danger">Применить фильтр</button>
            <p>Сортировать по:</p>
            <label for="sortByDate">Дате</label>
            <select name="sort_by_date" id="sortByDate">
                <option value="desc"
                    @if (isset($sortByDate) && $sortByDate == 'desc') selected
                @elseif(!isset($sortByDate))
                    selected @endif>
                    Сначала новые</option>
                <option value="asc" @if (isset($sortByDate) && $sortByDate == 'asc') selected @endif>Сначала старые</option>
            </select>
            <div>
                <button type="submit" class="btn btn-danger">Отсортировать</button>
            </div>
        </form>
        <a href="{{ route('adIndex') }}" class="btn btn-secondary">Сбросить фильтры и сортировку</a>
        <table class="table mt-5 w-auto table-bordered">
            <thead>
                <td>id</td>
                <td>Заголовок</td>
                <td>Текст</td>
                <td>Автор</td>
                <td>Категория</td>
                <td>Статус</td>
                <td>Действия</td>
            </thead>
            @foreach ($ads as $ad)
                <tr>
                    <td class="">{{ $ad['id'] }}</td>
                    <td><a href="{{ route('ad.show', $ad['id']) }}"> {{ $ad['title'] }}</td>
                    <td>{{ $ad['text'] }}</td>
                    <td>{{ $ad->user->name }}</td>
                    <td>
                        <form class="form-group" action="{{ route('adUpdate', $ad['id']) }}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="category_id" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}" @if ($ad->category->id == $category['id']) selected @endif>
                                        {{ $category['title'] }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-success" type="submit">Изменить</button>
                        </form>
                    </td>
                    <td>
                        <form class="form-group" action="{{ route('adUpdate', $ad['id']) }}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="status_id" class="form-select">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status['id'] }}" @if ($ad->Status->id == $status['id']) selected @endif>
                                        {{ $status['title'] }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-success" type="submit">Изменить</button>
                        </form>

                        @if ($ad->Status->title == 'blocked')
                            <form action="{{ route('adUpdate', $ad['id']) }}" method="post">
                                @method('PUT')
                                @csrf
                                <input type="text" name="blocked_message" value="{{ $ad['blocked_message'] }}">
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

@endsection
