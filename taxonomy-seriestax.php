<?php get_header(); ?>
<style>
.fancybox__content button{position:absolute;top:0;right:0;margin:10px;}
.fancybox__footer{display:none!Important;}
</style>
<style>

/* Compact Theme Button Styling */

.series_section_video .btn-wrap .boxed-btn {

    padding: 10px 20px !important;

    font-size: 14px !important;

    height: auto !important;

    line-height: 1.2 !important;

    display: inline-flex !important;

    align-items: center !important;

    gap: 8px !important;

}



/* Scale down the SVG arrow icon inside the button */

.series_section_video .btn-wrap .boxed-btn svg {

    width: 14px !important;

    height: auto !important;

}



.fancybox__content button{position:absolute;top:0;right:0;margin:10px;}

.fancybox__footer{display:none!Important;}



/* Responsive container for video embed */

.video-embed-wrapper {

    position: relative;

    padding-bottom: 56.25%;

    height: 0;

    overflow: hidden;

    border-radius: 6px;

}

.video-embed-wrapper iframe {

    position: absolute;

    top: 0;

    left: 0;

    width: 100%;

    height: 100%;

    border: 0;

}

</style>
<?php //echo earchi_title_barx(); ?>
<?php $termname = get_queried_object(); ?>
<?php 
	$gallery1 = get_field('sec1_gallery',$termname);
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
						<?php 
							$logo_sr = get_field('series_logo', $termname);
							if( !empty( $logo_sr ) ): ?>
							<div class=logowrap><img src="<?php echo esc_url($logo_sr['url']); ?>" alt="<?php echo esc_attr($logo_sr['alt']); ?>" /></div>
						<?php endif; ?>
					
						<?php if(get_field('sec2_title', $termname)){ ?>
							<h1 class="title"><?php echo get_field('sec2_title', $termname); ?></h1>
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
					
					<?php /* </div> */ ?>
					
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
	</div>
</section>
<?php endif; ?>
<?php /*
<section class="series_section1">
	<div class="unique-slider-seciton margin-top-120">
		<img decoding="async" src="/wp-content/themes/earchi-child/assets/images/green-square-bg.png" class="unique-shape" alt="Home One" />
		<div class="container custom-container-03">
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
					<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 27.929 18.72"><path d="M8.306,12.638C6.982,8.666,7.7,4.635,7.464.6c0-.181.421-.481.662-.542A1.5,1.5,0,0,1,9.569.423a5.844,5.844,0,0,1,1.865,3.851,46.352,46.352,0,0,1,.481,9.988,8.976,8.976,0,0,1,.12,1.264,46.5,46.5,0,0,1,.12,4.994,22.391,22.391,0,0,1,3.851-3.309,1.46,1.46,0,0,1,2.106.361,1.792,1.792,0,0,1,.361,2.226,25,25,0,0,1-2.527,3.129c-1.564,1.5-3.249,2.828-4.874,4.272h0a1.3,1.3,0,0,1-1.745.6l-.662-.361c-3.55-1.805-5.716-5.054-8.6-7.521-.12-.12-.06-.6.12-.842a1.363,1.363,0,0,1,1.264-.722,5.488,5.488,0,0,1,3.971,1.324c.842.722,1.745,1.384,2.587,2.046a15.411,15.411,0,0,1-.181-2.347C7.885,17.09,8.125,14.864,8.306,12.638Z" transform="translate(27.929) rotate(90)" fill="#ba9778"></path></svg>
				</div>
				<div class="prev-icon swiper-control" tabindex="0" role="button" aria-label="Next slide">
					<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083"><path d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z" transform="translate(47.79 -30.712) rotate(90)" fill="#ba9778"></path></svg>
				</div>
				<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
			</div>
		</div>
	</div>
</section>

<?php if(get_field('sec2_title', $termname)){ ?>
<section class="project-section-area margin-top-115 series_section2">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="theme-section-title">
                    <h4 class="title"><?php echo get_field('sec2_title', $termname); ?></h4>
                    <h6 class="subtitle">
                    <?php echo get_field('sec2_sub_title', $termname); ?><span class="line-one wow animate__"></span>
                        <span class="line-two wow animate__"></span>
                    </h6>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="project-details">
                    <?php echo get_field('sec2_body_text', $termname); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<section class="series_section3 series_tax_slide1">
	<div class="banner-area-two">
		<div class="container-fluid">
			<div class="banner-slider-three swiper-container-horizontal swiper-container-free-mode">
				<div class="swiper-wrapper">
					<?php
						$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
						$the_query = new WP_Query(array(
						'post_type' => 'series',
						'tax_query' => array(
							array (
								'taxonomy' => 'seriestax',
								'field' => 'slug',
								'terms' => $term->slug
							)
						),
							'orderby' => 'menu_order',
							'order' => 'ASC'
						));
                                                                            
						while($the_query->have_posts()) : $the_query->the_post();
							$img = get_field('seriesp_featured_image');
							$ttl = get_field('seriesp_custom_title');
							
							$url_opt = get_field('sr_disable_url');
					?>
					<?php if( !empty( $img ) ): ?>
					<div class="swiper-slide">
						<div class="banner-items">
							<div class="thumbnail">
								<img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
							</div>
							<div class="content">
							<?php if( $url_opt && in_array('disable', $url_opt) ) { ?>
								<h6 class="title"><?php echo $ttl; ?></h6><span class="subtitle">View floor plan</span>
							<?php } else { ?>
								<a href="<?php echo get_the_permalink(); ?>"><h6 class="title"><?php echo $ttl; ?></h6><span class="subtitle">View floor plan</span></a>
							<?php } ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php  
						endwhile;
						wp_reset_query();
					?>
				</div>
				<div class="next-icon swiper-control" tabindex="0" role="button" aria-label="Previous slide">
					<svg xmlns="http://www.w3.org/2000/svg" width="18.09" height="12.126" viewBox="0 0 18.09 12.126"><path d="M5.38,8.186C4.523,5.614,4.99,3,4.834.391c0-.117.273-.312.429-.351A.972.972,0,0,1,6.2.274,3.786,3.786,0,0,1,7.407,2.768a30.023,30.023,0,0,1,.312,6.47,5.814,5.814,0,0,1,.078.818,30.118,30.118,0,0,1,.078,3.235,14.5,14.5,0,0,1,2.494-2.144.946.946,0,0,1,1.364.234,1.16,1.16,0,0,1,.234,1.442A16.192,16.192,0,0,1,10.33,14.85c-1.013.974-2.1,1.832-3.157,2.767h0a.84.84,0,0,1-1.13.39l-.429-.234C3.314,16.6,1.911,14.5.041,12.9c-.078-.078-.039-.39.078-.546a.883.883,0,0,1,.818-.468,3.555,3.555,0,0,1,2.572.857c.546.468,1.13.9,1.676,1.325a9.982,9.982,0,0,1-.117-1.52C5.107,11.07,5.263,9.628,5.38,8.186Z" transform="translate(18.09) rotate(90)" fill="#212121"></path></svg>
				</div>
				<div class="prev-icon swiper-control" tabindex="0" role="button" aria-label="Next slide">
					<svg xmlns="http://www.w3.org/2000/svg" width="18.09" height="12.126" viewBox="0 0 18.09 12.126"><path d="M5.38,9.9c-.857,2.572-.39,5.184-.546,7.795,0,.117.273.312.429.351a.972.972,0,0,0,.935-.234,3.786,3.786,0,0,0,1.208-2.494,30.023,30.023,0,0,0,.312-6.47A5.814,5.814,0,0,0,7.8,8.034,30.118,30.118,0,0,0,7.874,4.8a14.5,14.5,0,0,0,2.494,2.144.946.946,0,0,0,1.364-.234,1.16,1.16,0,0,0,.234-1.442A16.192,16.192,0,0,0,10.33,3.24C9.316,2.265,8.225,1.408,7.173.473h0a.84.84,0,0,0-1.13-.39L5.614.317c-2.3,1.169-3.7,3.274-5.573,4.872-.078.078-.039.39.078.546A.883.883,0,0,0,.937,6.2a3.555,3.555,0,0,0,2.572-.857c.546-.468,1.13-.9,1.676-1.325a9.982,9.982,0,0,0-.117,1.52C5.107,7.02,5.263,8.462,5.38,9.9Z" transform="translate(18.09) rotate(90)" fill="#414141"></path></svg>
				</div>
				<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
			</div>
		</div>
	</div>
</section>
*/ ?>

<!-- DEDICATED NEW VIDEO SECTION -->

<?php 

$v_title = get_field('sec_video_title', $termname);

if(!$v_title) { $v_title = get_field('video_section_title', $termname); }



$v_content = get_field('sec_video_content', $termname);

if(!$v_content) { $v_content = get_field('video_section_content', $termname); }



$v_url = get_field('sec_video_url', $termname);

if(!$v_url) { $v_url = get_field('video_embed_url', $termname); }



if ($v_title || $v_content || $v_url): 

?>
<style>
.series_section_video .row{flex-direction: column!important;}
.series_section_video .row > div{width: 70%; text-align: center;}
@media (max-width: 678px) {
.series_section_video .row > div{width: 100%;}
}
</style>
<section class="project-section-area margin-top-60 margin-bottom-60 series_section_video fontroboto_">

    <div class="container custom-container-03">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <?php if($v_title): ?>

                <div class="theme-section-title mb-4">

                    <h2 class="title"><?php echo esc_html($v_title); ?></h2>

                </div>

                <?php endif; ?>

                

                <?php if($v_content): ?>

                <div class="project-details">

                    <?php echo wp_kses_post($v_content); ?>

                </div>

                <?php endif; ?>

            </div>

            <div class="col-lg-6 mt-4 mt-lg-0">

                <?php if($v_url): ?>

                <div class="video-embed-wrapper">

                    <iframe src="<?php echo esc_url($v_url); ?>" title="<?php echo esc_attr($v_title); ?>" allowfullscreen></iframe>

                </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>

<?php endif; ?>


<?php if(get_field('sec3_title', $termname)){ ?>
<?php
$image_bg = get_field('sec3_bg_image', $termname);
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
        <div class="row fontroboto_">
		
            <div class="col-lg-6 <?php echo $dl_class; ?>">
                <div id=ftsec_ttl class="theme-section-title ftsec_ttl">
                    <h4 class="subtitle"><?php echo get_field('sec3_sub_title', $termname); ?> <span class="line-one wow animate__"></span><span class="line-two wow animate__"></span></h4>
                    <h2 class="title"><?php echo get_field('sec3_title', $termname); ?></h2>
               </div>
                <?php 
                $ix = 0;
                if( have_rows('sec3_featured', $termname) ): ?>
                    <div class="accordion-wrapper">
                        <div id="accordionOne">
                    <?php while( have_rows('sec3_featured',$termname) ): the_row(); 
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
					$srcat_dl_pdf_short_desc = get_field('srcat_dl_pdf_short_desc', $termname);
				?>
					<div class="feature_text_note">
					<p><span class=dl_description><?php echo $srcat_dl_pdf_short_desc ? $srcat_dl_pdf_short_desc : ''; ?></span></p>
					</div>
            </div>
            <div class="col-lg-6">
				<div class=floorplan_wrap>
					<?php /*
					<div class="theme-section-title">
						<h4 class="title"><?php echo get_field('sec2_title', $termname); ?></h4>
						<h6 class="subtitle">
							<?php echo get_field('sec2_sub_title', $termname); ?><span class="line-one wow animate__"></span>
							<span class="line-two wow animate__"></span>
						</h6>
					</div>
					*/ ?>

					<?php
					
						//$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
						$the_query = new WP_Query(array(
						'post_type' => 'floorplan-pos',
						'tax_query' => array(
							array (
								'taxonomy' => 'floorplan-tax',
								'field' => 'slug',
								'terms' => $termname,
							)
						),
							//'orderby' => 'menu_order',
							'orderby' => 'date',
							'order' => 'DESC',
							'posts_per_page' => -1
						));
                                                                            
						while($the_query->have_posts()) : $the_query->the_post();
							$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$alt_text = get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true );
					?>
						<div class="floorplan_items">
							<!-- <a href="<?php //echo get_the_permalink(); ?>"> //-->
							<a href="<?php echo $feat_image; ?>" class="clickprint" data-fancybox=floorplan>
								<div class="thumbnail">
									<img id="imageprint" alt="<?php echo esc_attr( $alt_text ); ?>" src="<?php echo $feat_image ?>" />
								</div>
								<div class="content">
									<h3 class="title"><?php echo get_the_title(); ?></h3><span class="subtitle">View floor plan</span>
								</div>
							</a>
						</div>
					<?php
						endwhile;
						wp_reset_query();
					?>


						
				</div>
			</div>
        </div>
     </div>
</section>
<?php } ?>

