@extends('layouts.master')

@section('content')
<div class="container">

    <!-- Tag & its Description -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $tag->name }}
                </div>
                <div class="panel-body">
                    {{ $tag->description }}
                </div>
            </div>
        </div>
    </div>

    <!-- Questions List -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Questions Tagged with {{ $tag->name }}
                </div>
                <div class="panel-body">
                    <section class="row questions">
                        <div class="col-md-12">
                            @foreach ($tag->questions as $question)
                                @include('partials.question', $question)
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
