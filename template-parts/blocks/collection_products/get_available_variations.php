<?php 

if ( ! defined( 'ABSPATH' ) ) exit;


if ( $product->get_type() == 'variable' ) {

    $size = 'pa_size';
    $color = 'pa_color'; 
    $output_size = array();
    $output_color = array();

    foreach ($product->get_available_variations() as $values) {
        foreach ( $values['attributes'] as $attr_variation => $term_slug ) {                                   
            if( $attr_variation === 'attribute_' . $size ){  // Targetting "Size" attribute only                      
                $output_size[$term_slug] = get_term_by( 'slug', $term_slug, $size )->name;
            } 
            if( $attr_variation === 'attribute_' . $color ){ // Targetting "Color" attribute only   
                $output_color[$term_slug] = get_term_by( 'slug', $term_slug, $color )->name;
            }
        }
    }
    if ( sizeof($output_size) > 0 ) : ?>
        <div class="variations">
            <div class="<?php echo $size; ?>"> <?php 
                foreach ($output_size as $outputRef) {
                    echo "<span class='term-name'>$outputRef</span>";
                } ?>
            </div>
        </div> <?php                                       
    endif;
    if ( sizeof($output_color) > 0 ) : ?>
        <div class="variations">
            <div class="<?php echo $color; ?>"> <?php 
                foreach ($output_color as $outputRef) {
                    echo "<span class='term-name'>$outputRef</span>";
                } ?>
            </div>
        </div> <?php
    endif;
}  