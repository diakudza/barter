<div>
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Ваш город - {{$userCity}}
    </button>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                                        <div class="overflow-scroll">
                                            @foreach($cities as $city)
                                                <div id="{{$city->id}}"> {{$city->name}}</div>
                                            @endforeach
                                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>



    @if(session()->has('showCityChoice') && session('showCityChoice')))
    <div>
        Точно Ваш город?
    </div>
    @endif
</div>
