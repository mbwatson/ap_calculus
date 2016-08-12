@extends('layouts.master')

@section('content')

<div class="jumbotron">
    
    <!-- Welcome -->

    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 heading">
            <h1 style="font-weight: 700;">AP Calculus Question Forum</h1>
        </div>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 details">
            <p>
                This site is a collaboration space for AP Calculus AB and AP Calculus BC instructors.
            </p>
            <p>
                Create and collaborate with others in your field to design quality questions that promote the understanding of calculus and&mdash;of course&mdash;make these questions available to others.
            </p>
            <p>
                The tools and expertise provided by this community of experts make it simple to shape questions that
                align with the Curriculum Framework defining the AP Calculus curriculum, as laid out by the CollegeBoard.
            </p>
        </div>
        <div class="text-center" style="padding: 25px;">
            <a class="btn btn-white btn-lg" href="{{ route('questions.index') }}" style="margin:25px;">Browse the Questions</a>
            <a class="btn btn-warning btn-lg" href="{{ route('standards.index') }}" style="margin:25px;">Curriculum Framework</a>
        </div>
    </div>
</div>

<div class="container">
    
    <!-- Latest Questions -->
    
    <h1>Latest Questions</h1>
    
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body posts">
                    <ul>
                        @foreach (App\Question::take(3)->orderBy('created_at', 'desc')->get() as $question)
                            @include('partials.question', $question)
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <p>Login Form</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endsection

@section('footer')
<script>
</script>
@endsection