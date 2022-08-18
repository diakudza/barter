<a href="{{ route('ad.show', $item['id']) }}" class="adcart_link">
    <div class="d-flex flex-column adcart">

        @if(count($item->imageMain))
        <div class="productViewBig">
            <img src="{{ Storage::url($item->imageMain[0]->path) }}" height="100" alt="image">
        </div>
        @else
        <p>нет фото</p>
        @endif
        <div> {{ $item['title'] }}</div>
        <div class="overflow-hidden ">{{ $item['text'] }}</div>
        <div>Категория: {{ $item->category->title }}</div>
        <div>
            @if ($item->status_id == 4)
            <p>в архиве</p>
            @endif
        </div>
    </div>
</a>