<?php 

/**
 * Single product block template
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Create id attribute allowing for custom "anchor" value.
$id = 'product-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'product_block';
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

<div class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>" > <?php 
    
	$productField = get_field('data_product');

	$arg = array(
		'post_type' => 'product',
		'posts_per_page' => 1,
		'post__in'=>  array($productField->ID)
	); $mainProducts = new WP_Query($arg);
    
	if($mainProducts->have_posts()) :
		while($mainProducts->have_posts()) : $mainProducts->the_post() ; 
			global $product; ?>  
			<a class="<?php echo esc_attr($className); ?>--link" href="<?php  the_field('url'); ?>">
				<h3> <?php the_field('title'); ?> </h3>                        
				<?php if (has_post_thumbnail()) : the_post_thumbnail('large', ['class' => 'imagebox skip-lazy']); endif; ?>				
				<div class="<?php echo esc_attr($className); ?>--info"> <?php 
					$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
					$subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
					<h2 class="<?php echo esc_attr($className); ?>--name">
						<?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>        
						<span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>      
					</h2>
					<div class="<?php echo esc_attr($className); ?>--price"><?php echo $product->get_price_html(); ?></div>
				</div>
				<p class="<?php echo esc_attr($className); ?>--button"> <span><?php echo __('Shop now', 'cafe_leather'); ?></span> </p>
			</a> <?php 
			endwhile; 
		wp_reset_postdata();
	endif; ?>
</div>