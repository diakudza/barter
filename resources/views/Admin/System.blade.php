@extends('components.admin_base')

@section('title',"Админ Системный")

@section('content')

    <div class="container mt-5 pt-5">
        <div class="d-flex flex-column ">
            <p>Раздел администрирование сайта</p>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                    <div class="form-control">
                        <p>репозиторий</p>

                    <form class="d-flex" method="get" action="{{route('admin.system.action', 'gitcheckout')}}">
                        <button class="btn btn-success">сменить ветку</button>
                        <select class="form-select" name="branch">
                            @foreach($branchList as $branch)
                                <option value="{{$branch}}"
                                        @if($currentBranch == $branch) selected @endif
                                >{{$branch}}</option>
                            @endforeach
                        </select>
                    </form>
                        <a href="{{route('admin.system.action', 'git')}}"
                           class="btn @if((session()->has('git') && session()->get('git'))) btn-success @else btn-blue @endif">git
                            pull</a>
                    </div>
                    <a href="{{route('admin.system.action', 'migrate')}}"
                       class="btn @if((session()->has('migrate') && session()->get('migrate'))) btn-success @else btn-blue @endif">migrate</a>
                    <a href="{{route('admin.system.action', 'composer')}}"
                       class="btn @if((session()->has('composer') && session()->get('composer'))) btn-success @else btn-blue @endif">composer</a>
                    <a href="{{route('admin.system.action', 'npmbuild')}}"
                       class="btn @if((session()->has('npmbuild') && session()->get('npmbuild'))) btn-success @else btn-blue @endif">npm_build</a>
                </div>
                <div class="d-flex flex-column">
                    <a href="{{route('admin.system.action', 'maintenance')}}" class="btn btn-danger">
                        @if(!app()->isDownForMaintenance())Включить @else Выключить @endif режим
                        обслуживания</a>

                </div>
            </div>
        </div>

    </div>

@endsection