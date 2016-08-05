<div class="panel panel-default response">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-2 col-xs-12">
                <div class="{{ $response->user->isOnline() ? 'active-' : '' }}user text-center">
                    <a href="{{ route('users.show', $response->user) }}">
                        <img class="avatar" src="{{ url('/') }}/avatars/{{ $response->user->avatar }}"><br />
                        <span class="username">{{ $response->user->name }}</span>
                    </a>
                </div>
            </div>
            <div class="body col-sm-10 col-xs-12">
                <div class="body">
                    {!! nl2br(e($response->body)) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer meta">
        <div class="row">
            <div class="col-xs-6">
                <i class="glyphicon glyphicon-calendar"></i> {{ $response->created_at->diffForHumans() }}
            </div>
            <div class="col-xs-6 text-right">
                <!-- Thumbs Up -->
                @if ($response->liked(Auth::user()))
                    <a href="{{ route('responses.unlike', $response) }}" class="text-primary" title="Thumbs Up" data-toggle="tooltip" data-placement="top">
                        <i class="glyphicon glyphicon-thumbs-up"></i></a>
                @else
                    <a href="{{ route('responses.like', $response) }}" class="text-muted" title="Thumbs Up" data-toggle="tooltip" data-placement="top">
                        <i class="glyphicon glyphicon-thumbs-up"></i></a>
                @endif
                <sub>{{ $response->likeCount }}</sub>
            </div>
        </div>
    </div>
</div>
