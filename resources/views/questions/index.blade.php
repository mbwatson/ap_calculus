@extends('layouts.master')

@section('content')

<div class="container">
    
    <!-- Link to Post a New Question -->
    
    <div class="row">
        <div class="col-md-10 col-xs-12">
            <h1>AP Calculus Questions</h1>
        </div>
    </div>

    <!-- Question List -->
    
    <div class="row">
        <div class="col-xs-12 col-md-2">
            <a class="btn btn-primary btn-sm btn-block" href="{{ route('questions.create') }}">Post New Question</a>
            <br />
        </div>
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
