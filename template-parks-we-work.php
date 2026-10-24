<?php /* Template Name: Parks we work with (Page) */ ?>
<?php get_header(); ?>
<style>:root {--main-color-one:#fff!important;}</style>
<?php //echo earchi_title_barx(); ?>
<section class="innerpage_header"></section>
<section class="parkwework_header innerpage_wrap">
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		the_content();
		//
		// Post Content here
		//
	} // end while
} // end if
?>
</section>
<?php /*
<section class="header_sub_section margin-top-115">
    <div class="container custom-container-03">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="theme-section-title desktop-center black">
                    <h6 class="subtitle">
                        <span class="line-three wow animate__"></span>
                        <span class="line-four wow animate__"></span>ARIZONA RESORTS
                        <span class="line-one wow animate__"></span>
                        <span class="line-two wow animate__"></span>
                    </h6>
                    <h4 class="title">Parks We Work With</h4>
                </div>
            </div>
        </div>
    </div>
</section>
*/ ?>

<section class="style-01 parksweworkit">
    <div class="container custom-container-03 custom_2colum_items">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
<?php
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = array(
		 'post_type' => 'parksweworkwith',
		 'posts_per_page' => 18,
		 'paged' => $paged,
		 'orderby' => 'title',
		 'order' => 'ASC'
	);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		 $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$alt_text = get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true );
		 $parklink = get_field('pwww_external_url');
?>
					<div class="col-lg-4 col-md-4">
                        <div class="blog-grid-item">
                            <div class="thumbnail"><a href="<?php echo $parklink; ?>" target="_blank"><img src="<?php echo $feat_image; ?>" alt="<?php echo esc_attr( $alt_text ); ?>" /></a></div>
                            <div class="content">
                                <h4 class="title"><a href="<?php echo $parklink; ?>" target="_blank"><?php echo get_the_title(); ?></a></h4>
								<div class="btn-wrap">
									<a href="<?php echo $parklink; ?>" class="boxed-btn read-btn style-02 readmore_green" target="_blank">
										Read More
										<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>
									</a>
								</div>
                            </div>
                        </div>
                    </div>
					
					<?php /*
                    <div class="col-lg-6 col-md-6">
                        <div class="blog-grid-item">
                            <div class="thumbnail"><a href="<?php echo $parklink; ?>" target="_blank"><img src="<?php echo $feat_image; ?>" alt="" /></a></div>
                            <div class="content">
                                <h4 class="title"><a href="<?php echo $parklink; ?>" target="_blank"><?php echo get_the_title(); ?></a></h4>
                            </div>
                            <div class="btn-wrap">
                                <a href="<?php echo $parklink; ?>" class="boxed-btn read-btn style-02 readmore_green" target="_blank">
                                    Read More
									<!--
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083">
                                        <path
                                            d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z"
                                            transform="translate(47.79 -30.712) rotate(90)"
                                            fill="#188F4E"
                                        ></path>
                                    </svg>
									//-->
									<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
					*/ ?>
<?php		
endwhile;
?>
<div class="cpt_pagination margin-top-30">
     <?php
     $big = 999999999;
     $listString = paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $loop->max_num_pages,
          'prev_text' => '<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>',
          'next_text' => '<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>'
     ) );
	
	$listString = str_replace("page/1/", '', $listString);
	echo $listString;
	?>
</div>
<?php //wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<br /><br />
<?php require_once( get_stylesheet_directory() . '/inner-contact-section.php' ); ?>

<?php get_footer(); ?>