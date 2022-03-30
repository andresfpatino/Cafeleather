<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

function add_size_variations() {
    global $product;
    if ( $product->get_type() == 'variable' ) {
  
      $size = 'pa_size'; 
      $output_size = array();
  
      foreach ($product->get_available_variations() as $values) {
          foreach ( $values['attributes'] as $attr_variation => $term_slug ) {                                   
              if( $attr_variation === 'attribute_' . $size ){  // Targetting "Size" attribute only                      
                  $output_size[$term_slug] = get_term_by( 'slug', $term_slug, $size )->name;
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
    } 
  } 
  add_action( 'woocommerce_after_shop_loop_item_title', 'add_size_variations', 7, 0 );  
  