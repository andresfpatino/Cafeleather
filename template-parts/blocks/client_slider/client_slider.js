(function($){

    var initializeBlock = function( $block ) {
        $block.find('.client_slider').slick({
            dots: false,
			autoplay: true,
			infinite: false,
			arrows: false,
			autoplaySpeed: 8000,
			slidesToShow: 4,
			slidesToScroll: 4,
			responsive: [
				{
					breakpoint: 769,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					},
				},
				{
					breakpoint: 501,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2,
					},
				},
			],
        });     
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.block_client_slider').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=slider', initializeBlock );
    }

})(jQuery);