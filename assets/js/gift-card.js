if ( jQuery("body").hasClass("postid-119972") || jQuery("body").hasClass("postid-119975") ) {

    jQuery("#ywgc-sender-name").prop('required',true);

    jQuery(document).on('click', 'a[href^="#choose-amount"]', function (event) {
        event.preventDefault();
        jQuery('html, body').animate({
            scrollTop: jQuery(jQuery.attr(this, 'href')).offset().top - 90
        }, 500);
    })

    jQuery(function() {
        jQuery( ".datepicker" ).datepicker( "destroy" );
        jQuery( "#ywgc-delivery-datee" ).datepicker({ dateFormat: "dd/mm/yy", minDate: 0, maxDate: "+1Y" });
        jQuery("#ywgc-delivery-datee").on("change",function(){
            var selected = jQuery(this).val();
            jQuery('#ywgc-delivery-date').attr('value', selected);
        });
    });

    window.addEventListener('DOMContentLoaded', () => {
        if ( jQuery('.woocommerce-notices-wrapper').children().length > 0 ) {
            jQuery('html').toggleClass('hongo-mini-cart-slide-sidebar-wrap');
            jQuery('.widget_shopping_cart ').toggleClass('active');
            setTimeout(function(){ 
                jQuery('.woocommerce-notices-wrapper').hide(); 
            }, 9500);
            
        }
    });


}