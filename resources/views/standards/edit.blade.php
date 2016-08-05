@extends('layouts.master')

@section('title', 'Standards / ' . $standard->name)

@section('breadcrumbs', Breadcrumbs::render('standards.show', $standard))

@section('content')

<div class="container">

    <!-- Standard & its Description -->
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 heading">
            <h1>{{ $standard->name }}</h1>
            <h2>{{ $standard->description }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 details">
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

@endsection
