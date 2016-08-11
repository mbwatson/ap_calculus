$('a.favorite').click(function(evt) {
	evt.preventDefault();
	$(this).toggleClass("text-muted text-primary");
	$(this).children('i').toggleClass("mdi-heart mdi-heart-outline");
	$.ajax({
		method: 'get',
		url: $(this).attr('href'),
	})
	.done(function(msg) {
		console.log(msg['message']);
	});
})
