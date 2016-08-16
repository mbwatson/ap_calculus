<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title', 'AP Calculus Question Forum')</title>

  <!-- Fonts & Icons -->
  <link href="{{ asset('css/materialdesignicons.min.css') }}" media="all" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  
  <!-- Select2 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
</head>

<body>
  <header>
    @include('partials.nav')
    @yield('breadcrumbs')
    @yield('header')
  </header> 

  @include('partials.alerts')

  <div id="main">
    @yield('content')
  </div>

  <footer>
    @include('partials.footer')
  </footer>

  <!-- Tether for Bootstrap Tooltips -->
  <script type="text/javascript" src="{{ asset('js/tether.min.js') }}"></script>
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
  <!-- Select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <!-- MathJax -->
  <script type="text/x-mathjax-config">
    MathJax.Hub.Config({
      tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
    });
  </script>
  <script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML"></script>
  <script type="text/x-mathjax-config">
    MathJax.Hub.Register.StartupHook("TeX Jax Ready",function () {
      var TEX = MathJax.InputJax.TeX;
      var PREFILTER = TEX.prefilterMath;
      TEX.Augment({
        prefilterMath: function (math,displaymode,script) {
          math = "\\displaystyle{"+math+"}";
          return PREFILTER.call(TEX,math,displaymode,script);
        }
      });
    });
  </script>
  <!-- All My Scripts in One -->
  <script type="text/javascript" src="{{ asset('js/all.js') }}"></script>

  @yield('footer')

</body>
</html>
