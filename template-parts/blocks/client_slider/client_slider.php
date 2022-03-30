<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

$id = 'client_slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block_client_slider';
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
	<?php if( have_rows('client_slide') ): ?>
		<div class="container-cl">
			<div class="client_slider">
				<?php while( have_rows('client_slide') ): the_row();
					$text = get_sub_field('text');
					$image = get_sub_field('image'); ?>			
					<div class="client_slide">
						<p class="client_slide__text"><?= $text; ?></p>
						<img class="client_slide__logo skip-lazy" src="<?php echo esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?> 
</div>