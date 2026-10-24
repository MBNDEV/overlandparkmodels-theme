<?php 
function serie_get_option( $option = '', $default = null ) {
	$options = get_post_meta( get_the_ID(), 'serie_options', true );
	return ( isset( $options[ $option ] ) && $options[ $option ] !== '' ) ? $options[ $option ] : $default;
} ?>
<?php get_header(); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<style>
	.navbar-area.navigation-style-02{position:relative;}
	.header-style-02 .navbar:after{content:none!Important;background:transparent!important;}

    .product_model_numb{display:none!important}
	
	.single_series_sec1 .unique-slider-two .swiper-wrapper .swiper-slide .thumbnail{background:#000;text-align:center;}
	.single_series_sec1 .unique-slider-two .swiper-wrapper .swiper-slide .thumbnail img {width:auto;}
</style>
<div class=innerpage_header style="height: 1px;"></div>
<?php //echo earchi_serie_details_title_bar(); ?>



<?php
function earchi_serie_galleryx() {
  $serie_optionsx      = get_post_meta( get_the_ID(), 'serie_options', true );
  $serie_galleryx      = serie_get_option( 'serie_gallery' );

    $html = '<a data-fancybox-trigger="gallerysingle"  href="javascript:;"><span></span></a>';
    if ( !empty( $serie_optionsx['serie_gallery_title'] )) {
      $html .= '<div class="gallery-section-area-02">';
          $html .= '<div class="container">';
              $html .= '<div class="row align-items-center">';
                  if ( !empty( $serie_galleryx )) {
                    $html .= '<div class="col-lg-12">';
                        $html .= '<div class="tab-contentx">';
                            if ( !empty( $serie_galleryx ) ) { 
                              $html .= '<div class="tab-panex fade show active series_galleryx" id="galleryx" style="display:block;">';
                                  $html .= '<div class="unique-slider-two">';
                                      $html .= '<div class="swiper-wrapper">';
                                          foreach ( $serie_galleryx as $serie_gal ) {
                                            if ( !empty( $serie_gal['serie_gallery_image']['url'] ) ) {   
                                              $html .= '<div class="swiper-slide" data-fancybox-index>';
                                                      $html .= '<div class="thumbnail">';
															$html .= '<a href="' . $serie_gal['serie_gallery_image']['url'] . '" data-fancybox="gallerysingle" rel="gallery-single" >';
                                                          $title = get_the_title();
$alt_text = !empty($serie_gal['serie_gallery_title']) 
    ? $serie_gal['serie_gallery_title'] 
    : $title . ' park model home';

$html .= '<img src="' . $serie_gal['serie_gallery_image']['url'] . '" alt="' . esc_attr($alt_text) . '">';
														 $html .= '</a>';
                                                      $html .= '</div>';
                                              $html .= '</div>';
                                            }
                                          }
                                      $html .= '</div>';
                                      $html .= '<div class="next-icon swiper-control">';
                                          $html .= '<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m13.2 6.8l1.4 1.4-6.8 6.8h20.1v2h-20.1l6.8 6.8-1.4 1.4-8.5-8.5-0.7-0.7 0.7-0.7z"/></svg>';
                                      $html .= '</div>';
                                      $html .= '<div class="prev-icon swiper-control">';
                                          $html .= '<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>';
                                      $html .= '</div>';
                                  $html .= '</div>';
                              $html .= '</div>';
                            }
                        $html .= '</div>';
                    $html .= '</div>';
                  }
              $html .= '</div>';
          $html .= '</div>';
      $html .= '</div>';
    }
    return $html;
}
?>
<?php echo earchi_serie_details(); ?>

<section class="single_series_sec1">
	<?php echo earchi_serie_galleryx(); ?>
</section>

<?php //echo earchi_serie_details(); ?>
<?php /*
<section class="contact-section style-01 single_series_cform">
	<div class="container custom-container-03">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="contact-form-inner">
					<h2 class="title">Request Pricing and Availability</h2>
					<?php echo do_shortcode('[contact-form-7 id="1455" title="Contact Us Form"]'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
*/ ?>

<?php //if(get_field('series_ft_head_title')){ ?>
<?php
$image_bg = get_field('series_feature_bg_image');
if($image_bg){
?>
<section class="single_ft_section" style="background-image:url(<?php echo esc_url($image_bg['url']); ?>);">
<?php
} else {
?>
<section class="single_ft_section" style="background-image:url('https://overlandparkmodels.com/wp-content/uploads/2024/05/top-view-white-wooden-background-1-scaled.jpg');">
<?php } ?>

    <div class="bg_overlay2"></div>
    <div class="container">
        <div class="row singleseriesft_wrap">
			<?php
			$dl_pdf_file = get_field('pdf_brochure_file', $termname);
			$dl_pdf_file_ttl = get_field('pdf_brochure_title', $termname);
			
			if($dl_pdf_file_ttl && $dl_pdf_file){
				$dl_class = "has_dl_tru";
			}
			?>
            <div class="col-lg-6 <?php echo $dl_class; ?> singlepost_seriesft">
                <div class="theme-section-title">
                    <h4 class="subtitle"><?php echo get_field('series_ft_head_title'); ?> <span class="line-one wow animate__"></span><span class="line-two wow animate__"></span></h4>
                    <div class="title"><?php echo get_field('series_ft_head_sub_title'); ?></div>
               </div>
                <?php 
                $ix = 0;
                if( have_rows('series_feature_list') ): ?>
                    <div class="accordion-wrapper">
                        <div id="accordionOne">
                    <?php while( have_rows('series_feature_list') ): the_row(); 
                        $ft_title = get_sub_field('series_ft_title');
                        $ft_description = get_sub_field('series_ft_description');
                        $ix = $ix + 1;
                    ?>
                        <div class="card style-01">
                            <div class="card-header" id="heading-1">
                                <h3 class="mb-0">
                                    <a class="collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $ix; ?>" aria-expanded="false" aria-controls="collapse-1"><?php echo $ft_title; ?></a>
                                </h3>
                            </div>
                            <div id="collapse-<?php echo $ix; ?>" class="collapse" data-bs-parent="#accordionOne">
                                <div class="card-body"><?php echo $ft_description; ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                        </div>
                    </div>
					<?php if(get_field('series_ft_txtnote')){ ?>
					<p class="ft_note"><?php echo get_field('series_ft_txtnote'); ?></p>
					<?php } ?>
                <?php endif; ?>
				
				<?php /* <p><span class=dl_description>*Standard Features &amp; Options Are Subject to Change Without Notice.</span></p> */ ?>
				
				
				<div class="sr_dl_section">
					<?php
						if($dl_pdf_file_ttl && $dl_pdf_file){
					?>
					<div class=sr_dl_box>
						<p class=pdf_brochure><a href="<?php echo $dl_pdf_file['url']; ?>" download><span class="fa fa-file-pdf-o"></span><?php echo $dl_pdf_file_ttl; ?></a></p>
					</div>
					<?php
						}
					?>
					<?php /* if(get_field('srcat_dl_pdf_short_desc', $termname)){ ?>
					<p><span class=dl_description><?php echo get_field('srcat_dl_pdf_short_desc', $termname); ?></span></p>
					<?php } */ ?>
					<p><span class=dl_description>*Standard Features &amp; Options Are Subject to Change Without Notice.</span></p>
				</div>
            </div>
            <div class="col-lg-6">
				<section class="contact-section style-01 single_series_cform2">
					<div class="container custom-container-03">
						<div class="contact-form-inner">
							<h2 class="title">Request Pricing and Availability</h2>
							<?php /* echo do_shortcode('[contact-form-7 id="1455" title="Contact Us Form"]'); */ ?>
							<?php echo do_shortcode('[gravityform id="3" title="false" ajax="true"]'); ?>
						</div>
					</div>
				</section>
			</div>
        </div>
     </div>
</section>
<?php //} ?>
<?php /* 
<section><?php echo earchi_serie_gallery(); ?></section>
 */ ?>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<script>

      Fancybox.bind('[data-fancybox="gallerysingle"]', {
        // Custom options
  
      });  
	  

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
</script>

<?php $modelnumb_ = esc_html( get_the_title() ); ?>
<script>
jQuery(document).ready(function () {
            jQuery(".product_model_numb input").val("<?php echo $modelnumb_ ?>");
		});
</script>
<?php get_footer(); ?>

