<tr class="post">
    
    <td>
        <!-- User Info -->
        <div class="{{ $discussion->user->isOnline() ? 'active-' : '' }}user text-center">
            <a href="{{ route('users.show', $discussion->user) }}">
                <img class="avatar" src="{{ url('/') }}/avatars/{{ $discussion->user->avatar }}"><br />
                <span class="username">{{ $discussion->user->name }}</span>
            </a>
        </div>
    </td>

    <td style="width: 70%;">
        <!-- Discussion Info -->
        <div class="title"><a href="{{ route('discussions.show', $discussion) }}">{{ $discussion->title }}</a></div>
        <br /><br />
        <div class="meta">
            Started {{ $discussion->created_at->diffForHumans() }}
        </div>
    </td>

    <td style="width: 30%; text-align: center; padding-top: 20px;">
        <a href="{{ route('discussions.channel', $discussion->channel) }}">{{ $discussion->channel->name }}</a>
    </td>
    
    <td style="text-align: center; padding-top: 20px;">
        <span class="comment-count">
            {{ $discussion->responses->count() }}
        </span>
    </td>

</tr>