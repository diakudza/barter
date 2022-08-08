@extends('components.admin_base')

@section('title',"Категории")

@section('content')

    <div class="container mt-5 pt-5">

        <table class="table mt-5 w-100 table-bordered">
            <thead>
            <td>id</td>
            <td>Имя</td>
            <td>Объявлений</td>
            <td>Действия</td>

            </thead>
            @foreach( $users as $user)
                <tr>
                    <td class="">{{ $user['id'] }}</td>
                    <td><a href="{{ route('user.show', $user['id']) }}"> {{ $user['name'] }}</a> </td>
                    <td> {{ $user['email'] }} </td>
                    <td>
                        <form class="form-group" action="{{ route('user.update', $user['id'])}}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="role_id" class="form-select">
                                @foreach($roles as $role)
                                    <option value="{{ $role['id'] }}"
                                            @if($user->role_id == $role['id']) selected @endif>{{ $role['role'] }}</option>
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
