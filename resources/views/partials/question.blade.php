<article class="question">
    <div class="row">
        <div class="col-sm-2 hidden-xs">
            <div class="{{ $question->user->isOnline() ? 'active-' : '' }}user text-center">
                <a href="{{ route('users.show', $question->user) }}">
                    <img class="avatar" src="{{ url('/') }}/avatars/{{ $question->user->avatar }}"><br />
                    <span class="username">{{ $question->user->name }}</span>
                </a>
            </div>
        </div>
        <div class="col-xs-10 col-sm-9" style="height:100%">
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
            <p class="details">
                <span class="glyphicon glyphicon-calendar"></span>Posted {{ $question->created_at->diffForHumans() }}
                {{ ($question->created_at == $question->updated_at) ? '' : ' (Updated ' . $question->updated_at->diffForHumans() . ')'}}
                | Calculator {{ $question->calculator }}
                | {{ $question->type }}
            </p>
        </div>
        <div class="col-md-1 hidden-sm hidden-xs">
            <span class="comment-count">
                {{ count($question->comments) }}
            </span>
        </div>
    </div>
</article>
