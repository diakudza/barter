<!--
<form class="chats__chat_write" action="{{route('chat.store')}}" method="post">
    @csrf
    @method('POST')
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <input type="hidden" name="chat_id" value="{{ $chatId }}">
    <input type="hidden" name="destination_id" value="{{$destination_id}}">
    <input type="text" class="form-control" name="text" placeholder="Введите ваше сообщение">
    <button class="btn btn-success">отправить</button>
</form>
-->

<form action="{{route('chat.store')}}" method="POST" class="chats__chat_write">
    @csrf
    @method('POST')
    <button class="chats__chat_write-attach" type="button">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.21 7.89918V16.0502C21.21 19.0702 19.32 21.2002 16.3 21.2002H7.65C4.63 21.2002 2.75 19.0702 2.75 16.0502V7.89918C2.75 4.87918 4.64 2.75018 7.65 2.75018H16.3C19.32 2.75018 21.21 4.87918 21.21 7.89918Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M5.2813 16.4309L6.8093 14.8179C7.3403 14.2549 8.2253 14.2279 8.7893 14.7579C8.8063 14.7749 9.7263 15.7099 9.7263 15.7099C10.2813 16.2749 11.1883 16.2839 11.7533 15.7299C11.7903 15.6939 14.0873 12.9079 14.0873 12.9079C14.6793 12.1889 15.7423 12.0859 16.4623 12.6789C16.5103 12.7189 18.6803 14.9459 18.6803 14.9459" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3126 9.13309C10.3126 10.1021 9.5276 10.8871 8.5586 10.8871C7.5896 10.8871 6.8046 10.1021 6.8046 9.13309C6.8046 8.16409 7.5896 7.37909 8.5586 7.37909C9.5276 7.38009 10.3126 8.16409 10.3126 9.13309Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <input type="hidden" name="chat_id" value="{{ $chatId }}">
    <input type="hidden" name="destination_id" value="{{$destination_id}}">
    <input class="chats__chat_write-input" type="text" class="form-control" name="text" placeholder="Введите ваше сообщение"/>
    <button class="chats__chat_write-send" type="submit">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.4275 2.5783C20.9275 2.0673 20.1875 1.8783 19.4975 2.0783L3.40748 6.7273C2.67948 6.9293 2.16348 7.5063 2.02448 8.2383C1.88248 8.9843 2.37848 9.9323 3.02648 10.3283L8.05748 13.4003C8.57348 13.7163 9.23948 13.6373 9.66648 13.2093L15.4275 7.4483C15.7175 7.1473 16.1975 7.1473 16.4875 7.4483C16.7775 7.7373 16.7775 8.2083 16.4875 8.5083L10.7165 14.2693C10.2885 14.6973 10.2085 15.3613 10.5235 15.8783L13.5975 20.9283C13.9575 21.5273 14.5775 21.8683 15.2575 21.8683C15.3375 21.8683 15.4275 21.8683 15.5075 21.8573C16.2875 21.7583 16.9075 21.2273 17.1375 20.4773L21.9075 4.5083C22.1175 3.8283 21.9275 3.0883 21.4275 2.5783Z" fill="#315DF7"/>
            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M3.01055 16.8078C2.81855 16.8078 2.62655 16.7348 2.48055 16.5878C2.18755 16.2948 2.18755 15.8208 2.48055 15.5278L3.84555 14.1618C4.13855 13.8698 4.61355 13.8698 4.90655 14.1618C5.19855 14.4548 5.19855 14.9298 4.90655 15.2228L3.54055 16.5878C3.39455 16.7348 3.20255 16.8078 3.01055 16.8078ZM6.77175 18.0002C6.57975 18.0002 6.38775 17.9272 6.24175 17.7802C5.94875 17.4872 5.94875 17.0132 6.24175 16.7202L7.60675 15.3542C7.89975 15.0622 8.37475 15.0622 8.66775 15.3542C8.95975 15.6472 8.95975 16.1222 8.66775 16.4152L7.30175 17.7802C7.15575 17.9272 6.96375 18.0002 6.77175 18.0002ZM7.02545 21.5682C7.17145 21.7152 7.36345 21.7882 7.55545 21.7882C7.74745 21.7882 7.93945 21.7152 8.08545 21.5682L9.45145 20.2032C9.74345 19.9102 9.74345 19.4352 9.45145 19.1422C9.15845 18.8502 8.68345 18.8502 8.39045 19.1422L7.02545 20.5082C6.73245 20.8012 6.73245 21.2752 7.02545 21.5682Z" fill="#315DF7"/>
        </svg>
    </button>
</form>
