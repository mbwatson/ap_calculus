<div class="panel panel-default response">
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-2">
                <div class="{{ $response->user->isOnline() ? 'active-' : '' }}user text-center">
                    <a href="{{ route('users.show', $response->user) }}">
                        <img class="avatar" src="{{ url('/') }}/avatars/{{ $response->user->avatar }}"><br />
                        <span class="username">{{ $response->user->name }}</span>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-10" style="display: flex; flex-direction: column; min-height: 10em;">
                <div class="body" style="flex: 1;">
                    {!! nl2br(e($response->body)) !!}
                </div>
                <div class="meta">
                    <i class="mdi mdi-calendar"></i> {{ $response->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer meta">
        <div class="row">
            <div class="col-xs-6 likers">
                <!-- Current Likers -->
                @foreach ($response->likers()->take(5)->get() as $user)
                    <a href="{{ route('users.show', $user) }}" class="liker btn btn-primary btn-xs">{{ $user->name }}</a>
                @endforeach

                @if ( $response->likeCount > 5)
                    + {{ $response->likeCount - 5 }} more
                @endif
            </div>
            <div class="col-xs-6 text-right">
                <!-- Thumbs Up -->
                @if ($response->liked(Auth::user()))
                    <a href="{{ route('responses.unlike', $response) }}" class="like text-primary" title="Unlike" data-toggle="tooltip" data-placement="top">
                        <i class="mdi mdi-thumb-up mdi-18px"></i></a>
                @else
                    <a href="{{ route('responses.like', $response) }}" class="like text-muted" title="Like" data-toggle="tooltip" data-placement="top">
                        <i class="mdi mdi-thumb-up-outline mdi-18px"></i></a>
                @endif
            </div>
        </div>
    </div>
</div>
