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
