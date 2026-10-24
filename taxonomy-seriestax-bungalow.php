<?php get_header(); ?>
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

<?php $termname = get_queried_object(); ?>
<?php 
    $gallery1 = get_field('sec1_gallery',$termname);
    $size = 'full';
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
                        <?php foreach( $gallery1 as $image ): ?>
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
                            <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m13.2 6.8l1.4 1.4-6.8 6.8h20.1v2h-20.1l6.8 6.8-1.4 1.4-8.5-8.5-0.7-0.7 0.7-0.7z"/></svg>
                        </div>
                        <div class="prev-icon swiper-control" tabindex="0" role="button" aria-label="Next slide">
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
                    
                    <?php
                        $dl_pdf_file = get_field('srcat_dl_pdf_file', $termname);
                        $dl_pdf_file_ttl = get_field('srcat_dl_pdf_title', $termname);

                        if($dl_pdf_file_ttl && $dl_pdf_file){
                            $dl_class = "has_dl_tru";
                        }
                    ?>
                    <div class="sr_dl_section">
                    <?php if($dl_pdf_file_ttl && $dl_pdf_file){ ?>
                    <div class=sr_dl_box>
                        <p class="pdf_brochure mb-0"><a href="<?php echo $dl_pdf_file['url']; ?>" download><span class="fa fa-file-pdf-o"></span><?php echo $dl_pdf_file_ttl; ?></a></p>
                    </div>
                    <?php } ?>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- DEDICATED NEW VIDEO SECTION -->
<?php 
$v_title = get_field('video_section_title', $termname);
$v_content = get_field('video_section_content', $termname);
$v_url = get_field('video_embed_url', $termname);

if ($v_title || $v_content || $v_url): 
?>
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
<?php } else { ?>
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
                    <?php
                        $the_query = new WP_Query(array(
                        'post_type' => 'floorplan-pos',
                        'tax_query' => array(
                            array (
                                'taxonomy' => 'floorplan-tax',
                                'field' => 'slug',
                                'terms' => $termname,
                            )
                        ),
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'posts_per_page' => -1
                        ));
                                                                                                                    
                        while($the_query->have_posts()) : $the_query->the_post();
                            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                            $alt_text = get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true );
                    ?>
                        <div class="floorplan_items">
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

<script>
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