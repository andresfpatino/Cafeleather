<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

if( have_rows('group_hero_full') ):
    while( have_rows('group_hero_full') ): the_row();  ?>
        <div class="hero-full-banner">
            <a class="hero-banner-link" style="color: <?= get_sub_field('text_color'); ?>" href="<?= get_sub_field('url_button'); ?>">
                <div class="inner-banner" style="background-image: url('<?= get_sub_field('background_image'); ?>');">								
                    <div class="half-info">
                        <h3 class="title"> <?= get_sub_field('title'); ?> </h3>
                        <p class="paragraph"> <?= get_sub_field('paragraph'); ?> </p>
                        <span class="button"> <?php _e( 'View all', 'cafe_leather'); ?> </span>
                    </div>	
                </div>
            </a>
        </div>
		<style>.button:hover {background-color: <?= get_sub_field('text_color'); ?>; border-color: #fff; color: #363636; }</style><?php 
    endwhile;
endif;


if( have_rows('group_4_products') ):
    while( have_rows('group_4_products') ): the_row();
        
        $id_main_products = get_sub_field('main_products');          
        if( $id_main_products ): ?>
            <div class="grid-products --main-products"> <?php    
                $arg = array(
                    'post_type' => 'product',
                    'post__in' => $id_main_products,
                    'posts_per_page' => 4,
                    'order' => 'DESC',
                    'orderby' => 'NAME'
                ); $mainProducts = new WP_Query($arg);

                if($mainProducts->have_posts()) :
                    while($mainProducts->have_posts()) : $mainProducts->the_post() ; 
                        
                        global $product; ?>            

                        <div class="product"> 
                            <a class="product-link" href="<?php the_permalink(); ?>">                     
                                <div class="imagebox">   <?php   
                                   
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
                                    endforeach;  ?>   
                                </div>
                                <div class="product-info"> <?php
									$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
									$subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
									<h2 class="product-name">
										<?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>		
										<span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>		
									</h2> 
                                    <div class="price"><?php echo $product->get_price_html(); ?></div> <?php                                   
                                    
                                    # include(dirname(__FILE__).'/get_available_variations.php');
                                    
                                    echo do_shortcode('[Woo_stamped_io type="badge" ]'); ?>
                                </div>
                            </a>
                        </div> <?php 
                    endwhile; 
                    wp_reset_postdata();
                endif; ?>
            </div> 
        <?php endif; 
    endwhile;
endif;