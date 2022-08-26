<div class="top-profile__actions actions">

  {{--Иконка чатов--}}
  @if(auth()->user()->getUnreadMessages()->count())
  <a class="actions__btn" href=" {{ route('chat.index') }}">

    <svg class="actions__icon" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0714 18.0699C15.0152 21.1264 10.4898 21.7867 6.78642 20.074C6.23971 19.8539 5.79148 19.676 5.36537 19.676C4.17849 19.6831 2.70117 20.8339 1.93336 20.067C1.16555 19.2991 2.31726 17.8206 2.31726 16.6266C2.31726 16.2004 2.14642 15.7602 1.92632 15.2124C0.212831 11.5097 0.874109 6.98272 3.93026 3.92724C7.8316 0.0244625 14.17 0.0244627 18.0714 3.92623C21.9797 7.83504 21.9727 14.1681 18.0714 18.0699Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M14.9398 11.4131H14.9488" stroke="#23262F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M10.9301 11.4131H10.9391" stroke="#23262F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M6.92128 11.413H6.93028" stroke="#23262F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>

    <div class="actions__notif">
      <span class="actions__notif-text">
        {{ auth()->user()->getUnreadMessages()->count() }}
      </span>
    </div>

  </a>
  @endif

  {{--Иконка объявлений, на которые вы откликнулись--}}
  <a class="actions__btn" href="{{ route('user.wishlist') }}" title="Ваши добавления">

    <svg class="actions__icon" width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M16.739 5.15367C16.739 2.40279 14.8583 1.30003 12.1506 1.30003H5.79167C3.16711 1.30003 1.2002 2.3276 1.2002 4.97021V19.694C1.2002 20.4198 1.98115 20.877 2.61373 20.5221L8.99568 16.9421L15.3225 20.5161C15.9561 20.873 16.739 20.4158 16.739 19.689V5.15367Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M5.27148 8.02806H12.5898" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>

    @if(auth()->user()->yourAddedUnreadAds()->count())
    <div class="actions__notif">
      <span class="actions__notif-text">
        {{ auth()->user()->yourAddedUnreadAds()->count() }}
      </span>
    </div>
    @endif
  </a>

  {{-- Иконка уведомлений о том, что кто-то пожелал ваше объявление--}}
  @if (auth()->user()->someoneAddedUnreadAds->sum('adcount'))
  <a class="actions__btn" href="{{route('user.profile.listAds')}}">

    <svg class="actions__icon" width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M10 16.8477C15.6392 16.8477 18.2481 16.1242 18.5 13.2205C18.5 10.3188 16.6812 10.5054 16.6812 6.94514C16.6812 4.16417 14.0452 1.00003 10 1.00003C5.95477 1.00003 3.31885 4.16417 3.31885 6.94514C3.31885 10.5054 1.5 10.3188 1.5 13.2205C1.75295 16.1352 4.36177 16.8477 10 16.8477Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M12.3889 19.8572C11.0247 21.372 8.89672 21.3899 7.51953 19.8572" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>

    <div class="actions__notif">
      <span class="actions__notif-text">
        {{ auth()->user()->someoneAddedUnreadAds->sum('adcount')}}
      </span>
    </div>
  </a>
  @endif
</div>