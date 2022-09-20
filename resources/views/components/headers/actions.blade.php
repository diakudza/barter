<div class="top-profile__actions actions">

    {{--Иконка чатов--}}
    <a class="actions__btn" href=" {{ route('chat.index') }}">
        <svg class="actions__icon" width="22" height="22" viewBox="0 0 22 22" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M18.0714 18.0699C15.0152 21.1264 10.4898 21.7867 6.78642 20.074C6.23971 19.8539 5.79148 19.676 5.36537 19.676C4.17849 19.6831 2.70117 20.8339 1.93336 20.067C1.16555 19.2991 2.31726 17.8206 2.31726 16.6266C2.31726 16.2004 2.14642 15.7602 1.92632 15.2124C0.212831 11.5097 0.874109 6.98272 3.93026 3.92724C7.8316 0.0244625 14.17 0.0244627 18.0714 3.92623C21.9797 7.83504 21.9727 14.1681 18.0714 18.0699Z"
                  stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14.9398 11.4131H14.9488" stroke="#23262F" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
            <path d="M10.9301 11.4131H10.9391" stroke="#23262F" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
            <path d="M6.92128 11.413H6.93028" stroke="#23262F" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>

        @if(auth()->user()->getUnreadMessages()->count())
            <div class="actions__notif">
                <span class="actions__notif-text">
                    {{ auth()->user()->getUnreadMessages()->count() }}
                </span>
            </div>
        @endif
    </a>

    {{--Иконка избранных объявлений--}}
    <a class="actions__btn" href="{{ route('user.favoritelist') }}" title="Ваши избранные">
        <svg class="actions__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3
        .org/2000/svg">
            <path d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                  stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        @if(auth()->user()->favoriteAds()->count())
            <div class="actions__notif">
                <span class="actions__notif-text">
                    {{ auth()->user()->favoriteAds()->count() }}
                </span>
            </div>
        @endif
    </a>

    {{-- Иконка уведомлений о том, что кто-то пожелал ваше объявление--}}

    <a class="actions__btn" href="{{route('user.profile.listAds')}}" title="Кто-то нажал бартер на вашем объявлении">
        <svg class="actions__icon" width="22" height="22" viewBox="0 0 22 22"
             fill="none" xmlns="http://www.w3
                                    .org/2000/svg">
            <path d="M13.6 11.5799V14.3099C13.6 16.5899 12.69 17.4999 10.41 17.4999H7.69C5.42 17.4999 4.5 16.5899 4.5 14.3099V11.5799C4.5 9.3099 5.41 8.3999 7.69 8.3999H10.42C12.69 8.3999 13.6 9.3099 13.6 11.5799Z"
                  stroke="#23262F" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"/>
            <path d="M17.5 7.68V10.41C17.5 12.69 16.59 13.6 14.31 13.6H13.6V11.58C13.6 9.31 12.69 8.4 10.41 8.4H8.39999V7.68C8.39999 5.4 9.30999 4.5 11.59 4.5H14.32C16.59 4.5 17.5 5.41 17.5 7.68Z"
                  stroke="#23262F" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"/>
            <path d="M21 14C21 17.87 17.87 21 14 21L15.05 19.25"
                  stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M1 8C1 4.13 4.13 1 8 1L6.95 2.75" stroke-width="1.5"
                  stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        @if (auth()->user()->someoneAddedUnreadAds->sum('adcount'))
            <div class="actions__notif">
                <span class="actions__notif-text">
                    {{ auth()->user()->someoneAddedUnreadAds->sum('adcount')}}
                </span>
            </div>
        @endif
    </a>

</div>
