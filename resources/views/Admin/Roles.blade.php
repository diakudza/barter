@extends('components.admin_base')

@section('title',"Категории")

@section('content')

    <div class="container mt-5 pt-5">

        <table class="table mt-5 w-100 table-bordered">
            <thead>
            <td>id</td>
            <td>Тип</td>
            <td>Тип доступа(в разработке)</td>
            <td>Сколько пользоватей</td>
            </thead>
            @foreach( $roles as $role)
                <tr>
                    <td class="">{{ $role['id'] }}</td>
                    <td><a href="{{ route('role.index', 'role_id='. $role['id']) }}">{{ $role['role'] }} </a></td>
                    <td> {{ $role['access_type'] }} </td>
                    <td> {{ $role->getUsersCount() }} </td>
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
