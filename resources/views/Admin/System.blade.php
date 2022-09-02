@extends('components.admin_base')

@section('title',"Админ Системный")

@section('content')

<div class="container mt-5 pt-5">
    <div class="d-flex flex-column">
        <p>Раздел администрирование сайта</p>
        <div>
            <form action="{{route('admin.system.git')}}" method="post">
                @csrf
                <button class="btn btn-success">git pull</button>
            </form>
        </div>
    </div>

</div>

@endsection
