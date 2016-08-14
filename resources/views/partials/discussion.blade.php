<tr class="post">
    
    <td class="post-user">
        <!-- User Info -->
        <div class="{{ $discussion->user->isOnline() ? 'active-' : '' }}user text-center">
            <a href="{{ route('users.show', $discussion->user) }}">
                <img class="avatar" src="{{ url('/') }}/avatars/{{ $discussion->user->avatar }}"><br />
                <span class="username">{{ $discussion->user->name }}</span>
            </a>
        </div>
    </td>

    <td class="post-title" style="width: 70%;">
        <!-- Discussion Info -->
        <div class="title"><a href="{{ route('discussions.show', $discussion) }}">{{ $discussion->title }}</a></div>
        <br /><br />
        <div class="meta">
            Started {{ $discussion->created_at->diffForHumans() }}
        </div>
    </td>

    <td class="post-channel" style="width: 30%; text-align: center; padding-top: 20px;">
        <a href="{{ route('discussions.channel', $discussion->channel) }}">{{ $discussion->channel->name }}</a>
    </td>
    
    <td class="post-comments" style="text-align: center; padding-top: 20px;">
        <span class="comment-count">
            {{ $discussion->responses->count() }}
        </span>
    </td>

</tr>