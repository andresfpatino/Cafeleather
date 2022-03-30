<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

$id = 'collection_products-' . $block['id'];

if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'collection_products';
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

<div class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>" >
	<?php 
	if( get_field('style') == 'version_one' ) : ?>
		<div class="<?php echo esc_attr($className); ?>--version_one">            
			<?php if( have_rows('group_version_one') ): 
				while( have_rows('group_version_one') ): the_row(); 

					include(dirname(__FILE__).'/version_one.php'); 

					if( have_rows('group_hero_small') ):
						while( have_rows('group_hero_small') ): the_row(); ?>
							<a class="more_products" href="<?php echo get_sub_field('url_button'); ?>"> <?php _e( 'Show more', 'cafe_leather'); ?> </a> <?php
						endwhile;
					endif;
				endwhile;
			endif; ?>
		</div> 
	<?php elseif (get_field('style') == 'version_two') : ?>
		<div class="<?php echo esc_attr($className); ?>--version_two">
			<?php if( have_rows('group_version_two') ): 
				while( have_rows('group_version_two') ): the_row(); 

					include(dirname(__FILE__).'/version_two.php');
					
					if( have_rows('group_hero_full') ):
						while( have_rows('group_hero_full') ): the_row(); ?>
							<a class="more_products" href="<?php echo get_sub_field('url_button'); ?>"> <?php _e( 'Show more', 'cafe_leather'); ?> </a> <?php
						endwhile;
					endif;
				endwhile;
			endif; ?>
		</div>
	<?php endif; ?>
</div>