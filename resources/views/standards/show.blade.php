@extends('layouts.master')

@section('content')

<div class="jumbotron">
    
    <!-- Standard & its Description -->
    
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 standard-header">
            <header>
                {{ $standard->name }}
                <small>{{ $standard->description }}</small>
            </header>
        </div>    
    </div>

    @if ($standard->details)
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 standard-details">
                {!! $standard->renderMarkdown() !!}
            </div>
        </div>
    @endif
</div>

<div class="container">

    <!-- Questions List -->

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Questions Addressing {{ $standard->name }}
                </div>
                <div class="panel-body">
                    <section class="questions">
                        @foreach ($standard->questions as $question)
                            @include('partials.question', $question)
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
