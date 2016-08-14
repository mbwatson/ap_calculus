<tr class="post">

    <td>
        <!-- User Info -->
        <div class="{{ $question->user->isOnline() ? 'active-' : '' }}user">
            <a href="{{ route('users.show', $question->user) }}">
                <img class="avatar" src="{{ url('/') }}/avatars/{{ $question->user->avatar }}"><br />
                <span class="username">{{ $question->user->name }}</span>
            </a>
        </div>
    </td>

    <td style="width: 100%;">
        <!-- Question Info -->
        <div class="title"><a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a></div>
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
    </td>

    <td>
        <span class="meta">
            {!! $question->calculator == 'Active' ? '<span class="mdi mdi-calculator" data-toggle="tooltip" data-placement="top" title="Calculator Active"></span>' : '' !!}
        </span>
    </td>

    <td>
        <span class="meta">
            @if ($question->type == 'Free Response')
                <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Free Response"></span>
            @else
                <span class="mdi mdi-format-list-bulleted" data-toggle="tooltip" data-placement="top" title="Multiple Choice"></span>
            @endif
        </span>
    </td>

    <td>
        <span class="comment-count">
            {{ count($question->comments) }}
        </span>
    </td>

</tr>