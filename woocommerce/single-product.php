<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.

* @see 	    https://docs.woocommerce.com/document/template-structure/
* @author 		WooThemes
* @package 	WooCommerce/Templates
* @version     1.6.4

*/


if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header('shop'); 

$cupon = get_post_meta("116818", 'coupon_amount', true);

//global $product;
$product = wc_get_product( $post);
$price_sales = $product->get_sale_price();

if (empty($price_sales)) {
	$price_sales = 0;
}


/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */

do_action('woocommerce_before_main_content'); 


while ( have_posts() ) :
	the_post();
	wc_get_template_part( 'content', 'single-product' ); 
endwhile; 


/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */

do_action('woocommerce_after_main_content');


/* 
 * ACF Fields Info product
* */ ?>

<!-- Materials, description, specification -->
<?php if( have_rows('product_materials_specifications') ): ?>	
<section class="description"> 
	<div class="container-cl">
		<div class="wrap">		
			<?php while( have_rows('product_materials_specifications') ): the_row(); ?>
				<div class="col-3">
					<?php if( get_sub_field('description') ): ?>
						<div class="details">
							<h3> <?php echo __( 'Description', 'cafe_leather'); ?> </h3>
							<?php echo get_sub_field('description'); ?>
						</div>
					<?php endif;?>
					<?php if( get_sub_field('materials') ): ?>
						<div class="materials">
							<h3> <?php echo __( 'Material', 'cafe_leather'); ?> </h3>
							<?php echo get_sub_field('materials'); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-3">			
					<?php if( get_sub_field('specifications') ): ?>
						<div class="specifications">
							<h3> <?php echo __( 'Specifications', 'cafe_leather'); ?> </h3>
							<?php echo get_sub_field('specifications'); ?>
						</div>
					<?php endif; ?>	
				</div>
				<div class="col-3">
					<?php if( get_sub_field('guarantee') ): ?>
						<div class="guarantee">
							<h3> <?php echo __( '"Made to last" guarantee', 'cafe_leather'); ?> </h3>
							<?php echo get_sub_field('guarantee'); ?>
						</div>
					<?php endif;?>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>


<!-- Reviews -->
<?php if( have_rows('testimonials') ): ?>
<section class="reviews"> 	
	<div class="container-cl">
		<h3 class="title-reviews"> <?php echo __( "What they're saying", "cafe_leather"); ?> </h3>
		<div class="wrap">
			<?php while( have_rows('testimonials') ) : the_row(); ?>
			
				<div class="col-3">	
					<div class="review">
						<i class="fas fa-quote-left"></i>						
						<p class="review-name"> <?php echo get_sub_field('name'); ?> </p>
						<div class="review-verifed">
							<i class="fa fa-certificate"></i> <?php echo __( 'Verifed buyer', 'cafe_leather'); ?>			
						</div>
						<p class="review-text"><?php echo get_sub_field('text'); ?></p>
						<p class="review-note"> <?php echo get_sub_field('note'); ?> </p>

						<div class="review-stars" rank="<?php echo get_sub_field('stars'); ?>">
							<?php 				
							switch (get_sub_field('stars')) {
								case 5:
									echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
									break;
								case 4:
									echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i>";
									break;
								case 3:
									echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";
								break;
								case 2:
									echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";
								break;
								case 1:
									echo "<i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";
								break;
							} ?>
						</div>
					</div>					
				</div>
			
			<?php endwhile; ?>    
		</div>
	</div>
</section>
<?php endif;?>	


