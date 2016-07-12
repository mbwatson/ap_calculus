<article class="comment">
    <div class="row">
        <div class="col-sm-2">
            @include('partials.user-card', ['user' => $comment->user])
        </div>
        <div class="col-sm-9 body" style="height:100%">
            <div class="body">
                {!! nl2br(e($comment->body)) !!}
            </div>
            <div class="details">
                {{ $comment->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
</article>
