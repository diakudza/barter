<div class="card mb-4 box-shadow bg-light w-25">
    <img @if(count($ad->imageMain)) src="{{Storage::url($ad->imageMain[0]->path)}}"
    @elseif(count($ad->images)) src="{{Storage::url($ad->images[0]->path)}}"
    @else src="{{ asset('images/product/placeholder400x400.png' )}}"
    @endif
    alt="{{ $ad['title'] }}" title="{{ $ad['title'] }}"
    >

    @if ( $ad->status->title == 'archived')
    <h1 class="position-absolute start-50 top-50 opacity-50 text-danger">в архиве</h1>
    @endif

    <div class="card-body">
        <p class="card-text">{{ $ad->title }}</p>
        <p class="card-text">Город подачи: {{ $ad->city->name }}</p>
        <p class="card-text">Категория: {{ $ad->category->title }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ route('ad.show', $ad->id) }}" class="btn  btn-outline-secondary">Просмотр</a>
                <a href="{{ route('user.profile.editAd', ['ad' => $ad->id]) }}" class="btn  btn-outline-secondary">Редак.</a>
                <form action="{{ route('ad.destroy', $ad->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
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