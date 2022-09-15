@extends('components.admin_base')

@section('title',"Роли")

@section('content')

<div class="container mt-5 pt-5">
    <form action=" {{route('role.store')}}" class="form-group w-50 d-flex addCategory" method="post">
        @csrf
        <input type="text" class="form-control" name="role" placeholder="Добавьте новую роль">
        <button type="submit" class="btn btn-success bthChange">
            <p>Добавить</p>
            <svg class="svgAdmin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="M7,0H4A4,4,0,0,0,0,4V7a4,4,0,0,0,4,4H7a4,4,0,0,0,4-4V4A4,4,0,0,0,7,0ZM9,7A2,2,0,0,1,7,9H4A2,2,0,0,1,2,7V4A2,2,0,0,1,4,2H7A2,2,0,0,1,9,4Z" fill="#ffffff" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M7,13H4a4,4,0,0,0-4,4v3a4,4,0,0,0,4,4H7a4,4,0,0,0,4-4V17A4,4,0,0,0,7,13Zm2,7a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V17a2,2,0,0,1,2-2H7a2,2,0,0,1,2,2Z" fill="#ffffff" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M20,13H17a4,4,0,0,0-4,4v3a4,4,0,0,0,4,4h3a4,4,0,0,0,4-4V17A4,4,0,0,0,20,13Zm2,7a2,2,0,0,1-2,2H17a2,2,0,0,1-2-2V17a2,2,0,0,1,2-2h3a2,2,0,0,1,2,2Z" fill="#ffffff" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M14,7h3v3a1,1,0,0,0,2,0V7h3a1,1,0,0,0,0-2H19V2a1,1,0,0,0-2,0V5H14a1,1,0,0,0,0,2Z" fill="#ffffff" data-original="#000000"/></g>
            </svg>
        </button>
    </form>

    <table class="table mt-5 w-100 table-bordered">
        <thead class="tableHeader">
            <td>id</td>
            <td>Тип</td>
            <td>Тип доступа(в разработке)</td>
            <td>Колличество пользователей</td>
            <td>Действие</td>
        </thead>
        @foreach( $roles as $role)
        <tr>
            <td class="">{{ $role['id'] }}</td>
            <td><a href="{{ route('role.index', 'role_id='. $role['id']) }}">{{ $role['role'] }} </a></td>
            <td> {{ $role['access_type'] }} </td>
            <td> {{ $role->getUsersCount() }} </td>
            <td class="tdDel">
                <form action="{{ route('role.destroy', $role['id']) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <Button class="btn btn-danger bthDel">
                        <svg class="svgAdmin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="M21,4H17.9A5.009,5.009,0,0,0,13,0H11A5.009,5.009,0,0,0,6.1,4H3A1,1,0,0,0,3,6H4V19a5.006,5.006,0,0,0,5,5h6a5.006,5.006,0,0,0,5-5V6h1a1,1,0,0,0,0-2ZM11,2h2a3.006,3.006,0,0,1,2.829,2H8.171A3.006,3.006,0,0,1,11,2Zm7,17a3,3,0,0,1-3,3H9a3,3,0,0,1-3-3V6H18Z" fill="#f9fcff" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18Z" fill="#f9fcff" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M14,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" fill="#f9fcff" data-original="#000000"/></g></svg>
                    </Button>
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
