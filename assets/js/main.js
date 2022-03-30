(function($) {

/*
 * Klaviyo forms
 * */	
// Set privacy policy text --
setInterval(function(){ 
    $('label.kl-private-reset-css-Xuajs1 div.kl-private-reset-css-Xuajs1:contains("CHANGE_TEXT")').html('I have read  and accept the <a href="https://cafeleather.com/privacy-policy/" target="_blank" rel="noreferrer noopener">Privacy policy</a> and i want to suscribe to the newsletter');
    $('label.kl-private-reset-css-Xuajs1 div.kl-private-reset-css-Xuajs1:contains("CAMBIA_TEXTO")').html('He leído y acepto la <a href="https://cafeleather.com/es/politica-de-privacidad/" target="_blank" rel="noreferrer noopener">Política de privacidad</a> y deseo suscribirme a la newsletter.');
}, 10);

// Slidedown TopBar --
$(".accordion-header").click(function() {
   $('.accordion-body').toggleClass("open");
   $('.accordion-header .fa').toggleClass( "fa-angle-down" ).toggleClass( "fa-angle-up" );
});


/* 
 * Mega menu
 *  */
let icon_arrow = `<span role="presentation" class="dropdown-menu-toggle"><span class="gp-icon icon-arrow"><svg viewBox="0 0 330 512" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"><path d="M305.913 197.085c0 2.266-1.133 4.815-2.833 6.514L171.087 335.593c-1.7 1.7-4.249 2.832-6.515 2.832s-4.815-1.133-6.515-2.832L26.064 203.599c-1.7-1.7-2.832-4.248-2.832-6.514s1.132-4.816 2.832-6.515l14.162-14.163c1.7-1.699 3.966-2.832 6.515-2.832 2.266 0 4.815 1.133 6.515 2.832l111.316 111.317 111.316-111.317c1.7-1.699 4.249-2.832 6.515-2.832s4.815 1.133 6.515 2.832l14.162 14.163c1.7 1.7 2.833 4.249 2.833 6.515z"></path></svg></span></span>`;
	
$(".has-megamenu").addClass('menu-item-has-children');
	
$(".has-megamenu").mouseover(function(){
	$(".main-navigation").addClass("mega-menu-active");
	$(".mega-menu").fadeIn(300);	
});
	
$(".mega-menu").mouseleave(function(){
	$(".main-navigation").removeClass("mega-menu-active");
	$(".mega-menu").fadeOut(300);	
});	
	
$(".main-nav .menu-item:not(.has-megamenu)").mouseover(function(){
	$(".main-navigation").removeClass("mega-menu-active");
	$(".mega-menu").fadeOut(300);	
});
	
$(".klaviyo-topbar").mouseover(function(){
	$(".main-navigation").removeClass("mega-menu-active");
	$(".mega-menu").fadeOut(300);	
});	
	
	
$(".menu-sticky .categories > .menu-item-has-children > a").append(icon_arrow);	

	
$(window).scroll(function(e){ 
	var $menuSticky = $('.menu-sticky'); 
	var $filterOrdering = $('.woocommerce-ordering');
	
	if ($(this).scrollTop() > 387 ){ 
	  $menuSticky.addClass('active'); 
	  $filterOrdering.addClass('fixed');
	}
	if ($(this).scrollTop() < 387 ){
	  $menuSticky.removeClass('active');
	  $filterOrdering.removeClass('fixed');
	} 
});


/*
* Side cart menu
* */
$('.menu-bar-items a.cart-contents').addClass('xoo-wsc-cart-trigger');
$('.menu-bar-items a.cart-contents').removeAttr('href');
	

/*
* Menu mobile
* */
$(".slideout-navigation .menu li.submenu-arrow.menu-item-has-children > a").append(`${icon_arrow}`);
$('.slideout-navigation .menu .sub-menu').hide();
    // open submenu
    $('.slideout-navigation .menu-item > a').click(function(){
        if($(this).next(".sub-menu").is(":hidden")){
            $(this).next('.sub-menu').slideDown();
            $(this).find('.dropdown-menu-toggle').addClass("turn");   
        } else {
            $(this).next('.sub-menu').slideUp();
            $(this).find('.dropdown-menu-toggle').removeClass("turn"); 
        }        
    });	
	
	
/*
 * Switch Login / register tabs
 * */
$('.login-click').on('click', function(e) {
    $(".register-form").css("display", "none");
    $("#customer_login").css("display", "flex");
    $(".login-click").addClass("actives");
    $(".register-click").removeClass("actives");

});
$('.register-click').on('click', function(e) {
    $("#customer_login").css("display", "none");
    $(".register-form").css("display", "flex");
    $(".register-click").addClass("actives");
    $(".login-click").removeClass("actives");
});	
	

	
})(jQuery);

