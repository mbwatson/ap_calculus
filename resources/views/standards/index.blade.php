@extends('layouts.master')

@section('content')

<div class="jumbotron">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 standard-header">
            <header>
                AP Calculus AB and AP Calculus BC
                <small>Curriculum Framework</small>
            </header>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 standard-details">

                The AP Calculus AB and AP Calculus BC Curriculum Framework specifies the curriculum — what students must know, be able to do, and understand — for both courses. AP Calculus AB is structured around three big ideas: limits, derivatives, and integrals and the Fundamental Theorem of Calculus. AP Calculus BC explores these ideas in additional contexts and also adds the big idea of series. In both courses, the concept of limits is foundational; the understanding of this fundamental tool leads to the development of more advanced tools and concepts that prepare students to grasp the Fundamental Theorem of Calculus, a central idea of AP Calculus.

            </div>
        </div>  
    </div>
</div>

<div class="container">

    @if (Auth::user()->admin)
        
        <!-- New Standard Form -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add a New Standard
                    </div>
                    <div class="panel-body">
                        <section class="row">
                            <div class="col-md-12">
                                {!! Form::open(['route' => 'standards.store']) !!}
                                <div class="form-group col-md-2" >
                                    {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
                                    <select name="parent_id" class="form-control">
                                        <option>Type</option>
                                            <option value="MPAC">MPAC</option>
                                            <option value="Big Idea">Big Idea</option>
                                            <option value="Enduring Understanding">Enduring Understanding</option>
                                            <option value="Learning Objective">Learning Objective</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2" >
                                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-5" >
                                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-2" >
                                    {!! Form::label('parent_id', 'Parent', ['class' => 'control-label']) !!}
                                    <select name="parent_id" class="form-control">
                                        <option>Parent</option>
                                        @foreach ($standards as $standard)
                                            <option value="{{ $standard->id }}">{{ $standard->type . ' ' . $standard->name . ' ' . $standard->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-1" >
                                    <br />
                                    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <!-- General Information -->

    <header>Overview</header>

    <div class="row">
        <div class="col-xs-12">
            <h3><a href="#">The Mathematical Practices for AP Calculus</a></h3>
            The Mathematical Practices for AP Calculus (MPACs) explicitly articulate the behaviors in which students need to engage in order to achieve conceptual understanding in the AP Calculus courses, are at the core of this curriculum framework. Each concept and topic addressed in the courses can be linked to one or more of the MPACs. This framework also contains a concept outline, which presents the subject matter of the courses in a table format. Subject matter that is included only in the BC course is indicated. The components of the concept outline follow.
        </div>
        <div class="col-xs-12">
            <h3><a href="#">Big Ideas</a></h3>
            The courses are organized around big ideas, which correspond to foundational concepts of calculus: 
            <a href="#">limits</a>, <a href="#">derivatives</a>, <a href="#">integrals</a> and the <a href="#">Fundamental Theorem of Calculus</a>, and (for AP Calculus BC) <a href="#">series</a>.
        </div>
        <div class="col-xs-12">
            <h3><a href="#">Enduring understandings</a></h3> Within each big idea are enduring understandings. These are the long-term takeaways related to the big ideas that a student should have after exploring the content and skills. These understandings are expressed as generalizations that specify what a student will come to understand about the key concepts in each course. Enduring understandings are labeled to correspond with the appropriate big idea.
        </div>
        <div class="col-xs-12">
            <h3><a href="#">Learning objectives</a></h3> Linked to each enduring understanding are the corresponding learning objectives. The learning objectives convey what a student needs to be able to do in order to develop the enduring understandings. The learning objectives serve as targets of assessment for each course. Learning objectives are labeled to correspond with the appropriate big idea and enduring understanding.
        </div>
        <div class="col-xs-12">
            <h3><a href="#">Essential knowledge</a></h3> Essential knowledge statements describe the facts and basic concepts that a student should know and be able to recall in order to demonstrate mastery of each learning objective. Essential knowledge statements are labeled to correspond with the appropriate big idea, enduring understanding, and learning objective. Further clarification regarding the content covered in AP Calculus is provided by examples and exclusion statements. Examples are provided to address potential inconsistencies among definitions given by various sources. Exclusion statements identify topics that may be covered in a first-year college calculus course but are not assessed on the AP Calculus AB or BC Exam. Although these topics are not assessed, the AP Calculus courses are designed to support teachers who wish to introduce these topics to students.
        </div>
    </div>

</div>

@endsection
