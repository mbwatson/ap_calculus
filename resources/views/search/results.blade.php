@extends('layouts.master')

@section('content')

<div class="container">
    
    <header>Search Results</header>
    
    <!-- Search Form -->

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['search.results'], 'class' => 'search-form']) !!}
            <div class="input-group" >
            	{!! Form::text('query', $query, ['class' => 'form-control']) !!}
				<div class="input-group-btn">
					<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            	</div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <br />

    <!-- Search Results -->

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body questions">
		            @foreach ($results as $result)
		            	@include('partials.question', ['question' => $result])
		            @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
