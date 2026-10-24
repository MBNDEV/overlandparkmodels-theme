<?php

require_once( get_stylesheet_directory() . '/inc/theme-parts-custom.php' );

	function earchi_child_enqueue_styles() {
	    wp_enqueue_style( 'earchi', get_template_directory_uri() . '/style.css', array( 'bootstrap' ) );
	    wp_enqueue_style( 'earchi-child', get_stylesheet_uri(), array( 'bootstrap' ) );
	}
	add_action( 'wp_enqueue_scripts', 'earchi_child_enqueue_styles' );
	
  add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
	function theme_enqueue_styles() {
		wp_enqueue_style( 'fancybox-css', get_stylesheet_directory_uri() . '/assets/fancybox.css', '', rand() );
		wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/assets/custom.css', '', rand() );
		
		//wp_enqueue_script('earchi-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), rand(), true);
		
		wp_enqueue_script('fancybox-js', get_stylesheet_directory_uri() . '/assets/js/fancybox.umd.js', array(), rand(), true);
		
	}
	
	/**
	 * The parent theme loads a second jQuery over WordPress's, which drops the
	 * extensions Elementor relies on (e.g. :focusable) and breaks its carousels.
	 * Use WordPress's jQuery only, and keep the global $ inline scripts expect.
	 */
	function earchi_child_single_jquery() {
		wp_dequeue_script( 'earchi-jquery' );
		wp_add_inline_script( 'jquery-core', 'window.$ = window.jQuery;' );
	}
	add_action( 'wp_enqueue_scripts', 'earchi_child_single_jquery', 20 );
	
	function register_my_menus(){
		register_nav_menus(
			array('mobile-menu' => __( 'Mobile Menu' ))
		);
	} add_action('init', 'register_my_menus');





/**
 * Allow SVG
**/
function mbn_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'mbn_myme_types');

  function series_posttype(){
    register_post_type('series',
      array(
        'labels' => array(
        'name' => __( 'For Sale' ), // Label
        'singular_name' => __('series')
      ),
      'public' => true,
      'has_archive' => false,
      'exclude_from_search'=>false,
      'rewrite' => array('slug' => 'serie'),
      'supports'	=>	array('title', 'editor','page-attributes','thumbnail', 'custom-fields')
      )
    );
    register_taxonomy(  
      'seriestax', 
      'series', 
      array(
        'hierarchical' => true,			
        'has_archive' => true,
        'term' => 'series_term',
        'label' => 'Series Categories',	
        'query_var' => true,
        'show_admin_column' => true,
        /**/
        'rewrite' => array(
          'slug' => 'series'
          //'with_front' => false
        )
        
      )
    );
  } add_action( 'init', 'series_posttype' );
  
  function floorplan_posttype(){
    register_post_type('floorplan-pos',
      array(
        'labels' => array(
        'name' => __( 'Floor Plan' ), // Label
        'singular_name' => __('floor plan')
      ),
      'public' => true,
      'has_archive' => false,
      'exclude_from_search'=>false,
      'rewrite' => array('slug' => 'floor-plan'),
      'supports'	=>	array('title', 'editor','page-attributes','thumbnail', 'custom-fields')
      )
    );
	
    register_taxonomy(  
      'floorplan-tax', 
      'floorplan-pos', 
      array(
        'hierarchical' => true,			
        'has_archive' => false,
        'term' => 'floorplan_term',
        'label' => 'Floor Plan Categories',
        'query_var' => true,
        'show_admin_column' => true,
        'rewrite' => array(
          'slug' => 'floor-plans'
          //'with_front' => false
        )
      )
    );
	
  } add_action( 'init', 'floorplan_posttype' );

  function parksweworkwith_posttype(){
    register_post_type('parksweworkwith',
      array(
        'labels' => array('name' => __( 'Parks We Work' ),'singular_name' => __('parks we work')),
        'public' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'rewrite' => array('slug' => 'parks-we-work'),
        'supports' => array('title', 'editor','page-attributes','thumbnail', 'custom-fields')
      )
    );
  } add_action('init','parksweworkwith_posttype');

  function customcontent_posttype(){
    register_post_type('customcontent',
      array(
        'labels' => array('name' => __( 'Custom Content' ),'singular_name' => __('custom content')),
        'public' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'rewrite' => array('slug' => 'custom-content'),
        'supports' => array('title', 'editor','page-attributes','thumbnail', 'custom-fields')
      )
    );
  } add_action('init','customcontent_posttype');


