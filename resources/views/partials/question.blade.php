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
    
    <div class="col-xs-12 col-md-9" style="height:100%">
        <h4><a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a></h4>
        <div class="standards">
            <b>MPACs:</b>
            @include('partials.list-standards', ['standards' => $question->mpacs])
        </div>
        <div class="standards">
            <b>Learning Objectives:</b>
            @include('partials.list-standards', ['standards' => $question->learningObjectives])
        </div>
        <div class="row meta">
            <div class="col-xs-4">
                Posted {{ $question->created_at->diffForHumans() }}
                {{ $question->created_at == $question->updated_at ? '' : ' | Edited at ' . $question->updated_at->diffForHumans() }}
            </div>
            <div class="col-xs-4">
                <i class="fa fa-calculator {{ $question->calculator == 'Active' ? 'active' : 'inactive'}}"></i>
                {{ $question->calculator == 'Active' ? 'Active' : 'Inactive'}}
            </div>
            <div class="col-xs-4">
                @if ($question->type == 'Free Response')
                    <i class="fa fa-pencil-square-o"></i> Free Response
                @else
                    <i class="fa fa-list"></i> Multiple Choice
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-1 hidden-sm hidden-xs text-center">
        <span class="comment-count">
            {{ count($question->comments) }}
        </span>
    </div>
</div>
