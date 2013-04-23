jQuery( function($) {
	setupSlides();
	//setupSubmenus();

});

var setupSlides = function() {
	$('.slider').slides({
		generatePagination: true,
		paginationClass: 'slides_pagination',
		currentClass: 'active',
		play: 5000,
		effect: 'fade',
		crossfade: true,
		hoverPause: true,
		pause: 500
	});
};

var setupSubmenus = function() {
	$('nav a').each(function(){
		if ( $(this).attr('href') == "#" ) {
			$(this).click(function(){
				return false;
			});
		}
	});

	$('.sub-menu .sub-menu').parent().find('> a').addClass('has-sub');

	$('nav li').hover(function(){
		$(this).find('> .sub-menu').show();
	}, function() {
		$(this).find('> .sub-menu').hide();
	});
}