function wpdocs_mbn_footer(){
/*
} 
add_action( 'wp_footer', 'wpdocs_mbn_footer');

function wpdocs_mbn_header(){*/ ?>
<script src="//img1.wsimg.com/ceph-p3-01/website-builder-data-prod/static/widgets/UX.4.38.3.js" crossorigin=""></script>
<script>(adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5842533790702014",
    enable_page_level_ads: true
  });
"use strict";
!function (f, b, e, v, n, t, s) {
  if (f.fbq) return;
  n = f.fbq = function () {
    n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
  };
  if (!f._fbq) f._fbq = n;
  n.push = n;
  n.loaded = !0;
  n.version = '2.0';
  n.queue = [];
  t = b.createElement(e);
  t.async = !0;
  t.onload = () => Core.utils.onAllowCookieTracking(() => f.fbq('consent', 'grant'));
  t.src = v;
  s = b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t, s);
}(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
fbq('consent', 'revoke');
fbq('init', '282429905966327');
fbq('track', 'PageView');
var t=document.createElement("script");t.type="text/javascript",t.addEventListener("load",()=>{window.tti.calculateTTI(({name:t,value:e}={})=>{let i={"wam_site_hasPopupWidget":false,"wam_site_hasMessagingWidget":true,"wam_site_headerTreatment":"Fill","wam_site_hasSlideshow":false,"wam_site_hasFreemiumBanner":false,"wam_site_homepageFirstWidgetType":"ABOUT","wam_site_homepageFirstWidgetPreset":"about1","wam_site_businessCategory":"rvstrailers","wam_site_theme":"layout19","wam_site_locale":"en-US","wam_site_fontPack":"fjalla-one","wam_site_cookieBannerEnabled":true,"wam_site_membershipEnabled":true,"wam_site_hasHomepageHTML":false,"wam_site_hasHomepageShop":false,"wam_site_hasHomepageOla":true,"wam_site_hasHomepageBlog":true,"wam_site_hasShop":false,"wam_site_hasOla":true,"wam_site_planType":"businessPlus","wam_site_isHomepage":true,"wam_site_htmlWidget":false};window.networkInfo&&window.networkInfo.downlink&&(i=Object.assign({},i,{["wam_site_networkSpeed"]:window.networkInfo.downlink.toFixed(2)})),window.tti.setCustomProperties(i),window.tti._collectVitals({name:t,value:e})})}),t.setAttribute("src","//img1.wsimg.com/traffic-assets/js/tccl-tti.min.js"),document.body.appendChild(t);</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180621535-1" crossorigin></script>
<script>"use strict";


window['ga-disable-UA-180621535-1'] = true;
window.dataLayer = window.dataLayer || [];
window._gaID = 'UA-180621535-1';

window.gtag = window.gtag || function () {
  window.dataLayer.push(arguments);
};

gtag('js', new Date());


gtag('set', 'developer_id.dZTZmYj', true);
gtag('config', 'UA-180621535-1');
Core.utils.onAllowCookieTracking(() => { window[`ga-disable-${window._gaID}`] = false; window.gtag('config', window._gaID); });
"use strict";


window['ga-disable-G-BF2FDR6KMM'] = true;
window._commercegaID = 'G-BF2FDR6KMM';
gtag('config', 'G-BF2FDR6KMM');
Core.utils.onAllowCookieTracking(() => { window[`ga-disable-${window._commercegaID}`] = false; window.gtag('config', window._commercegaID); });</script>

<?php	
}
add_action( 'wp_footer', 'wpdocs_mbn_footer');
//add_action( 'wp_head', 'wpdocs_mbn_header');

require_once( get_stylesheet_directory() . '/greviews.php' );