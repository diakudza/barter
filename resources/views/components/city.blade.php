<div>

    {{--    @if(session()->has('showCityChoice') && session('showCityChoice'))--}}
    {{--    <div>--}}
    {{--        Точно Ваш город?--}}
    {{--    </div>--}}
    {{--    @endif--}}

    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        {{ session('userCity') }}
    </button>


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
        let token = $('#regionSelect').data("token")
        let sessionId = $('#regionSelect').data("session")
        $.ajax({
                url: '/getcities',
                method: 'get',
                dataType: 'json',
                data: {region_id: this.value},
                success: function (data) {
                    let options;
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
