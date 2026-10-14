<?php /* Template Name: Series - LP */ ?>

<?php $earchi_options = get_option( 'earchi_options' ); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"> 
	<meta name="msvalidate.01" content="43D9D626C6C9CCBE550E089B12B7A399" />
	
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-T3ZKG7WB');</script>
	<!-- End Google Tag Manager -->


	<?php wp_head(); ?>


<?php if(get_field("custom_code")){ ?>
    <!-- Custom Code Post/Page - Start //-->
    <?php echo get_field("custom_code"); ?>
    <!-- Custom Code - End //-->
<?php } ?>


<?php echo earchi_colors(); ?>
<?php echo earchi_fonts(); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
	.btnbanner {
		color: #fff !important;
		border-color: #16914E !important;
		background: #16914E !important;
		padding: 20px 20px 18px;
		letter-spacing: 2px;
		text-transform: uppercase;
		font-weight: bold;
		margin-top: 20px;
		border: 0;
	}
	
	.btnbanner:hover{background: #22af61 !important}
	
	.seriesbox{cursor: pointer;}
	
	.seriesbox:hover .content h3,
	.seriesbox:hover .content .btn-wrap span{color: #22af61 !important}

	.blog-grid-item .content-popup {
	  display: none;
	}

	/* Popup overlay */
	.popup-overlay {
	  position: fixed;
	  top: 0; left: 0;
	  width: 100%; height: 100%;
	  background: rgba(0,0,0,0.7);
	  display: none;
	  justify-content: center;
	  align-items: flex-start;
	  z-index: 99999;
	  overflow-y: scroll;
	}

	/* Popup box */
	.popup-box {
	  background: #fff;
	  padding: 20px;
	  max-width: 1200px;
	  width: 90%;
	  border-radius: 10px;
	  box-shadow: 0 5px 20px rgba(0,0,0,0.3);
	  position: relative;
	}

	/* Close button */
	.popup-close {
	  position: absolute;
	  top: 10px; right: 10px;
	  font-size: 20px;
	  cursor: pointer;
	}

	.popupContent .title{
		font-weight: bold;
		font-size: 24px;
		line-height: 1.4;
	}
	.popupContent .ftsec_ttl{

	}
	.content-popup .container{
		margin-bottom: 20px;
	}
	.series-img-slider{
		margin-bottom: 30px;
	}
	.slider-container{
		position: relative;
		overflow: hidden;
		padding:0;
			border-top-right-radius: 20px;
		border-top-left-radius: 20px;
	}
	.series-slide-wrap {
	  display: flex;
	  transition: transform 0.5s ease-in-out;
	  width: 100%; 
	  position: relative;
	}

	.series-swipe-slide {
	  flex: 0 0 100%;  
	  max-width: 100%;
	  position: relative;
		overflow: hidden;
	}

	.series-swipe-slide img {
	  width: 100%;
	  display: block;
	  height: 100%;
		object-fit: fill;
	}

	.slide-swiper-control {
	  position: absolute;
	  top: 50%;
	  transform: translateY(-50%);
	  background: rgba(255,255,255,0.7);
	  border-radius: 50%;
	  padding: 5px;
	  cursor: pointer;
	  z-index: 10;
	}

	.next-icon { left: 10px; }
	.prev-icon { right: 10px; }
	
	#prevBtn svg path,
	#nextBtn svg path{fill:#16914E !important;}
	#prevBtn:hover svg path,
	#nextBtn:hover svg path{fill:#22af61 !important;}


	.accordion-wrapper .card .card-header a {
		font-size: 16px;
		padding: 10px 20px 10px 20px;
	}

	.formwrapper_gf{ background: #16914e !important; width: 100%; margin: 20px auto 0; }
	.formwrapper_gf .gform_wrapper{margin: auto;padding: 40px 30px; max-width: 700px; width: 100%;}
	.formwrapper_gf .gform_wrapper input{outline:none!important;}
	.formwrapper_gf .gform_wrapper .gchoice input{border:1px solid #fff!Important;}
	.formwrapper_gf .gform_wrapper .gchoice input:before{color:#fff!important;}
	.formwrapper_gf .gform_wrapper .gfield--type-choice legend{color: #fff! Important;font-weight: 400!Important;font-size: 16px ! Important;}
	.formwrapper_gf .gform_wrapper .series-option label{font-size: 14px!important;}
	
	#serviceslp-form{background: #16914e !important;width: 100%; margin: 50px auto 0;}
	#serviceslp-form .gform_wrapper{margin: auto;padding: 80px 50px; max-width: 750px; width: 100%;}
	#serviceslp-form .gform_wrapper input{outline:none!important;}
	#serviceslp-form .gform_wrapper .gchoice input{border:1px solid #fff!Important;}
	#serviceslp-form .gform_wrapper .gchoice input:before{color:#fff!important;}
	#serviceslp-form .gform_wrapper .gfield--type-choice legend{color: #fff ! Important;font-weight: 400!Important;font-size: 16px ! Important;}
	
	
	.title-testi{
		font-size: 34px;
		font-weight: bold;
		text-align: center;
		margin-top: 50px;
	}
	.review-slider {
		width: 100%;
		padding: 20px 50px; /* Add space on left & right for arrows */
		box-sizing: border-box;
		position: relative;
	}

	.review-card {
		background: #fff;
		padding: 50px;
		border-radius: 12px;
		box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
		text-align: center;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		height: 100%;
	}

	.review-card .stars {
		font-size: 18px;
		white-space: nowrap;
		margin-bottom: 10px;
	}

	.review-card p {
		font-size: 15px;
		color: #333;
		margin: 10px 0;
		flex-grow: 1;
	}

	.review-card h4 {
		margin: 0;
		color: #666;
		font-weight: normal;
	}

	.swiper-button-next,
	.swiper-button-prev {
		color: #16914e;
		width: 35px;
		height: 35px;
		top: 50%;
		transform: translateY(-50%);
		background: none;
	}

	.swiper-button-prev {
		left: 0;
	}

	.swiper-button-next {
		right: 0;
	}

	.swiper-button-next::after,
	.swiper-button-prev::after {
		font-size: 20px;
		font-weight: bold;
	}
@media (max-width: 767px) {
	.title-testi{font-size:28px;}
	.popupContent .title {
		font-size: 20px;
	}
}
</style>


</head>

<body <?php body_class(); ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T3ZKG7WB"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<?php wp_body_open(); ?>
	<?php echo earchi_header_lander(); ?>

	<section class="innerpage_header"></section>
	
	
	<section class="style-01 main_series_feature innerhed_">
		<div class="container custom-container-03">
			<div class="row">
				<div class="col-lg-3">
					<div class="theme-section-title">
						<h1 class="title">Your Dream Park Model RV Home Starts Here</h1>
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
						<p>For over 30 years, Cavco Park Models & Cabins have set the standard for craftsmanship, innovation, and long-lasting quality. At Moss Overland, we take these award-winning designs even further — offering fully customizable park model RV homes tailored to your lifestyle, aesthetic, and budget.</p>
						<p>Whether you’re building a vacation retreat, income property, or full-time residence, our team is here to help you bring your vision to life. From thoughtful floor plans to premium finishes and smart upgrades, we make it easy to create a space that’s uniquely yours.</p>
						<p>Ready to design your custom Cavco home?</p>
						<p>Contact Moss Overland today — and let’s build something extraordinary together.</p>
						<button class="btnbanner scroll-to-form">Get a Custom Quote</button>
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
							$gallery1 = get_field('sec1_gallery',$term);
							$size = 'full';
					?>
						<div class="col-lg-6 col-md-6">
							<div class="blog-grid-item">
								<div class=seriesbox>
									<div class="thumbnail"><img src="<?php echo esc_url($ft_img['url']); ?>" alt="<?php echo esc_attr($ft_img['alt']); ?>" /></div>
									<div class="content">
										<h3 class="title"><?php echo $term->name; ?></h3>
										<div class="btn-wrap">
											<span class="boxed-btn read-btn style-02">
												Learn More
												<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>
											</span>
										</div>
									</div>
								</div>
								<div class="content-popup">
									<div class="series-img-slider">
										<div class="slider-container">
											<div class="series-slide-wrap" id="slider">
												<?php
													foreach( $gallery1 as $image ): ?>
														<div class="series-swipe-slide">
															<img decoding="async" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
														</div>
												<?php endforeach; ?>
											</div>
											<div id="prevBtn" class="next-icon slide-swiper-control" tabindex="0" role="button" aria-label="Previous slide">
												<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m13.2 6.8l1.4 1.4-6.8 6.8h20.1v2h-20.1l6.8 6.8-1.4 1.4-8.5-8.5-0.7-0.7 0.7-0.7z"/></svg>
											</div>
											<div id="nextBtn" class="prev-icon slide-swiper-control" tabindex="0" role="button" aria-label="Next slide">
												<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>
											</div>
											<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
										</div>
									</div>
									<div class="container">
										<div class="row">
											<div class="col-lg-6">
												<h3 class="title series-title"><?php echo $term->name; ?></h3>
												<?php /* <p><?php echo esc_html($term->description); ?></p>	*/ ?>
												<?php echo get_field('sec2_body_text', $term); ?>
											</div>
											<div class="col-lg-6">
												<div id=ftsec_ttl class="ftsec_ttl">
													<h2 class="title"><?php echo get_field('sec3_title', $term); ?></h2>
												</div>
												<?php 
												if( have_rows('sec3_featured', $term) ): 
													$unique_id = uniqid('acc_'); // unique ID for each accordion instance
													$ix = 0; // reset counter for this accordion
												?>
													<div class="accordion-wrapper">
														<div id="accordion-<?php echo $unique_id; ?>">
														<?php while( have_rows('sec3_featured',$term) ): the_row(); 
															$ft_title = get_sub_field('sec3_ft_title');
															$ft_description = get_sub_field('sec3_ft_description');
															$ix++;
														?>
															<div class="card style-01">
																<div class="card-header" id="heading-<?php echo $unique_id.'-'.$ix; ?>">
																	<h4 class="mb-0"> 
																		<a class="collapsed" role="button"
																		   data-bs-toggle="collapse"
																		   data-bs-target="#collapse-<?php echo $unique_id.'-'.$ix; ?>"
																		   aria-expanded="false"
																		   aria-controls="collapse-<?php echo $unique_id.'-'.$ix; ?>">
																		   <?php echo esc_html($ft_title); ?>
																		</a>
																	</h4>
																</div>
																<div id="collapse-<?php echo $unique_id.'-'.$ix; ?>"
																	 class="collapse"
																	 data-bs-parent="#accordion-<?php echo $unique_id; ?>">
																	<div class="card-body"><?php echo $ft_description; ?></div>
																</div>
															</div>
														<?php endwhile; ?>
														</div>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
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
	
	
	<!-- Popup structure -->
	<div class="popup-overlay" id="popup" style="display:none;">
		<div class="popup-box">
			<span class="popup-close" id="popupClose">&times;</span>
			<div id="popupContent" class="popupContent"></div>
			<div class="formwrapper_gf" id="popupGF">
				<?php echo do_shortcode('[gravityform id="5" title="false" description="false" ajax="true"]'); ?>
			</div>
		</div>
	</div>
	
	
	<!-- GG Reviews //-->
	<section class="style-01 main_series_feature innerhed_">
		<div class="container custom-container-03">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="title title-testi">Testimonials/ Reviews</h2>
					<!-- Swiper CSS -->
					<div class="review-slider swiper">
						<div class="swiper-wrapper">
							<!-- Review 1 -->
							<div class="swiper-slide">
								<div class="review-card">
									 <div class="stars">⭐⭐⭐⭐⭐</div>
									<p>"Our experience with all of the staff at Moss Overland was everything that you would expect. Courteous, friendly, professional, knowledgeable, & very helpful. Very pleased with the professionalism in recommendations for the park model we ordered"</p>
									<h4>- Kay Leonard</h4>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="review-card">
									 <div class="stars">⭐⭐⭐⭐⭐</div>
									<p>"We love Moss Overland!! They are a 3rd generation family owned and operated business. They are very knowledgeable, professional, easy to work with, and were extremely accommodating with the financial side of our purchase. We highly recommend them!"</p>
									<h4>- Rod Brock</h4>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="review-card">
									 <div class="stars">⭐⭐⭐⭐⭐</div>
									<p>"Starting the shopping phase for a park model home. These people are very courteous and helpful. At this point of the process I have no reservations but will update as the process goes along."</p>
									<h4>- Greg Hancock</h4>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="review-card">
									 <div class="stars">⭐⭐⭐⭐⭐</div>
									<p>"From start to finish, it was a pleasure working with the whe team!"</p>
									<h4>- Sal Lascano</h4>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="review-card">
									 <div class="stars">⭐⭐⭐⭐⭐</div>
									<p>"Family owned and operated business with always friendly people in the office!"</p>
									<h4>- Sean Davis</h4>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="review-card">
									 <div class="stars">⭐⭐⭐⭐⭐</div>
									<p>"We bought our park model from Moss Overland…delivered in April. We couldn’t be happier! Home is beautiful, but the customer service was perfect! We refer everyone we can!"</p>
									<h4>- Scottt Crowe</h4>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="review-card">
									 <div class="stars">⭐⭐⭐⭐⭐</div>
									<p>"Extremely friendly family owned business! I would highly recommend them to my friends and family."</p>
									<h4>- Elle Darling</h4>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="review-card">
									 <div class="stars">⭐⭐⭐⭐⭐</div>
									<p>"It was a pleasure working with Overland with our purchase. They worked very hard to accommodate our desires. I definitely would recommend them."</p>
									<h4>- Dennis Harmening</h4>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="review-card">
									 <div class="stars">⭐⭐⭐⭐⭐</div>
									<p>"Best prices in town, family owned business by caring folks. A+"</p>
									<h4>- Carol Cherry</h4>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="review-card">
									 <div class="stars">⭐⭐⭐⭐⭐</div>
									<p>"Friendly, accommodating, knowledgeable and helpful. It is a pleasure doing business with this company."</p>
									<h4>- Jeanne Botwright</h4>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="review-card">
									 <div class="stars">⭐⭐⭐⭐⭐</div>
									<p>"Great co to deal with highly recommend 🐱"</p>
									<h4>- Michael Miller</h4>
								</div>
							</div>
							
						  </div>

						<!-- Pagination & Navigation -->
						<?php /* <div class="swiper-pagination"></div> */ ?>
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end GG Reviews //-->
	
	
	<section>
		<div class="container custom-container-03">
			<div class=row>
				<div class="col-lg-12">
					<div id="serviceslp-form">
						<?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>

<script>
	document.querySelectorAll('.scroll-to-form').forEach(button => {
		button.addEventListener('click', function (e) {
			e.preventDefault();

			const target = document.getElementById('serviceslp-form');
			const headerHeight = document.getElementById('nav-head').offsetHeight; // Sticky header height
			const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;

			window.scrollTo({
				top: targetPosition,
				behavior: 'smooth'
			});
		});
	});
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const popup = document.getElementById('popup');
  const popupContent = document.getElementById('popupContent');
  const popupClose = document.getElementById('popupClose');
  const popupGF = document.getElementById('popupGF'); // the static form container
  let movedInfo = null; // will hold { source, parent, nextSibling }

  // normalize strings for matching
  function normalize(str = '') {
    return str
      .toString()
      .toLowerCase()
      .replace(/&amp;/g, '&')
      .replace(/\bseries\b/g, '')     // drop "series" if present
      .replace(/[^a-z0-9& ]+/g, '')   // remove punctuation
      .trim();
  }

  // Initialize sliders inside a context. Will only attach handlers once per container.
  function initSliders(context) {
    context.querySelectorAll('.slider-container').forEach((container) => {
      const track = container.querySelector('.series-slide-wrap');
      const slides = container.querySelectorAll('.series-swipe-slide');
      if (!track || !slides.length) return;

      // style fixes (ensure each slide is full-width)
      slides.forEach(s => {
        s.style.flex = '0 0 100%';
        s.style.maxWidth = '100%';
      });
      track.style.display = 'flex';
      track.style.transition = 'transform 0.5s ease';
      container.style.overflow = 'hidden';

      // always reset to first slide when opened
      track.style.transform = 'translateX(0%)';
      if (container.dataset.sliderInit === 'true') return; // already initialized

      // add controls (detect next/previous using aria-label if available)
      let index = 0;
      const show = () => track.style.transform = `translateX(-${index * 100}%)`;

      const controls = container.querySelectorAll('.slide-swiper-control');
      controls.forEach(btn => {
        const label = (btn.getAttribute('aria-label') || '').toLowerCase();
        if (label.includes('next')) {
          btn.addEventListener('click', () => { index = (index + 1) % slides.length; show(); });
        } else if (label.includes('previous')) {
          btn.addEventListener('click', () => { index = (index - 1 + slides.length) % slides.length; show(); });
        } else {
          // fallback by class name
          if (btn.classList.contains('prev-icon')) {
            btn.addEventListener('click', () => { index = (index - 1 + slides.length) % slides.length; show(); });
          } else {
            btn.addEventListener('click', () => { index = (index + 1) % slides.length; show(); });
          }
        }
      });

      container.dataset.sliderInit = 'true';
    });
  }

  // Initialize Bootstrap collapse components in the moved content (if bootstrap present)
  function initBootstrapCollapse(context) {
    if (window.bootstrap && bootstrap.Collapse) {
      context.querySelectorAll('.collapse').forEach(el => {
        // ensure collapsed by default
        el.classList.remove('show');
        el.classList.add('collapse');
        try {
          // create a Collapse instance without toggling
          new bootstrap.Collapse(el, { toggle: false });
        } catch (err) {
          // ignore
        }
      });
    }
  }

  // Auto-select the series checkbox in the static form (#popupGF) based on .series-title text
  function autoSelectSeriesOption() {
    const titleEl = popupContent.querySelector('.series-title');
    if (!titleEl) return;

    const titleNorm = normalize(titleEl.textContent);
    const checkboxes = document.querySelectorAll('#popupGF .series-option .gfield_checkbox input');

    if (!checkboxes.length) return;
    // reset first
    checkboxes.forEach(cb => cb.checked = false);

    // match exact or partial
    checkboxes.forEach(cb => {
      const valNorm = normalize(cb.value);
      if (valNorm === titleNorm || titleNorm.includes(valNorm) || valNorm.includes(titleNorm)) {
        cb.checked = true;
      }
    });
  }

  // Move the source .content-popup element into the popup
  function openPopupFor(thumbnailEl) {
    // if a previous content is moved, restore it first
    if (movedInfo) restoreMoved();

    const item = thumbnailEl.closest('.blog-grid-item');
    if (!item) return;

    const source = item.querySelector('.content-popup');
    if (!source) return;

    // remove any nested form wrapper inside the source to avoid duplicate form
    source.querySelectorAll('.formwrapper_gf').forEach(n => n.remove());

    // record where to restore the element later
    movedInfo = {
      source,
      parent: source.parentNode,
      nextSibling: source.nextSibling
    };

    // move the element (this removes it from the original place)
    popupContent.appendChild(source);
    // make sure it's visible in the popup (if it was display:none in original place)
    source.style.display = '';

    // init things inside the moved content
    initSliders(popupContent);
    initBootstrapCollapse(popupContent);
    autoSelectSeriesOption();

    // show popup
    popup.style.display = 'flex';
	
	// reset scroll to top
	popup.scrollTop = 0;
	
	/* popupContent.scrollTop = 0; */

  }

  // restore the moved element back to its original location
  function restoreMoved() {
    if (!movedInfo) return;
    const { source, parent, nextSibling } = movedInfo;
    // hide again in original place (if you hide them there by default)
    source.style.display = 'none';
    if (nextSibling) parent.insertBefore(source, nextSibling);
    else parent.appendChild(source);

    movedInfo = null;
    // clear popup area
    popupContent.innerHTML = '';
  }

  // BIND UI
  // open triggers (thumb click)
  document.querySelectorAll('.blog-grid-item .seriesbox').forEach(btn => {
    btn.addEventListener('click', () => openPopupFor(btn));
  });

  // close buttons / click outside
  popupClose && popupClose.addEventListener('click', () => {
    restoreMoved();
    popup.style.display = 'none';
  });

  popup && popup.addEventListener('click', (e) => {
    if (e.target === popup) {
      restoreMoved();
      popup.style.display = 'none';
    }
  });

  // ESC key closes popup
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      restoreMoved();
      popup.style.display = 'none';
    }
  });
});
</script>


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>

let enableAutoplay = false; // Set to false to disable auto-slide

const swiper = new Swiper('.review-slider', {
  loop: true,
  autoplay: enableAutoplay ? { delay: 5000, disableOnInteraction: false } : false,
  pagination: { el: '.swiper-pagination', clickable: true },
  navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
  slidesPerView: 3,
  spaceBetween: 20,
  breakpoints: {
    0: { slidesPerView: 1, spaceBetween: 10 },
    768: { slidesPerView: 2, spaceBetween: 15 },
    1024: { slidesPerView: 3, spaceBetween: 20 }
  },
  on: {
    init: function() { setEqualHeight(); },
    resize: function() { setEqualHeight(); }
  }
});

// Function to equalize heights
function setEqualHeight() {
  const slides = document.querySelectorAll('.swiper-slide .review-card');
  let maxHeight = 0;
  slides.forEach(slide => { slide.style.height = 'auto'; });
  slides.forEach(slide => { if(slide.offsetHeight > maxHeight) maxHeight = slide.offsetHeight; });
  slides.forEach(slide => { slide.style.height = maxHeight + 'px'; });
}

// Optional: Toggle autoplay dynamically
function toggleAutoplay(enable) {
  enableAutoplay = enable;
  if(enableAutoplay) {
    swiper.params.autoplay = { delay: 5000, disableOnInteraction: false };
    swiper.autoplay.start();
  } else {
    swiper.autoplay.stop();
    swiper.params.autoplay = false;
  }
}

</script>
