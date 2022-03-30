<?php
/*
Template Name: Christmas Gift Guide
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); 

/* Start of the loop. */
while ( have_posts() ) : the_post(); ?>
			
<div class="template-<?php echo strtolower(str_replace(' ', '-', get_the_title())); ?>">
	<!-- Banner -->
	<section class="hero-image" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(' <?php the_field('banner_image'); ?>')">
		<div class="container-cl">
			<h1 class="hero-title"><?php the_field('banner_title'); ?></h1>
		</div>						
	</section>
	
	<!-- Intro -->
	<?php if( get_field('intro') ): ?>
		<section class="sec-intro-text">
			<div class="container-cl">
				<p class="intro-text"><?php the_field('intro'); ?></p>
			</div>
		</section>
	<?php endif; ?>

	<!-- Boxes -->
	<section class="sec-promo-box">
		<div class="container-cl">
			<h2 class="title_breake-line"><span><?php the_field('title_by_price'); ?></span></h2>
			<div class="wrap-box">								
				<?php
				$promo_box1 = get_field('promo_box');
				if( $promo_box1 ): ?>
					<div class="promo_box" style="background-image: url('<?php echo esc_url( $promo_box1['background_image']); ?>') ;">
						<a class="smooth-scroll" href="#under-50">
							<?php echo esc_html( $promo_box1['text']); ?>							
						</a>
					</div>
				<?php endif; ?>

				<?php
				$promo_box2 = get_field('promo_box_two');
				if( $promo_box2 ): ?>
					<div class="promo_box" style="background-image: url('<?php echo esc_url( $promo_box2['background_image']); ?>') ;">
						<a class="smooth-scroll" href="#under-100">
							<?php echo esc_html( $promo_box2['text']); ?>							
						</a>
					</div>
				<?php endif; ?>

				<?php
				$promo_box3 = get_field('promo_box_three');
				if( $promo_box3 ): ?>
					<div class="promo_box" style="background-image: url('<?php echo esc_url( $promo_box3['background_image']); ?>') ;">
						<a class="smooth-scroll" href="#under-200">
							<?php echo esc_html( $promo_box3['text']); ?>							
						</a>
					</div>
				<?php endif; ?>		
				
				<?php
				$promo_box4 = get_field('promo_box_four');
				if( $promo_box4 ): ?>
					<div class="promo_box" style="background-image: url('<?php echo esc_url( $promo_box4['background_image']); ?>') ;">
						<a class="smooth-scroll" href="#over-200">
							<?php echo esc_html( $promo_box4['text']); ?>							
						</a>
					</div>
				<?php endif; ?>											
			</div>
		</div>
	</section>

	<!-- For personality-->
	<section class="sec-promo-box" style="padding: 130px 0 50px;">
		<div class="container-cl">
			<h2 class="title_breake-line"><span><?php the_field('title_for_personality'); ?></span></h2>
			<div class="wrap-box">	
				<?php 
				$petrolhead = get_field('promo_box_petrolhead');
				if( $petrolhead ): ?>
					<div class="promo_box" style="background-image: url('<?php echo esc_url( $petrolhead['background_image']); ?>') ;">
						<a class="smooth-scroll" href="#petrolhead">
							<?php echo esc_html( $petrolhead['text']); ?>							
						</a>
					</div>
				<?php endif;
				
				$gentleman = get_field('promo_box_gentleman');
				if( $gentleman ): ?>
					<div class="promo_box" style="background-image: url('<?php echo esc_url( $gentleman['background_image']); ?>') ;">
						<a class="smooth-scroll" href="#gentleman">
							<?php echo esc_html( $gentleman['text']); ?>							
						</a>
					</div>
				<?php endif;
				
				$traveler = get_field('promo_box_traveler');
				if( $traveler ): ?>
					<div class="promo_box" style="background-image: url('<?php echo esc_url( $traveler['background_image']); ?>') ;">
						<a class="smooth-scroll" href="#traveler">
							<?php echo esc_html( $traveler['text']); ?>							
						</a>
					</div>
				<?php endif; 									

				$techie = get_field('promo_box_techie');
				if( $techie ): ?>
					<div class="promo_box" style="background-image: url('<?php echo esc_url( $techie['background_image']); ?>') ;">
						<a class="smooth-scroll" href="#techie">
							<?php echo esc_html( $techie['text']); ?>							
						</a>
					</div>
				<?php endif; 

				$workaholic = get_field('promo_box_workaholic');
				if( $workaholic ): ?>
					<div class="promo_box" style="background-image: url('<?php echo esc_url( $workaholic['background_image']); ?>') ;">
						<a class="smooth-scroll" href="#workaholic">
							<?php echo esc_html( $workaholic['text']); ?>							
						</a>
					</div>
				<?php endif; 

				$alwaysblack = get_field('promo_box_alwaysblack');
				if( $alwaysblack ): ?>
					<div class="promo_box" style="background-image: url('<?php echo esc_url( $alwaysblack['background_image']); ?>') ;">
						<a class="smooth-scroll" href="#alwaysblack">
							<?php echo esc_html( $alwaysblack['text']); ?>							
						</a>
					</div>
				<?php endif; ?>	
			</div>
		</div>
	</section>

	<!-- Best Sellers -->
	<section class="best-seller">
		<div class="container-cl">
			<h2 class="title_breake-line"><span><?php the_field('title_best_seller'); ?></span></h2>
			<p class="intro-text"><?php the_field('text_best_sellers'); ?></p>

			<?php $featured_posts = get_field('products_best_sellers');
		
			if( $featured_posts ): ?>

				<div class="grid-products three-cols">
					<?php foreach( $featured_posts as $featured_post ): 

						$ID = $featured_post->ID;
						$post_type = $featured_post->post_type;
						$post_status = $featured_post->post_status;
						
						$query = array(
							'post_type' => $post_type,
							'post_status'    => $post_status,
							'posts_per_page' => -1,
							'post__in'=> array($ID)
						);				
						$products = new WP_Query( $query );

						if ( $products->have_posts() ) :
							while ( $products->have_posts() ) : $products->the_post(); ?>
								<div class="product">
									<a class="product-link" href="<?php echo get_permalink(); ?>">
										
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
                                        
                                        <div class="product-info"> <?php 
                                            $main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
                                            $subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
                                            <h2 class="product-name">
                                                <?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>		
                                                <span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>		
                                            </h2>
                                            <div class="price"><?php echo $product->get_price_html(); ?></div> <?php
                                            
                                            echo do_shortcode('[Woo_stamped_io type="badge" ]'); ?>
                                        </div>

									</a>													
								</div>			
							<?php endwhile; 
						endif; wp_reset_query();
					endforeach;	?>									
				</div>
			<?php endif; ?>

		</div>
	</section>

	<!-- Under 50 -->
	<?php if( $promo_box1 ): ?>
		<section class="section-under-price" id="under-50">
			<div class="container-cl">
				<h2 class="title_breake-line"><span><?php echo esc_html( $promo_box1['text']); ?></span></h2>
				<div class="row vcenter">
					<div class="col-md-5">
						<div class="general_under_price">
							<?php $general_under50 = get_field('general_under_50');
								if( $general_under50 ): ?>
									<img src="<?php echo esc_html( $general_under50['image']); ?>" alt="<?php echo esc_html( $promo_box1['text']); ?>">
									<h3 class="title"><?php echo esc_html( $promo_box1['text']); ?></h3>
								<?php endif; ?>
						</div>
					</div>
					<div class="col-md-7">
						<?php $under_50 = get_field('products_under_50');							
						if( $under_50 ): ?>
							<div class="grid-products two-cols">
								<?php foreach( $under_50 as $products ): 
									$ID = $products->ID;
									$post_type = $products->post_type;
									$post_status = $products->post_status;													
									$query = array(
										'post_type' => $post_type,
										'post_status'    => $post_status,
										'posts_per_page' => -1,
										'post__in'=> array($ID)
									);				
									$products = new WP_Query( $query );
									if ( $products->have_posts() ) :
										while ( $products->have_posts() ) : $products->the_post(); ?>
											<div class="product">
												<a class="product-link" href="<?php echo get_permalink(); ?>">

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

													<div class="product-info"> <?php 
														$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
														$subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
														<h2 class="product-name">
															<?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>		
															<span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>		
														</h2>
														<div class="price"><?php echo $product->get_price_html(); ?></div> <?php

														echo do_shortcode('[Woo_stamped_io type="badge" ]'); ?>
													</div>

												</a>													
											</div>			
										<?php endwhile; 
									endif; wp_reset_query();
								endforeach;	?>									
							</div>										
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
	
	<!-- Under 100 -->
	<?php if( $promo_box2 ): ?>
		<section class="section-under-price" id="under-100">
			<div class="container-cl">
				<h2 class="title_breake-line"><span><?php echo esc_html( $promo_box2['text']); ?></span></h2>
				<div class="row vcenter">
					<div class="col-md-7">
						<?php $under_100 = get_field('products_under_100');
			
						if( $under_100 ): ?>
							<div class="grid-products two-cols">
								<?php foreach( $under_100 as $products ): 

									$ID = $products->ID;
									$post_type = $products->post_type;
									$post_status = $products->post_status;
									
									$query = array(
										'post_type' => $post_type,
										'post_status'    => $post_status,
										'posts_per_page' => -1,
										'post__in'=> array($ID)
									);				
									$products = new WP_Query( $query );

									if ( $products->have_posts() ) :
										while ( $products->have_posts() ) : $products->the_post(); ?>
										<div class="product">
											<a class="product-link" href="<?php echo get_permalink(); ?>">

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

												<div class="product-info"> <?php 
													$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
													$subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
													<h2 class="product-name">
														<?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>		
														<span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>		
													</h2>
													<div class="price"><?php echo $product->get_price_html(); ?></div> <?php

													echo do_shortcode('[Woo_stamped_io type="badge" ]'); ?>
												</div>

											</a>													
										</div>				
										<?php endwhile; 
									endif; wp_reset_query();
								endforeach;	?>									
							</div>										
						<?php endif; ?>
					</div>
					<div class="col-md-5">
						<div class="general_under_price">
							<?php $general_under100 = get_field('general_under_100');
								if( $general_under100 ): ?>
									<img src="<?php echo esc_html( $general_under100['image_under100']); ?>" alt="<?php echo esc_html( $promo_box2['text']); ?>">
									<h3 class="title"><?php echo esc_html( $promo_box2['text']); ?></h3>
								<?php endif; ?>
						</div>
					</div>									
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- Under 200 -->
	<?php if( $promo_box3 ): ?>
		<section class="section-under-price" id="under-200">
			<div class="container-cl">
				<h2 class="title_breake-line"><span><?php echo esc_html( $promo_box3['text']); ?></span></h2>
				<div class="row vcenter">
					<div class="col-md-5">
						<div class="general_under_price">
							<?php $general_under200 = get_field('general_under_200');
								if( $general_under200 ): ?>
									<img src="<?php echo esc_html( $general_under200['image_under200']); ?>" alt="<?php echo esc_html( $promo_box3['text']); ?>">
									<h3 class="title"><?php echo esc_html( $promo_box3['text']); ?></h3>
								<?php endif; ?>
						</div>
					</div>	
					<div class="col-md-7">
						<?php $under_200 = get_field('products_under_200');							
						if( $under_200 ): ?>
							<div class="grid-products two-cols">
								<?php foreach( $under_200 as $products ): 

									$ID = $products->ID;
									$post_type = $products->post_type;
									$post_status = $products->post_status;
									
									$query = array(
										'post_type' => $post_type,
										'post_status'    => $post_status,
										'posts_per_page' => -1,
										'post__in'=> array($ID)
									);				
									$products = new WP_Query( $query );

									if ( $products->have_posts() ) :
										while ( $products->have_posts() ) : $products->the_post(); ?>
										<div class="product">
											<a class="product-link" href="<?php echo get_permalink(); ?>">

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

												<div class="product-info"> <?php 
													$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
													$subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
													<h2 class="product-name">
														<?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>		
														<span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>		
													</h2>
													<div class="price"><?php echo $product->get_price_html(); ?></div> <?php

													echo do_shortcode('[Woo_stamped_io type="badge" ]'); ?>
												</div>

											</a>													
										</div>			
										<?php endwhile; 
									endif; wp_reset_query();
								endforeach;	?>									
							</div>										
						<?php endif; ?>
						</div>
					
					</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- Over 200 -->
	<?php if( $promo_box4 ): ?>
		<section class="section-under-price" id="over-200">
			<div class="container-cl">
				<h2 class="title_breake-line"><span><?php echo esc_html( $promo_box4['text']); ?></span></h2>
				<div class="row vcenter">
					<div class="col-md-7">
						<?php $over_200 = get_field('products_over_200');							
						if( $over_200 ): ?>
							<div class="grid-products two-cols">
								<?php foreach( $over_200 as $products ): 

									$ID = $products->ID;
									$post_type = $products->post_type;
									$post_status = $products->post_status;
									
									$query = array(
										'post_type' => $post_type,
										'post_status'    => $post_status,
										'posts_per_page' => -1,
										'post__in'=> array($ID)
									);				
									$products = new WP_Query( $query );

									if ( $products->have_posts() ) :
										while ( $products->have_posts() ) : $products->the_post(); ?>
										<div class="product">
											<a class="product-link" href="<?php echo get_permalink(); ?>">

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

												<div class="product-info"> <?php 
													$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
													$subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
													<h2 class="product-name">
														<?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>		
														<span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>		
													</h2>
													<div class="price"><?php echo $product->get_price_html(); ?></div> <?php

													echo do_shortcode('[Woo_stamped_io type="badge" ]'); ?>
												</div>

											</a>													
										</div>			
										<?php endwhile; 
									endif; wp_reset_query();
								endforeach;	?>									
							</div>										
						<?php endif; ?>
					</div>									
					
					<div class="col-md-5">
						<div class="general_under_price">
							<?php $general_over200 = get_field('general_over_200');
								if( $general_over200 ): ?>
									<img src="<?php echo esc_html( $general_over200['image_over200']); ?>" alt="<?php echo esc_html( $promo_box4['text']); ?>">
									<h3 class="title"><?php echo esc_html( $promo_box4['text']); ?></h3>
								<?php endif; ?>
						</div>
					</div>
				</div>	
			</div>
		</section>
	<?php endif; ?>


	<!-- Petrolhead -->
	<?php if( $petrolhead ): ?>
		<section class="section-under-price" id="petrolhead">
			<div class="container-cl">
				<h2 class="title_breake-line"><span><?php echo esc_html( $petrolhead['text']); ?></span></h2>
				<div class="row vcenter">
					<div class="col-md-5">
						<div class="general_under_price">
							<?php $general_petrolhead = get_field('general_petrolhead');
								if( $general_petrolhead ): ?>
									<img src="<?php echo esc_html( $general_petrolhead['image_petrolhead']); ?>" alt="<?php echo esc_html( $promo_box4['text']); ?>">
									<h3 class="title"><?php echo esc_html( $petrolhead['text']); ?></h3>
									<p class="description"><?php echo esc_html( $general_petrolhead['description_petrolhead']); ?></p>
								<?php endif; ?>
						</div>
					</div>
					<div class="col-md-7">
						<?php $products_petrolhead = get_field('products_petrolhead');							
						if( $products_petrolhead ): ?>
							<div class="grid-products two-cols">
								<?php foreach( $products_petrolhead as $products ): 

									$ID = $products->ID;
									$post_type = $products->post_type;
									$post_status = $products->post_status;
									
									$query = array(
										'post_type' => $post_type,
										'post_status'    => $post_status,
										'posts_per_page' => -1,
										'post__in'=> array($ID)
									);				
									$products = new WP_Query( $query );

									if ( $products->have_posts() ) :
										while ( $products->have_posts() ) : $products->the_post(); ?>
										<div class="product">
											<a class="product-link" href="<?php echo get_permalink(); ?>">

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

												<div class="product-info"> <?php 
													$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
													$subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
													<h2 class="product-name">
														<?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>		
														<span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>		
													</h2>
													<div class="price"><?php echo $product->get_price_html(); ?></div> <?php

													echo do_shortcode('[Woo_stamped_io type="badge" ]'); ?>
												</div>

											</a>													
										</div>			
										<?php endwhile; 
									endif; wp_reset_query();
								endforeach;	?>									
							</div>										
						<?php endif; ?>
					</div>	
				</div>	
			</div>
		</section>
	<?php endif; ?>


	<!-- Gentleman -->
	<?php if( $gentleman ): ?>
		<section class="section-under-price" id="gentleman">
			<div class="container-cl">
				<h2 class="title_breake-line"><span><?php echo esc_html( $gentleman['text']); ?></span></h2>
				<div class="row vcenter">
					<div class="col-md-7">
						<?php $products_gentleman = get_field('products_gentleman');							
						if( $products_gentleman ): ?>
							<div class="grid-products two-cols">
								<?php foreach( $products_gentleman as $products ): 

									$ID = $products->ID;
									$post_type = $products->post_type;
									$post_status = $products->post_status;
									
									$query = array(
										'post_type' => $post_type,
										'post_status'    => $post_status,
										'posts_per_page' => -1,
										'post__in'=> array($ID)
									);				
									$products = new WP_Query( $query );

									if ( $products->have_posts() ) :
										while ( $products->have_posts() ) : $products->the_post(); ?>
										<div class="product">
											<a class="product-link" href="<?php echo get_permalink(); ?>">

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

												<div class="product-info"> <?php 
													$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
													$subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
													<h2 class="product-name">
														<?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>		
														<span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>		
													</h2>
													<div class="price"><?php echo $product->get_price_html(); ?></div> <?php

													echo do_shortcode('[Woo_stamped_io type="badge" ]'); ?>
												</div>

											</a>													
										</div>			
										<?php endwhile; 
									endif; wp_reset_query();
								endforeach;	?>									
							</div>										
						<?php endif; ?>
					</div>									
					
					<div class="col-md-5">
						<div class="general_under_price">
							<?php $general_gentleman = get_field('general_gentleman');
								if( $general_gentleman ): ?>
									<img src="<?php echo esc_html( $general_gentleman['image_gentleman']); ?>" alt="<?php echo esc_html( $promo_box4['text']); ?>">
									<h3 class="title"><?php echo esc_html( $gentleman['text']); ?></h3>
									<p class="description"><?php echo esc_html( $general_gentleman['description_gentleman']); ?></p>
								<?php endif; ?>
						</div>
					</div>
				</div>	
			</div>
		</section>
	<?php endif; ?>

	<!-- Traveler -->
	<?php if( $traveler ): ?>
		<section class="section-under-price" id="traveler">
			<div class="container-cl">
				<h2 class="title_breake-line"><span><?php echo esc_html( $traveler['text']); ?></span></h2>
				<div class="row vcenter">
					<div class="col-md-5">
						<div class="general_under_price">
							<?php $general_traveler = get_field('general_traveler');
								if( $general_traveler ): ?>
									<img src="<?php echo esc_html( $general_traveler['image_traveler']); ?>" alt="<?php echo esc_html( $promo_box3['text']); ?>">
									<h3 class="title"><?php echo esc_html( $traveler['text']); ?></h3>
									<p class="description"><?php echo esc_html( $general_traveler['description_traveler']); ?></p>
								<?php endif; ?>
						</div>
					</div>	
					<div class="col-md-7">
						<?php $products_traveler = get_field('products_traveler');							
						if( $products_traveler ): ?>
							<div class="grid-products two-cols">
								<?php foreach( $products_traveler as $products ): 

									$ID = $products->ID;
									$post_type = $products->post_type;
									$post_status = $products->post_status;
									
									$query = array(
										'post_type' => $post_type,
										'post_status'    => $post_status,
										'posts_per_page' => -1,
										'post__in'=> array($ID)
									);				
									$products = new WP_Query( $query );

									if ( $products->have_posts() ) :
										while ( $products->have_posts() ) : $products->the_post(); ?>
										<div class="product">
											<a class="product-link" href="<?php echo get_permalink(); ?>">

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

												<div class="product-info"> <?php 
													$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
													$subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
													<h2 class="product-name">
														<?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>		
														<span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>		
													</h2>
													<div class="price"><?php echo $product->get_price_html(); ?></div> <?php

													echo do_shortcode('[Woo_stamped_io type="badge" ]'); ?>
												</div>

											</a>													
										</div>			
										<?php endwhile; 
									endif; wp_reset_query();
								endforeach;	?>									
							</div>										
						<?php endif; ?>
						</div>
					
					</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- Techie -->
	<?php if( $techie ): ?>
		<section class="section-under-price" id="techie">
			<div class="container-cl">
				<h2 class="title_breake-line"><span><?php echo esc_html( $techie['text']); ?></span></h2>
				<div class="row vcenter">
					<div class="col-md-7">
						<?php $products_techie = get_field('products_techie');							
						if( $products_techie ): ?>
							<div class="grid-products two-cols">
								<?php foreach( $products_techie as $products ): 

									$ID = $products->ID;
									$post_type = $products->post_type;
									$post_status = $products->post_status;
									
									$query = array(
										'post_type' => $post_type,
										'post_status'    => $post_status,
										'posts_per_page' => -1,
										'post__in'=> array($ID)
									);				
									$products = new WP_Query( $query );

									if ( $products->have_posts() ) :
										while ( $products->have_posts() ) : $products->the_post(); ?>
										<div class="product">
											<a class="product-link" href="<?php echo get_permalink(); ?>">

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

												<div class="product-info"> <?php 
													$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
													$subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
													<h2 class="product-name">
														<?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>		
														<span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>		
													</h2>
													<div class="price"><?php echo $product->get_price_html(); ?></div> <?php

													echo do_shortcode('[Woo_stamped_io type="badge" ]'); ?>
												</div>

											</a>													
										</div>			
										<?php endwhile; 
									endif; wp_reset_query();
								endforeach;	?>									
							</div>										
						<?php endif; ?>
					</div>									
					
					<div class="col-md-5">
						<div class="general_under_price">
							<?php $general_techie = get_field('general_techie');
								if( $general_techie ): ?>
									<img src="<?php echo esc_html( $general_techie['image_techie']); ?>" alt="<?php echo esc_html( $promo_box4['text']); ?>">
									<h3 class="title"><?php echo esc_html( $techie['text']); ?></h3>
									<p class="description"><?php echo esc_html( $general_techie['description_techie']); ?></p>
								<?php endif; ?>
						</div>
					</div>
				</div>	
			</div>
		</section>
	<?php endif; ?>

	<!-- Workaholic -->
	<?php if( $workaholic ): ?>
		<section class="section-under-price" id="workaholic">
			<div class="container-cl">
				<h2 class="title_breake-line"><span><?php echo esc_html( $workaholic['text']); ?></span></h2>
				<div class="row vcenter">
					<div class="col-md-5">
						<div class="general_under_price">
							<?php $general_workaholic = get_field('general_workaholic');
								if( $general_workaholic ): ?>
									<img src="<?php echo esc_html( $general_workaholic['image_workaholic']); ?>" alt="<?php echo esc_html( $promo_box3['text']); ?>">
									<h3 class="title"><?php echo esc_html( $workaholic['text']); ?></h3>
									<p class="description"><?php echo esc_html( $general_workaholic['description_workaholic']); ?></p>
								<?php endif; ?>
						</div>
					</div>	
					<div class="col-md-7">
						<?php $products_workaholic = get_field('products_workaholic');							
						if( $products_workaholic ): ?>
							<div class="grid-products two-cols">
								<?php foreach( $products_workaholic as $products ): 

									$ID = $products->ID;
									$post_type = $products->post_type;
									$post_status = $products->post_status;
									
									$query = array(
										'post_type' => $post_type,
										'post_status'    => $post_status,
										'posts_per_page' => -1,
										'post__in'=> array($ID)
									);				
									$products = new WP_Query( $query );

									if ( $products->have_posts() ) :
										while ( $products->have_posts() ) : $products->the_post(); ?>
										<div class="product">
											<a class="product-link" href="<?php echo get_permalink(); ?>">

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

												<div class="product-info"> <?php 
													$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
													$subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
													<h2 class="product-name">
														<?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>		
														<span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>		
													</h2>
													<div class="price"><?php echo $product->get_price_html(); ?></div> <?php

													echo do_shortcode('[Woo_stamped_io type="badge" ]'); ?>
												</div>

											</a>													
										</div>				
										<?php endwhile; 
									endif; wp_reset_query();
								endforeach;	?>									
							</div>										
						<?php endif; ?>
						</div>
					
					</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- Always Black -->
	<?php if( $alwaysblack ): ?>
		<section class="section-under-price" id="alwaysblack">
			<div class="container-cl">
				<h2 class="title_breake-line"><span><?php echo esc_html( $alwaysblack['text']); ?></span></h2>
				<div class="row vcenter">
					<div class="col-md-7">
						<?php $products_alwaysblack = get_field('products_alwaysblack');							
						if( $products_alwaysblack ): ?>
							<div class="grid-products two-cols">
								<?php foreach( $products_alwaysblack as $products ): 

									$ID = $products->ID;
									$post_type = $products->post_type;
									$post_status = $products->post_status;
									
									$query = array(
										'post_type' => $post_type,
										'post_status'    => $post_status,
										'posts_per_page' => -1,
										'post__in'=> array($ID)
									);				
									$products = new WP_Query( $query );

									if ( $products->have_posts() ) :
										while ( $products->have_posts() ) : $products->the_post(); ?>
										<div class="product">
											<a class="product-link" href="<?php echo get_permalink(); ?>">

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

												<div class="product-info"> <?php 
													$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
													$subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
													<h2 class="product-name">
														<?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>		
														<span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>		
													</h2>
													<div class="price"><?php echo $product->get_price_html(); ?></div> <?php

													echo do_shortcode('[Woo_stamped_io type="badge" ]'); ?>
												</div>

											</a>													
										</div>				
										<?php endwhile; 
									endif; wp_reset_query();
								endforeach;	?>									
							</div>										
						<?php endif; ?>
					</div>									
					
					<div class="col-md-5">
						<div class="general_under_price">
							<?php $general_alwaysblack = get_field('general_alwaysblack');
								if( $general_alwaysblack ): ?>
									<img src="<?php echo esc_html( $general_alwaysblack['image_alwaysblack']); ?>" alt="<?php echo esc_html( $promo_box4['text']); ?>">
									<h3 class="title"><?php echo esc_html( $alwaysblack['text']); ?></h3>
									<p class="description"><?php echo esc_html( $general_alwaysblack['description_alwaysblack']); ?></p>
								<?php endif; ?>
						</div>
					</div>
				</div>	
			</div>
		</section>
	<?php endif; ?>
	
</div>
			
		
<?php

endwhile;  
get_footer();