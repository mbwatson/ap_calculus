@extends('layouts.master')

@section('content')

<div class="container">
    
    <header>AP Calculus Question Forum</header>
    
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (Auth::user())
                        'You are logged in!'
                    @else
                        Do yourself a favor: <a href="login">LOG IN</a>!
                    @endif
                </div>
                <div class="panel-footer">
                    <p>Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site.</p>

                    <p>Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site.</p>

                    <p>Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site. Description of this site.</p>
                    
                    <p>Description of this site.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
