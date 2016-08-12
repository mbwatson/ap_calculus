$(document).ready(function(){
    $(".jumbotron-toggler").click(function(){
        $(".jumbotron .details").slideToggle();
        $(".jumbotron-toggler > span").toggleClass('mdi-chevron-double-down mdi-chevron-double-up');
    });
});
