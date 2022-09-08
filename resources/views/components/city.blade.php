<div>
    <div> {{$userCity}} </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div>
        @foreach($cities as $city)
            <div id="{{$city->id}}"> {{$city->name}}</div>
        @endforeach
        </div>
    </div>

    @if(session()->has('showCityChoice') && session('showCityChoice')))
    <div>
        Точно Ваш город?
    </div>
    @endif
</div>
