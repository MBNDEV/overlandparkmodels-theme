<?php /* Template Name: About Us Page */ ?>
<?php get_header(); ?>
<style>
.galleryset_1{overflow: auto;height: 70vh;}
.galleryset_1 a{}
.galleryset_1 img{width:24.5%;height: 100%;max-height: 209px;object-fit: cover;vertical-align: top;display: inline-block;float: left;padding: 4px;}
.galleryset_1 a:nth-child(2) img{width:49.2%}
.galleryset_1 a:nth-child(4) img,
.galleryset_1 a:nth-child(5) img{max-height: 418px;}
/**/
.galleryset_1 a:last-child{display: inline-block;width: 24.5%;padding: 4px;height: 100%;max-height: 209px;}
.galleryset_1 a:last-child img{width: 100%;padding: 0;}

.readmore_{font-size: 32px!important;font-weight: bold;color: #16914e;font-family: "Syne", sans-serif!important;text-align:right;cursor:pointer;margin-top: 50px;margin-bottom:30px;}
.arrowd_{border:1px solid #16914E;border-radius: 30px;padding: 15px 17px 17px 16px;font-size: initial;vertical-align: middle;margin-left: 10px}
.arrowd_ svg{width:18px;height:18px;rotate:270deg;}
.readmore_2 .arrowd_ svg,
.readmore_3 .arrowd_ svg{rotate:90deg;}

.clearfl_both { clear:both!important; }
@media only screen and (max-width:768px){
.galleryset_1 img{max-height: 130px;}
.galleryset_1 a:nth-child(4) img,
.galleryset_1 a:nth-child(5) img{max-height: 260px;}

}
.aboutus_gallery2{margin-top:30px;}
.masonry img {display: block;width: 100%;height: 100%;object-fit: cover;max-height:140px;min-height:140px; }
.masonry .cell-4 img,
.masonry .cell-5 img,
.masonry .cell-13 img,
.masonry .cell-14 img {min-height:100%;}

.masonry {width: 100%;display: grid;grid-template-columns: repeat(16, 1fr);grid-template-rows: repeat(9, 1fr);row-gap: 10px;column-gap: 10px;transform: scale(.8); transform-origin: top;margin-bottom: -100px;}
.masonry .cell-1 {grid-column: 1 / 5;grid-row: 1 / 4;}
.masonry .cell-2 {grid-column: 5 / 13;grid-row: 1 / 4;}
.masonry .cell-3 {grid-column: 13 / 17;grid-row: 1 / 4;}
.masonry .cell-4 {grid-column: 1 / 5;grid-row: 4 / 10;}
.masonry .cell-5 {grid-column: 9 / 5;grid-row: 4 / 10;}
.masonry .cell-6 {grid-column: 9 / 13;grid-row: 4 / 7;}
.masonry .cell-7 {grid-column: 9 / 13;grid-row: 7 / 10;}
.masonry .cell-8 {grid-column: 13 / 17;grid-row: 4 / 7;}
.masonry .cell-9 {grid-column: 13 / 17;grid-row: 7 / 10;}
.masonry .cell-10 {grid-column: 1 / 5;grid-row: 10 / 10;}
.masonry .cell-11 {grid-column: 5 / 13;grid-row: 10 / 10;}
.masonry .cell-12 {grid-column: 13 / 17;grid-row: 10 / 10;}
.masonry .cell-13 {grid-column: 1 / 5;grid-row: 11 / 13;}
.masonry .cell-14 {grid-column: 9 / 5;grid-row: 11 / 13;}
.masonry .cell-15 {grid-column: 9 / 13;grid-row: 11 / 11;}
.masonry .cell-16 {grid-column: 9 / 13;grid-row: 12 / 12;}
.masonry .cell-17 {grid-column: 13 / 17;grid-row: 11 / 11;}
.masonry .cell-18 {grid-column: 13 / 17;grid-row: 12 / 12;}
.masonry .cell-19 { grid-column: 1 / 5; grid-row: 13 / 13;}
.masonry .cell-20 { grid-column: 5 / 9; grid-row: 13 / 13;}
.masonry .cell-21 { grid-column: 9 / 13; grid-row: 13 / 13;}
.masonry .cell-22 { grid-column: 13 / 17; grid-row: 13 / 13;}
.masonry .cell-23 { grid-column: 1 / 5; grid-row: 14 / 14;}
.masonry .cell-24 { grid-column: 5 / 9; grid-row: 14 / 14;}
.masonry .cell-25 { grid-column: 9 / 13; grid-row: 14 / 14;}
.masonry .cell-26 { grid-column: 13 / 17; grid-row: 14 / 14;}
.masonry .cell-27 { grid-column: 1 / 5; grid-row: 15 / 15;}
.masonry .cell-28 { grid-column: 5 / 9; grid-row: 15 / 15;}
.masonry .cell-29 { grid-column: 9 / 13; grid-row: 15 / 15;}
.masonry .cell-30 { grid-column: 13 / 17; grid-row: 15 / 15;}
.masonry .cell-31 { grid-column: 1 / 5; grid-row: 16 / 16;}
.masonry .cell-32 { grid-column: 5 / 9; grid-row: 16 / 16;}
.masonry .cell-33 { grid-column: 9 / 13; grid-row: 16 / 16;}
.masonry .cell-34 { grid-column: 13 / 17; grid-row: 16 / 16;}
.masonry .cell-35 { grid-column: 1 / 5; grid-row: 17 / 17;}
.masonry .cell-36 { grid-column: 5 / 9; grid-row: 17 / 17;}
.masonry .cell-37 { grid-column: 9 / 13; grid-row: 17 / 17;}
.masonry .cell-38 { grid-column: 13 / 17; grid-row: 17 / 17;}
.masonry .cell-39 { grid-column: 1 / 5; grid-row: 18 / 18;}
.masonry .cell-40 { grid-column: 5 / 9; grid-row: 18 / 18;}
.masonry .cell-41 { grid-column: 9 / 13; grid-row: 18 / 18;}
.masonry .cell-42 { grid-column: 13 / 17; grid-row: 18 / 18;}
.masonry .cell-43 { grid-column: 1 / 5; grid-row: 19 / 19;}
.masonry .cell-44 { grid-column: 5 / 9; grid-row: 19 / 19;}
.masonry .cell-45 { grid-column: 9 / 13; grid-row: 19 / 19;}
.masonry .cell-46 { grid-column: 13 / 17; grid-row: 19 / 19;}
.masonry .cell-47 { grid-column: 1 / 5; grid-row: 20 / 20;}
.masonry .cell-48 { grid-column: 5 / 9; grid-row: 20 / 20;}
.masonry .cell-49 { grid-column: 9 / 13; grid-row: 20 / 20;}
.masonry .cell-50 { grid-column: 13 / 17; grid-row: 20 / 20;}
.masonry .cell-51 { grid-column: 1 / 5; grid-row: 21 / 21;}
.masonry .cell-52 { grid-column: 5 / 9; grid-row: 21 / 21;}
.masonry .cell-53 { grid-column: 9 / 13; grid-row: 21 / 21;}
.masonry .cell-54 { grid-column: 13 / 17; grid-row: 21 / 21;}

.show991_{display:none}
.sh_{position: absolute;top: -1000000vh;visibility: hidden;}
@media only screen and (max-width:1300px){
	.masonry {transform:none; margin-bottom:0}
/* 	.masonry img {max-height:160px;min-height:160px;} */
}
@media only screen and (max-width:991px){
/* 	.masonry img {max-height:140px;min-height:140px;} */
	.show991_{display:block;}
	.hide991_{display:none!important;}
	.sh_{position: relative;top: auto;visibility: visible;}
	.masonry{margin-top:20px;}
}
@media only screen and (max-width:768px){
/* 	.masonry img {max-height:120px;min-height:120px;} */
}
@media only screen and (max-width:639px){
	.masonry img {max-height:100px;min-height:100px;}
}
</style>
<?php //echo earchi_title_barx(); ?>
<section class="innerpage_header"></section>
<?php 
	$gallery1 = get_field('aboutus_gallery');
	$size = 'full'; // (thumbnail, medium, large, full or custom size)
	if( $gallery1 ):
?>
<section class="aboutus_page">
		<div class="container cont1 custom-container-03">
			<div class="row _align-items-center">
				<div class="col-lg-5 d-flex flex-column flex-wrap justify-content-between"> 
					<div class="tax-series-header">
						<div class="theme-section-txt aboutus_txt">
						<?php //echo get_the_content(); ?>
						<?php
							if(get_field('aboutus_text1')){
								echo get_field('aboutus_text1');
							}
						?>
						<!-- <div class=rd_btn><p class="readmore_ readmore_1"><span class=btntxt_>read more</span> <span class=arrowd_><svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m13.2 6.8l1.4 1.4-6.8 6.8h20.1v2h-20.1l6.8 6.8-1.4 1.4-8.5-8.5-0.7-0.7 0.7-0.7z"></path></svg></span></p></div> //-->
						</div>
					</div>
				</div>
				<div class="col-lg-7 d-flex flex-wrap justify-content-between"> 
					<?php /*
					<div class=galleryset_1>
						<?php foreach( $gallery1 as $image ): ?>
							<a href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery1"><img decoding="async" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
						<?php endforeach; ?>
					</div>
					*/ ?>
					<section class="masonry">
						<?php
						$count_ = 0;
						foreach( $gallery1 as $image ): 
							$count_ = $count_ + 1;
						?>
						<div class="masonry-item cell cell-<?php echo $count_; ?>">
							<a href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery1"><img decoding="async" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
						</div>
						<?php endforeach; ?>
					</section>
				</div>
				<?php /*
				<div class="col-lg-12">
					<div class=grid>
						<div class=grid-sizer></div>
						<?php foreach( $gallery1 as $image ): ?>
						<div class=grid-item>
							<img decoding="async" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</div>
						<?php endforeach; ?>
					</div>
					
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
							<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m13.2 6.8l1.4 1.4-6.8 6.8h20.1v2h-20.1l6.8 6.8-1.4 1.4-8.5-8.5-0.7-0.7 0.7-0.7z"/></svg>
						</div>
						<div class="prev-icon swiper-control" tabindex="0" role="button" aria-label="Next slide">
							<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>
						</div>
						<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
					</div>
				</div>
				*/ ?>
				
			</div>
		</div>
</section>
<span class=clearfl_both></span>
<?php endif; ?>
<?php 
/*
	$gallery2 = get_field('aboutus_gallery2');
	$size = 'full'; // (thumbnail, medium, large, full or custom size)
	if( $gallery2 ):
?>
<section class="aboutus_page aboutus_gallery2" style="display:none">

		<div class="container cont1 custom-container-03">
			<div class="row align-items-center">
				<div class="col-lg-5 d-flex flex-column flex-wrap justify-content-between order-lg-1"> 
					<div class="tax-series-header">
						<div class="theme-section-txt aboutus_txt">
						<?php
							if(get_field('aboutus_text2')){
								echo get_field('aboutus_text2');
							}
						?>
						<!--  <div class=rd_btn><p class="readmore_ readmore_2"><span class=btntxt_>read more</span> <span class=arrowd_><svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m13.2 6.8l1.4 1.4-6.8 6.8h20.1v2h-20.1l6.8 6.8-1.4 1.4-8.5-8.5-0.7-0.7 0.7-0.7z"></path></svg></span></p></div> //-->
						</div>
					</div>
				</div>
				<div class="col-lg-7 d-flex flex-wrap justify-content-between order-lg-2">
					<section class="masonry">
						<?php
						$count_ = 0;
						foreach( $gallery2 as $image ): 
							$count_ = $count_ + 1;
						?>
						<div class="masonry-item cell cell-<?php echo $count_; ?>">
							<a href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery1"><img decoding="async" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
						</div>
						<?php endforeach; ?>
					</section>
				</div>
			</div>
		</div>

</section>
<?php endif; */ ?>
<!-- script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script //-->
<script>
/*
jQuery('.grid').masonry({
	columnWidth: '.grid-sizer',
	itemSelector: '.grid-item',
	percentPosition: true
});

jQuery(document).ready(function(){
	//jQuery(".aboutus_gallery2").hide();
  jQuery(".rd_btn").click(function(){
    jQuery(".aboutus_gallery2").toggle();
	jQuery(".readmore_1").toggle();
	var txt = jQuery(".aboutus_gallery2").is(':visible') ? 'read less' : 'read more';
        jQuery(".btntxt_").text(txt);
	 jQuery('html, body').animate({
        scrollTop: jQuery('.aboutus_gallery2').offset().top - 200
    }, 500);
  });
	
});
*/
</script>
<?php get_footer(); ?>