@extends('components.admin_base')

@section('title', 'Пользователи')

@section('content')

    <section class="container mt-5 pt-5">

        <form class="formFilter form-sort__header" action="{{ route('user.index') }}" method="get">
            @csrf

            <h2>Фильтровать пользователей по:</h2>

            <div class="d-flex w-100">
                <div class="form-control d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>Статус</p>
                            <div class="form-control d-flex flex-column">
                                <div>
                                    <label for="status1">Активен</label>
                                    <input type="checkbox" name="status[]" id="status1" value="1"
                                           @if (isset($filterStatuses) && in_array(1, $filterStatuses)) checked @endif>
                                </div>
                                <div>
                                    <label for="status2">Заблокирован</label>
                                    <input type="checkbox" name="status[]" id="status2" value="2"
                                           @if (isset($filterStatuses) && in_array(2, $filterStatuses)) checked @endif>
                                </div>
                                <div>
                                    <label for="online">В сети</label>
                                    <input type="checkbox" name="online" id="online" value="1"
                                           @if (isset($online)) checked @endif>
                                </div>

                                <div class="form-control">
                                    <label for="user">Имя, e-mail</label>
                                    <input type="text" name="user" id="user"
                                           @if (isset($searchString)) value="{{ $searchString }}" @endif>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p>Роль</p>
                            <div class="form-control d-flex flex-column">
                                <div>
                                    <label for="role1">Пользователь</label>
                                    <input type="checkbox" name="role[]" id="role1" value="1"
                                           @if (isset($filterRoles) && in_array(1, $filterRoles)) checked @endif>
                                </div>
                                <div>
                                    <label for="role2">Модератор</label>
                                    <input type="checkbox" name="role[]" id="role2" value="2"
                                           @if (isset($filterRoles) && in_array(2, $filterRoles)) checked @endif>
                                </div>
                                <div>
                                    <label for="role3">Администратор</label>
                                    <input type="checkbox" name="role[]" id="role3" value="3"
                                           @if (isset($filterRoles) && in_array(3, $filterRoles)) checked @endif>
                                </div>
                                <div>
                                    <label for="role4">Разработчик</label>
                                    <input type="checkbox" name="role[]" id="role4" value="4"
                                           @if (isset($filterRoles) && in_array(4, $filterRoles)) checked @endif>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-danger admin-table__bth-change">
                                <p>Применить фильтр</p>
                            </button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary admin-table__bth-change">
                                <p>Сбросить фильтры</p>
                            </a>
                        </div>
                    </div>
        </form>

        <table class="table mt-5 w-100 table-bordered admin-table">
            <thead class="admin-table__header">
            <td>id</td>
            <td>Имя</td>
            <td>Почта</td>
            <td>Действия</td>
            <td>Статус</td>
            <td>Действие</td>
            </thead>

            @foreach ($users as $user)
                <tr @if ($user->status_id == 2) class='border-danger' @endif>
                    <td class="">{{ $user['id'] }}</td>
                    <td><a href="{{ route('user.show', $user['id']) }}"> {{ $user['name'] }}</a>
                        <span>@if($user['online']) в сети c {{$user['login_time']}}
                            @else Был в сети {{$user['logout_time']}} @endif
                        </span>
                    </td>
                    <td> {{ $user['email'] }} </td>
                    <td>
                        <form class="form-group admin-table__column" action="{{ route('user.update', $user['id']) }}"
                              method="post">
                            @csrf
                            @method('PUT')
                            <select name="role_id" class="form-select">
                                @foreach ($roles as $role)
                                    <option value="{{ $role['id'] }}"
                                            @if ($user->role_id == $role['id']) selected @endif>
                                        {{ $role['role'] }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success bthChange admin-table__bth-change" type="submit">
                                <p>Изменить</p>
                                <svg class="svgAdmin" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                     version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 24 24"
                                     style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                        <path xmlns="http://www.w3.org/2000/svg"
                                              d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414A3.194,3.194,0,0,0,18.656.93Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0A1.123,1.123,0,0,1,21.656,3.93Z"
                                              fill="#e5e9ec" data-original="#000000"/>
                                        <path xmlns="http://www.w3.org/2000/svg"
                                              d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,0,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z"
                                              fill="#e5e9ec" data-original="#000000"/>
                                    </g>
                                </svg>
                            </button>
                        </form>
                    </td>

                    <td>
                        <form class="form-group admin-table__column" action="{{ route('user.update', $user['id']) }}"
                              method="post">
                            @csrf
                            @method('PUT')
                            <select name="status_id" class="form-select">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status['id'] }}"
                                            @if ($user->status_id == $status['id']) selected @endif>
                                        {{ $status['status'] }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success bthChange admin-table__bth-change" type="submit">
                                <p>Изменить</p>
                                <svg class="svgAdmin" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                     version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 24 24"
                                     style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                        <path xmlns="http://www.w3.org/2000/svg"
                                              d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414A3.194,3.194,0,0,0,18.656.93Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0A1.123,1.123,0,0,1,21.656,3.93Z"
                                              fill="#e5e9ec" data-original="#000000"/>
                                        <path xmlns="http://www.w3.org/2000/svg"
                                              d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,0,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z"
                                              fill="#e5e9ec" data-original="#000000"/>
                                    </g>
                                </svg>
                            </button>
                        </form>
                    </td>

                    <td class="admin-table__column-del d-flex flex-row">
                        <form action="{{ route('user.destroy', $user['id']) }}" method="post">
                            @method('DELETE')
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
            {!! $users->links() !!}
        </div>
    </section>

@endsection
