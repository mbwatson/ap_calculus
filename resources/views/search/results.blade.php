@extends('layouts.master')

@section('content')

<div class="container">
    
    <header>
        Search
        <small>
            The questions listed below contain at least one of the queried keywords: "{{ join('", "',explode(' ', $keywords)) }}".
            You may further narrow your results according to specific <a href="{{ URL::to('standards') }}">standards</a>.
        </small>
    </header>
    
    <!-- Search Form -->

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['search.results'], 'class' => 'search-form']) !!}

            <div class="form-group row" >
                {!! Form::label('keywords', 'Filter by Keywords:', ['class' => 'form-control-label col-xs-2']) !!}
                <div class="col-xs-10">
                    {!! Form::text('keywords', $keywords, ['class' => 'form-control']) !!}
                </div>
            </div>

           	<br />
            
            <div class="form-group row" >
                {!! Form::label('standard_ids', 'Filter by Standards:', ['class' => 'form-control-label col-xs-2']) !!}
                <div class="col-xs-10">
                {!! Form::select('standard_ids[]', $standards->whereIn('type',['MPAC','Learning Objective'])->lists('standard_info','id'), $selected_standard_ids, ['id' => 'standard_list', 'class' => 'form-control', 'multiple']) !!}
                </div>
            </div>

            <br />

            {!! Form::submit('Search', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <!-- Search Results -->

    <br />

    <header>Search Results</header>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body questions">
		            @foreach ($questions as $question)
		            	@include('partials.question', ['question' => $question])
		            @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

@endsection


@section('footer')

<!-- Select2 list -->
<script type="text/javascript">
    $('#standard_list').select2({
      placeholder: "Select Standard(s)"
    });
</script>

@endsection