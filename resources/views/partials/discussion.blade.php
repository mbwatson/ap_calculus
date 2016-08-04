<div class="row">
    
    <!-- User Info -->
    
    <div class="hidden-xs hidden-sm col-md-2">
        <div class="{{ $discussion->user->isOnline() ? 'active-' : '' }}user text-center">
            <a href="{{ route('users.show', $discussion->user) }}">
                <img class="avatar" src="{{ url('/') }}/avatars/{{ $discussion->user->avatar }}"><br />
                <span class="username">{{ $discussion->user->name }}</span>
            </a>
        </div>
    </div>

    <!-- Discussion Info -->

    <div class="col-xs-12 col-sm-11 col-md-6">
        <div class="post-title">
            <a href="{{ route('discussions.show', $discussion) }}">{{ $discussion->title }}</a>
        </div>
        <div class="row meta">
            <div class="col-xs-8">
                <br /><br />
                Started {{ $discussion->created_at->diffForHumans() }}
                {{ $discussion->created_at == $discussion->updated_at ? '' : ' | Edited at ' . $discussion->updated_at->diffForHumans() }}
            </div>
        </div>
    </div>
    <div class="hidden-xs hidden-sm col-md-3">
        <a href="{{ route('discussions.channel', $discussion->channel) }}">{{ $discussion->channel->name }}</a>
    </div>
    <div class="hidden-xs col-sm-1">
        <span class="comment-count">
            {{ $discussion->responses->count() }}
        </span>
    </div>
</div>