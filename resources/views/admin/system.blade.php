@extends('components.admin_base')

@section('title',"Админ Системный")

@section('content')

    <div class="container mt-5 pt-5">
        <div class="d-flex flex-column ">

            <p>Раздел администрирование сайта</p>
            <div style="height: 650px;" class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                    <div class="form-control admin-control">
                        <p>Репозиторий</p>
                        <form class="admin-control__block d-flex" method="get" action="{{route('admin.system.action', 'gitcheckout')}}">
                            <button class="btn btn-success admin-control__bth"><p>сменить ветку</p></button>
                            <select class="form-select-sm" name="branch">
                                @foreach($branchList as $branch)
                                    <option value="{{$branch}}"
                                            @if($currentBranch == $branch) selected @endif
                                    >{{$branch}}</option>
                                @endforeach
                            </select>
                        </form>
                        <div class="admin-control__block">
                           <a href="{{route('admin.system.action', 'git')}}"
                              class="admin-control__bth btn @if((session()->has('git') && session()->get('git'))) btn-success @else btn-blue @endif">git pull
                           </a>
                           <a href="{{route('admin.system.action', 'gitreset')}}"
                               class="admin-control__bth btn @if((session()->has('git') && session()->get('git'))) btn-success @else btn-blue @endif">git reset
                           </a>
                        </div>

                    </div>
                    <div class="form-control admin-control">
                        <p>Миграции</p>
                        <div>
                            <a href="{{route('admin.system.action', 'migrate')}}"
                               class="admin-control__bth btn @if((session()->has('migrate') && session()->get('migrate'))) btn-success @else btn-blue @endif">
                               <p>migrate</p>
                            </a>
                        </div>
                    </div>
                    <div class="form-control admin-control">
                        <p>Composer</p>
                        <div class="admin-control__block">
                            <a href="{{route('admin.system.action', 'composerinstall')}}"
                               class="admin-control__bth btn @if((session()->has('composerinstall') && session()->get('composerinstall'))) btn-success @else btn-blue @endif">
                               <p>composer install</p>
                            </a>
                            <a href="{{route('admin.system.action', 'composerupdate')}}"
                               class="admin-control__bth btn @if((session()->has('composerupdate') && session()->get('composerupdate'))) btn-success @else btn-blue @endif">
                               <p>composer update</p>
                            </a>
                        </div>
                    </div>
                    <div class="form-control admin-control">
                        <p>NPM</p>
                        <div class="admin-control__block">
                            <a href="{{route('admin.system.action', 'npmbuild')}}"
                               class="admin-control__bth btn @if((session()->has('npmbuild') &&
                               session()->get('npmbuild'))) btn-success @else btn-blue @endif">
                               <p>npm_build</p>
                            </a>
                            <a href="{{route('admin.system.action', 'npminstall')}}"
                               class="admin-control__bth btn @if((session()->has('npmbuild') &&
                               session()->get('npmbuild'))) btn-success @else btn-blue @endif">
                               <p>npm_install</p>
                            </a>
                        </div>
                    </div>
                    <div class="form-control admin-control">
                        <p>Бэкапы</p>
                        <div class="admin-control__block">
                            <div class="d-flex admin-control__block">
                                <a href="{{route('admin.system.action', 'mysqldump')}}"
                                   class="admin-control__bth btn @if((session()->has('mysqldump') &&
                                   session()->get('mysqldump'))) btn-success @else btn-blue @endif">
                                   <p>make dump</p>
                                </a>
                                <a href="{{Storage::url('backup/dump.sql')}}" class=" admin-control__bth btn">
                                    <p>get dump.sql</p>
                                </a>
                            </div>
                            <div class="admin-control__block">
                                <a href="{{route('admin.system.action', 'backupstorage')}}"
                                   class="admin-control__bth btn @if((session()->has('backupstorage') &&
                                   session()->get('backupstorage'))) btn-success @else btn-blue @endif">
                                   <p>backup storage</p>
                                </a>
                                <a href=" {{ Storage::url('backup/backupstorage.tar.gz')}}" class="admin-control__bth btn">
                                    <p>get backup</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="admin-control form-control d-flex justify-content-center">
                        <a href="{{route('admin.system.action', 'maintenance')}}" class="btn btn-danger">
                            @if(!app()->isDownForMaintenance())Включить @else Выключить @endif режим обслуживания
                        </a>
                    </div>
                </div>
                <div class="d-flex flex-column col-8  overflow-scroll">
                    <div class="w-100">
                        @forelse($consoleHistory as $command)
                            <div
                                class="border border-1 @if($command->status) bg-light bg-gradient @else bg-danger bg-gradient @endif">
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
