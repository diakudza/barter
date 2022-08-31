@extends('components.admin_base')

@section('title', 'Категории')

@section('content')

    <div class="container mt-5 pt-5">

        <form action="{{ route('user.index') }}" method="get">
            @csrf
            <p>Фильтровать пользователей по:</p>
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
            </div>
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
            <div class="form-control">
                <label for="user">Имя, e-mail</label>
                <input type="text" name="user" id="user"
                    @if (isset($searchString)) value="{{ $searchString }}" @endif>
            </div>
            <button type="submit" class="btn btn-danger">Применить фильтр</button>
        </form>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Сбросить фильтры</a>
        <table class="table mt-5 w-100 table-bordered">
            <thead>
                <td>id</td>
                <td>Имя</td>
                <td>Почта</td>
                <td>Действия</td>
                <td>статус</td>
                <td></td>

            </thead>
            @foreach ($users as $user)
                <tr @if ($user->status_id == 2) class='border-danger' @endif>
                    <td class="">{{ $user['id'] }}</td>
                    <td><a href="{{ route('user.show', $user['id']) }}"> {{ $user['name'] }}</a> </td>
                    <td> {{ $user['email'] }} </td>

                    <td>
                        <form class="form-group" action="{{ route('user.update', $user['id']) }}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="role_id" class="form-select">
                                @foreach ($roles as $role)
                                    <option value="{{ $role['id'] }}" @if ($user->role_id == $role['id']) selected @endif>
                                        {{ $role['role'] }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success" type="submit">Изменить</button>
                        </form>
                    </td>

                    <td>
                        <form class="form-group" action="{{ route('user.update', $user['id']) }}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="status_id" class="form-select">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status['id'] }}" @if ($user->status_id == $status['id']) selected @endif>
                                        {{ $status['status'] }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success" type="submit">Изменить</button>
                        </form>
                    </td>

                    <td class="d-flex flex-row">
                        <form action="{{ route('user.destroy', $user['id']) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <Button class="btn btn-danger">Удалить</Button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
        <div class="d-flex">
            {!! $users->links() !!}
        </div>
    </div>

@endsection
