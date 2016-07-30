@extends('layouts.master')

@section('title', 'Standards')

@section('breadcrumbs', Breadcrumbs::render('standards'))

@section('content')
<div class="jumbotron">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 heading">
            <h1>Curriculum Framework</h1>
            <h2>for AP Calculus AB and AP Calculus BC</h2>
        </div>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 details">
            <p>
                The AP Calculus AB and AP Calculus BC Curriculum Framework specifies the curriculum — what students must know, be able to do, and understand — for both courses.
            </p>
            <p>
                AP Calculus AB is structured around three big ideas: limits, derivatives, and integrals and the Fundamental Theorem of Calculus. AP Calculus BC explores these ideas in additional contexts and also adds the big idea of series.
            </p>
            <p>
                In both courses, the concept of limits is foundational; the understanding of this fundamental tool leads to the development of more advanced tools and concepts that prepare students to grasp the Fundamental Theorem of Calculus, a central idea of AP Calculus.
            </p>
        </div>
    </div>
</div>
<div class="jumbotron-toggler">
    <a href="#" id="jumbotronToggler"><span class="glyphicon glyphicon-menu-up"></span></a>
</div>

<div class="container">
   
    <!-- General Information -->

    <h1>Overview</h1>

    <div class="row">
        <div class="col-xs-12">
            <h3><a href="{{ URL::to('standards/mpacs') }}">The Mathematical Practices for AP Calculus</a></h3>
            The Mathematical Practices for AP Calculus (MPACs) explicitly articulate the behaviors in which students need to engage in order to achieve conceptual understanding in the AP Calculus courses, are at the core of this curriculum framework. Each concept and topic addressed in the courses can be linked to one or more of the MPACs. This framework also contains a concept outline, which presents the subject matter of the courses in a table format. Subject matter that is included only in the BC course is indicated. The components of the concept outline follow.
        </div>
        <div class="col-xs-12">
            <h3><a href="{{ URL::to('standards/big-ideas') }}">Big Ideas</a></h3>
            The courses are organized around big ideas, which correspond to foundational concepts of calculus: 
            <a href="#">limits</a>, <a href="#">derivatives</a>, <a href="#">integrals</a> and the <a href="#">Fundamental Theorem of Calculus</a>, and (for AP Calculus BC) <a href="#">series</a>.
        </div>
        <div class="col-xs-12 col-md-3">
            <h3>Enduring Understandings</h3> Within each big idea are enduring understandings. These are the long-term takeaways related to the big ideas that a student should have after exploring the content and skills. These understandings are expressed as generalizations that specify what a student will come to understand about the key concepts in each course. Enduring understandings are labeled to correspond with the appropriate big idea.
        </div>
        <div class="col-xs-12 col-md-3">
            <h3>Learning Objectives</h3> Linked to each enduring understanding are the corresponding learning objectives. The learning objectives convey what a student needs to be able to do in order to develop the enduring understandings. The learning objectives serve as targets of assessment for each course. Learning objectives are labeled to correspond with the appropriate big idea and enduring understanding.
        </div>
        <div class="col-xs-12 col-md-6">
            <h3>Essential Knowledge</h3> Essential knowledge statements describe the facts and basic concepts that a student should know and be able to recall in order to demonstrate mastery of each learning objective. Essential knowledge statements are labeled to correspond with the appropriate big idea, enduring understanding, and learning objective. Further clarification regarding the content covered in AP Calculus is provided by examples and exclusion statements. Examples are provided to address potential inconsistencies among definitions given by various sources. Exclusion statements identify topics that may be covered in a first-year college calculus course but are not assessed on the AP Calculus AB or BC Exam. Although these topics are not assessed, the AP Calculus courses are designed to support teachers who wish to introduce these topics to students.
        </div>
    </div>

</div>
@endsection
