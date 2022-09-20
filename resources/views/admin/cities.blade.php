@extends('components.admin_base')

@section('title',"Категории")

@section('content')

    <div class="container mt-5 pt-5">
        <form action=" {{route('admin.city.store')}}" class="form-group w-100 d-flex add-category" method="post">
            @csrf
            <input type="text" class="form-control" name="name" placeholder="Имя города">
            <input type="text" class="form-control" name="city_code" placeholder="Индекс">
            <select class="form-control" name="region_id" placeholder="Регион">
                @foreach( $regions as $region)
                    <option value="{{$region->id}}">{{ $region->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success bthChange admin-table__bth-change">
                <p>Добавить город</p>
                <svg class="svgAdmin admin-table__bth-svg" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1"
                     width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512"
                     xml:space="preserve"><g>
                        <path xmlns="http://www.w3.org/2000/svg"
                              d="M7,0H4A4,4,0,0,0,0,4V7a4,4,0,0,0,4,4H7a4,4,0,0,0,4-4V4A4,4,0,0,0,7,0ZM9,7A2,2,0,0,1,7,9H4A2,2,0,0,1,2,7V4A2,2,0,0,1,4,2H7A2,2,0,0,1,9,4Z"
                              fill="#ffffff" data-original="#000000"/>
                        <path xmlns="http://www.w3.org/2000/svg"
                              d="M7,13H4a4,4,0,0,0-4,4v3a4,4,0,0,0,4,4H7a4,4,0,0,0,4-4V17A4,4,0,0,0,7,13Zm2,7a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V17a2,2,0,0,1,2-2H7a2,2,0,0,1,2,2Z"
                              fill="#ffffff" data-original="#000000"/>
                        <path xmlns="http://www.w3.org/2000/svg"
                              d="M20,13H17a4,4,0,0,0-4,4v3a4,4,0,0,0,4,4h3a4,4,0,0,0,4-4V17A4,4,0,0,0,20,13Zm2,7a2,2,0,0,1-2,2H17a2,2,0,0,1-2-2V17a2,2,0,0,1,2-2h3a2,2,0,0,1,2,2Z"
                              fill="#ffffff" data-original="#000000"/>
                        <path xmlns="http://www.w3.org/2000/svg"
                              d="M14,7h3v3a1,1,0,0,0,2,0V7h3a1,1,0,0,0,0-2H19V2a1,1,0,0,0-2,0V5H14a1,1,0,0,0,0,2Z"
                              fill="#ffffff" data-original="#000000"/>
                    </g>
            </svg>
            </button>
        </form>
        <table class="admin-table table mt-5 w-100 table-bordered">
            <thead class="admin-table__header">
            <td style="width: 100px;">id</td>
            <td>Имя</td>
            <td>Индекс</td>
            <td>Регион</td>
            <td>Действия</td>
            </thead>
            @foreach( $array as $city)
                <tr>
                    <td class="">{{ $city['id'] }}</td>
                    <form action="{{route('admin.city.update', $city['id'])}}" method="post">
                        @csrf @method('PUT')
                        <td><input type="text" name="name" value="{{ $city['name'] }}"/></td>
                        <td><input type="text" name="city_code" value="{{ $city['city_code'] }}"/></td>
                        <td class="admin-table__column-del d-flex flex-row">
                            <select class="form-control">
                                @foreach( $regions as $region)
                                    <option value="{{$region->id}}"
                                            @if ($city->region->id == $region->id) selected @endif>{{ $region->name}}</option>
                                @endforeach
                            </select>
                            <Button class="btn btn-success ">обновить
                            </Button>
                        </td>
                    </form>
                    <td >
                        <form action="{{ route('admin.city.update', $city['id']) }}" method="post">
                            @method('UPDATE')
                            @csrf
                            <Button class="btn btn-danger bthDel admin-table__bth-delete">
                                <svg class="admin-table__bth-svg" width="48" height="49" viewBox="0 0 48 49" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M30.1042 22.3906C30.1042 22.3906 29.6517 28.0031 29.3892 30.3673C29.2642 31.4965 28.5667 32.1581 27.4242 32.179C25.25 32.2181 23.0733 32.2206 20.9 32.1748C19.8008 32.1523 19.115 31.4823 18.9925 30.3731C18.7283 27.9881 18.2783 22.3906 18.2783 22.3906"
                                        stroke="#EF4646" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M31.2567 19.6999H17.125" stroke="#EF4646" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path
                                        d="M28.5335 19.7C27.8793 19.7 27.316 19.2375 27.1877 18.5966L26.9852 17.5833C26.8602 17.1158 26.4368 16.7925 25.9543 16.7925H22.4268C21.9443 16.7925 21.521 17.1158 21.396 17.5833L21.1935 18.5966C21.0652 19.2375 20.5018 19.7 19.8477 19.7"
                                        stroke="#EF4646" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <rect x="1" y="1.5" width="46" height="46" rx="23" stroke="#EF4646"
                                          stroke-width="2"/>
                                </svg>
                            </Button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
        <div class="d-flex">
            {!! $array->links() !!}
        </div>
    </div>

@endsection
