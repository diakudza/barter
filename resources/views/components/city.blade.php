<div>

{{--    @if(session()->has('showCityChoice') && session('showCityChoice'))--}}
{{--    <div>--}}
{{--        Точно Ваш город?--}}
{{--    </div>--}}
{{--    @endif--}}

    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        {{ session('userCity') }}
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
                    <select id="regionSelect" data-token="{{csrf_token()}}">

                    </select>
                    <div id="city">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>
    regions = $.ajax({
        url: '/getregions',
        method: 'get',
        dataType: 'json',
        success: function (data) {
            let options;
            for (let item in data) {
                options += '<option value="' + data[item].id + '">' + data[item].name + '</option>';
            }
            $('#regionSelect').html($('<option value="' + options + '</option>'))
        },
        error: function (data) {
            alert('Ошибка js')
        }
    })


    $('#regionSelect').on('change', function () {
        let token = $('#regionSelect').data( "token" )
        let sessionId = $('#regionSelect').data( "session" )
        $.ajax({
                url: '/getcities',
                method: 'get',
                dataType: 'json',
                data: {region_id: this.value},
                success: function (data) {
                    let options;
                    console.log(data)
                    $('#city').html('');
                    for (let item in data) {
                        options += '<option value="' + data[item].id + '">' + data[item].name + '</option>';
                    }
                    $('#city').append($('<select name="city_id" id="selectedCity">' + options + '</select>'))

                    $('#selectedCity').on('change', function () {
                        $.ajax({
                            url: '/setcity',
                            headers: {
                                'X-CSRF-TOKEN': token
                            },
                            method: 'post',
                            dataType: 'json',
                            data: {
                                city_id: this.value,
                            },
                            success: function (data) {
                                // alert(data)
                            },
                            error: function (data) {
                                alert('Ошибка js')
                            }
                        })
                    })
                }
            }
        )
    })
</script>
