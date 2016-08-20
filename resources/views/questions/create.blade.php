@extends('layouts.master')

@section('title', 'Questions / Create')

@section('breadcrumbs', Breadcrumbs::render('questions.create'))

@section('content')
<div class="container">

    <!-- New Question Form -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['route' => 'questions.store']) !!}
                @include('partials.forms.question')
            {!! Form::close() !!}
        </div>
    </div>

    <br />

    <div class="row">
        <div class="col-xs-12">
            <div class="pull-right text-right">
                <button type="button" class="btn btn-link btn-xs" data-toggle="modal" data-target="#latexModal">Help with $\LaTeX$</button>
            </div>
        </div>
    </div>
    
</div>

<div class="modal fade" id="latexModal" tabindex="-1" role="dialog" aria-labelledby="latexModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="favoritesModalLabel">$\LaTeX$ Help</h4>
            </div>
            <div class="modal-body">
                Some examples of using Latex (lah'-tek) are below. 
                These should help you formulate the markup needed to include any mathematics needed for your questions.
                <table style="width: 100%">
                    <tr>
                        <th style="width: 50%">Text</th>
                        <th style="width: 50%">$\LaTeX$ Code</th>
                    </tr>
                    <tr>
                        <td>$\frac{x-1}{4x^3}$</td>
                        <td><pre>$\frac{x-1}{4x^3}$</pre></td>
                    </tr>
                    <tr>
                        <td>$\sum_{n=0}^\infty 2^{-n} = 2$</td>
                        <td><pre>$\sum_{n=0}^\infty 2^{-n} = 2$</pre></td>
                    </tr>
                    <tr>
                        <td>$\lim_{x\to\infty} \frac{1}{x} = 0$</td>
                        <td><pre>$\lim_{x\to\infty} \frac{1}{x} = 0$</pre></td>
                    </tr>
                    <tr>
                        <td>$\int_0^{2x}g(t)dt$</td>
                        <td><pre>$\int_0^{2x}g(t)dt$</pre></td>
                    </tr>
                    <tr>
                        <td>$f(x) = \begin{cases} 2x &
                                x \leq 0 \\
                                x^2 & x > 0
                            \end{cases}$</td>
                        <td><pre>$f(x) = \begin{cases}
    2x  & x \leq 0, \\
    x^2 & x > 0
\end{cases}$</pre></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<!-- TinyMCE -->
<script src='{{ asset('js/tinymce/tinymce.min.js') }}'></script>
<script src='{{ asset('js/tinymce/tinymce_config.js') }}'></script>
<!-- Select2 list -->
<script type="text/javascript">
    $('#standard_list').select2({ placeholder: "Choose Standard(s)" });
</script>
@endsection
