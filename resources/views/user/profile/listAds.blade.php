@extends('components.base')

@section('title', 'Просмотеть мои объявления')

@section('content')

    <div class="container">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Мои объявления</h1>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @forelse ($ads as $ad)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                    data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                    alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                                    src="{{ Storage::url($ad->image) }}" data-holder-rendered="true">
                                <div class="card-body">
                                    <p class="card-text">{{ $ad->title }}</p>
                                    <p class="card-text">Город подачи: {{ $ad->city }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div>
                                        <small class="text-muted">Статус: </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3>Вы пока не разместили ни одного объявления</h3>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
