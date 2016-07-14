@extends('layouts.master')

@section('content')

<div class="container">
    
    <!-- Link to Post a New Question -->
    
    <h3><a href="{{ route('questions.create') }}"><i class="glyphicon glyphicon-plus"></i> Create New Question</a></h3>
    
    <!-- Question List -->
    
    <div class="row">
        <div class="col-xs-12">
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
