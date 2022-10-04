@if($ad->images()->count() <= 1)

    @if($ad->images->count())
        <img data-fancybox="product-card" class="product-card__img" src="{{ Storage::url($ad->images[0]->path) }}"
             alt="{{$ad->title}}">
    @else
        <img data-fancybox="product-card" class="product-card__img" src="https://via.placeholder.com/500x500.png"
             alt="{{$ad->title}}">
    @endif

@elseif($ad->images()->count() > 1)
    <div class="product-card__slider">
        <div id="mainCarousel" class="carousel">
            @foreach($ad->images as $image)

                <div class="carousel__slide" data-src="{{ Storage::url($image->path) }}" data-fancybox="product-card">
                    <img src="{{ Storage::url($image->path) }}" alt="{{$ad->title}}"/>
                </div>

            @endforeach
        </div>

        <div id="thumbCarousel" class="carousel">

            @foreach($ad->images as $image)

                <div class="carousel__slide">
                    <img class="panzoom__content" src="{{ Storage::url($image->path) }}" alt="{{$ad->title}}"/>
                </div>

            @endforeach

        </div>
    </div>
@endif
