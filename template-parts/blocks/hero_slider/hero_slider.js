(function($){

    var initializeBlock = function( $block ) {
        $block.find('.hero_slider').slick({
            dots: true,
			autoplay: true,
			infinite: true,
			arrows: true,
			autoplaySpeed: 8000,
			slidesToShow: 1,
			slidesToScroll: 1,
			prevArrow:"<span class='slick-prev'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1077.21 2039.8'><path d='M1569.82,2104.83a53.7,53.7,0,0,1-38.35-16.21L546.3,1086.19l985.17-1005a53.68,53.68,0,1,1,76.69,75.12h0L696.72,1086l911.44,927.3a53.86,53.86,0,0,1-38.34,91.51Z' transform='translate(-546.3 -65.03)'/></svg></span>",
      		nextArrow:"<span class='slick-next'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1077.21 2039.8'><path d='M600,2104.83a53.87,53.87,0,0,1-38.35-91.51L1473.08,1086,561.64,156.27h0a53.68,53.68,0,1,1,76.7-75.12l985.17,1005L638.34,2088.62A53.72,53.72,0,0,1,600,2104.83Z' transform='translate(-546.3 -65.03)'/></svg></span>",
        responsive: [
			{
				breakpoint: 769,
				settings: {
					arrows: false
				}
			}
		]
        });     
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.slider').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=slider', initializeBlock );
    }

})(jQuery);