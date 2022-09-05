<div class="productContact">

    <div class="user">
        <div class="userInfo">
            <div class="userView">
                <img class="top-profile__avatar userAvatar"
                    @if($ad->user->avatar()->first())
                    src="{{Storage::url($ad->user->avatar()->first()->path)}}"
                    @else
                    src="{{ asset('images/icon-avatar.png')}}"
                    @endif alt="photo-user">

                <div class="userName">
                    <a href="{{route('user.public', $ad->user->id)}}">
                        <h5 class="">{{ $ad->user->name }}</h5>
                    </a>

                    <div class="userRating">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.45203 7.35331C9.30094 7.49973 9.23153 7.71148 9.26594 7.91915L9.78453 10.7891C9.82828 11.0324 9.72561 11.2786 9.52203 11.4191C9.32253 11.565 9.05711 11.5825 8.83953 11.4658L6.25594 10.1183C6.16611 10.0705 6.06636 10.0448 5.96428 10.0419H5.80619C5.75136 10.0501 5.69769 10.0676 5.64869 10.0944L3.06453 11.4483C2.93678 11.5125 2.79211 11.5352 2.65036 11.5125C2.30503 11.4471 2.07461 11.1181 2.13119 10.7711L2.65036 7.90106C2.68478 7.69165 2.61536 7.47873 2.46428 7.32998L0.35786 5.28831C0.181693 5.1174 0.120443 4.86073 0.200943 4.62915C0.27911 4.39815 0.47861 4.22956 0.719527 4.19165L3.61869 3.77106C3.83919 3.74831 4.03286 3.61415 4.13203 3.41581L5.40953 0.796646C5.43986 0.738313 5.47894 0.684646 5.52619 0.639146L5.57869 0.598313C5.60611 0.56798 5.63761 0.542896 5.67261 0.52248L5.73619 0.499146L5.83536 0.458313H6.08094C6.30028 0.481063 6.49336 0.612313 6.59428 0.808313L7.88869 3.41581C7.98203 3.60656 8.16344 3.73898 8.37286 3.77106L11.272 4.19165C11.517 4.22665 11.7218 4.39581 11.8029 4.62915C11.8793 4.86306 11.8134 5.11973 11.6337 5.28831L9.45203 7.35331Z"
                                fill="#F6BF4D"/>
                        </svg>
                        <p>{{ $ad->user->getRating() }}</p>
                        <p>(Всего отзывов: {{ $ad->user->getReviewsCount() }})</p>
                    </div>
                </div>
            </div>
        </div>

    <hr>
    <div class="contacts">

        <div>
            <svg style="margin-right: 6px" width="16" height="16" viewBox="0 0 16 16" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M14.1673 8.00024C14.1673 11.4062 11.4067 14.1669 8.00067 14.1669C4.59466 14.1669 1.83398 11.4062 1.83398 8.00024C1.83398 4.59423 4.59466 1.83356 8.00067 1.83356C11.4067 1.83356 14.1673 4.59423 14.1673 8.00024Z"
                      stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.2878 9.96182L7.77441 8.46248V5.23114" stroke="#23262F"
                      stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            На сайте с {{ $ad->user->getRegistrationDate() }}
        </div>
    </div>
    @auth
            <div class="contactsFeedback">
                <form action="{{route('chat.from.ad')}}" method="post">
                    <input type="hidden" name="ad_user_id" value="{{$ad->user->id}}">
                    @csrf @method('POST')

                    <button class="contactsButton">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.7139 12.7132C10.6765 14.7508 7.65952 15.191 5.19062 14.0493C4.82615 13.9025 4.52733 13.7839 4.24326 13.7839C3.452 13.7886 2.46712 14.5558 1.95525 14.0446C1.44338 13.5326 2.21118 12.547 2.21118 11.751C2.21118 11.4668 2.09728 11.1734 1.95056 10.8082C0.808228 8.33967 1.24908 5.32171 3.28651 3.28472C5.88741 0.682873 10.113 0.682873 12.7139 3.28405C15.3195 5.88992 15.3148 10.112 12.7139 12.7132Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.6262 8.27523H10.6322" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.95338 8.27523H7.95938" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.28053 8.27523H5.28653" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Написать продавцу
                    </button>
                </form>
                    @endauth


        </div>
    </div>

</div>
