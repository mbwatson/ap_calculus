@extends('layouts.master')

@section('content')

<div class="container">
    
    <header>Search</header>
    
    <!-- Search Form -->

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'search.index', 'class' => 'search-form']) !!}
            {!! Form::text('query', null, ['class' => 'form-control', 'placeholder' => 'Search Query']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
