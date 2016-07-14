<div class="panel panel-default comment">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-2 col-xs-12">
                @include('partials.user-card', ['user' => $comment->user])
            </div>
            <div class="body col-sm-10 col-xs-12">
                <div class="body">
                    {!! nl2br(e($comment->body)) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-2 col-xs-12">
                <i class="glyphicon glyphicon-calendar"></i> Posted {{ $comment->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
</div>
