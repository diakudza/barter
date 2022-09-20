@forelse ($reviews as $review)
    <div class="reviews__item">
        <div class="reviews-author">
            <div class="reviews-author__avatar">

                <img class="reviews-author__img"
                     @if($review->user->avatar()->first())
                         src="{{Storage::url($review->user->avatar()->first()->path)}}"
                     @else
                         src="{{ asset('images/icon-avatar.png')}}"
                     @endif
                     alt="{{ $review->user->name }}">
            </div>

            <h4 class="reviews-author__name">{{ $review->author->name }}</h4>
        </div>

        <div class="reviews-body">
            <p class="reviews-text">{{ $review-> text }}</p>
        </div>

        <div class="reviews-data">
            <p class="reviews-text">Написан: {{ $review->created_at }}</p>
        </div>
    </div>

@empty
    <h4 class="reviews-title">У этого пользователя пока нет ни одного отзыва</h4>
@endforelse
