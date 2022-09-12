<div>
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Ваш город - {{$userCity}}
    </button>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Выберите ваш город</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    Регион:
                    <select id="regionSelect">
                        @foreach($regions as $region)
                            <option value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    </select>
                    <div id="city">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>

    $('#regionSelect').on('change', function () {
        $.ajax({
                url: '/api/getcities',
                method: 'post',
                dataType: 'json',
                data: {region: this.value},
                success: function (data) {
                    let options;
                    $('#city').html('');
                    for (var item in data) {
                        options += '<option value="data[item]">' + item + '</option>';
                    }
                    $('#city').append($('<select name="city_id" id="selectedCity">' + options + '</select>'))

                    $('#selectedCity').on('change', function () {
                        $.ajax({
                            url: '/api/setcity',
                            method: 'post',
                            dataType: 'json',
                            data: {city: this.value},
                            success: function (data) {

                            }
                        })
                    })
                }
            }
        )
    })


</script>
