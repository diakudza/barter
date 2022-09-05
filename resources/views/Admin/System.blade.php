@extends('components.admin_base')

@section('title',"Админ Системный")

@section('content')

    <div class="container mt-5 pt-5">
        <div class="d-flex flex-column">
            <p>Раздел администрирование сайта</p>
            <div>

                <a href="{{route('admin.system.action', 'git')}}"
                   class="btn @if((session()->has('gitpull') && session()->get('gitpull'))) btn-success @else btn-blue @endif">git pull</a>
                <a href="{{route('admin.system.action', 'migrate')}}"
                   class="btn @if((session()->has('migrate') && session()->get('migrate'))) btn-success @else btn-blue @endif">migrate</a>
                <a href="{{route('admin.system.action', 'composer')}}"
                   class="btn @if((session()->has('composer') && session()->get('composer'))) btn-success @else btn-blue @endif">composer</a>
                <a href="{{route('admin.system.action', 'npmbuild')}}"
                   class="btn @if((session()->has('npmbuild') && session()->get('npmbuild'))) btn-success @else btn-blue @endif">npm_build</a>
            </div>
        </div>

    </div>

@endsection
