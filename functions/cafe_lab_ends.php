<?php 

/**
 * Cafe Lab Ends
*/
if (is_plugin_active('woocommerce-pre-orders/woocommerce-pre-orders.php')) {

    add_action( 'woocommerce_before_add_to_cart_button', 'display_cafe_lab_end' );
 
    function display_cafe_lab_end() {
        global $product;
        if ( WC_Pre_Orders_Product::product_can_be_pre_ordered( $product ) ) {
            $cafe_lab_end = get_post_meta( get_the_ID(), 'cafe_wc_pre_orders_cafe_lab_end', true );
            $cafe_lab_end_date = esc_attr( ( 0 === $cafe_lab_end ) ? '' : date( 'M j, Y H:i:s', $cafe_lab_end ) );
            $cafe_lab_founded = get_post_meta( get_the_ID(), 'cafe_wc_pre_orders_fund', true );

            echo '<div class="cafe-lab-single">';

            if( ! empty( $cafe_lab_end ) ) {
                ?> 
                <script>
                    var dateCafeEnd = <?php echo json_encode($cafe_lab_end_date); ?>;
                    var countDownDate = new Date(dateCafeEnd).getTime();
                    // Update the count down every 1 second
                    var x = setInterval(function() {

                    // Get today's date and time
                    var now = new Date().getTime();
                        
                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;
                        
                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        
                    // Output the result in an element with id="demo"
                    document.getElementById("cafe-countdown-lab").innerHTML = days + "d " + hours + "h "
                    + minutes + "m " + seconds + "s ";
                        
                    // If the count down is over, write some text 
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("cafe-countdown-lab").innerHTML = "EXPIRED";
                    }
                    }, 1000);
                </script> 
                <?php echo '<div class="end-lab">CAFÉ_LAB ENDS: <span id="cafe-countdown-lab"></span></div>';
            }

            if( $cafe_lab_founded >= 0 && $cafe_lab_founded != '' ) {
                echo '<div class="founded-lab">'.$cafe_lab_founded.'% Funded</div>';
            }

            echo '</div>';

            if( $cafe_lab_founded >= 0 && $cafe_lab_founded != '' ) { ?>
                <script>
                    jQuery( document ).ready( function( $ ) {
                        const progress = document.querySelector('.progress-done');
                        progress.style.width = progress.getAttribute('data-done') + '%';
                        progress.style.opacity = 1;
                    });
                </script> 
                <?php echo '<div class="progress"><div class="progress-done" data-done="'.$cafe_lab_founded.'"></div></div>';
            }

            echo '</br>';
        }
    }
}