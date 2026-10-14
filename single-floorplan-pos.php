<?php get_header(); ?>
<?php $termname = get_the_terms( $post->ID, 'floorplan-tax' ); ?>
<?php 
	$gallery1 = get_field('sec1_gallery');
	$size = 'full'; // (thumbnail, medium, large, full or custom size)
	if( $gallery1 ):
?>
<section class="innerpage_header"></section>
<section class="series_section1">
	<div class="unique-slider-seciton">
		<div class="container custom-container-03">
			<div class="row align-items-stretch">
				<div class="col-lg-7">
					<div class="unique-slider-one swiper-container-horizontal">
						<div class="swiper-wrapper">
						<?php
								foreach( $gallery1 as $image ): ?>
									<div class="swiper-slide">
										<div class="unique-slider-item">
											<div class="thumbnail">
												<img decoding="async" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
											</div>
										</div>
									</div>
						<?php endforeach; ?>
						</div>
						<div class="next-icon swiper-control" tabindex="0" role="button" aria-label="Previous slide">
							<?php /* <svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 27.929 18.72"><path d="M8.306,12.638C6.982,8.666,7.7,4.635,7.464.6c0-.181.421-.481.662-.542A1.5,1.5,0,0,1,9.569.423a5.844,5.844,0,0,1,1.865,3.851,46.352,46.352,0,0,1,.481,9.988,8.976,8.976,0,0,1,.12,1.264,46.5,46.5,0,0,1,.12,4.994,22.391,22.391,0,0,1,3.851-3.309,1.46,1.46,0,0,1,2.106.361,1.792,1.792,0,0,1,.361,2.226,25,25,0,0,1-2.527,3.129c-1.564,1.5-3.249,2.828-4.874,4.272h0a1.3,1.3,0,0,1-1.745.6l-.662-.361c-3.55-1.805-5.716-5.054-8.6-7.521-.12-.12-.06-.6.12-.842a1.363,1.363,0,0,1,1.264-.722,5.488,5.488,0,0,1,3.971,1.324c.842.722,1.745,1.384,2.587,2.046a15.411,15.411,0,0,1-.181-2.347C7.885,17.09,8.125,14.864,8.306,12.638Z" transform="translate(27.929) rotate(90)" fill="#ba9778"></path></svg> */ ?>
							<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m13.2 6.8l1.4 1.4-6.8 6.8h20.1v2h-20.1l6.8 6.8-1.4 1.4-8.5-8.5-0.7-0.7 0.7-0.7z"/></svg>
						</div>
						<div class="prev-icon swiper-control" tabindex="0" role="button" aria-label="Next slide">
							<?php /* <svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083"><path d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z" transform="translate(47.79 -30.712) rotate(90)" fill="#ba9778"></path></svg> */ ?>
							<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>
						</div>
						<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
					</div>
				</div>
				<div class="col-lg-4 d-flex flex-column flex-wrap justify-content-between"> 
					<div class="tax-series-header">
						<div class="theme-section-title">
						<?php if(get_field('sec2_title', $termname)){ ?>
							<h4 class="title"><?php echo get_field('sec2_title', $termname); ?></h4>
						<?php } ?>
						<?php if(get_field('sec2_sub_title', $termname)){ ?>
						<h6 class="subtitle">
							<?php echo get_field('sec2_sub_title', $termname); ?><span class="line-one wow animate__"></span>
							<span class="line-two wow animate__"></span>
						</h6>
						<?php } ?>
						</div>
						<?php if(get_field('sec2_body_text', $termname)){ ?>
						<div class="project-details">
							<?php echo get_field('sec2_body_text', $termname); ?>
						</div>
						<?php } ?>
					</div>
					
					<?php
						$dl_pdf_file = get_field('srcat_dl_pdf_file', $termname);
						$dl_pdf_file_ttl = get_field('srcat_dl_pdf_title', $termname);

						if($dl_pdf_file_ttl && $dl_pdf_file){
							$dl_class = "has_dl_tru";
						}
					?>
					<div class="sr_dl_section">
					<?php
						if($dl_pdf_file_ttl && $dl_pdf_file){
					?>
					<div class=sr_dl_box>
						<p class="pdf_brochure mb-0"><a href="<?php echo $dl_pdf_file['url']; ?>" download><span class="fa fa-file-pdf-o"></span><?php echo $dl_pdf_file_ttl; ?></a></p>
					</div>
					<?php
						}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<?php if(get_field('sec3_title', $termname[0]->ID)){ ?>
<?php
$image_bg = get_field('sec3_bg_image', $termname[0]->ID);
if($image_bg){
?>
<section class="ft_section series_section4" style="background-image:url(<?php echo esc_url($image_bg['url']); ?>);">
<?php
} else {
?>
<section class="ft_section series_section4 has_sticky" style="background-image:url('/wp-content/uploads/2024/05/top-view-white-wooden-background-scaled.jpg');">
<?php } ?>
    <div class="bg_overlay"></div>
    <div class="container">
        <div class="row">
		
            <div class="col-lg-6 <?php echo $dl_class; ?>">
                <div id=ftsec_ttl class="theme-section-title ftsec_ttl">
                    <h4 class="subtitle"><?php echo get_field('sec3_sub_title', $termname[0]->ID); ?> <span class="line-one wow animate__"></span><span class="line-two wow animate__"></span></h4>
                    <h2 class="title"><?php echo get_field('sec3_title', $termname[0]->ID); ?></h2>
               </div>
                <?php 
                $ix = 0;
                if( have_rows('sec3_featured', $termname[0]->ID) ): ?>
                    <div class="accordion-wrapper">
                        <div id="accordionOne">
                    <?php while( have_rows('sec3_featured',$termname[0]->ID) ): the_row(); 
                        $ft_title = get_sub_field('sec3_ft_title');
                        $ft_description = get_sub_field('sec3_ft_description');
                        $ix = $ix + 1;
                    ?>
                        <div class="card style-01">
                            <div class="card-header" id="heading-1">
                                <h4 class="mb-0"> 
                                    <a class="collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $ix; ?>" aria-expanded="false" aria-controls="collapse-1"><?php echo $ft_title; ?></a>
                                </h4>
                            </div>
                            <div id="collapse-<?php echo $ix; ?>" class="collapse" data-bs-parent="#accordionOne">
                                <div class="card-body"><?php echo $ft_description; ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
    			<?php
					$srcat_dl_pdf_short_desc = get_field('srcat_dl_pdf_short_desc', $termname[0]->ID);
				?>
					<div class="feature_text_note">
					<p><span class=dl_description><?php echo $srcat_dl_pdf_short_desc ? $srcat_dl_pdf_short_desc : ''; ?></span></p>
					</div>
            </div>
            <div class="col-lg-6">
				<div class=floorplan_wrap>
					<?php
						$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
						$the_query = new WP_Query(array(
						'post_type' => 'floorplan-pos',
						'tax_query' => array(
							array (
								'taxonomy' => 'floorplan-tax',
								'field' => 'slug',
								'terms' => $term->slug,
							)
						),
							//'orderby' => 'menu_order',
							'orderby' => 'date',
							'order' => 'DESC',
							'posts_per_page' => -1
						));
                                                                            
						while($the_query->have_posts()) : $the_query->the_post();
							$img = get_field('seriesp_featured_image');
							$ttl = get_field('seriesp_custom_title');
							$url_opt = get_field('sr_disable_url');
					?>
					<?php if( !empty( $img ) ): ?>
						<div class="floorplan_items">
							<a href="<?php echo get_the_permalink(); ?>">
								<div class="thumbnail">
									<img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
								</div>
								<div class="content">
								<?php if( $url_opt && in_array('disable', $url_opt) ) { ?>
									<h3 class="title"><?php echo $ttl; ?></h3><span class="subtitle">View floor plan</span>
								<?php } else { ?>
									<h3 class="title"><?php echo $ttl; ?></h3><span class="subtitle">View floor plan</span>
								<?php } ?>
								</div>
							</a>
						</div>
					<?php
						endif;
						endwhile;
						wp_reset_query();
					?>
				</div>
			</div>
        </div>
     </div>
</section>
<?php } ?>

