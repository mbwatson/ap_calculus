$('a.favorite').click(function(evt) {
	evt.preventDefault();
	$(this).toggleClass("text-primary text-muted");
	$.ajax({
		method: 'get',
		url: $(this).attr('href'),
	})
	.done(function(msg) {
		console.log(msg['message']);
	});
})
