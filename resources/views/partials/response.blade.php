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
        <div class="row meta">
            <div class="col-sm-10 col-sm-offset-2 col-xs-12">
                <i class="glyphicon glyphicon-calendar"></i> Posted {{ $response->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
</div>
