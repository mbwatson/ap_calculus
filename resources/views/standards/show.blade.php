@extends('layouts.master')

@section('content')
<div class="container">

    <!-- Standard & its Description -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $standard->name }}
                </div>
                <div class="panel-body">
                    {{ $standard->description }}
                </div>
            </div>
        </div>
    </div>

    <!-- Questions List -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Questions Standardged with {{ $standard->name }}
                </div>
                <div class="panel-body">
                    <section class="row questions">
                        <div class="col-md-12">
                            @foreach ($standard->questions as $question)
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
