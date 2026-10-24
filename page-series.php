<?php /* Template Name: Series Main Page */ ?>
<?php get_header(); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

<?php //echo earchi_title_barx(); ?>
<section class="innerpage_header"></section>
<section class="style-01 main_series_feature innerhed_">
    <div class="container custom-container-03">
		<div class="row">
			<div class="col-lg-3">
				<div class="theme-section-title">
					<h1 class="title"><?php echo get_field('sr_feature_title'); ?></h1>
					<?php if(get_field('sr_feature_subtitle')){ ?>
					<h6 class="subtitle"><?php echo get_field('sr_feature_subtitle'); ?>
						<span class="line-one wow animate__"></span>
						<span class="line-two wow animate__"></span>
					</h6>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="project-details">
					<?php echo get_field('sr_feature_text'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="blog-section style-01 main_series_termlist">
    <div class="container custom-container-03 custom_2colum_items">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                <?php
                    $terms = get_terms([
                        'taxonomy' => 'seriestax',
                        'hide_empty' => false,
						'exclude'  => array(27),
                    ]);

                foreach ($terms as $term){
                    $ft_img = get_field('sec1_featured_image', $term);
                ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="blog-grid-item">
                            <div class="thumbnail"><a href="<?php echo get_term_link($term); ?>"><img src="<?php echo esc_url($ft_img['url']); ?>" alt="<?php echo esc_attr($ft_img['alt']); ?>" /></a></div>
                            <div class="content">
                                <h3 class="title"><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a></h3>
								<div class="btn-wrap">
									<a href="<?php echo get_term_link($term); ?>" class="boxed-btn read-btn style-02">
										Learn More
										<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>
									</a>
								</div>
                            </div>
							<?php /*
                            <div class="btn-wrap">
                                <a href="<?php echo get_term_link($term); ?>" class="boxed-btn read-btn style-02">
                                    Learn More
									<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>
									<!--
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083">
                                        <path
                                            d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z"
                                            transform="translate(47.79 -30.712) rotate(90)"
                                            fill="#ba9778">
										</path>
                                    </svg>
									//-->
                                </a>
                            </div>
							*/ ?>
                        </div>
                    </div>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php /*
<section class="lifestyle_images">
    <div class="theme-section-title desktop-center black">
        <h6 class="subtitle">
            <span class="line-three wow animate__"></span>
            <span class="line-four wow animate__"></span>
            GALLERY <span class="line-one wow animate__"></span>
            <span class="line-two wow animate__"></span>
        </h6>
        <h4 class="title">OUR LIFESTYLE IMAGES</h4>
    </div>
    <div class="banner-area-two">
        <div class="container-fluid">
            <div class="banner-slider-three series_sld_wrap">
                <div class="swiper-wrapper">
                    <?php 
                        $gallery1 = get_field('series_gallery');
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                        if( $gallery1 ):
                            foreach( $gallery1 as $image ): ?>
                                <div class="swiper-slide">
                                    <img data-fancybox="gallery" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                </div>
                            <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="next-icon swiper-control" tabindex="0" role="button" aria-label="Previous slide">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="18.09" height="12.126" viewBox="0 0 18.09 12.126"><path d="M5.38,8.186C4.523,5.614,4.99,3,4.834.391c0-.117.273-.312.429-.351A.972.972,0,0,1,6.2.274,3.786,3.786,0,0,1,7.407,2.768a30.023,30.023,0,0,1,.312,6.47,5.814,5.814,0,0,1,.078.818,30.118,30.118,0,0,1,.078,3.235,14.5,14.5,0,0,1,2.494-2.144.946.946,0,0,1,1.364.234,1.16,1.16,0,0,1,.234,1.442A16.192,16.192,0,0,1,10.33,14.85c-1.013.974-2.1,1.832-3.157,2.767h0a.84.84,0,0,1-1.13.39l-.429-.234C3.314,16.6,1.911,14.5.041,12.9c-.078-.078-.039-.39.078-.546a.883.883,0,0,1,.818-.468,3.555,3.555,0,0,1,2.572.857c.546.468,1.13.9,1.676,1.325a9.982,9.982,0,0,1-.117-1.52C5.107,11.07,5.263,9.628,5.38,8.186Z" transform="translate(18.09) rotate(90)" fill="#212121"></path></svg> //-->
					<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m13.2 6.8l1.4 1.4-6.8 6.8h20.1v2h-20.1l6.8 6.8-1.4 1.4-8.5-8.5-0.7-0.7 0.7-0.7z"/></svg>
                </div>
                <div class="prev-icon swiper-control" tabindex="0" role="button" aria-label="Next slide">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="18.09" height="12.126" viewBox="0 0 18.09 12.126"><path d="M5.38,9.9c-.857,2.572-.39,5.184-.546,7.795,0,.117.273.312.429.351a.972.972,0,0,0,.935-.234,3.786,3.786,0,0,0,1.208-2.494,30.023,30.023,0,0,0,.312-6.47A5.814,5.814,0,0,0,7.8,8.034,30.118,30.118,0,0,0,7.874,4.8a14.5,14.5,0,0,0,2.494,2.144.946.946,0,0,0,1.364-.234,1.16,1.16,0,0,0,.234-1.442A16.192,16.192,0,0,0,10.33,3.24C9.316,2.265,8.225,1.408,7.173.473h0a.84.84,0,0,0-1.13-.39L5.614.317c-2.3,1.169-3.7,3.274-5.573,4.872-.078.078-.039.39.078.546A.883.883,0,0,0,.937,6.2a3.555,3.555,0,0,0,2.572-.857c.546-.468,1.13-.9,1.676-1.325a9.982,9.982,0,0,0-.117,1.52C5.107,7.02,5.263,8.462,5.38,9.9Z" transform="translate(18.09) rotate(90)" fill="#414141"></path></svg> //-->
					<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </div>
</section>
*/ ?>

<?php //require_once( get_stylesheet_directory() . '/inner-contact-section.php' ); ?>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
      Fancybox.bind('[data-fancybox="gallery"]', {
        //
      });    
</script>
<?php get_footer(); ?>