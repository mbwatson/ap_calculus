$('a.favorite').click(function(evt) {
	evt.preventDefault();
	if ($(this).hasClass('text-muted')) {
		$(this).attr('title', 'Remove from Favorites').tooltip('fixTitle').tooltip('show');
	} else {
		$(this).attr('title', 'Add to Favorites').tooltip('fixTitle').tooltip('show');
	}
	$(this).toggleClass("text-muted text-danger");
	$(this).children('i').toggleClass("mdi-heart mdi-heart-outline");
	$.ajax({
		method: 'get',
		url: $(this).attr('href'),
	})
	.done(function(msg) {
		console.log(msg['message']);
	});
})

$('a.like').click(function(evt) {
	evt.preventDefault();
	if ($(this).hasClass('text-muted')) {
		$(this).attr('title', 'Unlike').tooltip('fixTitle').tooltip('show');
	} else {
		$(this).attr('title', 'Like').tooltip('fixTitle').tooltip('show');
	}
	$(this).toggleClass("text-muted text-primary");
	$(this).children('i').toggleClass("mdi-thumb-up mdi-thumb-up-outline");
	$.ajax({
		method: 'get',
		url: $(this).attr('href'),
	})
	.done(function(msg) {
		console.log(msg['message']);
	});
})

$('div.alert-success').delay(3000).slideUp("500");

$(document).ready(function(){
    $(".jumbotron-toggler").click(function(){
        $(".jumbotron .details").slideToggle();
        $(".jumbotron-toggler > span").toggleClass('mdi-chevron-double-down mdi-chevron-double-up');
    });
});

//# sourceMappingURL=all.js.map
