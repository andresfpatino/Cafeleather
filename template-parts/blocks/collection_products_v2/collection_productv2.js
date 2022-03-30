(function($){

	$('.more_products').on('click', function() {
		$(this).siblings('.--products-loaded').css('display', 'flex');
		$(this).siblings('.--products-loaded').animate({
			opacity: 1,
			marginTop: "0"
		}, 1500 );
	});

})(jQuery);