<article class="question">
    <div class="row">
        <div class="hidden-xs hidden-sm col-md-2">
            <div class="{{ $question->user->isOnline() ? 'active-' : '' }}user text-center">
                <a href="{{ route('users.show', $question->user) }}">
                    <img class="avatar" src="{{ url('/') }}/avatars/{{ $question->user->avatar }}"><br />
                    <span class="username">{{ $question->user->name }}</span>
                </a>
            </div>
        </div>
        <div class="col-xs-12 col-md-9" style="height:100%">
            <div class="title">
                <a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a>
            </div>
            <div class="standards">
                <b>MPACs:</b>
                @include('partials.list-standards', ['standards' => $question->mpacs])
            </div>
            <div class="standards">
                <b>Learning Objectives:</b>
                @include('partials.list-standards', ['standards' => $question->learningObjectives])
            </div>
            <div class="row details">
                <div class="col-xs-8">
                    <br />
                    Posted {{ $question->created_at->diffForHumans() }}
                    {{ $question->created_at == $question->updated_at ? '' : ' | Edited at ' . $question->updated_at->diffForHumans() }}
                </div>
                <div class="col-xs-4">
                    <i class="fa fa-calculator {{ $question->calculator == 'Active' ? 'active' : 'inactive'}}"></i>
                    {{ $question->calculator == 'Active' ? 'Active' : 'Inactive'}}
                    <br />
                    @if ($question->type == 'Free Response')
                        <i class="fa fa-pencil-square-o"></i> Free Response
                    @else
                        <i class="fa fa-list"></i> Multiple Choice
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-1 hidden-sm hidden-xs">
            <span class="comment-count">
                {{ count($question->comments) }}
            </span>
        </div>
    </div>
</article>