<section class="service-section-area margin-top-120 series_tax_slide2">
	<div class="container-fluid p-0">
		<div class="row justify-content-end">
			<div class="col-xl-12 offset-xl-12 col-lg-12">
				<?php if(get_field('sec4_sub_title', $termname)){ ?>
				<div class="theme-section-title">
					<h2 class="title"><?php echo get_field('sec4_title', $termname); ?></h2>
				</div>
				<?php } ?>
			</div>
			<div class="col-xl-12 col-lg-12" style="padding-left:40px;padding-right:40px;">
				<div class="service-slider-one swiper-container-horizontal tax_series_item">
					<div class="next-icon swiper-control" tabindex="0" role="button" aria-label="Previous slide">
						<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m13.2 6.8l1.4 1.4-6.8 6.8h20.1v2h-20.1l6.8 6.8-1.4 1.4-8.5-8.5-0.7-0.7 0.7-0.7z"/></svg>
					</div>
					<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
					<?php
						$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
						$the_query = new WP_Query(array(
							'post_type' => 'floorplan-pos',
							'tax_query' => array(
								array (
									'taxonomy' => 'floorplan-tax',
									'field' => 'slug',
									'terms' => $term->slug
								)
							),
							'orderby' => 'menu_order',
							'order' => 'ASC'
						));
						
						
						while($the_query->have_posts()) : $the_query->the_post();
							$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							$image_id = get_post_thumbnail_id(get_the_ID());
							$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
							$ttl = get_field('seriesp_custom_title');
							$serie_options = get_post_meta( $post->ID, 'serie_options', true );
							
							$url_opt = get_field('sr_disable_url');
							
							$sr_status = get_field( 'seriesp_status' );
							$sr_status_title = get_field( 'seriesp_status_title' );
							if($sr_status_title){
								$new_status = " | <span class=new>".$sr_status_title."</span>";
							} else{
								$sold_status = " | <span class=sold>SOLD</span>";
							}
				  
					?>
						<div class="swiper-slide">
							<div class="service-single-item">
								<a href="<?php echo get_the_permalink(); ?>">
									<div class="thumbnail">
									<?php if( !empty( $feat_image ) ): ?>
										<img src="<?php echo $feat_image; ?>" alt="<?php echo $alt_text; ?>" />
									<?php endif; ?>
									</div>
									<div class="content">
									<?php if( $url_opt && in_array('disable', $url_opt) ) { ?>
										<?php if($sr_status !== "soldseries"){ ?>
											<h3 class="title"><?php echo get_the_title(); ?><?php echo $new_status; ?></span></h3>
										<?php } else { ?>
										<h3 class="title"><?php echo get_the_title(); ?><?php echo $sold_status; ?></span></h3>
										<?php } ?>
									<?php } else { ?>
											<h3 class="title"><?php the_title(); ?></h3>
									<?php } ?>
										<p><?php if(!empty($serie_options['serie_location'])){ echo $serie_options['serie_location']; } ?></p>
									</div>
								</a>
							</div>
						</div>
					<?php  
						endwhile;
						wp_reset_query();
					?>
					</div>
					<div class="prev-icon swiper-control" tabindex="0" role="button" aria-label="Next slide">
						<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>
					</div>
					<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>