<section class="service-section-area margin-top-120 series_tax_slide2 fontroboto_">
	<div class="container-fluid p-0">
		<div class="row justify-content-end">
			<div class="col-xl-12 offset-xl-12 col-lg-12">
				<?php if(get_field('sec4_sub_title', $termname)){ ?>
				<div class="theme-section-title">
				<?php /*
					<h6 class="subtitle">
					<?php echo get_field('sec4_sub_title', $termname); ?> <span class="line-one wow animate__"></span>
						<span class="line-two wow animate__"></span>
					</h6>
				*/ ?>
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
							'post_type' => 'series',
							'tax_query' => array(
								array (
									'taxonomy' => 'seriestax',
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
							
							$new_status = " | <span class=new>".$sr_status_title."</span>";
							$sold_status = " | <span class=sold>SOLD</span>";
							
				  
					?>
						<div class="swiper-slide">
							<div class="service-single-item">
							<?php if( $url_opt && in_array('disable', $url_opt) ) { ?>
								<a href="javascript:void(0);" style="pointer-events:none;">
							<?php } else { ?>
								<a href="<?php echo get_the_permalink(); ?>">
							<?php } ?>
									<div class="thumbnail">
									<?php if( !empty( $feat_image ) ): ?>
										<img src="<?php echo $feat_image; ?>" alt="<?php echo $alt_text; ?>" />
									<?php endif; ?>
									</div>
									<div class="content">
										<?php if($sr_status !== "soldseries"){ ?>
											<h3 class="title n1"><?php echo get_the_title(); ?><?php echo $new_status; ?></h3>
										<?php } else { ?>
										<h3 class="title n2"><?php echo get_the_title(); ?><?php echo $sold_status; ?></h3>
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

<?php //require_once( get_stylesheet_directory() . '/inner-contact-section.php' ); ?>

<script>
/*
function sticky_relocate() {
    var window_top = jQuery(window).scrollTop();
    var div_top = jQuery('#sticky-anchor').offset().top;
    var stop_top = jQuery('#stop-anchor').offset().top-150;
    if (window_top > div_top && window_top < stop_top) {
        jQuery('#sticky').addClass('stickybox');
    }
    else {
        jQuery('#sticky').removeClass('stickybox');
    }
}

jQuery(document).ready(function () {
    jQuery(window).scroll(sticky_relocate);
});


jQuery(".clickprint").on("click", function(){
	setTimeout(function() { 
       jQuery('.fancybox__slide').find('.fancybox__content').append('<button onclick="printImage()"><img src="/wp-content/themes/earchi-child/assets/images/printer-icon.png" /></button>');
	}, 500);
});
*/

setInterval(function () {
	jQuery('.fancybox__content').append('<button onclick="printImage()"><img src="/wp-content/themes/earchi-child/assets/images/printer-icon.png" /></button>');
}, 500);
	
function printImage() {
	var image = $('.is-selected .fancybox-image');
	var printWindow = window.open('', '', 'width=500,height=500');
	printWindow.document.write('<img src="' + image.attr('src') + '" width="100%" height="auto">');
	printWindow.document.close();
	printWindow.print();
	printWindow.close();
}


</script>
<?php get_footer(); ?>