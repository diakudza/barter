@extends('components.admin_base')

@section('title',"Категории")

@section('content')

<div class="container mt-5 pt-5">
    <form action=" {{route('role.store')}}" class="form-group w-50 d-flex" method="post">
        @csrf
        <input type="text" class="form-control" name="role" placeholder="Добавьте новую роль">
        <button type="submit" class="btn btn-success">Добавить</button>
    </form>

    <table class="table mt-5 w-100 table-bordered">
        <thead>
            <td>id</td>
            <td>Тип</td>
            <td>Тип доступа(в разработке)</td>
            <td>Сколько пользоватей</td>
            <td></td>
        </thead>
        @foreach( $roles as $role)
        <tr>
            <td class="">{{ $role['id'] }}</td>
            <td><a href="{{ route('role.index', 'role_id='. $role['id']) }}">{{ $role['role'] }} </a></td>
            <td> {{ $role['access_type'] }} </td>
            <td> {{ $role->getUsersCount() }} </td>
            <td>
                <form action="{{ route('role.destroy', $role['id']) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <Button class="btn btn-danger">Удалить</Button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @if ($usersByRole )
    <table class="table mt-5 w-100 table-bordered">
        @foreach( $usersByRole as $user)
        <tr>
            <td>{{ $user['id'] }}</td>
            <td><a href="{{ route('user.show', $user['id']) }}">{{ $user['name'] }} </a></td>
            <td> {{ $user['email'] }} </td>
        </tr>
        @endforeach
    </table>
    @endif
</div>

@endsection