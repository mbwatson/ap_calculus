@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <!-- Link to Post a New Question -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3><a href="{{ route('questions.create') }}"><i class="glyphicon glyphicon-plus"></i> Create New Question</a></h3>
        </div>
        <!-- Question List -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
