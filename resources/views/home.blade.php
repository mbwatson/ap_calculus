@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    @if (Auth::user())
                        'You are logged in!'
                    @else
                        <a href="login">Login</a>
                    @endif
                </div>
                <div class="panel-footer">
                    sdfkjlh
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
