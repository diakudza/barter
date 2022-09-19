<form class="get-support__form change-form" id="get-support__form" action="{{ $route }}" method="post">
    @csrf
    <input type="hidden" name="{{ $inputName }}" value={{ $inputValue }}>
    <div class="get-support__wrapper change-item__item">
        <label class="get-support__title label change-item__label" for="textarea">Введите текст обращения</label>
        <textarea class="get-support__textarea change-item__input input input__textarea" name="text" id="textarea"
                  cols="30" rows="10" placeholder="Напишите ваше обращение"></textarea>
    </div>
    <button type="submit" class="get-support__button btn btn-reset btn-black">Отправить</button>
</form>
