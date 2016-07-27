<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $question->title }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
  
  <!-- Latest compiled and minified CSS for Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  
  <!-- Bootswatch Theme -->
  <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/themes/yeti.min.css') }}">

  <!-- Custom Styling -->
  <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/main.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/nav.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/user.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/question.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/comment.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/standard.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/comment.css') }}">

  <link rel="stylesheet" type="text/css" href="/css/jquery.atwho.min.css">
  
</head>
<body id="app-layout">
  @yield('content')
  @include('partials.footer')
</body>
</html>
