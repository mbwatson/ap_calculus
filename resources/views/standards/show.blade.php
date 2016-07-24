@extends('layouts.master')

@section('content')

<div class="jumbotron">
    
    <!-- Standard & its Description -->
    
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 name">
            <h1>{{ $standard->name }}</h1>
            <h2>{!! Markdown::convertToHtml($standard->description) !!}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 details">
            {!! Markdown::convertToHtml($standard->details) !!}
            @if ($standard->children()->get())
                <ul>
                    @foreach ($standard->children()->get() as $child)
                        <li><a href="{{ route('standards.show', $child) }}">{{ $child->name }}</a> : {{ $child->description }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

</div>

<div class="container">

    <h1>
        Questions Addressing {{ $standard->name }}
    </h1>

    <!-- Questions List -->

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <section class="questions">
                        @foreach ($standard->questions()->get() as $question)
                            @include('partials.question', $question)
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
