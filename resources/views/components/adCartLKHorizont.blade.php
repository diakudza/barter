<div class="border row mb-4 bg-light" style="height: 70px;">
    <img class="col-3" style="height: 100%"
         src="@if (count($ad->imageMain)) {{ Storage::url($ad->imageMain[0]->path) }}
         @else {{ Storage::url('images/clean.webp') }} @endif">
    <div class="col-9">
        <a href="{{ route('ad.show', $ad->id) }}"><p> {{ $ad->title }} </p></a>
        <p> {{ $ad->status->title}} </p>
    </div>
</div>

