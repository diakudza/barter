<div class="border d-flex mb-4 bg-light" style="height: 50px;">
{{--    <?php dd($ad)?>--}}
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


{{--"id" => 60--}}
{{--"title" => "Слушаю, сударыня!."--}}
{{--"user_id" => 2950--}}
{{--"text" => "Вы врете! я и казенные подряды тоже веду… — Здесь — Ноздрев, подходя к — нему, старуха. — Ничего. Эх, брат, как я вижу, вы не хотите закусить? — сказала хозяйка ▶"--}}
{{--"category_id" => 4--}}
{{--"city_id" => 24--}}
{{--"barter_type" => "barter"--}}
{{--"cost" => 0--}}
{{--"created_at" => "2022-08-03 16:07:38"--}}
{{--"updated_at" => "2022-09-04 22:33:24"--}}
{{--"status_id" => 1--}}
{{--"blocked_message" => null--}}
{{--"show_count" => 24--}}
