<?php
if(is_page(array(105,866)) || is_tax('seriestax')){
include( get_stylesheet_directory() . '/inner-contact-section.php' );
}
?>
<section class="lifestyle_images">
	<style>
		.octoform .inline-container{margin:0 auto 60px;}
	</style>
	<div class=octoform>
		<?php
			if(is_page(268) || is_page(7443)){
				echo do_shortcode('[emailoctopus form_id="8c68bd00-52db-11f0-85ee-df0cfd1d87bb"]');
			}
		?>
		<script>
document.addEventListener("DOMContentLoaded", function() {
    const h1 = document.querySelector('[data-form="8c68bd00-52db-11f0-85ee-df0cfd1d87bb"] h1');
    if (h1) {
        const h2 = document.createElement("h2");
        h2.innerHTML = h1.innerHTML;
        h2.className = h1.className;
        h1.replaceWith(h2);
    }
});
</script>
	</div>
	<?php if(!is_page(7443)){ ?>
    <div class="theme-section-title desktop-center black">
        <h3 class="subtitle">
            <span class="line-three wow animate__"></span>
            <span class="line-four wow animate__"></span>
            GALLERY <span class="line-one wow animate__"></span>
            <span class="line-two wow animate__"></span>
        </h3>
        <h2 class="title">OUR LIFESTYLE IMAGES</h2>
    </div>
    <div class="banner-area-two">
        <div class="container-fluid">
            <div class="banner-slider-three series_sld_wrap">
                <div class="swiper-wrapper">
                    <?php 
                        $gallery1 = get_field('series_gallery', 866);
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                        if( $gallery1 ):
                            foreach( $gallery1 as $image ): ?>
                                <div class="swiper-slide">
                                    <img rel="gallery02" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
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
	<?php } ?>
</section>
<?php global $earchi_options; ?>
<?php wp_footer(); ?>

<?php
if ( $earchi_options['footer_style'] == "footer_style_1" ) {
   echo earchi_footer_style_v1x();
} elseif ( $earchi_options['footer_style'] == "footer_style_2") {
   echo earchi_footer_style_v2();
} elseif ( $earchi_options['footer_style'] == "footer_style_3" ) {
   echo earchi_footer_style_v3();
} elseif ( $earchi_options['footer_style'] == "inherit" && is_page() && is_archive() ) {
   $page_options = get_post_meta( get_the_ID(), 'page_options', true );
   if ( $page_options['page_footer_style'] == "footer_style_v1" ) {
      echo earchi_footer_style_v1x();
   } elseif ( $page_options['page_footer_style'] == "footer_style_v2") {
      echo earchi_footer_style_v2();
   } elseif ( $page_options['page_footer_style'] == "footer_style_v3" ) {
      echo earchi_footer_style_v3();
   } else {
      echo earchi_footer_style_v1x();
   }
} else {
   echo earchi_footer_style_v1x();
}
?>

<?php echo earchi_back_to_top(); ?>

<script>
/*
setInterval(function () {
var getHeight = jQuery("#hp_header_wrap .navbar").height();
var newHeight = getHeight + 30;
jQuery(".innerpage_header").css('margin-top', getHeight + "px");
}, 500);
*/
</script>
<?php if(is_page(268)){ ?>
<script>
$(document).ready(function() {
       $('.swiper-slide-duplicate h1').each(function() {
       $(this).replaceWith('<h2 class=title>'+$(this).html()+'</h2>');
    });
 });
</script>
<?php } ?>

<script>
	jQuery(document).ready(function(){
		Fancybox.bind('[data-fancybox]', {
			// Custom options
		});
	});
	
	// Disable empty menu item clicks
	/* 
	window.onload = function() {
		var anchors = document.querySelectorAll(".menu-item a[href='#']");
		for(var i = 0; i < anchors.length; i++) {
			var anchor = anchors[i];
			anchor.onclick = function(event) {
				event.preventDefault();
			}
		}
	}
	*/
	
	jQuery("#menu-main-menu > li.click_disabled a[href='#']").attr("href", "javascript:void(0);");
	
	jQuery(document).ready(function(){
	/*
	var $window = jQuery(window);
    function checkWidth() {
        var windowsize = $window.width();
        if (windowsize < 991) {
            jQuery('.menu-item-has-children>ul').prepend('<button  class="submenu-button">&#9660;</button>');
			jQuery('.submenu-button').siblings().hide();
			jQuery('.submenu-button').click( function(){
			jQuery(this).siblings().toggle();
		});
        }
		if (windowsize > 991) {
			jQuery('.menu-item-has-children>ul').remove('button.submenu-button');
		}
    }
    checkWidth();
    $(window).resize(checkWidth);
	
	*/
	
	
		jQuery('.menu-item-has-children').prepend('<button  class="submenu-button">&#x279C;</button>');
    
  jQuery('.submenu-button').click(function() {
    if (jQuery(this).parent().hasClass("active")) {
      jQuery(this).parent().removeClass("active").find(".sub-menu").slideUp();
    } else{
		jQuery(this).parent().addClass("active").find(".sub-menu").slideDown();
	}
		//return false;
  });
		
		/*
		jQuery('.submenu-button').siblings().hide();
		jQuery('.submenu-button').click( function(){
			jQuery(this).siblings().toggle();
		});
		*/
	});
</script>

</body>
</html>