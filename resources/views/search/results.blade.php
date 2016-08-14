@extends('layouts.master')

@section('title', 'Search Results')

@section('content')

<div class="container">
    
    <h1>Search</h1>
    
    <div class="row">
        <div class="col-xs-12">
            The questions listed below contain at least one of the queried keyword(s): "{{ join('", "',$keywords) }}".
            You may further narrow your results according to specific <a href="{{ URL::to('standards') }}">standards</a>.
        </div>
    </div>    
    <!-- Search Form -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['route' => ['search.results'], 'class' => 'search-form']) !!}

            <div class="form-group">
                {!! Form::label('keywords', 'Filter by Keywords:', ['class' => 'form-control-label col-xs-2']) !!}
                <div class="col-xs-10">
                    {!! Form::text('keywords', join('", "',$keywords), ['class' => 'form-control']) !!}
                </div>
            </div>

            <br /><br /><br /><br />

            <div class="form-group">
                {!! Form::label('standard_ids', 'Filter by Standards:', ['class' => 'form-control-label col-xs-2']) !!}
                <div class="col-xs-10">
                    <select class="form-control" id="standard_list" name="standards[]" multiple>
                        @foreach ($standards as $standard)
                            @if (isset($question))
                                <option value="{{ $standard->id }}" {{ in_array($standard->id, $question->standards->lists('id')->toArray()) ? 'selected' : '' }}>
                            @else
                                <option value="{{ $standard->id }}">
                            @endif
                            {{ $standard->name }}: {{ $standard->description }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br /><br />

            {!! Form::submit('Search', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <!-- Search Results -->

    <br />

    <p class="fancy-heading"><span><i class="mdi mdi-comment-multiple-outline"></i>Discussions</span></p>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="panel">
                @if ($discussions->count())
                    @foreach ($discussions as $discussion)
                        <table class="posts">
                            @include('partials.discussion', ['discussion' => $discussion])
                        </table>
                    @endforeach
                @else
                    <div class="panel-body">
                        <center>
                            There are no relevant discussions to display at this time.
                        </center>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <br />

    <p class="fancy-heading"><span><i class="mdi mdi-comment-question-outline"></i>Questions</span></p>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="panel">
                @if ($questions->count())
                    @foreach ($questions as $question)
                        <table class="posts">
                            @include('partials.question', ['question' => $question])
                        </table>
                    @endforeach
                @else
                    <div class="panel-body">
                        <center>
                            There are no relevant questions to display at this time.
                        </center>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection


@section('footer')
<!-- Select2 list -->
<script type="text/javascript">
    $('#standard_list').select2({ placeholder: "Select Standard(s)" });
</script>
@endsection