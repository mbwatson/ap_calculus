@extends('layouts.master')

@section('title', 'Standards / MPACs')

@section('breadcrumbs', Breadcrumbs::render('mpacs'))

@section('content')
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 heading">
                <h1>Mathematical Practices for AP Calculus</h1>
            </div>
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 details">
                <p>
                    The Mathematical Practices for AP Calculus (MPACs) explicitly articulate the behaviors in which students need to engage in order to achieve conceptual understanding in the AP Calculus courses, are at the core of this curriculum framework. Each concept and topic addressed in the courses can be linked to one or more of the MPACs.
                </p>
                <p>
                    This framework also contains a concept outline, which presents the subject matter of the courses in a table format. Subject matter that is included only in the BC course is indicated. The components of the concept outline follow.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron-toggler"><span class="mdi mdi-chevron-double-up"></span></div>

<div class="container">

    <div class="row">
        <div class="col-xs-12">
            @foreach ($mpacs as $mpac)
                <h1><a href="{{ route('standards.show', $mpac) }}">{{ $mpac->name }}: {{ $mpac->description }}</a></h1>
                {!! Markdown::convertToHtml($mpac->details) !!}
            @endforeach
        </div>
    </div>

</div>
@endsection
