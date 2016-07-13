<article class="question">
    <div class="row">
        <div class="col-md-2">
            @include('partials.user-card', ['user' => $question->user])
        </div>
        <div class="col-md-9" style="height:100%">
            <heading><a href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a></heading>
            <ul class="standards list-inline">
                <b>MPACs</b>
                @foreach ($question->standards->where('type', 'MPAC') as $standard)
                    <li><a href="{{ route('standards.show', $standard->id) }}" class="btn btn-primary btn-xs standard"
                    data-toggle="tooltip" data-placement="top" title="{{ $standard->description }}">{{ $standard->name }}</a></li>
                @endforeach
            </ul>
            <ul class="standards list-inline">
                <b>Learning Outcomes</b>
                @foreach ($question->standards->where('type', 'Learning Objective') as $standard)
                    <li><a href="{{ route('standards.show', $standard->id) }}" class="btn btn-primary btn-xs standard"
                    data-toggle="tooltip" data-placement="top" title="{{ $standard->description }}">{{ $standard->name }}</a></li>
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
