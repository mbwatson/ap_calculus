@extends('layouts.master')

@section('content')

<div class="container">

    <!-- Standard & its Description -->

    <header>{{ $standard->name }}</header>
    {{ $standard->description }}

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
