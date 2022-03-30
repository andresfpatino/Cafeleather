<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ), 'images',
	)
);
$attachment_ids = $product->get_gallery_image_ids();
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
	<figure class="custom-slider-jm woocommerce-product-gallery__wrapper swiper-container hongo-single-product-slider<?php echo esc_attr( $lighbox_wrap_class ); ?>">
		<div class="swiper-wrapper">
			<?php
				$attachment_id = $product->get_image_id();
				if ( has_post_thumbnail() ) {

					$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
					$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
					$image_size        = apply_filters( 'woocommerce_gallery_image_size', 'woocommerce_single' );
					$full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
					$thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
					$full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
					$image             = wp_get_attachment_image( $attachment_id, $image_size, false, array(
						'title'                   => get_post_field( 'post_title', $attachment_id ),
						'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
						'data-src'                => $full_src[0],
						'data-large_image'        => $full_src[0],
						'data-large_image_width'  => $full_src[1],
						'data-large_image_height' => $full_src[2],
						'class'                   => 'wp-post-image',
					) );

					$html = '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" class="woocommerce-product-gallery__image swiper-slide"><a href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';

				} else {
					$html  = '<div class="swiper-slide woocommerce-product-gallery__image--placeholder">';
					$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'hongo' ) );
					$html .= '</div>';
				}

				// Main Image
				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );

				if ( $attachment_ids && $product->get_image_id() ) {
					foreach ( $attachment_ids as $attachment_id ) {

						$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
						$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
						$image_size        = apply_filters( 'woocommerce_gallery_image_size', 'woocommerce_single' );
						$full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
						$thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
						$full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
						$alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
						$image             = wp_get_attachment_image( $attachment_id, $image_size, false, array(
							'title'                   => get_post_field( 'post_title', $attachment_id ),
							'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
							'data-src'                => $full_src[0],
							'data-large_image'        => $full_src[0],
							'data-large_image_width'  => $full_src[1],
							'data-large_image_height' => $full_src[2],
							'class'                   => 'hongo-product-gallery-image',
						) );

						$html = '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" data-thumb-alt="' . esc_attr( $alt_text ) . '" class="woocommerce-product-gallery__image swiper-slide"><a href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';
						
						// Gallery Image
						echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
					}
				}
			?>
		</div>
		<div class="swiper-button-prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1077.21 2039.8"><path d="M1569.82,2104.83a53.7,53.7,0,0,1-38.35-16.21L546.3,1086.19l985.17-1005a53.68,53.68,0,1,1,76.69,75.12h0L696.72,1086l911.44,927.3a53.86,53.86,0,0,1-38.34,91.51Z" transform="translate(-546.3 -65.03)"/></svg></div>
		<div class="swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1077.21 2039.8"><path d="M600,2104.83a53.87,53.87,0,0,1-38.35-91.51L1473.08,1086,561.64,156.27h0a53.68,53.68,0,1,1,76.7-75.12l985.17,1005L638.34,2088.62A53.72,53.72,0,0,1,600,2104.83Z" transform="translate(-546.3 -65.03)"/></svg></div>
		
		<div class="swiper-pagination"></div>
	</figure>
</div>
