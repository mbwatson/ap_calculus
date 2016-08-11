<div class="row post">

    <!-- User Info -->
    
    <div class="hidden-xs hidden-sm col-md-2">
        <div class="{{ $question->user->isOnline() ? 'active-' : '' }}user text-center">
            <a href="{{ route('users.show', $question->user) }}">
                <img class="avatar" src="{{ url('/') }}/avatars/{{ $question->user->avatar }}"><br />
                <span class="username">{{ $question->user->name }}</span>
            </a>
        </div>
    </div>

    <!-- Question Info -->
    
    <div class="col-xs-10 col-sm-8 col-md-6">
        <h4><a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a></h4>
        <div class="standards">
            <b>MPACs:</b>
            @include('partials.list-standards', ['standards' => $question->mpacs])
        </div>
        <div class="standards">
            <b>Learning Objectives:</b>
            @include('partials.list-standards', ['standards' => $question->learningObjectives])
        </div>
        <div class="meta">
            Posted {{ $question->created_at->diffForHumans() }}
        </div>
    </div>
    <div class="col-xs-2 col-sm-3">
        <span class="pull-right">
            <br />
            {!! $question->calculator == 'Active' ? '<span class="mdi mdi-calculator" data-toggle="tooltip" data-placement="top" title="Calculator Active"></span>' : '' !!}
            @if ($question->type == 'Free Response')
                <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Free Response"></span>
            @else
                <span class="fa fa-list" data-toggle="tooltip" data-placement="top" title="Multiple Choice"></span>
            @endif
        </span>
    </div>
    <div class="hidden-xs col-sm-1">
        <span class="comment-count">
            {{ count($question->comments) }}
        </span>
    </div>
</div>
