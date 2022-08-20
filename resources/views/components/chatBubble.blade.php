<div class="flex-column gap-5 border rounded-4 p-1 border-1
                            @if( auth()->user()->id == $message->user_id)
    align-self-lg-end bg-primary text-white
@else
    align-self-lg-starts bg-info
@endif">
    <div>
        <p>{{ $message->text }}</p>
        <p>{{ $message->created_at }}</p>
    </div>
</div>
