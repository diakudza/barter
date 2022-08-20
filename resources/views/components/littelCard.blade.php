<div class="products-last__card card">

  <div class="card__img">

    <div class="card__btn-fav">
      <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.449 4.1281C14.449 1.83571 12.8818 0.916748 10.6253 0.916748H5.32622C3.13909 0.916748 1.5 1.77305 1.5 3.97522V16.245C1.5 16.8499 2.15079 17.2308 2.67794 16.9351L7.99623 13.9518L13.2686 16.9301C13.7965 17.2275 14.449 16.8465 14.449 16.2409V4.1281Z" stroke="#23262F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M4.89258 6.52342H10.9911" stroke="#23262F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
      </svg>

    </div>

    @if(count($item->imageMain))

    <img src="{{Storage::url($item->imageMain[0]->path)}}" alt="{{ $item['title'] }}" title="{{ $item['title'] }}">

    @elseif(count($item->images))
    <img src="{{Storage::url($item->images->path)}}" alt="{{ $item['title'] }}" title="{{ $item['title'] }}">

    @else

    <img src="{{ asset('images/product/placeholder400x400.png' )}}" alt="{{ $item['title'] }}" title="{{ $item['title'] }}">

    @endif
  </div>

  <div class="card__body">

    <div class="card__body-top">
      <a class="card__link" href="{{ route('ad.show', $item['id']) }}">
        <h4 class="card__title">{{ $item['title']  }}</h4>
      </a>

      <div class="card__location">
        <svg class="card__location-icon" width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.08332 7.7505C9.08332 6.59944 8.15063 5.66675 7.00041 5.66675C5.84935 5.66675 4.91666 6.59944 4.91666 7.7505C4.91666 8.90072 5.84935 9.83341 7.00041 9.83341C8.15063 9.83341 9.08332 8.90072 9.08332 7.7505Z" stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
          <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99959 16.5C6.00086 16.5 0.75 12.2486 0.75 7.80274C0.75 4.3222 3.54758 1.5 6.99959 1.5C10.4516 1.5 13.25 4.3222 13.25 7.80274C13.25 12.2486 7.99832 16.5 6.99959 16.5Z" stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <p class="card__location-text">{{ $item->city->name  }}</p>
      </div>
    </div>

    <div class="card__body-bottom">
      <div class="card__author">
        <div class="card__author-img">

          <img class="author-img" @if(count($item->imageMain)) src="{{Storage::url($item->imageMain[0]->path)}}"
          @elseif(count($item->images))
          src="{{Storage::url($item->images->path)}}"
          @else
          src="https://via.placeholder.com/40x40"
          @endif alt="{{ $item->user->name }}" title="{{ $item->user->name }}">
        </div>

        <p class="card__author-name">{{ $item->user->name }}</p>
      </div>

      <div class="card__add">
        <p class="card__add-text">Опубликовано:</p>
        <p class="card__add-time">{{ $item['created_at']  }}</p>
      </div>
    </div>

  </div>

</div>