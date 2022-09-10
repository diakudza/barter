{{--@extends('components.admin_base')--}}

{{--@section('title', 'Объявления')--}}

@section('content')

    <div class="container mt-5 pt-5">
        <div class="row">
            <form action="{{ route('adIndex') }}" method="get" class="col-9">
                @csrf
                <div class="d-flex justify-content-between form-control formSort">
                    <div class="form-control formBlock">
                        <div class="d-flex flex-column justify-content-between">
                            <p>Фильтровать сообщения по:</p>
                            <p>Статус</p>
                            <div class="d-flex flex-column">
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
                            <div class="">
                                <label for="author">Автору (Имя, e-mail)</label>
                                <input class="formChange" type="text" name="author" id="author"
                                       @if (isset($searchString)) value="{{ $searchString }}" @endif>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger bthChange">
                        <p>Применить фильтр</p>
                        </button>
                    </div>
                    <div class="form-control d-flex flex-column justify-content-between formBlock">
                        <div>
                            <p>Сортировать по:</p>
                            <label for="sortByDate">Дате</label>
                            <select class="formChange" name="sort_by_date" id="sortByDate">
                                <option value="desc"
                                        @if (isset($sortByDate) && $sortByDate == 'desc') selected
                                        @elseif(!isset($sortByDate))
                                        selected @endif>
                                    Сначала новые</option>
                                <option value="asc" @if (isset($sortByDate) && $sortByDate == 'asc') selected @endif>Сначала старые</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-danger bthChange">
                            <p>Отсортировать</p>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-3">
                <a href="{{ route('adIndex') }}" class="btn btn-secondary bthReset">
                <p>Сбросить фильтры и сортировку</p>
                </a>
            </div>

        </div>

        <table class="table mt-5 w-auto table-bordered">
            <thead class="tableHeader">
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
                    <td><a href="{{ route('ad.show', $ad['id']) }}"> {{ $ad['title'] }}
                            @if(count($ad->imageMain))
                                <div class="productViewBig">
                                    <img src="{{ Storage::url($ad->imageMain[0]->path) }}" height="50" alt="image">
                                </div>
                        @endif
                    </td>
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
                            <button class="btn btn-success bthChange" type="submit">
                                <p>Изменить</p>
                                <svg class="svgAdmin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414A3.194,3.194,0,0,0,18.656.93Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0A1.123,1.123,0,0,1,21.656,3.93Z" fill="#e5e9ec" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,0,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z" fill="#e5e9ec" data-original="#000000"/></g>
                        </svg>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form class="form-group formColumn" action="{{ route('adUpdate', $ad['id']) }}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="status_id" class="form-select">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status['id'] }}" @if ($ad->Status->id == $status['id']) selected @endif>
                                        {{ $status['title'] }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-success bthChange" type="submit">
                                <p>Изменить</p>
                                <svg class="svgAdmin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414A3.194,3.194,0,0,0,18.656.93Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0A1.123,1.123,0,0,1,21.656,3.93Z" fill="#e5e9ec" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,0,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z" fill="#e5e9ec" data-original="#000000"/></g>
                                </svg>
                            </button>
                        </form>

                        @if ($ad->Status->title == 'blocked')
                            <form class="formColumn" action="{{ route('adUpdate', $ad['id']) }}" method="post">
                                @method('PUT')
                                @csrf
                                <input class="formChange" type="text" name="blocked_message" value="{{ $ad['blocked_message'] }}">
                                <Button class="btn btn-danger bthChange">
                                   <p>Обновить</p>
                                    <svg class="svgAdmin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 465.822 465.822" style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.988,289.981l88.875,88.875c24.992,24.984,65.504,24.984,90.496,0l274.475-274.475c8.185-8.475,7.95-21.98-0.525-30.165   c-8.267-7.985-21.374-7.985-29.641,0L155.194,348.691c-8.331,8.328-21.835,8.328-30.165,0l-88.875-88.875   c-8.475-8.185-21.98-7.95-30.165,0.525C-1.996,268.608-1.996,281.714,5.988,289.981L5.988,289.981z" fill="#ffffff" data-original="#000000"/></g></g>
                                    </svg>
                                </Button>
                            </form>
                        @endif
                    </td>
                    <td class="d-flex flex-row">
                        <form action="{{ route('adDestroy', $ad['id']) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <Button class="btn btn-danger bthDel">
                                <svg class="svgAdmin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="M21,4H17.9A5.009,5.009,0,0,0,13,0H11A5.009,5.009,0,0,0,6.1,4H3A1,1,0,0,0,3,6H4V19a5.006,5.006,0,0,0,5,5h6a5.006,5.006,0,0,0,5-5V6h1a1,1,0,0,0,0-2ZM11,2h2a3.006,3.006,0,0,1,2.829,2H8.171A3.006,3.006,0,0,1,11,2Zm7,17a3,3,0,0,1-3,3H9a3,3,0,0,1-3-3V6H18Z" fill="#f9fcff" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18Z" fill="#f9fcff" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M14,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" fill="#f9fcff" data-original="#000000"/></g></svg>
                            </Button>
                        </form>
                        <a href="{{ route('user.profile.editAd', ['ad' => $ad->id , 'fromadmin' => 1]) }}" class="btn  btn-outline-secondary">Редак.</a>
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $ads->links() !!}
        </div>
    </div>

@endsection
