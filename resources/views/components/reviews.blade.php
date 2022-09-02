<div class="d-flex flex-column">
    @forelse ($reviews as $review)
    <p>Автор: {{ $review->author->name }}</p>
    <p>Написан {{ $review->created_at }}</p>
    <p>Текст отзыва:</p>
    {{ $review-> text }}
    @empty
    <p>У этого пользователя пока нет ни одного отзыва</p>
    @endforelse
</div>