<div class="panel panel-default comment">
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-2">
                <div class="{{ $comment->user->isOnline() ? 'active-' : '' }}user text-center">
                    <a href="{{ route('users.show', $comment->user) }}">
                        <img class="avatar" src="{{ url('/') }}/avatars/{{ $comment->user->avatar }}"><br />
                        <span class="username">{{ $comment->user->name }}</span>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-10">
                <div class="body">
                    {!! nl2br(e($comment->body)) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer meta">
        <div class="row">
            <div class="col-xs-6">
                <i class="glyphicon glyphicon-calendar"></i> {{ $comment->created_at->diffForHumans() }}
            </div>
            <div class="col-xs-6 text-right">
                <!-- Thumbs Up -->
                @if ($comment->liked(Auth::user()))
                    <a href="{{ route('comments.unlike', $comment) }}" class="like text-primary" title="Unlike" data-toggle="tooltip" data-placement="top">
                        <i class="mdi mdi-thumb-up mdi-18px"></i></a>
                @else
                    <a href="{{ route('comments.like', $comment) }}" class="like text-muted" title="Like" data-toggle="tooltip" data-placement="top">
                        <i class="mdi mdi-thumb-up-outline mdi-18px"></i></a>
                @endif
                <sub>{{ $comment->likeCount }}</sub>
            </div>
        </div>
    </div>
</div>