<!-- Flexible Content -->
<?php if( have_rows('banners_template') ): ?>
<div class="promotion-section">	
    <?php while( have_rows('banners_template') ): the_row(); ?>

		<?php if( get_row_layout() == 'full_width' ): ?>
		
			<div class="full-width-banner" style="background-image: url('<?php the_sub_field('background_image')?>')">
				<div class="container-cl">				
					
					<?php if( get_sub_field('content') == 'text' ) : ?>										
						<?php if( have_rows('content_text') ): ?>
							<?php while( have_rows('content_text') ): the_row(); ?>
								<p class="subtitle" style="color: <?php echo get_sub_field('color'); ?>"> <?php the_sub_field('subtitle'); ?> </p>
								<p class="title" style="color: <?php echo get_sub_field('color'); ?>"> <?php the_sub_field('title'); ?> </p>
							<?php endwhile; ?>
						<?php endif; ?>
						
					<?php elseif (get_sub_field('content') == 'image') : ?>
						<?php if( have_rows('content_image') ): ?>
							<?php while( have_rows('content_image') ): the_row(); ?>

								<img style="width: <?php echo get_sub_field('size'); ?>px" src="<?php echo get_sub_field('image'); ?>" alt="">

							<?php endwhile; ?>
						<?php endif; ?>	
					<?php endif; ?>

				</div>
			</div>
	
		<?php elseif( get_row_layout() == 'card_text' ): ?>
			<section class="card_text_module">				
				<div class="container-95">
					<div class="col-50">
						<?php if( get_sub_field('banner') ) : ?>
						<img src="<?php echo the_sub_field('banner')?>">
						<?php endif; ?>						
					</div>
					<div class="col-50">
						<div class="caption">
							<?php if( get_sub_field('subtitle') ) : ?> <span class="preheading-title"><?php the_sub_field('subtitle'); ?></span> <?php endif; ?>			
							<?php if( get_sub_field('title') ) : ?> <span class="heading-title"><?php the_sub_field('title'); ?> </span><?php endif; ?>		
							<?php if( get_sub_field('paragraph') ) : ?><span class="paragraph"> <?php the_sub_field('paragraph'); ?> </span> <?php endif; ?>	
							<?php if( have_rows('button') ): ?>
								<?php while ( have_rows('button') ) : the_row(); ?>
									<a class="wide-button" href="<?php the_sub_field('link'); ?>">  <?php the_sub_field('label'); ?> </a>
								<?php endwhile; ?>								
							<?php endif; ?>						
						</div>
					</div>
				</div>				
			</section>

		<?php elseif( get_row_layout() == 'mid_width' ): ?>

			<div class="mid-width-banner" style="background-image: url('<?php the_sub_field('background_image')?>')">
				<div class="container-cl">	
					<?php if( get_sub_field('content') == 'text' ) : ?>	

						<?php if( have_rows('content_text') ): ?>
							<?php while( have_rows('content_text') ): the_row(); ?>
								<p class="subtitle" style="color: <?php echo get_sub_field('color'); ?>"> <?php the_sub_field('subtitle'); ?> </p>
								<p class="title" style="color: <?php echo get_sub_field('color'); ?>"> <?php the_sub_field('title'); ?> </p>
							<?php endwhile; ?>
						<?php endif; ?>

					<?php elseif (get_sub_field('content') == 'image') : ?>
						<?php if( have_rows('content_image') ): ?>
							<?php while( have_rows('content_image') ): the_row(); ?>

								<img style="width: <?php echo get_sub_field('size'); ?>px" src="<?php echo get_sub_field('image'); ?>" alt="">

							<?php endwhile; ?>
						<?php endif; ?>						
					<?php endif; ?>
				</div>
			</div>


		<?php endif; ?>

    <?php endwhile; ?>
</div>
<?php endif; ?>


<?php 
/* 
 * Suscribe newsletter
* */
echo "<div class='klaviyo-form-XxbpMg'></div>"; ?>


