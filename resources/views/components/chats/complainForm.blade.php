<form action="{{ $route }}" method="post">
    @csrf
    <input type="hidden" name="{{ $inputName }}" value={{ $inputValue }}>
    <div class="form-control">
        <label for="textarea">Введите текст обращения</label>
        <textarea name="text" id="textarea" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-danger">Отправить</button>
</form>
