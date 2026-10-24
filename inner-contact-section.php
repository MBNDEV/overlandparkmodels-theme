<?php
$postid_ = 1885;
$content_post = get_post($postid_);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
$ft_img  = $content_post->post_permalink;
?>
<style>
.single-contact-wrap .icon {background: #24DF79;}
.single-contact-wrap .icon img {filter: brightness(0) invert(1);}
.mtop_{margin-top:80px;}
.theme-section-title.black h4{margin-bottom:20px!Important;}
</style>
<!-- section class="contact-section inner_contact-section margin-top-115" style="background-image:url(<?php echo get_the_post_thumbnail_url($postid_,'full'); ?>);" //-->
<section class="contact-section inner_contact-section" style="background-image:url(<?php echo get_the_post_thumbnail_url($postid_,'full'); ?>);">
    <div class="container custom-container-03">
        <div class="row">
            <div class="col-lg-12">
                <div class="theme-section-title desktop-center black">
					<?php /*
                    <h6 class="subtitle">
                        <span class="line-three wow animate__ "></span>
                        <span class="line-four wow animate__ "></span><?php echo get_field('cc_contactus_footer_sub_title',$postid_); ?>
                        <span class="line-one wow animate__ "></span>
                        <span class="line-two wow animate__ "></span>
                    </h6>
					*/ ?>
					<?php if(!is_page(1160)){ ?>
					<?php echo $content; ?>
					<?php } else { ?>
					<div class="row justify-content-center mtop_">
						<div class="col-md-4">
							<div class="single-contact-wrap">
								<div class="icon">
								<?php 
								$image1 = get_field('contact_address_icon',$postid_);
								if( !empty( $image1 ) ): ?>
									<img decoding="async" src="<?php echo esc_url($image1['url']); ?>" alt="Contact Address Icon" />
								<?php endif; ?>
								</div>
                                <div class="details">
									<?php echo get_field('contact_address_txt',$postid_); ?>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-contact-wrap">
								<div class="icon">
									<?php 
									$image2 = get_field('contact_phone_icon',$postid_);
									if( !empty( $image2 ) ): ?>
										<img decoding="async" src="<?php echo esc_url($image2['url']); ?>" alt="Phone icon" />
									<?php endif; ?>
								</div>
								<div class="details">
									<?php echo get_field('contact_phone_txt',$postid_); ?>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-contact-wrap">
								<div class="icon">
									<?php 
									$image3 = get_field('contact_email_icon',$postid_);
									if( !empty( $image3 ) ): ?>
										<img decoding="async" src="<?php echo esc_url($image3['url']); ?>" alt="Email Address Icon" />
									<?php endif; ?>
								</div>
								<div class="details">
									<?php echo get_field('contact_email_txt',$postid_); ?>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(get_field('cc_contactus_footer_btntxt',$postid_)){ ?>
					<div class="btn-wrap btnwrap_">
						<a href="/contact-us/" class="boxed-btn round-btn">
							<?php echo get_field('cc_contactus_footer_btntxt',$postid_); ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083"><path d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z" transform="translate(47.79 -30.712) rotate(90)" fill="#ba9778"></path></svg>
						</a>
					</div>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>