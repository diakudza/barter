<div class="addToFav">
    @if (!$userFavorite)
    <form action="{{ route('favorite.store', ['ad_id' => $ad['id']]) }}" method="post">
        @method('POST')
        @csrf
        <button class="contactsButton btn btn-success">
            <svg style="margin-right: 10.84px" width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.159 3.10235C11.159 1.26844 9.90523 0.533264 8.10006 0.533264H3.86079C2.11108 0.533264 0.799805 1.21831 0.799805 2.98005V12.7959C0.799805 13.2798 1.32044 13.5846 1.74216 13.348L5.9968 10.9613L10.2147 13.344C10.6371 13.5819 11.159 13.2771 11.159 12.7926V3.10235Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M3.51367 5.01862H8.39254" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p>Добавить в избранное</p>
        </button>
    </form>
    @else
    <form action="{{ route('favorite.destroy', $ad->id) }}" method="post">
        @method('DELETE')
        @csrf
        <input type="hidden" name="ad_id" value="{{ $ad->id }}" />

        <button class="contactsButton btn btn-danger">
            <svg style="margin-right: 10.84px" width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.159 3.10235C11.159 1.26844 9.90523 0.533264 8.10006 0.533264H3.86079C2.11108 0.533264 0.799805 1.21831 0.799805 2.98005V12.7959C0.799805 13.2798 1.32044 13.5846 1.74216 13.348L5.9968 10.9613L10.2147 13.344C10.6371 13.5819 11.159 13.2771 11.159 12.7926V3.10235Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M3.51367 5.01862H8.39254" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p>Убрать из избранного</p>
        </button>
    </form>
    @endif

    @if (!$userWishes)
    <form action="{{ route('wishlist.store', ['ad_id' => $ad['id']]) }}" method="post">
        @method('POST')
        @csrf
        <button class="contactsButton btn btn-danger">
            <svg style="margin-right: 10.84px" width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.159 3.10235C11.159 1.26844 9.90523 0.533264 8.10006 0.533264H3.86079C2.11108 0.533264 0.799805 1.21831 0.799805 2.98005V12.7959C0.799805 13.2798 1.32044 13.5846 1.74216 13.348L5.9968 10.9613L10.2147 13.344C10.6371 13.5819 11.159 13.2771 11.159 12.7926V3.10235Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M3.51367 5.01862H8.39254" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p>Хочу это</p>
        </button>
    </form>
    @else
    <form action="{{ route('wishlist.destroy', $ad['id']) }}" method="post">
        @method('DELETE')
        @csrf
        <button class="contactsButton btn btn-danger">
            <svg style="margin-right: 10.84px" width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.159 3.10235C11.159 1.26844 9.90523 0.533264 8.10006 0.533264H3.86079C2.11108 0.533264 0.799805 1.21831 0.799805 2.98005V12.7959C0.799805 13.2798 1.32044 13.5846 1.74216 13.348L5.9968 10.9613L10.2147 13.344C10.6371 13.5819 11.159 13.2771 11.159 12.7926V3.10235Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M3.51367 5.01862H8.39254" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p>Отказаться</p>
        </button>
    </form>
    @endif
</div>