<!-- MODAL general products -->
<div class="featherlight modal-is single-product">
	<div class="featherlight-content ps ps--theme_ts" id="main-popcontent">
		<button class="featherlight-close-icon featherlight-close" aria-label="Close"> ✕ </button>
		<div id="size-guide-modal" role="dialog" aria-modal="true" aria-labelledby="size-guide-modal-label" class="featherlight-inner">

			<div id="size-guide-modal-content" class="content-modal">
				<ul class="tabs-trigger">
					<li>
						<a href="#size-chart" class="size-chart" id="size-guide-modal-label" tabindex="-1"><?php echo __("Size Chart", 'cafe_leather'); ?> </a>
					</li>
					<?php if ( has_term( 'gloves', 'product_cat' ) || has_term( 'guantes-de-piel', 'product_cat' ) ) : ?>
						<li>
							<a href="#fit-finder" class="fit-finder click-fit" tabindex="-1"><?php echo __("Fit Finder", 'cafe_leather'); ?></a>
						</li>
					<?php endif; ?>
				</ul>

				<!-- SIZE CHART -->
				<div id="size-chart" class="tab-container size-chart" >
					<h2 class="playfair"><?php echo get_the_title(); ?></h2>
					<div class="excerpt-product">
						<?php
							if (has_excerpt()) {
								echo the_excerpt();
							}
						?>
					</div>
					
					<!-- GUANTES -->
					<?php if ( has_term( 'gloves', 'product_cat' ) || has_term( 'guantes-de-piel', 'product_cat' ) ) : ?>
						<!-- Contenido en inglés, está invertida la clase -->
						<div class="modal-es">
							<?php echo get_post_field('post_content', 115909); ?>
						</div>

						<!-- Contenido en Español, está invertida la clase -->
						<div class="modal-en">
							<?php echo get_post_field('post_content', 115910); ?>						
						</div>
					<?php endif; ?>

					<!-- CAMISAS -->
					<?php if ( has_term( 'shirts', 'product_cat' ) || has_term( 'camisas', 'product_cat' ) ) : ?>
						<!-- Contenido en inglés, está invertida la clase -->
						<div class="modal-es">
							<?php echo get_post_field('post_content', 119589); ?>
						</div>

						<!-- Contenido en Español, está invertida la clase -->
						<div class="modal-en">
							<?php echo get_post_field('post_content', 119590); ?>						
						</div>
					<?php endif; ?>					 

				</div>

				<!-- FIT FINDER -->
				<div id="fit-finder" class="tab-container text-center fit-finder" >
					<div id="select_size">
						<h2 class="playfair hand-is"><?php echo __('My hand is', 'cafe_leather'); ?> </h2>
						<div class="input-set">
							<div class="to-fill playfair">
								<input type="number" class="input-number number-hand" placeholder="X" />
								<a class="measure-cm active hand-is">cm</a><span>|</span><a class="hand-is measure-in">in</a>
							</div>
						</div>
						<img width="400" class="fit-finder-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/mano-gif-tallas.gif">
						<a id="btn-my-size" class="button-pers"><?php echo __('What’s My Size?', 'cafe_leather'); ?></a>
					</div>
					<div id="size_result" class="div-men">
						<h2 class="playfair hand-is"><?php echo __('Your glove size is', 'cafe_leather'); ?></h2>
						<div class="input-set to-text">
							<div class=" playfair ">
								<div class="text-title text-men">
									<h2 class="playfair hand-is"><?php echo __("Men's", 'cafe_leather'); ?></h2>
								</div>
								<div class="text-title hand-is">
									<input type="text" id="size_m" placeholder="" disabled />
								</div>
							</div>
							<div class="line-woman">
								<div class="line"> </div>
								<div class="playfair ">
									<div class="text-title text-woman">
										<h2 class="playfair hand-is"><?php echo __("Women's", 'cafe_leather'); ?></h2>
									</div>
									<div class="text-title hand-is">
										<input type="text" id="size_w" placeholder="" disabled />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="size_no">
						<div class="input-set to-text">
							<div class=" playfair">
								<div class="text-title text-men">
									<h2 class="playfair hand-is textsno"><?php echo __("Size not available", 'cafe_leather'); ?></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- "MADE TO LAST" GUARANTEE -->
			<div id="guarantee-cont" class="content-modal">
				<h2 class="small-pop-title"><?php echo __('"Made To Last" Guarantee', 'cafe_leather'); ?> </h2>
				<div class="modal-es">
					<?php echo get_post_field('post_content', 115914); ?>
				</div>
				<div class="modal-en">
					<?php echo get_post_field('post_content', 115915); ?>
				</div>
			</div>

			<!-- Free Shipping & Free Returns -->
			<div id="free-shipp-cont" class="content-modal">
				<h2 class="small-pop-title"><?php echo __("Shippings and Returns", 'cafe_leather'); ?> </h2>
				<div class="modal-es">
					<?php echo get_post_field('post_content', 115911); ?>
				</div>
				<div class="modal-en">
					<?php echo get_post_field('post_content', 115912); ?>
				</div>
			</div>

			<!-- Personalization -->
			<div id="personalization-cont" class="content-modal">
				<?php $imgurl = get_post_meta(get_the_ID(), 'add_personalization_add-picture', true); ?>
				<div id="select_add playfair">
					<h2 class="small-pop-title text-title-per"><?php echo __('personalization', 'cafe_leather'); ?> </h2>
					<div class="text-add-one playfair"><?php echo __('If you like to have your products personalized or you want to make special a gift, we have the perfect solution: Monogramming. With our solid brass hot stamping machine, we can stamp your initials, your favorite number, or any letter/icon that you will like to have on your product. Check our monogramming video, you will like it.', 'cafe_leather'); ?></div>
					<div class="input-set to-text center-per">
						<span class="playfair per-is"><?php echo __('I want to include the following', 'cafe_leather'); ?><br> </span>
						<span class="playfair per-is "><?php echo __('personalization', 'cafe_leather'); ?> </span><input type="text" id="abc-add" class="abc-add" placeholder="ABC" maxlength="3" />
					</div>
					<?php if ($imgurl != "") { ?>
						<div class="imagen-add"> <img class="add-img-max" src="<?php echo $imgurl ?>" alt="Gloves"></div>
					<?php } else { ?>
						<div class="imagen-add"> <?php ?><?php echo $product->get_image(); ?></div>
					<?php } ?>
					<a id="btn-add-per" class="button-pers"><?php echo __('Add Personalization (+€20)', 'cafe_leather'); ?></a>
					<div class="text-add-two playfair"><?php echo __('*Please allow us 2-4 extra days to complete a personalization order. Custom and personalized items cannot be returned. Customization on driving gloves is made exclusively on the left glove.', 'cafe_leather'); ?></div>
				</div>
			</div>

			<!-- Reviews -->
			<div id="reviews-cont" class="content-modal">
				<div id="select_add playfair">
					<h2 class="small-pop-title text-title-rw"><?php echo __('Reviews', 'cafe_leather'); ?> </h2>
					<?php 
						/*if (function_exists('wc_yotpo_show_bottomline')) {
							wc_yotpo_show_bottomline();
						} ?>
						<?php if (function_exists('wc_yotpo_show_widget')) {
							wc_yotpo_show_widget();
						} */
					?>
					<?php echo do_shortcode('[Woo_stamped_io type="widget"]'); ?>
				</div>

			</div>

		</div>

		<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;">
			<div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
		</div>

		<div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;">
			<div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
		</div>

	</div>
