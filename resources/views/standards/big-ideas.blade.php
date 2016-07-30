@extends('layouts.master')

@section('breadcrumbs', Breadcrumbs::render('big-ideas'))

@section('content')
<div class="jumbotron">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 name">
            <h1>Big Ideas</h1>
        </div>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 details">
            The courses are organized around big ideas, which correspond to foundational concepts of calculus: limits, derivatives, integrals and the Fundamental Theorem of Calculus, and (for AP Calculus BC) series.
        </div>
    </div>
</div>
<div class="jumbotron-toggler">
    <a href="#" id="jumbotronToggler"><span class="glyphicon glyphicon-menu-up"></span></a>
</div>

<div class="container">

    @foreach ($bigideas as $bigidea)
        
        <h1><a href="{{ route('standards.show', $bigidea) }}">{{ $bigidea->name }}: {{ $bigidea->description }}</a></h1>
        {!! Markdown::convertToHtml($bigidea->details) !!}
        
        <!-- <h3>Enduring Understandings</h3> -->
        
        @foreach ($bigidea->children()->get() as $enduringUnderstanding)
                
            <div class="row">

                <div class="col-xs-12 col-sm-3">
                    <h4><a href="{{ route('standards.show', $enduringUnderstanding) }}">{{ $enduringUnderstanding->name }}</a></h4>
                    {{ $enduringUnderstanding->description }}
                </div>
                
                <div class="col-xs-12 col-sm-9">
                    @foreach ($enduringUnderstanding->children()->get() as $learningObjective)
                        <h5><a href="{{ route('standards.show', $learningObjective) }}">{{ $learningObjective->name }}</a>:</h5>
                        {{ $learningObjective->description }}<br />
                    @endforeach
                </div>

            </div>

        @endforeach

    @endforeach

</div>
@endsection