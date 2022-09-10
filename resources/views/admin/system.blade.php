@extends('components.admin_base')

@section('title',"Админ Системный")

@section('content')

    <div class="container mt-5 pt-5">
        <div class="d-flex flex-column ">

            <p>Раздел администрирование сайта</p>
            <div style="height: 650px;" class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                    <div class="form-control">
                        <p>репозиторий</p>
                        <form class="d-flex" method="get" action="{{route('admin.system.action', 'gitcheckout')}}">
                            <button class="btn btn-success">сменить ветку</button>
                            <select class="form-select-sm" name="branch">
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
                        <a href="{{route('admin.system.action', 'gitreset')}}"
                           class="btn @if((session()->has('git') && session()->get('git'))) btn-success @else btn-blue @endif">git
                            reset</a>
                    </div>
                    <div class="form-control">
                        <p>Миграции</p>
                        <div>
                        <a href="{{route('admin.system.action', 'migrate')}}"
                           class="btn @if((session()->has('migrate') && session()->get('migrate'))) btn-success @else btn-blue @endif">migrate</a>
                        </div>
                    </div>
                    <div class="form-control">
                        <p>Composer</p>
                        <div>
                            <a href="{{route('admin.system.action', 'composerinstall')}}"
                               class="btn @if((session()->has('composerinstall') && session()->get('composerinstall'))) btn-success @else btn-blue @endif">composer
                                install</a>
                            <a href="{{route('admin.system.action', 'composerupdate')}}"
                               class="btn @if((session()->has('composerupdate') && session()->get('composerupdate'))) btn-success @else btn-blue @endif">composer
                                update</a>
                        </div>
                    </div>
                    <div class="form-control">
                        <p>NPM</p>
                        <div>
                            <a href="{{route('admin.system.action', 'npmbuild')}}"
                               class="btn @if((session()->has('npmbuild') &&
                            session()->get('npmbuild'))) btn-success @else btn-blue @endif">npm_build</a>
                            <a href="{{route('admin.system.action', 'npminstall')}}"
                               class="btn @if((session()->has('npmbuild') &&
                            session()->get('npmbuild'))) btn-success @else btn-blue @endif">npm_install</a>
                        </div>
                    </div>
                    <div class="form-control d-flex justify-content-center">
                        <a href="{{route('admin.system.action', 'maintenance')}}" class="btn btn-danger">
                            @if(!app()->isDownForMaintenance())Включить @else Выключить @endif режим
                            обслуживания</a>
                    </div>
                </div>
                <div class="d-flex flex-column col-8  overflow-scroll">
                    <div class="w-100" >
                        @forelse($consoleHistory as $command)
                            <div class="border border-1 @if($command->status) bg-light bg-gradient @else bg-danger bg-gradient @endif">
                                <p>{{$command->created_at}} </p>
                                <p>{{$command->user->name}}$ {{$command->command}}</p>
                                <p>{{$command->output}}</p>
                            </div>
                        @empty
                            <div>
                                <p>Команды не выполнялись!</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
