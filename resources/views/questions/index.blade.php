@extends('layouts.master')

@section('title', 'Questions')

@section('breadcrumbs', Breadcrumbs::render('questions.index'))

@section('content')

<div class="container">
    
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-2">
            <h1>AP Calculus Questions</h1>
        </div>
    </div>

    <!-- Question List -->
    
    <div class="row">

        <!-- Sidebar -->

        <div class="col-xs-12 col-md-2 sidebar">
        
            <a class="btn btn-primary btn-block" href="{{ route('questions.create') }}">New Question</a>
            <br />
            <h3 class="text-center">Filters</h3>
            <a class="btn btn-info btn-block hidden-xs hidden-sm" href="{{ route('questions.index') }}">All</a>
            <a class="btn btn-info btn-block hidden-xs hidden-sm" href="{{ route('questions.mine') }}">Mine</a>
            <a class="btn btn-info btn-block hidden-xs hidden-sm disabled" href="{{ route('questions.popular') }}">Popular</a>
            <a class="btn btn-info btn-block hidden-xs hidden-sm" href="{{ route('questions.calculator.active') }}">Calculator Active</a>
            <a class="btn btn-info btn-block hidden-xs hidden-sm" href="{{ route('questions.calculator.inactive') }}">Calculator Inactive</a>
            <a class="btn btn-info btn-block hidden-xs hidden-sm" href="{{ route('questions.calculator.neutral') }}">Calculator Neutral</a>
            <br />
        </div>

        <!-- Questions List -->
        
        <div class="col-xs-12 col-md-10">
            <div class="panel panel-default">
                <div class="panel-body questions">
                    @foreach ($questions as $question)
                        @include('partials.question', $question)
                    @endforeach
                </div>
            </div>
            <center>{{ $questions->links() }}</center>
        </div>
    </div>
</div>

@endsection
