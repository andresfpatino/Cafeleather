<?php 

if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="grid-products --secondary-products --products-loaded"> <?php

    $main_products = get_sub_field('main_products');
    $secondary_products = get_sub_field('secondary_products'); 

    if($secondary_products == NULL ){
        $exclude_products = $main_products;
    } elseif ($main_products == NULL) {
        $exclude_products = $secondary_products;
    } else {
        $exclude_products = array_merge($main_products, $secondary_products);
    }

    $arg = array(
        'post_type' => 'product',
        'post_status'	=> 'publish',
        'posts_per_page' => -1,
        'order' => 'DESC',
        'orderby' => 'NAME',
        'tax_query' => array(
            array (
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $term->slug
            )
        ), 
        'post__not_in' => $exclude_products
    );
    $moreProducts = new WP_Query( $arg );

    if($moreProducts->have_posts()) :
        while($moreProducts->have_posts()) : $moreProducts->the_post() ; 
        
            global $product; ?>   
            <div class="product"> 
                <a class="product-link" href="<?php the_permalink(); ?>">                        
                    <div class="imagebox"> <?php  
                        if (has_post_thumbnail()) :                                        	
                            the_post_thumbnail('large', ['class' => 'front-image skip-lazy']);
                        else: ?>
                            <img class="front-image skip-lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/thumb-product.png" alt="<?= get_the_title(); ?>"> <?php
                        endif;  

                        $attachment_ids = $product->get_gallery_image_ids();
                        $i = 1;

                        foreach( $attachment_ids as $attachment_id ) : ?>                                    
                            <img class="back-image skip-lazy" src=" <?php echo $image_link = wp_get_attachment_image_src( $attachment_id, 'large')[0]; ?>" alt="<?= get_the_title(); ?>">
                            <?php 
                            if ($i == 1) { break; } $i++;                                     
                        endforeach; ?>   


                    </div>
                    <div class="product-info">
                        <div class="product-name"> <?php echo the_title(); ?> </div>
                        <div class="price"><?php echo $product->get_price_html(); ?></div> <?php					
                        
                        # include(dirname(__FILE__).'/get_available_variations.php');	

                        echo do_shortcode('[Woo_stamped_io type="badge" ]'); ?>	

                    </div>
                </a>
            </div> <?php 
        endwhile; 
        wp_reset_postdata();
    endif;
?>
</div>

<span class="more_products"><?php echo __( 'Load more', 'cafe_leather'); ?></span> 