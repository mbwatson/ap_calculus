<article class="question">
    <div class="row">
        <div class="col-sm-2 hidden-xs">
            @include('partials.user-card', ['user' => $question->user])
        </div>
        <div class="col-xs-11 col-md-9 col-sm-9" style="height:100%">
            <heading><a href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a></heading>
            <div class="row">
                <div class="col-md-5">
                    <ul class="standards list-inline">
                        <b>MPACs:</b>
                        @include('partials.list-standards', ['standards' => $question->mpacs])
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="standards list-inline">
                        <b>Learning Objectives:</b>
                        @include('partials.list-standards', ['standards' => $question->learningObjectives])
                    </ul>
                </div>
            </div>
            <p class="details">
                <span class="glyphicon glyphicon-calendar"></span>Posted {{ $question->created_at->diffForHumans() }}
                {{ ($question->created_at == $question->updated_at) ? '' : ' (Edited ' . $question->updated_at->diffForHumans() . ')'}}
            </p>
        </div>
        <div class="col-sm-1 hidden-xs">
            <span class="comment-count">
                {{ count($question->comments) }}
            </span>
        </div>
    </div>
</article>
