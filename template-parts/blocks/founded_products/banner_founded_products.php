<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

$id = 'founded_product-' . $block['id'];

if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'founded_product';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>

<div class="<?php echo esc_attr($className); ?>">

    <?php if( have_rows('banner') ): ?>
        <?php while( have_rows('banner') ): the_row(); ?>
            <div class="banner-founded_product" style="background-image: url('<?php echo get_sub_field('image'); ?>')">
                <p class="subtitle"> <?php echo get_sub_field('subtitle'); ?> </p>
                <p class="title"> <?php echo get_sub_field('title'); ?> </p>
                <p class="caption"> <?php echo get_sub_field('caption'); ?> </p>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

    <div class="founded-info">
        <div class="col countdown_timer">
            <div id="<?php echo $block['id']; ?>"></div> 
            
            <script>
                var event_date = '<?php the_field("countdown_timer"); ?> '; // ACF field
                var countDownDate = new Date(event_date).getTime();  // Set the date we're counting down to
                
                // Update the count down every 1 second
                var x = setInterval(function() {
                    
                    var now = new Date().getTime(); // Get today's date and time              
                    var distance = countDownDate - now;   // Find the distance between now and the count down date
                    
                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                    var id = document.getElementById("<?php echo $block['id']; ?>");

                    // Output the result in an element with id="DateTimeInfo"
                    id.innerHTML = `
                        <div class="wrap_timer">
                            <span class="day"> <p>${days} </p><p class="label"><?php echo __("Day", "cafe_leather"); ?></p></span>
                            <span class="hour"> <p>${hours}</p><p class="label"><?php echo __("Hours", "cafe_leather"); ?></p></span>
                            <span class="min"> <p>${minutes}</p><p class="label"><?php echo __("Min", "cafe_leather"); ?></p></span>
                            <span class="sec"> <p>${seconds}</p><p class="label"><?php echo __("Sec", "cafe_leather"); ?></p></span> 
                        </div>
                    `;
                    
                    // If the count down is over, write some text 
                    if (distance < 0) {
                        clearInterval(x);
                        id.innerHTML = "Founded date is over";  
                    }
                }, 1000);
            </script>

        </div>
        <div class="col pre-sale">
            <?php echo __("Pre-Sale", "cafe_leather") . "<br>" . get_woocommerce_currency_symbol() . get_field('pre-sale'); ?>
        </div>
        <div class="col regular-price">
            <?php echo __("Regular", "cafe_leather") . "<br>" . "<del>" . get_woocommerce_currency_symbol() . get_field('regular') . "</del>"; ?>
        </div>
        <div class="col founded">
            <?php echo __("Founded ", "cafe_leather") . "<br>" . get_field('funded'); ?>%
        </div>

        <?php if( have_rows('button') ): ?>
            <?php while( have_rows('button') ): the_row(); ?>
                <div class="col button">
                    <a href="<?php echo get_sub_field('link'); ?>" class="button"> <?php echo get_sub_field('label'); ?> </a>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

    </div>


</div>