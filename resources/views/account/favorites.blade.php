@extends('layouts.master')

@section('content')

<div class="container">

    <h1>Favorites</h1>
    
    <!-- My Favorite Questions -->

    <div class="row">
        <div class="col-xs-12 questions">
                @foreach ($user->favorites as $question)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('partials.question', $question)
                        </div>
                    </div>
                @endforeach
        </div>
    </div>

</div>

@endsection