</div>

<!-- MODAL preview Gift card -->
<?php if ( is_single(119972) || is_single(119975) ) { ?>
	<div class="featherlight modal-is preview-gift-card-modal">
		<div class="featherlight-content ps ps--theme_ts" id="main-popcontent">
			<button class="featherlight-close-icon featherlight-close" aria-label="Close"> ✕ </button>
			<div id="gift-card" role="dialog" aria-modal="true" aria-labelledby="gift-card-label" class="featherlight-inner">
				<div id="gift-card-content" class="content-modal">
					<div id="preview-gift-card" class="tab-container content-preview-gift-card">     
						<!-- Logo -->
						<img class="ywgc-form-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/logo-cafe-negro-.png" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
						
						<!-- Banner -->
						<div class="header-giftcard">
							<img class="ywgc-form-banner" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/header.jpg" alt="Someone very special sent you a gift!">
							<p><?php _e( 'Someone very special sent you a gift!', 'cafe_leather'); ?></p>
						</div>
						<div class="footer-banner-giftcard">
							<p><?php _e( 'The manner of giving is worth more than the gift, but... lucky you!', 'cafe_leather'); ?></p>
						</div>
						
						<!-- Preview image -->
						<img class="ywgc-form-preview" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/giftcard.jpg" alt="Gift card preview">
						
						<!-- Recipient information -->
						<?php if ( 'yes' === get_option( 'ywgc_ask_sender_name', 'yes' ) ) : ?>
							<h3 class="ywgc-form-data-sender"> 
								<?php _e('Hi', 'cafe_leather'); ?> <span class="ywgc-form-preview-to-content"></span>.<br>
								<?php _e('You just received a gift from', 'cafe_leather'); ?> <br> 
								<span class="ywgc-form-preview-from-content"></span>                           
							</h3>
						<?php endif; ?>
						
						<!-- Message -->
						<div class="ywgc-form-preview-message-container">
							<p class="ywgc-form-preview-message"></p>
						</div>  
						<div class="ywgc-form-preview-amount-container">                            
							
						<!-- Amount -->
							<div class="ywgc-form-preview-amount"></div> 
							<h3 class="ywgc-form-title-value">  <?php _e('Gift card value', 'cafe_leather'); ?> </h3> 
							<p class="ywgc-form-paragraph"> <?php _e('Apply your Gift Card Now', 'cafe_leather'); ?> </p>
							<a class="ywgc-form-fake-button">  <?php _e('Apply now', 'cafe_leather'); ?> </a>
							<p class="ywgc-form-paragraph"> <?php _e('Or', 'cafe_leather'); ?> </p>
							<p class="ywgc-form-paragraph"> <?php _e('Apply this code at your checkout', 'cafe_leather'); ?> </p>
							<div class="ywgc-form-preview-gift-code"><?php  echo get_option( 'ywgc_code_pattern') ?> </div>
						</div>

						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/bottom-card.jpg">   
						<div class="footer-preview">
							<p class="title-footer"> <?php _e('This is a gift from our side.', 'cafe_leather'); ?> </p>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/thumb-spotify.png" alt="Burning hour">
							<p class="title-song">Burning Hour</p>
							<p class="title-author">Jadu Heart</p>
							<p class="follow-spotify"> <?php _e('Follow us on Spotify', 'cafe_leather'); ?> </p>
							<i class="fab fa-spotify"></i>
						</div> 
										
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>





<script type="text/javascript">
	var undefinedVar;

	var measure_select = 'cm';
	var size_select_ = 0;
	var sizes_m = {
		cm: {
			xs: {
				min: 18,
				max: 19.4
			},
			s: {
				min: 19.5,
				max: 21.4
			},
			m: {
				min: 21.5,
				max: 22.9
			},
			l: {
				min: 23,
				max: 24.4
			},
			xl: {
				min: 24.5,
				max: 26
			}
		},
		in: {
			xs: {
				min: 7,
				max: 7.9
			},
			s: {
				min: 8,
				max: 8.4
			},
			m: {
				min: 8.5,
				max: 8.9
			},
			l: {
				min: 9,
				max: 9.4
			},
			xl: {
				min: 9.5,
				max: 10
			}
		},

		relation: {
			xs: {
				size: 'XS',
				value: "7 1/2"
			},
			s: {
				size: 'S',
				value: "8"
			},
			m: {
				size: 'M',
				value: "8 1/2"
			},
			l: {
				size: 'L',
				value: "9"
			},
			xl: {
				size: 'XL',
				value: "9 1/2"
			}
		}
	};
	var sizes_w = {
		cm: {
			s: {
				min: 14.5,
				max: 16.4
			},
			m: {
				min: 16.5,
				max: 17.9
			},
			l: {
				min: 18,
				max: 19.5
			},
		},
		in: {
			s: {
				min: 6,
				max: 6.9
			},
			m: {
				min: 7,
				max: 7.4
			},
			l: {
				min: 7.5,
				max: 8
			},
		},

		relation: {

			s: {
				size: 'S',
				value: "6 1/2"
			},

			m: {
				size: 'M',
				value: "7"
			},

			l: {
				size: 'L',
				value: "7 1/2"
			},

		}

	};

	jQuery(document).ready(function($) {
		//$(".summary").prepend("<div class='reviews-top modal-is-trigger' data-tab='#reviews-cont'></div>");
		$(".summary").prepend("<input id='cback' name='cback' type='hidden' value='<?php echo $cupon ?>'>");
		//$('.summary').before("<span class='titilep'></span>");		
		
		/*if (($("#test").length > 0) || ($("#pa_size").length > 0) || ($("#pa_inner-lining").length > 0)) {
			backorder_new = 0;

		} else if ($(".stock").hasClass("available-on-backorder")) {
			backorder_new = 1;
			setTimeout(change_backorder, 30);

		}*/ 
		/*else if ($(".stock").hasClass("in-stock")) {

			if ($(".preproduct-text").text() != "Pre-order") {
				$(".titilep").text("In stock");
			}
		}*/
		if ($(".product").hasClass("instock")) {
			$(".titilep").text("IN STOCK");
		}		
		if ($(".product").hasClass("onbackorder-cfl")) {
			$(".titilep").text("BACKORDER");
		}
		if ($(".preproduct-text").text() == "Pre-order") {
			$(".titilep").text("PRE-ORDER");
			$(".preproduct-text").hide();
		}

		// $('#test').on('change', function() {
		// 	setTimeout(change_backorder, 30);
		// });

		$('#pa_size').on('change', function() {
			setTimeout(change_backorder_cf, 30);
		});

		function change_backorder_cf() {
			var text_t = jQuery('.titilep').text();			 

			jQuery("#pa_size").on("change", function(){
			 var stock_status = jQuery(this).find(':selected').attr("data-stock_status");
			 if( stock_status === "on-backorder"){
				 if(jQuery(".product").hasClass('product-type-variable')) {
					 jQuery(".product-type-variable").addClass('onbackorder-cf');
					 jQuery('.availability_date').css('display', 'block');
				 }                
			 } else {
				 jQuery(".product-type-variable").removeClass("onbackorder-cf");	
				 //jQuery('.availability_date').css('display', 'none');
			 }
			});

			if ( jQuery(".product ").hasClass("onbackorder-cf") && $(".preproduct-text").text() != "Pre-order") {
			 text_tittle = "ADD BACKORDER";
			 text_date = "ESTIMATED SHIPPING";

			 if (document.documentElement.lang.toLowerCase() === "es-es") {
				 text_tittle = "AÑADIR BACKORDER";
				 text_date = "ENVÍO ESTIMADO"; 
			 }

			 jQuery('.single_add_to_cart_button').text(text_tittle);
			 jQuery(".titilep").text("BACKORDER");
			 jQuery(".reviews-top").addClass("reviews-top-margin");
			 jQuery('.availability_date').css('display', 'block');

			 var price = jQuery('.summary-main-title-left > .price > .amount > bdi').text();
			 price = price.replace('€', '');
			 price = price.replace('$', '');
			 price = price.replace(',', '.');

			 var cupon = <?php echo $cupon; ?>;

			 var price_cupon = price - ((price * cupon) / 100);

			 if (price_cupon == "0") {
				 price = <?php echo $price_sales ?>;

				 price = price.toFixed(2);
				 price_cupon = price - ((price * cupon) / 100);
			 } else {
				 price = price.replace('.', ',');
			 }

			 price_cupon = price_cupon.toFixed(2);
			 price_cupon = price_cupon.replace('.', ',');

			 var id = jQuery('.variation_id').val();
			 
			 if (typeof id === "undefined") {
				 id = <?php echo $product->get_id(); ?>;

			 }

			 jQuery("p.price").empty();
			 jQuery("p.price").addClass("newprice");

			 jQuery("p.price").append(`
				 <del>
					 <span class="woocommerce-Price-amount amount">
						 <bdi class="bdi-backorder"> <span class="woocommerce-Price-currencySymbol"> <?php echo get_woocommerce_currency_symbol(); ?> </span> ${price} </bdi>
					 </span>
				 </del>
				 <ins>
					 <span class="woocommerce-Price-amount amount">
						 <bdi> <span class="woocommerce-Price-currencySymbol"> <?php echo get_woocommerce_currency_symbol(); ?> </span> ${price_cupon} </bdi>
					 </span>
				 </ins>
			 `);

			 jQuery(".newprice").css("margin-left", "12%");
			 jQuery("#pback").val(price_cupon);

			} else if (!jQuery(".product ").hasClass("onbackorder-cf") && !jQuery(".product ").hasClass("onbackorder-cfl") && $(".preproduct-text").text() != "Pre-order" ) {
			 jQuery('.single_add_to_cart_button').text("ADD TO CART");
			 jQuery('.titilep').text(text_t);
			 jQuery(".reviews-top").removeClass("reviews-top-margin");
			 jQuery(".newprice").css("margin-left", "0px");
			 jQuery("#pback").val(0);
			 jQuery('.availability_date').css('display', 'none');

			 if (jQuery(".product").hasClass("instock")) {
				 jQuery(".titilep").text("In stock");
				 jQuery(".reviews-top").removeClass("reviews-top-margin");
				 jQuery('.availability_date').css('display', 'none');
			 }
			}
		}
		change_backorder_cf();

		// $('#pa_inner-lining').on('change', function() {
		// 	setTimeout(change_backorder, 30);
		// });

		// $('#pa_color').on('change', function() {
		// 	setTimeout(change_backorder, 30);
		// });

		if ($(".preproduct-text").text() == "Pre-order") {
			$(".reviews-top").addClass("reviews-top-margin");
			$(".price").css("margin-left", "12%");
		}

		$(".wpgs-for").after("<div class='right-f slick-arrow'></div>");
		$(".wpgs-for").before("<div class='left-f slick-arrow'></div>");

		$('#wcpa-text-1603926550198').hide();

		var iscustomproduct = document.querySelector('#wcpa-text-1603926550198');

		if (iscustomproduct !== null) {
			$("#btn-add").addClass("display_block");
		}

		if (document.documentElement.lang.toLowerCase() === "es-es") {
			$("#pa_size option:contains('Elige una opción')").text("Elige tu talla");
			$("#pa_inner-lining option:contains('Elige una opción')").text("Elige tu forro");
			$('.modal-es').addClass("display_none");
			$('label[for="text-1603926550198"]').text("Personalización");

		} else {
			$("#pa_size option:contains('Choose an option')").text("Choose a size");
			$("#pa_inner-lining option:contains('Choose an option')").text("Choose linning");
			$('.modal-en').addClass("display_none");
			$('label[for="text-1603926550198"]').text("Personalization");
		}

		jQuery('.measure-cm').on('click', function(e) {
			e.preventDefault();
			$('.measure-cm').addClass("active");
			$('.measure-in').removeClass("active");
			measure_select = 'cm';
		});

		jQuery('.measure-in').on('click', function(e) {
			e.preventDefault();
			$('.measure-in').addClass("active");
			$('.measure-cm').removeClass("active");
			measure_select = 'in';
		});

		jQuery('.click-fit').on('click', function(e) {
			e.preventDefault();
			$("#size_result").hide();
			$("#size_no").hide();
			$("#select_size").show();
		});

		jQuery('#btn-add-per').on('click', function(e) {
			e.preventDefault();
			var adddata = $('#abc-add').val();
			if (adddata != "") {
				$('#text-1603926550198').val(adddata);
				jQuery('.modal-is').animate({
					"opacity": "0"
				}, 'fast');

				$(".tab-container").hide();
				$(".modal-is").hide();
				$("ul.tabs-trigger li a").removeClass("active");
				$("#div-add-per").val("Personalization: " + adddata);
				$("#div-add-per").show();
			}
		});

		jQuery('#btn-my-size').on('click', function(e) {
			e.preventDefault();
			if ($("#unisexId").val() != "unisex") {
				$('.div-men').addClass("div-men-no");
				$('.line-woman').addClass("display_none");
			}

			var number = $(".number-hand").val();
			get_size(number, measure_select, 'M');
			get_size(number, measure_select, 'F');

			if (size_select_ == 1) {
				$("#select_size").hide();
				$("#size_result").show();
			} else {
				$("#select_size").hide();
				$("#size_no").show();
				setTimeout(function() {
					$("#size_no").fadeOut(1500);
				}, 2000);

				setTimeout(function() {
					$("#select_size").fadeIn(1500);
				}, 2000);
			}
			size_select_ = 0;
		});

		jQuery('.modal-is-trigger').on('click', function(e) {
			e.preventDefault();
			var modalContent = jQuery(this).attr('href');
			var displayContent = jQuery(this).attr('data-tab');

			jQuery('.modal-is').animate({
				"opacity": "1"
			}, 'fast');

			jQuery('.modal-is').fadeIn();
			$(".content-modal").removeClass("displaycontent");
			jQuery(displayContent).addClass('displaycontent');
			$(".tab-container").hide();
			$("ul.tabs-trigger li a").removeClass("active");
			var activeTabpop = $(this).attr("href");
			$(activeTabpop).fadeIn(); //Fade in the active ID content
			$(activeTabpop).addClass("active");

			if (activeTabpop == '#fit-finder') {
				$(this).fadeIn();
				$('.fit-finder').addClass("active");

			} else if (activeTabpop == '#size-chart') {
				$(this).fadeIn();
				$('.size-chart').addClass("active");
			} else if (activeTabpop == '#guarantee') {
				$(".tab-container").hide();
				$("ul.tabs-trigger li a").removeClass("active");
			}

			// jQuery.t3featherlight(modalContent, {
			//   variant: 'modal-is',
			//   beforeOpen: function(event){
			//     TSShared.closeExistingFeatherLight();
			//   },
			//   afterContent: function(event){
			//     jQuery('.featherlight-content').perfectScrollbar({
			//       theme: 'ts',
			//       suppressScrollX: true
			//     });
			//   }
			// });

			setTimeout($(".stamped-lazyload").removeClass("lazyload"), 100);
		});


		function addEventListenerStamped(el, eventName, handler) {
			if (el.addEventListener) {
				el.addEventListener(eventName, handler);
			} else {
				el.attachEvent('on' + eventName, function() {
					handler.call(el);
				});
			}
		}

		addEventListenerStamped(document, 'stamped:ugcmodal:open', function(e) {
			console.log(e);			
		});

		addEventListenerStamped(document, 'stamped:ugcmodal:paged', function(e) {
			console.log(e);
		});

		//On Click Event

		$("ul.tabs-trigger li a").click(function() {
			$("ul.tabs-trigger li a").removeClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
			$(".tab-container").hide(); //Hide all tab content
			var activeTab = $(this).attr("href");
			$(activeTab).fadeIn(); //Fade in the active ID content
			$(activeTab).addClass("active");
			return false;
		});

		jQuery('.featherlight-close').on('click', function(e) {
			e.preventDefault();

			jQuery('.modal-is').animate({
				"opacity": "0"
			}, 'fast');

			$(".tab-container").hide();
			$(".modal-is").hide();
			$("ul.tabs-trigger li a").removeClass("active");
		});

		jQuery('.review-modal-trigger').on('click', function(e) {
			e.preventDefault();
			var iframeLink = jQuery(this).attr("data-iframe");
			jQuery.t3featherlight({
				iframe: iframeLink,
				iframeWidth: "100%",
				iframeHeight: "100%",
				iframeMinWidth: 270, // these values are for 320 x 480 iPhone width
				iframeMinHeight: 326,
				variant: 'modal-is',
				beforeOpen: function(event) {
					TSShared.closeExistingFeatherLight();
				},
				afterContent: function(event) {
					/*$('.featherlight-inner').perfectScrollbar({
					theme: 'ts',
					suppressScrollX: true
					});*/
				}
			});
		});

		function get_sizes(size, sizes, gender) {
			var size_select = 0;
			var size_now = 0;
			var size_s = "";

			for (var i in sizes.relation) {
				if (i == size) {
					s = sizes.relation[i];
					size_select = s.size;
					size_select_s = s.value;
					size_select_ = 1;
					size_now = 1;
				}
			}

			if (size_now != 0) {
				size_s = size_select + " - " + size_select_s;
			} else {
				$("#size_m").addClass('size_not');
				$("#size_w").addClass('size_not');

				if (document.documentElement.lang.toLowerCase() === "es-es") {
					size_s = "Talla no disponible";
				} else {
					size_s = "Size not available";
				}
			}

			if (gender == 'F') {
				$("#size_w").val(size_s);
			} else {
				$("#size_m").val(size_s);
			}
		}

		function get_size(number, measure_select, gender) {
			sizes = sizes_m;
			size_s = "Size not available";

			if (gender == 'F') {
				sizes = sizes_w;
			}

			no_size = 0;

			for (var size in sizes[measure_select]) {
				var size_values = sizes[measure_select][size];
				if (size_values.min <= number && size_values.max >= number) {
					no_size = 1;
					get_sizes(size, sizes, gender);
					break;
				}
			}

			if (no_size == 0) {

				$("#size_m").addClass('size_not');
				$("#size_w").addClass('size_not');

				if (document.documentElement.lang.toLowerCase() === "es-es") {
					size_s = "Talla no disponible";
				}

				if (gender == 'F') {
					$("#size_w").val(size_s);
				} else {
					$("#size_m").val(size_s);
				}
			}
		}
	});
</script>

<?php 
	$unix_preorder_date = get_post_meta( get_the_ID(), '_wc_pre_orders_availability_datetime', true );
	$expire_preorder_date = date_i18n( get_option('date_format'), $unix_preorder_date );
	$today_date = date(get_option('date_format')); 
	$status_product = get_post_meta( get_the_ID(), '_stock_status', true );

if ( empty($unix_preorder_date) && $status_product == 'onbackorder' || $expire_preorder_date < $today_date && $status_product == 'onbackorder') { ?>
	
	<script type="text/javascript">
		
		function change_backorder() {

			jQuery(".product").addClass('onbackorder-cfl');
			text_tittle = "ADD BACKORDER";
			text_date = "ESTIMATED SHIPPING";

			if (document.documentElement.lang.toLowerCase() === "es-es") {
				text_tittle = "AÑADIR BACKORDER";
				text_date = "ENVÍO ESTIMADO"; 
			}

			jQuery('.single_add_to_cart_button').text(text_tittle);
			jQuery(".titilep").text("BACKORDER");
			jQuery(".reviews-top").addClass("reviews-top-margin");
			jQuery('.availability_date').css('display', 'block');

			var price = jQuery('.summary > .price > .amount > bdi').text();

			price = price.replace('€', '');
			price = price.replace('$', '');
			price = price.replace(',', '.');

			var cupon = <?php echo $cupon; ?>;
			var price_cupon = price - ((price * cupon) / 100);

			if (price_cupon == "0") {
			 	price = <?php echo $price_sales ?>;
			 	price = price.toFixed(2);
			 	price_cupon = price - ((price * cupon) / 100);
			} else {
				price = price.replace('.', ',');
			}

			price_cupon = price_cupon.toFixed(2);
			price_cupon = price_cupon.replace('.', ',');

			var id = jQuery('.variation_id').val();

			if (typeof id === "undefined") {
				id = <?php echo $product->get_id(); ?>;
			}

			jQuery("p.price").empty();
			jQuery("p.price").addClass("newprice");

			jQuery("p.price").append(`
				<del>
					<span class="woocommerce-Price-amount amount">
						<bdi class="bdi-backorder"> <span class="woocommerce-Price-currencySymbol"> <?php echo get_woocommerce_currency_symbol(); ?> </span> ${price} </bdi>
					</span>
				</del>
				<ins>
					<span class="woocommerce-Price-amount amount">
						<bdi> <span class="woocommerce-Price-currencySymbol"> <?php echo get_woocommerce_currency_symbol(); ?> </span> ${price_cupon} </bdi>
				 	</span>
			 	</ins>
			`);

			jQuery(".newprice").css("margin-left", "12%");
			jQuery("#pback").val(price_cupon);  
		}	
		change_backorder();
		
	</script>
<?php } ?>


<?php get_footer('shop');