<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    @yield('title')
    </title>
    <!-- Fonts & Icons -->
    <link href="{{ asset('css/materialdesignicons.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <style type="text/css">
        body {
            background-color: #fff;
        }
        div {
            padding: 0 100px;
        }
        @media print {
            body {
                margin: 0;
                padding: 0;
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }
            div {
                padding: 0 20px;
            }
            .content {
                font-size: 10pt;
                flex: 0.99;
            }
            .standards {
                font-size: 8pt;
            }
        }
    </style>
</head>
<body id="app-layout">
    <main class="content">
        @yield('question')
    </main>
    <hr />
    <div class="standards">
        @yield('standards')
    </div>
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
</body>
</html>
