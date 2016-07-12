<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Latest compiled and minified CSS for Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/nav.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/user.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/question.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/comment.css') }}">
    <!-- Bootswatch Theme -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/themes/flatly.min.css') }}">
</head>
<body id="app-layout">
    @include('partials.header')
    @include('partials.errors')
    @yield('content')
    @include('partials.footer')
    
    <!-- Tether for Bootstrap Tooltips -->
    <script type="text/javascript" src="{{ asset('src/js/tether.min.js') }}"></script>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    
    <!-- Bootstrap Tooltips function -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip({
                placement : 'top'
            });
        });
    </script>
    
    <!-- Latest compiled and minified JavaScript for Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- MathJax -->
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
          tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
        });
    </script>
    <script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML"></script>
    
    <script type="text/javascript">
        $('div.alert-success').delay(3000).slideUp(200);
    </script>
    
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
