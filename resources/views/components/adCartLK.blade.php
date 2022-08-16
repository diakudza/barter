
    <div class="card mb-4 box-shadow bg-light w-25">
        <img class="card-img-top"
             d style="height: 225px; width: 100%; display: block;"
             src="@if (count($ad->imageMain)) {{ Storage::url($ad->imageMain[0]->path) }}
             @else {{ Storage::url('images/clean.webp') }} @endif"
             data-holder-rendered="true">
        @if ( $ad->status->title == 'archived')
            <h1 class="position-absolute start-50 top-50 opacity-50 text-danger">в архиве</h1>
        @endif
        <div class="card-body">
            <p class="card-text">{{ $ad->title }}</p>
            <p class="card-text">Город подачи: {{ $ad->city->name }}</p>
            <p class="card-text">Категория: {{ $ad->category->title }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group ">
                    <a href="{{ route('ad.show', $ad->id) }}"
                       class="btn btn-sm btn-outline-secondary">Просмотреть</a>
                    <a href="{{ route('user.profile.editAd', ['ad' => $ad->id]) }}"
                       class="btn btn-sm btn-outline-secondary">Изменить</a>
                </div>
            </div>
            <div class="d-flex flex-column ">
                <small class="text-muted">Статус: {{ $ad->status->description }}</small>
                <small class="text-muted">Просмотрели: {{ $ad->show_count }}</small>
                <small class="text-muted">Добавили в
                    избранное: {{ count($ad->favoriteUsers) }}</small>
                <small class="text-muted">Откликнулись: {{ count($ad->usersWished) }}</small>
            </div>
        </div>
    </div>

