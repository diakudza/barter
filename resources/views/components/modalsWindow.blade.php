<div class="overlay"></div>


<div class="modal-container">
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
                    <select id="regionSelect" data-token="{{csrf_token()}}"> </select>
                    <div id="city">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


{{--    @if(Request::is('publicInfo/*'))--}}
{{--        <form style="display: none" id="form-reviews" class="form-reviews" action="{{ route('user.updateUserRating') }}"--}}
{{--              method="post">--}}
{{--            @csrf--}}
{{--            @method('put')--}}
{{--            <div class="form-control">--}}
{{--                <label for="1">1</label>--}}
{{--                <input type="radio" name="rating" id="1" value="1">--}}
{{--            </div>--}}
{{--            <div class="form-control">--}}
{{--                <label for="2">2</label>--}}
{{--                <input type="radio" name="rating" id="2" value="2">--}}
{{--            </div>--}}
{{--            <div class="form-control">--}}
{{--                <label for="3">3</label>--}}
{{--                <input type="radio" name="rating" id="3" value="3">--}}
{{--            </div>--}}
{{--            <div class="form-control">--}}
{{--                <label for="4">4</label>--}}
{{--                <input type="radio" name="rating" id="4" value="4">--}}
{{--            </div>--}}
{{--            <div class="form-control">--}}
{{--                <label for="5">5</label>--}}
{{--                <input type="radio" name="rating" id="5" value="5">--}}
{{--            </div>--}}
{{--            <label for="text">Оставьте отзыв (по желанию)</label>--}}
{{--            <div class="form-control">--}}
{{--                <textarea name="text" id="text" cols="30" rows="10"></textarea>--}}
{{--            </div>--}}
{{--            <input type="hidden" name="voted_id" value="{{ $votedId }}">--}}
{{--            <button type="submit">Поставить оценку</button>--}}
{{--            <button type="reset">Отмена</button>--}}
{{--        </form>--}}
{{--    @endif--}}

</div>

