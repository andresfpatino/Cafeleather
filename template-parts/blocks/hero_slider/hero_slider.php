<?php 

/**
 * Hero slider Block Template.
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
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
	<?php if( have_rows('cf_hero_slider') ): ?>
		<div class="hero_slider">
			<?php while( have_rows('cf_hero_slider') ): the_row(); 
				$image = get_sub_field('background_image');
				$label = get_sub_field('label');
				$title = get_sub_field('title'); 
				$alignment = get_sub_field('alignment');  ?>
				<div class="hero_slide" style="background-image: url('<?= $image; ?>');">
					<div class="container-cl">
						<div class="hero_slide__caption <?php if($alignment == 'left') : ?> left <?php elseif($alignment == 'center') : ?>center <?php elseif($alignment == 'right') : ?>right <?php endif; ?>">
							<p class="hero_slide__label"><?= $label; ?></p>
							<p class="hero_slide__title"><?= $title; ?></p>
							<?php	
								$use_button = get_sub_field( 'use_button');	
								if ( $use_button == true ) :	
									if( have_rows('button') ):
										while( have_rows('button') ): the_row(); 
											$label_button = get_sub_field('label_button'); 
											$url_button = get_sub_field('url_button'); ?> 
											<a class="hero_slide__button" href="<?= $url_button; ?>"> <?= $label_button; ?> </a> <?php
										endwhile;
									endif;
								endif;
							?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	

	<?php endif; ?> 
</div>


