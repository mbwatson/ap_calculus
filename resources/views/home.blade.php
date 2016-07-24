@extends('layouts.master')

@section('content')

<div class="container">
    
    <h1>AP Calculus Question Forum</h1>
    
    <div class="row">
        <div class="col-xs-12">

            @if (Auth::user())
                'You are logged in!'
            @else
                Do yourself a favor: <a href="login">LOG IN</a>!
            @endif

            <p>Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site.</p>

            <p>Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site.</p>

            <p>Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site.</p>
            
            <p>Description of this site.</p>

        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection