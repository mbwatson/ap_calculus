<div class="panel panel-default comment">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
                @include('partials.user-card', ['user' => $comment->user])
            </div>
            <div class="body col-md-10 col-sm-10 col-xs-12">
                <div class="body">
                    {!! nl2br(e($comment->body)) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="details col-xs-9 col-xs-offset-1">
                <i class="glyphicon glyphicon-calendar"></i> Posted {{ $comment->created_at->diffForHumans() }}
        </div>
    </div>
</div>
