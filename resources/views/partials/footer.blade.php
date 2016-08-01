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

<!-- Flash message retreat -->
<script type="text/javascript">
$('div.alert-success').delay(3000).slideUp(200);
</script>

<!-- Jumbotron Toggler -->
<script>
$(document).ready(function(){
    $(".jumbotron-toggler").click(function(){
        $(".jumbotron .details").slideToggle();
        $(".jumbotron-toggler > span").toggleClass('fa-angle-double-down fa-angle-double-up');
    });
});
</script>

<!-- Actual Footer -->

  <footer>
	
</footer>