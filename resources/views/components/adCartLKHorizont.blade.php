<div class="border d-flex mb-4 bg-light" style="height: 50px;">
    <div class="card__author-img">
        <img class="author-img"
             @if(count($ad->imageMain)) src="{{Storage::url($ad->imageMain[0]->path)}}"
             @elseif(count($ad->images)) src="{{Storage::url($ad->images[0]->path)}}"
             @else src="{{ asset('images/product/placeholder400x400.png' )}}"
             @endif title="{{ $ad['title'] }}" alt="{{ $ad['title'] }}"
        >
    </div>

    <div class="overflow-auto">
        <a href="{{ route('ad.show', $ad->id) }}">
            <p> {{ $ad->title }} </p>
        </a>
        <p> {{ $ad->status->title}} </p>
    </div>
</div>
