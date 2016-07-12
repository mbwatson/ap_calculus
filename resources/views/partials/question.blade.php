<article class="question">
    <div class="row">
        <div class="col-md-2">
            @include('partials.user-card', ['user' => $question->user])
        </div>
        <div class="col-md-9" style="height:100%">
            <heading><a href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a></heading>
            <ul class="tags list-inline">
                @foreach ($question->tags as $tag)
                    <li><a href="{{ route('tags.show', $tag->id) }}" class="btn btn-primary btn-xs tag"
                    data-toggle="tooltip" data-placement="top" title="{{ $tag-> description }}">{{ $tag->name }}</a></li>
                @endforeach
            </ul>
            <p class="details">
                <span class="glyphicon glyphicon-calendar"></span>Posted {{ $question->created_at->diffForHumans() }}
                {{ ($question->created_at == $question->updated_at) ? '' : ' (Edited ' . $question->updated_at->diffForHumans() . ')'}}
            </p>
        </div>
        <div class="col-md-1">
            <span class="comment-count">
                {{ count($question->comments) }}
            </span>
        </div>
    </div>
</article>
