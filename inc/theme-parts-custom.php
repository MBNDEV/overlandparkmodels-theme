<?php 

/* series */
$earchi_options = get_option( 'earchi_options' );
function earchi_header_one_nav_menux() {
    ob_start();

    $args = array(
        'theme_location' => 'main_menu',
        'menu_class' => 'navbar-nav',
        'container' => false,
        'fallback_cb' => false,
        'walker' => new Custom_Nav_Menu_Walkerx()
    );

    wp_nav_menu($args);

    $menu_html = ob_get_clean();

    $html = '<div class="collapse navbar-collapse" id="earchi_main_menu">';
	
	$html .= $menu_html;
	
			$html .= '<div class=mobilemenu_ >';
			//wp_nav_menu(array('theme_location'=>'mobile-menu','menu'=>'Mobile Menu'));
			//wp_nav_menu($mmenu_args);
			$html .= '</div>';
	
	
			$menu_name = 'Stick Bottom Menu';
			$array_menu = wp_get_nav_menu_items($menu_name);
			$html .= '<div class=mobile_mn><ul>';
			$menu_count = 0;
			foreach ($array_menu as $navItem ) {
				$menu_count = $menu_count + 1;
				if($menu_count == 1){
					$html .= '<li><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></li>';
				} else{
					$html .= '<li><a href="'.$navItem->url.'" title="'.$navItem->title.'"><svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.300781 1.1501C0.300781 0.570199 0.815654 0.100098 1.45078 0.100098H3.92659C4.48875 0.100098 4.96852 0.471181 5.06094 0.977479L5.91115 5.63515C5.99415 6.08983 5.74265 6.54077 5.29109 6.74691L3.51073 7.55969C4.79447 10.4723 7.34071 12.7972 10.5308 13.9693L11.4209 12.3437C11.6467 11.9314 12.1406 11.7018 12.6386 11.7776L17.7398 12.5539C18.2944 12.6382 18.7008 13.0763 18.7008 13.5896V15.8501C18.7008 16.43 18.1859 16.9001 17.5508 16.9001H15.2508C6.99412 16.9001 0.300781 10.7888 0.300781 3.2501V1.1501Z" fill="white"/></svg><span class=txtname>'.$navItem->title.'</span></a></li>';
				}
			}
			$html .= '</ul></div>';
	
    $html .= '</div>';

    return $html;
}

class Custom_Nav_Menu_Walkerx extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        if ($depth === 0) {
            $output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
        } else {
            $item_classes = 'menu-item' . esc_attr($item->ID);
            if (in_array('current-menu-item', $item->classes)) {
                $item_classes .= ' current-menu-item';
            }
            if (in_array('menu-item-has-children', $item->classes)) {
                $item_classes .= ' menu-item-has-children';
            }

            $output .= '<a href="' . esc_url($item->url) . '"><span class="' . $item_classes . '">' . esc_html($item->title) . '</span></a>';
        }
    }

    function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }
}

function earchi_header_one_home() {
  global $earchi_options;
  global $post;
  $page_options = get_post_meta( get_the_ID(), 'page_options', true );

    $logo_white         = $earchi_options['logo_white']['url'] ? $earchi_options['logo_white']['url'] : '/wp-content/uploads/2024/04/hp-top-logo.png';
    $header_style       = $post->post_type == 'jobs' && is_singular() || $post->post_type == 'team' && is_singular() || $post->post_type == 'series' && is_singular() ? '2' : '1';
    $header_background  = $post->post_type == 'jobs' && is_singular() || $post->post_type == 'team' && is_singular() || $post->post_type == 'series' && is_singular() ? 'style="background:#fff;border-bottom:1px solid #000;"' : 'style=""';
	/* $header_background  = $post->post_type == 'jobs' && is_singular() || $post->post_type == 'team' && is_singular() || $post->post_type == 'series' && is_singular() ? 'style="background-image: url(' . get_stylesheet_directory_uri() . '/assets/images/inner-banner2.jpg);"' : 'style=""'; */
    $header_style_v2    =  $post->post_type == 'series' && is_singular() ? 'style-01' : 'style-';

      $dark_header_three  = $post->post_type == 'page' && $page_options['dark_header'] == 1 ? "home-three" : "";
      $nav_style          = $post->post_type == 'page' && $page_options['dark_header'] == 1 ? "1" : "2";


    $html = '';
    $html .= '<header id="hp_header_wrap" class="header-style-0' . $header_style . ' hp_header_wrap">';
      $html .= '<nav class="navbar navbar-area navbar-expand-lg navigation-style-0' . $nav_style . ' ' . $dark_header_three . ' ' . $header_style_v2 . '" ' . $header_background . '>';
      $html .= '<div class=top_section><div class="custom-top-banner">';
      $html .= '<div class="top-banner-left"><p><span class=topimgbg_><span class=toptxtwrap_>'.get_field("topcontent_text",1881).'</span></span></p><p>'.get_field("topcontent_text2",1881).'</p></div>';
      // $html .= '<div class="ggreviews">' . do_shortcode('[trustindex no-registration="google"]') . '</div>';
      $html .= '<div class="ggreviews">' . do_shortcode('[earchi_greviews]') . '</div>';
      $html .= '</div></div>';        
         $html .= '<div class="container custom-container nav-container">';
            $html .= '<div class="responsive-menu">';
               $html .= '<div class="logo-wrapper">';
                  $html .= '<a href="' . home_url() . '" class="logo">';
                     $html .= '<img src="' . $logo_white . '" alt="logo" width="340" height="104"/><span class=logo_sub_txt>Family Owned and Operated Since 1971</span>';
                  $html .= '</a>';
               $html .= '</div>';
              if ( has_nav_menu('main_menu') ) {
               $html .= '<button class="navbar-toggler navbar-bs-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#earchi_main_menu" aria-expanded="false" aria-label="Toggle navigation">';
                  $html .= '<span class="navbar-toggler-icon"></span>';
               $html .= '</button>';
              }
            $html .= '</div>';
			/*
            if ( $earchi_options['earchi_sidebar_menu'] == 1 ) {
            $html .= '<div class="nav-left-content">';
               $html .= '<div class="menu-icon open-sidebar" id="navigation-button">';
                  $html .= '<ul>';
                     $html .= '<li><a href="javascript:void(0)"><img src="' . get_template_directory_uri() . '/assets/img/icon/toggle-menu.png' . '" alt="toggle-menu"></a></li>';
                  $html .= '</ul>';
               $html .= '</div>';
            $html .= '</div>';
            }
			*/
            $html .= earchi_header_one_nav_menux();
			
            
			

			
            if ( !empty( $earchi_options['earchi_header_button_text'] ) && !empty( $earchi_options['earchi_header_button_link'] ) ) {
            $html .= '<div class="nav-right-content">';
               $html .= '<div class="btn-wrap">';
                  /* $html .= '<a href="' . $earchi_options['earchi_header_button_link'] . '" class="boxed-btn fill-btn"><svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>' . $earchi_options['earchi_header_button_text'] . '</a>'; */
				  $html .= '<a href="' . $earchi_options['earchi_header_button_link'] . '" class="boxed-btn fill-btn"><svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.300781 1.1501C0.300781 0.570199 0.815654 0.100098 1.45078 0.100098H3.92659C4.48875 0.100098 4.96852 0.471181 5.06094 0.977479L5.91115 5.63515C5.99415 6.08983 5.74265 6.54077 5.29109 6.74691L3.51073 7.55969C4.79447 10.4723 7.34071 12.7972 10.5308 13.9693L11.4209 12.3437C11.6467 11.9314 12.1406 11.7018 12.6386 11.7776L17.7398 12.5539C18.2944 12.6382 18.7008 13.0763 18.7008 13.5896V15.8501C18.7008 16.43 18.1859 16.9001 17.5508 16.9001H15.2508C6.99412 16.9001 0.300781 10.7888 0.300781 3.2501V1.1501Z" fill="white"/></svg>' . $earchi_options['earchi_header_button_text'] . '</a>';
               $html .= '</div>';
            $html .= '</div>';
            }
         $html .= '</div>';
      $html .= '</nav>';
   $html .= '</header>';

   return $html;
}

function earchi_header_lander() {
  global $earchi_options;
  global $post;
  $page_options = get_post_meta( get_the_ID(), 'page_options', true );

    $logo_white         = $earchi_options['logo_white']['url'] ? $earchi_options['logo_white']['url'] : '/wp-content/uploads/2024/04/hp-top-logo.png';
    $header_style       = $post->post_type == 'jobs' && is_singular() || $post->post_type == 'team' && is_singular() || $post->post_type == 'series' && is_singular() ? '2' : '1';
    $header_background  = $post->post_type == 'jobs' && is_singular() || $post->post_type == 'team' && is_singular() || $post->post_type == 'series' && is_singular() ? 'style="background:#fff;border-bottom:1px solid #000;"' : 'style=""';
    $header_style_v2    =  $post->post_type == 'series' && is_singular() ? 'style-01' : 'style-';

      $dark_header_three  = $post->post_type == 'page' && $page_options['dark_header'] == 1 ? "home-three" : "";
      $nav_style          = $post->post_type == 'page' && $page_options['dark_header'] == 1 ? "1" : "2";


    $html = '';
    $html .= '<header id="hp_header_wrap" class="header-style-0' . $header_style . ' hp_header_wrap">';
      $html .= '<nav id="nav-head" class="navbar navbar-area navbar-expand-lg navigation-style-0' . $nav_style . ' ' . $dark_header_three . ' ' . $header_style_v2 . '" ' . $header_background . '>';
         $html .= '<div class="container custom-container nav-container">';
            $html .= '<div class="responsive-menu">';
               $html .= '<div class="logo-wrapper">';
                  $html .= '<a href="' . home_url() . '/lp/series/" class="logo">';
                     $html .= '<img src="' . $logo_white . '" alt="logo" width="340" height="104"/><span class=logo_sub_txt>Family Owned and Operated Since 1971</span>';
                  $html .= '</a>';
               $html .= '</div>';
            $html .= '</div>';
			
            if ( !empty( $earchi_options['earchi_header_button_text'] ) && !empty( $earchi_options['earchi_header_button_link'] ) ) {
            $html .= '<div class="nav-right-content">';
               $html .= '<div class="btn-wrap">';
				  $html .= '<a href="tel:480-984-5637" class="boxed-btn fill-btn"><svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.300781 1.1501C0.300781 0.570199 0.815654 0.100098 1.45078 0.100098H3.92659C4.48875 0.100098 4.96852 0.471181 5.06094 0.977479L5.91115 5.63515C5.99415 6.08983 5.74265 6.54077 5.29109 6.74691L3.51073 7.55969C4.79447 10.4723 7.34071 12.7972 10.5308 13.9693L11.4209 12.3437C11.6467 11.9314 12.1406 11.7018 12.6386 11.7776L17.7398 12.5539C18.2944 12.6382 18.7008 13.0763 18.7008 13.5896V15.8501C18.7008 16.43 18.1859 16.9001 17.5508 16.9001H15.2508C6.99412 16.9001 0.300781 10.7888 0.300781 3.2501V1.1501Z" fill="white"/></svg> 480-984-5637</a>';
               $html .= '</div>';
            $html .= '</div>';
            }
         $html .= '</div>';
      $html .= '</nav>';
   $html .= '</header>';

   return $html;
}

function earchi_title_barx() {
  global $earchi_options;
  $page_options = get_post_meta( get_the_ID(), 'page_options', true );

if ( !is_front_page() ) {
    $title_bar_bg = $earchi_options['earchi_title_bar_background']['url'] ? $earchi_options['earchi_title_bar_background']['url'] : get_stylesheet_directory_uri() . '/assets/images/inner-banner2.jpg';
    if ( $earchi_options['earchi_title_bar'] == 1 ) {
          $html = '';
          /* $html .= '<div class="page-section-area page-bg innerpage_header" style="background-image: url(' . $title_bar_bg . ');">'; */
		  $html .= '<div class="page-section-area page-bg innerpage_header">';
		  if(!is_singular( 'series' )){
            $html .= '<div class="container custom-container">';
              $html .= '<div class="row justify-content-center">';
                $html .= '<div class="col-lg-12 col-md-12 col-12">';
                  $html .= '<div class="page-inner">';
                    /* $html .= '<h1 class="title">'; */
					$html .= '<div class="theme-section-title desktop-center black">';
					if(!is_page(array(495, 2834, 4781))){ 
					$html .= '<h1 class="subtitle header_title">';
					$html .= '<span class="line-three wow animate__"></span>';
					$html .= '<span class="line-four wow animate__"></span>';
                    if( is_category() ) {
                            $html .= single_cat_title( '', false );
                        } elseif( is_tag() ) {
                            $html .= single_tag_title( '', false );
                        } elseif( is_search() ) {
                            $html .= get_search_query( '', false );
                        } elseif( is_author() ) {
                            //$html .= get_the_author();
                        } elseif( is_home() ) {
                            $html .= esc_html__( 'Home', 'earchi' );
                        } elseif( is_404() ) {
                            $html .= esc_html__( '404 Page', 'earchi' );
                        } elseif( is_attachment() or is_page() or is_single() ) {
                            $html .= get_the_title( '', false );
                        } elseif( is_post_type_archive() ) {
                            $html .= post_type_archive_title( '', false );
                        } elseif( is_tax() ) {
                            $html .= single_term_title( '', false );
                        } elseif( is_post_type_archive('users') ) {
                            $html .= esc_html__( 'Home', 'earchi' );
                        } else {
                            if ( is_day() ) {
                                $html .= sprintf( esc_html__( 'Daily Archives: %s', 'earchi' ), get_the_date() );
                            } elseif ( is_month() ) {
                                $html .= sprintf( esc_html__( 'Monthly Archives: %s', 'earchi' ), get_the_date( _x( 'F Y', 'Monthly archives date format', 'earchi' ) ) );
                            } elseif ( is_year() ) {
                                $html .= sprintf( esc_html__( 'Yearly Archives: %s', 'earchi' ), get_the_date( _x( 'Y', 'Yearly archives date format', 'earchi' ) ) );
                            } else {
                                $html .= esc_html__( 'Home', 'earchi' );
                            }
                        }
					$html .= '<span class="line-one wow animate__"></span>';
					$html .= '<span class="line-two wow animate__"></span>';
					$html .= '</h1>';
					}
					$html .= '</div>';
                    /* $html .= '</h1>'; */
                  $html .= '</div>';
                $html .= '</div>';
              $html .= '</div>';
              if ( $earchi_options['earchi_breadcrumb'] == 1 ) {
                $html .= '<div class="breadcrumbs">';
                  $html .= '<ul>';
                    $html .= '<li><a href="' . home_url() . '"><i class="icon-home"></i>' . esc_html__( 'Home', 'earchi' ) . '</a></li>';
                        if( is_category() ) {
                            $html .= '<li class="breadcrumb-item active">' . ' ' . single_cat_title( '', false ) . '</li>';
                        } elseif( is_tag() ) {
                            $html .= '<li class="breadcrumb-item active">' . ' ' . single_tag_title( '', false ) . '</li>';
                        } elseif( is_search() ) {
                            $html .= '<li class="breadcrumb-item active">' . esc_html__( 'Search results for:', 'earchi' ) . ' ' . get_search_query() . '</li>';
                        } elseif( is_author() ) {
                           // $html .= '<li class="breadcrumb-item active">' . ' ' . get_the_author() . '</li>';
                        } elseif( is_home() ) {
                            $html .= '<li class="breadcrumb-item active">' . ' ' . esc_html__( 'Home', 'earchi' ) . '</li>';
                        } elseif( is_404() ) {
                            $html .= '<li class="breadcrumb-item active">' . ' ' . esc_html__( '404 Page', 'earchi' ) . '</li>';
                        } elseif( is_attachment() or is_page() or is_single() ) {
                            $html .= '<li class="breadcrumb-item active">' . ' ' . get_the_title( '', false ) . '</li>';
                        } elseif( is_post_type_archive() ) {
                            $html .= '<li class="breadcrumb-item active">' . ' ' . post_type_archive_title( '', false ) . '</li>';
                        } elseif( is_tax() ) {
                            $html .= '<li class="breadcrumb-item active">' . ' ' . single_term_title( '', false ) . '</li>';
                        } elseif( is_post_type_archive('users') ) {
                            $html .= '<li class="breadcrumb-item active">' . ' ' . esc_html__( 'Lorem ipsum', 'earchi' ) . '</li>';
                        } else {
                            if ( is_day() ) {
                                $html .= '<li class="breadcrumb-item active">' . ' ' . sprintf( esc_html__( 'Daily Archives: %s', 'earchi' ), get_the_date() ) . '</li>';
                            } elseif ( is_month() ) {
                                $html .= '<li class="breadcrumb-item active">' . ' ' . sprintf( esc_html__( 'Monthly Archives: %s', 'earchi' ), get_the_date( _x( 'F Y', 'Monthly archives date format', 'earchi' ) ) ) . '</li>';
                            } elseif ( is_year() ) {
                                $html .= '<li class="breadcrumb-item active">' . ' ' . sprintf( esc_html__( 'Yearly Archives: %s', 'earchi' ), get_the_date( _x( 'Y', 'Yearly archives date format', 'earchi' ) ) ) . '</li>';
                            } else {
                                $html .= '<li class="breadcrumb-item active">' . ' ' . esc_html__( 'Home', 'earchi' ) . '</li>';
                            }
                        }
                  $html .= '</ul>';
                $html .= '</div>';
              }
            $html .= '</div>';
		  }
          $html .= '</div>';

          return $html;
    }
  }
  
}


function earchi_page_content2() {
  global $earchi_options;
  $page_options   = get_post_meta( get_the_ID(), 'page_options', true );
  $gap            = $page_options['gap'] == 0 ? "" : "margin-top-115";
  $homepage_style = $page_options['homepage_style'] ? 1 : 0;

    $html = '';  
    if ( !is_front_page() && !$homepage_style == 1 ) {
    $html .= '<section class="page-section-area ' . $gap . '" style="overflow: hidden;">';
        $html .= '<div class="container custom-container-03 bodywrap_">';
          $html .= apply_filters( 'the_content', get_post_field( 'post_content', get_the_ID() ) );
        $html .= '</div>';
    $html .= '</section>';
    } else {
      $html .= apply_filters( 'the_content', get_post_field( 'post_content', get_the_ID() ) );
    }
    return $html;
}


/* series */
if( class_exists( 'CSF' ) ) {

	$prefix = 'earchi_options';
  
	CSF::createSection( $prefix, array(
	  'title'  => 'For Sale Page',
	  'icon'    => 'fas fa-tasks',
	  'fields' => array(
  
		array(
		  'id'    => 'earchi_serie_archive_title',
		  'type'  => 'text',
		  'title' => 'For Sale Archive Title',
		),
  
		array(
		  'id'    => 'earchi_serie_archive_sub_title',
		  'type'  => 'text',
		  'title' => 'For Sale Archive Sub Title',
		),
  
		array(
		  'id'    => 'earchi_serie_archive_text',
		  'type'  => 'text',
		  'title' => 'For Sale Archive Text',
		),

		/* */		
		array(
		  'id'    => 'earchi_serie_archive_button_title',
		  'type'  => 'text',
		  'title' => 'For Sale Archive Button Title',
		),
		array(
		  'id'    => 'earchi_serie_archive_button_url',
		  'type'  => 'text',
		  'title' => 'For Sale Archive Button Link',
		),
		array(
		  'id'    => 'earchi_serie_archive_map_txt',
		  'type'  => 'text',
		  'title' => 'For Sale Archive Map Text',
		),
		array(
		  'id'    => 'earchi_serie_archive_map',
		  'type'  => 'media',
		  'title' => 'For Sale Archive Map',
		  'library' => 'image',
		),
		/* */
  
		array(
		  'id'    => 'earchi_serie_archive_residence_title',
		  'type'  => 'text',
		  'title' => 'For Sale Archive Residence Title',
		),
  
		array(
		  'id'    => 'earchi_serie_archive_residence_sub_title',
		  'type'  => 'text',
		  'title' => 'For Sale Archive Residence Sub Title',
		),
  
		array(
		  'id'    => 'earchi_serie_archive_residence_text',
		  'type'  => 'text',
		  'title' => 'For Sale Archive Residence Text',
		),
  
		array(
		  'id'    => 'earchi_serie_archive_residence_image',
		  'type'  => 'media',
		  'title' => 'For Sale Archive Residence Image',
		  'library' => 'image',
		),
  
		array(
		  'id'        => 'earchi_serie_archive_residence_gallery',
		  'type'      => 'group',
		  'title'     => 'Residence Gallery',
		  'fields'    => array(
			array(
			  'id'    => 'earchi_serie_archive_residence_gallery_image_title',
			  'type'  => 'text',
			  'title' => 'Residence Gallery Image Title',
			),
  
			array(
			  'id'    => 'earchi_serie_archive_residence_gallery_image',
			  'type'  => 'media',
			  'title' => 'Residence Gallery Image',
			  'library' => 'image',
			),
		  ),
		),
  
		array(
		  'id'    => 'earchi_serie_archive_testimonials_title',
		  'type'  => 'text',
		  'title' => 'For Sale Archive Testimonials Title',
		),
  
		array(
		  'id'    => 'earchi_serie_archive_testimonials_sub_title',
		  'type'  => 'text',
		  'title' => 'For Sale Archive Testimonials Sub Title',
		),
  
		array(
		  'id'        => 'earchi_serie_archive_testimonials',
		  'type'      => 'group',
		  'title'     => 'Testimonials',
		  'fields'    => array(
			array(
			  'id'    => 'earchi_serie_archive_testimonial_name',
			  'type'  => 'text',
			  'title' => 'Testimonial Name',
			),
  
			array(
			  'id'    => 'earchi_serie_archive_testimonial_job',
			  'type'  => 'text',
			  'title' => 'Testimonial Job',
			),
  
			array(
			  'id'    => 'earchi_serie_archive_testimonial_text',
			  'type'  => 'text',
			  'title' => 'Testimonial Text',
			),
  
		  ),
		),
  
	  )
	) );
}

$earchi_options = get_option( 'earchi_options' );

function earchi_serie_details_title_bar() {
    $html = ''; 
    $html .= '<div class="container custom-container-03 margin-top-30">';
        $html .= '<div class="row">';
            $html .= '<div class="col-12">';
                $html .= '<div class="breadcrumbs style-02 text-start">';
                    $html .= '<ul>';
                        $html .= '<li><a href="' . home_url() . '"><i class="icon-home"></i>' . esc_html__( 'Home', 'earchi' ) . '</a></li>';
                        $html .= '<li><a href="' . get_the_permalink() . '" class="active">' . get_the_title() . '</a></li>';
                    $html .= '</ul>';
                $html .= '</div>';
            $html .= '</div>';
        $html .= '</div>';
    $html .= '</div>';

    return $html;
}

function earchi_serie_details() {
  global $earchi_options;
  $psid = get_the_ID();
  $serie_options          = get_post_meta( get_the_ID(), 'serie_options', true );
  $serie_features         = serie_get_option( 'serie_features' );
  $serie_features_column  = !empty( $serie_features ) ? '6' : '12';
  
  $sr_status = get_field( 'seriesp_status' );
  $sr_status_title = get_field( 'seriesp_status_title' );
 $new_status = " | <span class=new>".$sr_status_title."</span>";
 $sold_status = " | <span class=sold>SOLD</span>";
	
    $html = '';
    $html .= '<section class="project-details-section margin-top-10x single_series">';
        $html .= '<div class="container custom-container-03">';
            $html .= '<div class="row innerhed_">';
                if (has_post_thumbnail()) {
                  if(!is_singular( 'series' )){
                  $html .= '<div class="col-lg-12">';
                    $html .= '<div class="main-thumbnail">';
                        $html .= '<img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '">';
                    $html .= '</div>';
                  $html .= '</div>';
                }}
/*
                if ( ! empty( $serie_features ) ) {
                  $html .= '<div class="col-lg-6">';
                      $html .= '<div class="office-center-wrap">';
                          $html .= '<div class="icon-box-wrap">';
                          foreach ( $serie_features as $serie_feature ) {
                            if ( ! empty( $serie_feature['serie_features_title'] ) ) {
                              $html .= '<div class="icon-box-item-03">';
                                  if ( ! empty( $serie_feature['serie_features_image']['url'] ) ) {
                                    $html .= '<div class="icon">';
                                        $html .= '<img src="' . $serie_feature['serie_features_image']['url'] . '" alt="' . get_the_title() . '">';
                                    $html .= '</div>';
                                  }
                                  if ( ! empty( $serie_feature['serie_features_title'] ) || ! empty( $serie_feature['serie_features_text'] ) ) {
                                    $html .= '<div class="content">';
                                        if ( ! empty( $serie_feature['serie_features_title'] ) ) {
                                          $html .= '<h4 class="title">' . $serie_feature['serie_features_title'] . '</h4>';
                                        }
                                        if ( ! empty( $serie_feature['serie_features_text'] ) ) {
                                          $html .= '<p>' . $serie_feature['serie_features_text'] . '</p>';
                                        }
                                    $html .= '</div>';
                                  }
                              $html .= '</div>';

                            }
                          }
                          $html .= '</div>';
                      $html .= '</div>';
                  $html .= '</div>';
                }
*/

$html .= '<div class="col-lg-3">';
                    $html .= '<div class="office-content">';
						if($sr_status !== "soldseries"){
							$html .= '<h1 class="title">' . get_the_title() . $new_status .'</span></h1>';
						} else{
							$html .= '<h1 class="title">' . get_the_title() . $sold_status .'</h1>';
						}
$html .= '</div></div>';
       
                $html .= '<div class="col-lg-9">';
                    $html .= '<div class="office-content">';
                        /* $html .= '<h3 class="title">' . get_the_title() . '</h3>'; */
						/*
						if($sr_status !== "soldseries"){
							$html .= '<h3 class="title">' . get_the_title() . $new_status .'</span></h3>';
						} else{
							$html .= '<h3 class="title">' . get_the_title() . $sold_status .'</h3>';
						}
						*/
						
                        if ( !empty( get_the_content() ) ) {
                          $html .= '<p>' . get_the_content() . '</p>';
                        }
						// $pdf_file = get_field('pdf_brochure_file',$psid);
						
						if(get_field("ctabutton_name",$psid)){
							
						$html .= '<div class=btns_wrap>';
						/*
						if(get_field('pdf_brochure_title',$psid) && $pdf_file){
						  $html .= '<p class=pdf_brochure><a href="'. $pdf_file['url'] .'" download><span class="fa fa-file-pdf-o"></span>' . get_field("pdf_brochure_title",$psid) . '</a></p>';
						}
						*/
							
						$serie_options      = get_post_meta( get_the_ID(), 'serie_options', true );
						$video_gallery        = serie_get_option( 'video_gallery' );
						$vid_count = 0;
						
						$html .= '<div class=cta_price><div class=btn-wrap >';
						foreach ( $video_gallery as $video_gal ) {
							$vid_count = $vid_count + 1;
							if ($vid_count <= 1){
								$html .= '<a href="'.$video_gal['serie_video_gallery_video_url'].'" class="boxed-btn round-btn" data-fancybox="gallery-video">'.get_field("ctabutton_name",$psid).'</a>';
							} else{
								$html .= '<a href="'.$video_gal['serie_video_gallery_video_url'].'" style="display:none;" data-fancybox="gallery-video"x></a>';
							}
						}
						$html .='</div></div>';
						$html .= '</div>';
						}
                        if ( !empty( $serie_options['serie_button_text'] ) ) {
                          $html .= '<div class="btn-wrap margin-top-60">';
                              $html .= '<a href="' . $serie_options['serie_button_link'] . '" class="boxed-btn read-btn style-03">' . $serie_options['serie_button_text'] . '';
                                  $html .= '<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>';
                              $html .= '</a>';
                          $html .= '</div>';
                        }
                    $html .= '</div>';
                $html .= '</div>';
            $html .= '</div>';
        $html .= '</div>';
    $html .= '</section>';

    return $html;
}

function earchi_serie_list() {
  global $earchi_options;
  $serie_serie_list           = serie_get_option( 'serie_serie_list' );
  $serie_serie_category_count = 0;
  $serie_serie_tab_count      = 0;

    $html = '';
    if ( ! empty( $serie_serie_list ) ) {
      $html .= '<div class="high-project-section margin-top-120 ">';
          $html .= '<div class="container custom-container-03">';
                $html .= '<div class="row justify-content-center">';
                    $html .= '<div class="col-lg-10">';
                        $html .= '<ul class="nav nav-pills">';
                            foreach ( $serie_serie_list as $serie_serie ) {
                              $serie_serie_category_count++;
                              $active_class = ( $serie_serie_category_count === 1 ) ? 'active' : '';
                              $show_class   = ( $serie_serie_category_count === 1 ) ? 'show' : '';

                              if ( ! empty( $serie_serie['serie_serie_category'] ) ) {
                                $html .= '<li class="nav-item">';
                                    $html .= '<a href="#" class="nav-link ' . $active_class . '" data-bs-toggle="pill" data-bs-target="#tab-' . $serie_serie_category_count . '">' . $serie_serie['serie_serie_category'] . '</a>';
                                $html .= '</li>';
                              }
                            }    
                        $html .= '</ul>';
                    $html .= '</div>';
                $html .= '</div>';
              $html .= '<div class="tab-content">';
                  foreach ( $serie_serie_list as $serie_serie ) {
                    $serie_serie_tab_count++;
                    $active_class = ( $serie_serie_tab_count === 1 ) ? 'active' : '';
                    $show_class   = ( $serie_serie_tab_count === 1 ) ? 'show' : '';
                    $serie_tab_column  = !empty( $serie_serie['serie_serie_image']['url'] ) ? '6' : '12';

                    $html .= '<div class="tab-pane fade ' . $show_class . ' ' . $active_class . '" id="tab-' . $serie_serie_tab_count . '">';
                        $html .= '<div class="high-items-wrapper">';
                            $html .= '<div class="row align-items-center">';
                                $html .= '<div class="col-lg-' . $serie_tab_column . '">';
                                    $html .= '<div class="high-project-item">';
                                        $html .= '<div class="content">';
                                            if ( $serie_serie['serie_serie_title'] ) {
                                              $html .= '<h3 class="title">' . $serie_serie['serie_serie_title'] . '</h3>';
                                            }
                                            if ( $serie_serie['serie_serie_text'] ) {
                                              $html .= '<p class="style-01">' . $serie_serie['serie_serie_text'] . '</p>';
                                            }
                                        $html .= '</div>';
                                    $html .= '</div>';
                                $html .= '</div>';
                                if ( $serie_serie['serie_serie_image']['url'] ) {
                                  $html .= '<div class="col-lg-6">';
                                      $html .= '<div class="thumbnail mt-4 mt-lg-0">';
                                          $html .= '<img src="' . $serie_serie['serie_serie_image']['url'] . '" alt="' . $serie_serie['serie_serie_title'] . '">';
                                      $html .= '</div>';
                                  $html .= '</div>';
                                }
                            $html .= '</div>';
                        $html .= '</div>';
                    $html .= '</div>';
                  }
              $html .= '</div>';
          $html .= '</div>';
      $html .= '</div>';
    }

    return $html;
}

function earchi_floorplan_list() {
  global $earchi_options;
  $earchi_floorplan_list           = serie_get_option( 'floorplan_floorplan_list' );
  $serie_serie_category_count = 0;
  $serie_serie_tab_count      = 0;

    $html = '';
    if ( ! empty( $floorplan_floorplan_list ) ) {
      $html .= '<div class="high-project-section margin-top-120 ">';
          $html .= '<div class="container custom-container-03">';
                $html .= '<div class="row justify-content-center">';
                    $html .= '<div class="col-lg-10">';
                        $html .= '<ul class="nav nav-pills">';
                            foreach ( $floorplan_floorplan_list as $floorplan_floorplan ) {
                              $floorplan_floorplan_category_count++;
                              $active_class = ( $floorplan_floorplan_category_count === 1 ) ? 'active' : '';
                              $show_class   = ( $floorplan_floorplan_category_count === 1 ) ? 'show' : '';

                              if ( ! empty( $floorplan_floorplan['floorplan_floorplan_category'] ) ) {
                                $html .= '<li class="nav-item">';
                                    $html .= '<a href="#" class="nav-link ' . $active_class . '" data-bs-toggle="pill" data-bs-target="#tab-' . $floorplan_floorplan_category_count . '">' . $floorplan_floorplan['floorplan_floorplan_category'] . '</a>';
                                $html .= '</li>';
                              }
                            }    
                        $html .= '</ul>';
                    $html .= '</div>';
                $html .= '</div>';
              $html .= '<div class="tab-content">';
                  foreach ( $floorplan_floorplan_list as $floorplan_floorplan ) {
                    $floorplan_floorplan_tab_count++;
                    $active_class = ( $floorplan_floorplan_tab_count === 1 ) ? 'active' : '';
                    $show_class   = ( $floorplan_floorplan_tab_count === 1 ) ? 'show' : '';
                    $serie_tab_column  = !empty( $floorplan_floorplan['floorplan_floorplan_image']['url'] ) ? '6' : '12';

                    $html .= '<div class="tab-pane fade ' . $show_class . ' ' . $active_class . '" id="tab-' . $floorplan_floorplan_tab_count . '">';
                        $html .= '<div class="high-items-wrapper">';
                            $html .= '<div class="row align-items-center">';
                                $html .= '<div class="col-lg-' . $serie_tab_column . '">';
                                    $html .= '<div class="high-project-item">';
                                        $html .= '<div class="content">';
                                            if ( $floorplan_floorplan['floorplan_floorplan_title'] ) {
                                              $html .= '<h3 class="title">' . $floorplan_floorplan['floorplan_floorplan_title'] . '</h3>';
                                            }
                                            if ( $floorplan_floorplan['floorplan_floorplan_text'] ) {
                                              $html .= '<p class="style-01">' . $floorplan_floorplan['floorplan_floorplan_text'] . '</p>';
                                            }
                                        $html .= '</div>';
                                    $html .= '</div>';
                                $html .= '</div>';
                                if ( $floorplan_floorplan['floorplan_floorplan_image']['url'] ) {
                                  $html .= '<div class="col-lg-6">';
                                      $html .= '<div class="thumbnail mt-4 mt-lg-0">';
                                          $html .= '<img src="' . $floorplan_floorplan['floorplan_floorplan_image']['url'] . '" alt="' . $floorplan_floorplan['floorplan_floorplan_title'] . '">';
                                      $html .= '</div>';
                                  $html .= '</div>';
                                }
                            $html .= '</div>';
                        $html .= '</div>';
                    $html .= '</div>';
                  }
              $html .= '</div>';
          $html .= '</div>';
      $html .= '</div>';
    }

    return $html;
}

function earchi_footer_style_v1x() {
  global $earchi_options;

  $footer_logo_white      = $earchi_options['footer_logo_white']['url'] ? $earchi_options['footer_logo_white']['url'] : get_stylesheet_directory_uri() . '/assets/images/overland-park-model-footer-logo.png';
  $footer_v1_mailchimp    = empty( $earchi_options['footer_v1_mailchimp'] ) || $earchi_options['footer_top'] == 0  ? 'pt-120' : '';

  function footer_v1_get_option( $option = '', $default = null ) {
    $options = get_option( 'earchi_options' );
    return ( isset( $options[ $option ] ) && $options[ $option ] !== '' ) ? $options[ $option ] : $default;
  }
  $footer_v1_menu   = footer_v1_get_option( 'footer_v1_third_widget_menu' );
  $socials          = footer_v1_get_option( 'footer_social' );

$args = array(
    'post_type' => 'post',
    'posts_per_page' => $earchi_options['footer_v1_second_widget_number'], 
);
$query = new WP_Query( $args );

  if ( $earchi_options['footer'] == 1 ) {
  $html = '';
  $html .= '<footer class="footer-area hp_footer_section">';
    $html .= '<div class="footer-top">';
      $html .= '<div class="container custom-container-03">';
        $html .= '<div class="footer-top-border">';
		/*
          if ( !empty( $earchi_options['footer_v1_mailchimp'] ) && $earchi_options['footer_top'] == 1 ) {
            $html .= '<div class="row">';
              $html .= '<div class="col-lg-12">';
              $html .= do_shortcode( $earchi_options['footer_v1_mailchimp'] );
              $html .= '</div>';
            $html .= '</div>';
          }
		  */
          if ( $earchi_options['footer_bottom'] == 1 ) {
          $html .= '<div class="row ' . $footer_v1_mailchimp . '">';
              if ( !empty( $earchi_options['footer_v1_first_widget_title'] ) ) {
                  $html .= '<div class="col-lg-12 col-md-12">';
                    $html .= '<div class="footer-widget widget">';
                      /* $html .= '<h4 class="widget-title">' . $earchi_options['footer_v1_first_widget_title'] . '</h4>'; */
                      $html .= '<div class="about_us_widget">';
                      if ( !empty( $earchi_options['footer_v1_first_widget_text'] ) ) {
                        $html .= '<p><a href="/"><img class="hp_footer_logo" src="' . $footer_logo_white . '" alt="' . get_the_title() . '" width="324" height="69" /></a></p>';
                      }
                      $html .= '</div>';
                    $html .= '</div>';
                  $html .= '</div>';
                }
              if ( !empty( $earchi_options['footer_v1_third_widget_title'] ) ) {
                $html .= '<div class="col-lg-10 col-md-10 col-sm-12 col-10 margin_auto">';
                  $html .= '<div class="footer-widget widget widget_nav_menu">';
                    /* $html .= '<h4 class="widget-title">' . $earchi_options['footer_v1_third_widget_title'] . '</h4>'; */
                    if ( ! empty( $footer_v1_menu ) ) {
                      $html .= '<ul>';
                      foreach ( $footer_v1_menu as $menu ) {
                            $html .= '<li><a href="' . $menu['footer_v1_third_widget_menu_link'] . '">' . $menu['footer_v1_third_widget_menu_title'] . '</a></li>';
                        }
                     $html .= '</ul>';
                    }
                  $html .= '</div>';
                $html .= '</div>';
              }
			  if ( !empty( $earchi_options['footer_v1_second_widget_title'] ) ) {
                $html .= '<div class="col-lg-12 col-md-12">';
                  $html .= '<div class="footer-widget widget widget_author_meta">';
				  /*
					if ( !empty( $earchi_options['footer_v1_first_widget_phone'] || $earchi_options['footer_v1_first_widget_mail'] ) ) {
                        $html .= '<div class="contact-wrap">';
                          if ( !empty( $earchi_options['footer_v1_first_widget_mail'] ) ) {
                            $html .= '<p class="email"><a href="mail:' . $earchi_options['footer_v1_first_widget_mail'] . '"><span>' . esc_html__( 'Email : ', 'earchi' ) . '</span> ' . $earchi_options['footer_v1_first_widget_mail'] . '</a></p>';
                          }
                          if ( !empty( $earchi_options['footer_v1_first_widget_phone'] ) ) {
                            $html .= '<p class="fax"><a href="tel:' . $earchi_options['footer_v1_first_widget_phone'] . '"><span>Fax :</span> ' . $earchi_options['footer_v1_first_widget_phone'] . '</a></p>';
                          }
                        $html .= '</div>';
                      }
					*/
                    if ( !empty( $socials ) ) {
					  $html .= '<ul class="social-icon footer">';
						foreach ( $socials as $social ) {
							$html .= '<li><a href="' . $social['footer_social_link'] . '" target="_blank"><i class="' . $social['footer_social_icon'] . '"></i></a></li>';
						}
					  $html .= '</ul>';
					}
                  $html .= '</div>';
                $html .= '</div>';
              }
            $html .= '</div>';
          }
        $html .= '</div>';
      $html .= '</div>';
    $html .= '</div>';
	if ( $earchi_options['footer_copyright'] == 1 ) {
          $html .= '<div class="copyright-area">';
			/*
            $html .= '<div class="footer-logo">';
              $html .= '<img src="' . $footer_logo_white . '" alt="' . get_the_title() . '">';
            $html .= '</div>';
			*/
            if ( !empty( $earchi_options['footer_copyright_text'] ) ) {
            $html .= '<div class="copyright-area-inner">';
              $html .= '<p>' . $earchi_options['footer_copyright_text'] . '</p>';
            $html .= '</div>';
            }
			/*
            if ( !empty( $socials ) ) {
              $html .= '<ul class="social-icon footer">';
                foreach ( $socials as $social ) {
                    $html .= '<li><a href="' . $social['footer_social_link'] . '"><i class="' . $social['footer_social_icon'] . '"></i></a></li>';
                }
              $html .= '</ul>';
            }
			*/
			$menu_name = 'Stick Bottom Menu';
			$array_menu = wp_get_nav_menu_items($menu_name);
			$html .= '<div class=stickybottom_wrap><ul class=stickybottom_btn>';
			$menu_count = 0;
			foreach ($array_menu as $navItem ) {
				$menu_count = $menu_count + 1;
				if($menu_count == 1){
					$html .= '<li><a href="'.$navItem->url.'" title="'.$navItem->title.'"><img alt="contact us" src="/wp-content/uploads/2023/08/envelope.png" /></a></li>';
				} else{
					$html .= '<li><a href="'.$navItem->url.'" title="'.$navItem->title.'"><svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.300781 1.1501C0.300781 0.570199 0.815654 0.100098 1.45078 0.100098H3.92659C4.48875 0.100098 4.96852 0.471181 5.06094 0.977479L5.91115 5.63515C5.99415 6.08983 5.74265 6.54077 5.29109 6.74691L3.51073 7.55969C4.79447 10.4723 7.34071 12.7972 10.5308 13.9693L11.4209 12.3437C11.6467 11.9314 12.1406 11.7018 12.6386 11.7776L17.7398 12.5539C18.2944 12.6382 18.7008 13.0763 18.7008 13.5896V15.8501C18.7008 16.43 18.1859 16.9001 17.5508 16.9001H15.2508C6.99412 16.9001 0.300781 10.7888 0.300781 3.2501V1.1501Z" fill="white"/></svg><span class=txtname>'.$navItem->title.'</span></a></li>';
				}
			}
			$html .= '</ul></div>';
          $html .= '</div>';
        }

  $html .= '</footer>';

  return $html;

  }
}

function earchi_serie_facilities() {
  global $earchi_options;
  $serie_options      = get_post_meta( get_the_ID(), 'serie_options', true );
  $serie_facilities   = serie_get_option( 'serie_facilities' );

    $html = '';
    $html .= '<div class="facilities-section margin-top-110">';
        $html .= '<div class="container custom-container-03">';
            if ( $serie_options['serie_facilities_title'] ) {
              $html .= '<div class="row justify-content-center">';
                  $html .= '<div class="col-lg-6">';
                      $html .= '<div class="theme-section-title desktop-center">';
                          $html .= '<div class="title">' . $serie_options['serie_facilities_title'] . '</div>';
                      $html .= '</div>';
                  $html .= '</div>';
              $html .= '</div>';
            }
            $html .= '<div class="row">';
                if ( ! empty( $serie_facilities ) ) {
                  foreach ( $serie_facilities as $serie_facility ) {
                    $html .= '<div class="col-lg-3 col-md-6">';
                        $html .= '<div class="facilities-single-item">';
                            $html .= '<div class="icon">';
                                $html .= '<i class="fas fa-check"></i>';
                            $html .= '</div>';
                            $html .= '<div class="content">';
                                if ( $serie_facility['serie_facilities_title'] ) {
                                  $html .= '<h6 class="title">' . $serie_facility['serie_facilities_title'] . '</h6>';
                                }
                                if ( $serie_facility['serie_facilities_text'] ) {
                                  $html .= '<p>' . $serie_facility['serie_facilities_text'] . '</p>';
                                }
                            $html .= '</div>';
                        $html .= '</div>';
                    $html .= '</div>';
                  }
                }
            $html .= '</div>';
        $html .= '</div>';
    $html .= '</div>';

    return $html;
}

function earchi_serie_gallery() {
  global $earchi_options;
  $psid = get_the_ID();
  $serie_options      = get_post_meta( get_the_ID(), 'serie_options', true );
  $serie_gallery      = serie_get_option( 'serie_gallery' );
  $video_gallery        = serie_get_option( 'video_gallery' );
  $video_360_gallery    = serie_get_option( 'video_360_gallery' );
  $serie_maps         = serie_get_option( 'serie_maps' );

    $html = '';
    /* if ( !empty( $serie_options['serie_gallery_title'] ) || !empty( $serie_options['serie_video_title'] ) || !empty( $serie_options['serie_360_video_title'] ) || !empty( $serie_options['serie_map_title'] ) ) { */
	if ( !empty( $serie_options['serie_video_title'] ) || !empty( $serie_options['serie_360_video_title'] ) || !empty( $serie_options['serie_map_title'] ) ) {
      $html .= '<div class="gallery-section-area-02 margin-top-80">';
          $html .= '<div class="container custom-container-03">';
              $html .= '<div class="row align-items-center">';
                    $html .= '<div class="col-lg-3">';
                        $html .= '<ul class="nav nav-pills">';
							/*
                            if ( !empty( $serie_options['serie_gallery_title'] ) ) {
                              $html .= '<li class="nav-item">';
                                  $html .= '<a href="#" class="nav-link active style-01" data-bs-toggle="pill" data-bs-target="#gallery">' . $serie_options['serie_gallery_title'] . '</a>';
                              $html .= '</li>';
                            }
							*/
                            if ( !empty( $serie_options['serie_video_title'] ) ) {
                              $html .= '<li class="nav-item">';
                                  $html .= '<a href="#" class="nav-link active style-01" data-bs-toggle="pill" data-bs-target="#video">' . $serie_options['serie_video_title'] . '</a>';
                              $html .= '</li>';
                            }
                            if ( !empty( $serie_options['serie_360_video_title'] ) ) {
                              $html .= '<li class="nav-item">';
                                  $html .= '<a href="#" class="nav-link style-02" data-bs-toggle="pill" data-bs-target="#video-02">' . $serie_options['serie_360_video_title'] . '</a>';
                              $html .= '</li>';
                            }
                            if ( !empty( $serie_options['serie_map_title'] ) ) {
                              $html .= '<li class="nav-item">';
                                  $html .= '<a href="#" class="nav-link style-03" data-bs-toggle="pill" data-bs-target="#map">' . $serie_options['serie_map_title'] . '</a>';
                              $html .= '</li>';
                            }
                        $html .= '</ul>';
                    $html .= '</div>';
                  /* if ( !empty( $serie_gallery ) || !empty( $video_gallery ) || !empty( $video_360_gallery ) || !empty( $serie_maps ) ) { */
				  if ( !empty( $video_gallery ) || !empty( $video_360_gallery ) || !empty( $serie_maps ) ) {
                    $html .= '<div class="col-lg-9">';
                        $html .= '<div class="tab-content">';
							/*
                            if ( !empty( $serie_gallery ) ) { 
                              $html .= '<div class="tab-pane fade show active series_gallery" id="gallery">';
                                  $html .= '<div class="unique-slider-two">';
                                      $html .= '<div class="swiper-wrapper">';
                                          foreach ( $serie_gallery as $serie_gal ) {
                                            if ( !empty( $serie_gal['serie_gallery_image']['url'] ) ) {   
                                              $html .= '<div class="swiper-slide">';
                                                  $html .= '<div class="unique-slider-item">';
                                                      $html .= '<div class="thumbnail">';
                                                          $html .= '<img src="' . $serie_gal['serie_gallery_image']['url'] . '" alt="' . $serie_gal['serie_gallery_title'] . '">';
                                                      $html .= '</div>';
                                                  $html .= '</div>';
                                              $html .= '</div>';
                                            }
                                          }
                                      $html .= '</div>';
                                      $html .= '<div class="next-icon swiper-control">';
                                          $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 27.929 18.72">';
                                              $html .= '<path
                                                  d="M8.306,12.638C6.982,8.666,7.7,4.635,7.464.6c0-.181.421-.481.662-.542A1.5,1.5,0,0,1,9.569.423a5.844,5.844,0,0,1,1.865,3.851,46.352,46.352,0,0,1,.481,9.988,8.976,8.976,0,0,1,.12,1.264,46.5,46.5,0,0,1,.12,4.994,22.391,22.391,0,0,1,3.851-3.309,1.46,1.46,0,0,1,2.106.361,1.792,1.792,0,0,1,.361,2.226,25,25,0,0,1-2.527,3.129c-1.564,1.5-3.249,2.828-4.874,4.272h0a1.3,1.3,0,0,1-1.745.6l-.662-.361c-3.55-1.805-5.716-5.054-8.6-7.521-.12-.12-.06-.6.12-.842a1.363,1.363,0,0,1,1.264-.722,5.488,5.488,0,0,1,3.971,1.324c.842.722,1.745,1.384,2.587,2.046a15.411,15.411,0,0,1-.181-2.347C7.885,17.09,8.125,14.864,8.306,12.638Z"
                                                  transform="translate(27.929) rotate(90)" fill="#fff" />';
                                          $html .= '</svg>';
                                      $html .= '</div>';
                                      $html .= '<div class="prev-icon swiper-control">';
                                          $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083">';
                                              $html .= '<path
                                                  d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z"
                                                  transform="translate(47.79 -30.712) rotate(90)" fill="#fff" />';
                                          $html .= '</svg>';
                                      $html .= '</div>';
                                  $html .= '</div>';
                              $html .= '</div>';
                            }
							*/
                            if ( !empty( $video_gallery ) ) { 
                              $html .= '<div class="tab-pane fade show active" id="video">';
                                  $html .= '<div class="unique-slider-two">';
                                      $html .= '<div class="swiper-wrapper">';
                                        foreach ( $video_gallery as $video_gal ) {
                                            if ( !empty( $video_gal['serie_video_gallery_cover']['url'] && $video_gal['serie_video_gallery_video_url'] ) ) {   
                                              $html .= '<div class="swiper-slide">';
                                                  $html .= '<div class="unique-slider-item">';
                                                      $html .= '<div class="thumbnail">';
                                                          $html .= '<img src="' . $video_gal['serie_video_gallery_cover']['url'] . '" alt="' . $video_gal['serie_video_gallery_title'] . '">';
															$html .= '<a class="video-play-btn style-01 mfp-iframe" href="' . $video_gal['serie_video_gallery_video_url'] . '">';
																$html .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 26">';
                                                                  $html .= '<g transform="translate(24) rotate(90)" fill="none">';
                                                                      $html .= '<path d="M13,0,26,24H0Z" stroke="none"></path>';
                                                                      $html .= '<path d="M 13 4.199178695678711 L 3.357889175415039 22 L 22.64211082458496 22 L 13 4.199178695678711 M 13 0 L 26 24 L 0 24 L 13 0 Z" stroke="none" fill="#fff"></path>';
                                                                  $html .= '</g>';
                                                              $html .= '</svg>';
                                                          $html .= '</a>';
                                                      $html .= '</div>';
                                                  $html .= '</div>';
                                              $html .= '</div>';
                                            }
                                        }
                                      $html .= '</div>';
                                      $html .= '<div class="next-icon swiper-control">';
											$html .= '<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m13.2 6.8l1.4 1.4-6.8 6.8h20.1v2h-20.1l6.8 6.8-1.4 1.4-8.5-8.5-0.7-0.7 0.7-0.7z"/></svg>';
											/*
                                          $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 27.929 18.72">';
                                              $html .= '<path d="M8.306,12.638C6.982,8.666,7.7,4.635,7.464.6c0-.181.421-.481.662-.542A1.5,1.5,0,0,1,9.569.423a5.844,5.844,0,0,1,1.865,3.851,46.352,46.352,0,0,1,.481,9.988,8.976,8.976,0,0,1,.12,1.264,46.5,46.5,0,0,1,.12,4.994,22.391,22.391,0,0,1,3.851-3.309,1.46,1.46,0,0,1,2.106.361,1.792,1.792,0,0,1,.361,2.226,25,25,0,0,1-2.527,3.129c-1.564,1.5-3.249,2.828-4.874,4.272h0a1.3,1.3,0,0,1-1.745.6l-.662-.361c-3.55-1.805-5.716-5.054-8.6-7.521-.12-.12-.06-.6.12-.842a1.363,1.363,0,0,1,1.264-.722,5.488,5.488,0,0,1,3.971,1.324c.842.722,1.745,1.384,2.587,2.046a15.411,15.411,0,0,1-.181-2.347C7.885,17.09,8.125,14.864,8.306,12.638Z" transform="translate(27.929) rotate(90)" fill="#fff" />';
                                          $html .= '</svg>';
										  */
										  
                                      $html .= '</div>';
                                      $html .= '<div class="prev-icon swiper-control">';
										$html .= '<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>';
											/*
                                          $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083">';
                                              $html .= '<path d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z" transform="translate(47.79 -30.712) rotate(90)" fill="#fff" />';
                                          $html .= '</svg>';
										  */
                                      $html .= '</div>';
                                  $html .= '</div>';
                              $html .= '</div>';
                            }
							/*
							if ( !empty( $video_gallery ) ) { 
                              $html .= '<div class="tab-pane fade show active" id="video">';
                                  $html .= '<div class="unique-slider-two">';
                                      $html .= '<div class="swiper-wrapper">';
                                        foreach ( $video_gallery as $video_gal ) {
                                            if ( !empty( $video_gal['serie_video_gallery_cover']['url'] && $video_gal['serie_video_gallery_video_url'] ) ) {   
                                              $html .= '<div class="swiper-slide">';
                                                  $html .= '<div class="unique-slider-item">';
                                                      $html .= '<div class="thumbnail">';
                                                          $html .= '<img src="' . $video_gal['serie_video_gallery_cover']['url'] . '" alt="' . $video_gal['serie_video_gallery_title'] . '">';

															$html .= '<a class="video-play-btn style-01 mfp-iframe" href="' . $video_gal['serie_video_gallery_video_url'] . '">';
																$html .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 26">';
                                                                  $html .= '<g transform="translate(24) rotate(90)" fill="none">';
                                                                      $html .= '<path d="M13,0,26,24H0Z" stroke="none"></path>';
                                                                      $html .= '<path d="M 13 4.199178695678711 L 3.357889175415039 22 L 22.64211082458496 22 L 13 4.199178695678711 M 13 0 L 26 24 L 0 24 L 13 0 Z" stroke="none" fill="#fff"></path>';
                                                                  $html .= '</g>';
                                                              $html .= '</svg>';
                                                          $html .= '</a>';
                                                      $html .= '</div>';
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
							 //hide video 360
                            if ( !empty( $video_360_gallery ) ) { 
                              $html .= '<div class="tab-pane fade" id="video-02">';
                                  $html .= '<div class="unique-slider-two">';
                                      $html .= '<div class="swiper-wrapper">';
                                        foreach ( $video_360_gallery as $video_360_gal ) {
                                            if ( !empty( $video_360_gal['serie_360_video_gallery_cover']['url'] && $video_360_gal['serie_360_video_gallery_video_url'] ) ) {   
                                              $html .= '<div class="swiper-slide">';
                                                  $html .= '<div class="unique-slider-item">';
                                                      $html .= '<div class="thumbnail">';
                                                          $html .= '<img src="' . $video_360_gal['serie_360_video_gallery_cover']['url'] . '" alt="' . $video_360_gal['serie_360_video_gallery_title'] . '">';
                                                          $html .= '<a class="video-play-btn style-01 mfp-iframe" href="' . $video_360_gal['serie_360_video_gallery_video_url'] . '">';
                                                              $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 26">';
                                                                  $html .= '<g transform="translate(24) rotate(90)" fill="none">';
                                                                      $html .= '<path d="M13,0,26,24H0Z" stroke="none"></path>';
                                                                      $html .= '<path d="M 13 4.199178695678711 L 3.357889175415039 22 L 22.64211082458496 22 L 13 4.199178695678711 M 13 0 L 26 24 L 0 24 L 13 0 Z" stroke="none" fill="#fff"></path>';
                                                                  $html .= '</g>';
                                                              $html .= '</svg>';
                                                          $html .= '</a>';
                                                      $html .= '</div>';
                                                  $html .= '</div>';
                                              $html .= '</div>';
                                            }
                                        }
                                      $html .= '</div>';
                                      $html .= '<div class="next-icon swiper-control">';
											$html .= '<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m13.2 6.8l1.4 1.4-6.8 6.8h20.1v2h-20.1l6.8 6.8-1.4 1.4-8.5-8.5-0.7-0.7 0.7-0.7z"/></svg>';
											
                                         // $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 27.929 18.72">';
                                        //      $html .= '<path d="M8.306,12.638C6.982,8.666,7.7,4.635,7.464.6c0-.181.421-.481.662-.542A1.5,1.5,0,0,1,9.569.423a5.844,5.844,0,0,1,1.865,3.851,46.352,46.352,0,0,1,.481,9.988,8.976,8.976,0,0,1,.12,1.264,46.5,46.5,0,0,1,.12,4.994,22.391,22.391,0,0,1,3.851-3.309,1.46,1.46,0,0,1,2.106.361,1.792,1.792,0,0,1,.361,2.226,25,25,0,0,1-2.527,3.129c-1.564,1.5-3.249,2.828-4.874,4.272h0a1.3,1.3,0,0,1-1.745.6l-.662-.361c-3.55-1.805-5.716-5.054-8.6-7.521-.12-.12-.06-.6.12-.842a1.363,1.363,0,0,1,1.264-.722,5.488,5.488,0,0,1,3.971,1.324c.842.722,1.745,1.384,2.587,2.046a15.411,15.411,0,0,1-.181-2.347C7.885,17.09,8.125,14.864,8.306,12.638Z" transform="translate(27.929) rotate(90)" fill="#fff" />';
                                       //   $html .= '</svg>';
										  
                                      $html .= '</div>';
                                      $html .= '<div class="prev-icon swiper-control">';
											$html .= '<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>';
											
                                    //      $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083">';
                                     //         $html .= '<path d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z" transform="translate(47.79 -30.712) rotate(90)" fill="#fff" />';
                                      //    $html .= '</svg>';
										
                                      $html .= '</div>';
                                  $html .= '</div>';
                              $html .= '</div>';
                            }
							*/
                            if ( !empty( $serie_maps ) ) { 
                              $html .= '<div class="tab-pane fade" id="map">';
                                  $html .= '<div class="unique-slider-two">';
                                      $html .= '<div class="swiper-wrapper">';
                                        foreach ( $serie_maps as $serie_map ) {
                                            if ( !empty( $serie_map['serie_maps_link'] ) ) {   
                                              $html .= '<div class="swiper-slide">';
                                                  $html .= '<div class="unique-slider-item">';
                                                      $html .= '<iframe src="';
                                                        $html .= $serie_map['serie_maps_link'];
                                                      $html .= '"width="100%" height="628" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                                                     

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
						/*
						if(get_field("ctabutton_url",$psid)){
							$html .= '<div class=cta_price><div class=btn-wrap ><a href="'.get_field("ctabutton_url",$psid).'" class="boxed-btn round-btn">'.get_field("ctabutton_name",$psid).'</a></div></div>';
						}
						*/
                    $html .= '</div>';
                  }
              $html .= '</div>';
          $html .= '</div>';
      $html .= '</div>';
    }
    return $html;
}


/*
function earchi_serie_gallery() {
  global $earchi_options;
  $psid = get_the_ID();
  $serie_options      = get_post_meta( get_the_ID(), 'serie_options', true );
  $serie_gallery      = serie_get_option( 'serie_gallery' );
  $video_gallery        = serie_get_option( 'video_gallery' );
  $video_360_gallery    = serie_get_option( 'video_360_gallery' );
  $serie_maps         = serie_get_option( 'serie_maps' );

    $html = '';
    if ( !empty( $serie_options['serie_gallery_title'] ) || !empty( $serie_options['serie_video_title'] ) || !empty( $serie_options['serie_360_video_title'] ) || !empty( $serie_options['serie_map_title'] ) ) {
      $html .= '<div class="gallery-section-area-02 margin-top-80">';
          $html .= '<div class="container custom-container-03">';
              $html .= '<div class="row align-items-center">';
                    $html .= '<div class="col-lg-3">';
                        $html .= '<ul class="nav nav-pills">';
                            if ( !empty( $serie_options['serie_gallery_title'] ) ) {
                              $html .= '<li class="nav-item">';
                                  $html .= '<a href="#" class="nav-link active style-01" data-bs-toggle="pill" data-bs-target="#gallery">' . $serie_options['serie_gallery_title'] . '</a>';
                              $html .= '</li>';
                            }
                            if ( !empty( $serie_options['serie_video_title'] ) ) {
                              $html .= '<li class="nav-item">';
                                  $html .= '<a href="#" class="nav-link style-02" data-bs-toggle="pill" data-bs-target="#video">' . $serie_options['serie_video_title'] . '</a>';
                              $html .= '</li>';
                            }
                            if ( !empty( $serie_options['serie_360_video_title'] ) ) {
                              $html .= '<li class="nav-item">';
                                  $html .= '<a href="#" class="nav-link style-03" data-bs-toggle="pill" data-bs-target="#video-02">' . $serie_options['serie_360_video_title'] . '</a>';
                              $html .= '</li>';
                            }
                            if ( !empty( $serie_options['serie_map_title'] ) ) {
                              $html .= '<li class="nav-item">';
                                  $html .= '<a href="#" class="nav-link style-04" data-bs-toggle="pill" data-bs-target="#map">' . $serie_options['serie_map_title'] . '</a>';
                              $html .= '</li>';
                            }
                        $html .= '</ul>';
                    $html .= '</div>';
                  if ( !empty( $serie_gallery ) || !empty( $video_gallery ) || !empty( $video_360_gallery ) || !empty( $serie_maps ) ) {
                    $html .= '<div class="col-lg-9">';
                        $html .= '<div class="tab-content">';
                            if ( !empty( $serie_gallery ) ) { 
                              $html .= '<div class="tab-pane fade show active series_gallery" id="gallery">';
                                  $html .= '<div class="unique-slider-two">';
                                      $html .= '<div class="swiper-wrapper">';
                                          foreach ( $serie_gallery as $serie_gal ) {
                                            if ( !empty( $serie_gal['serie_gallery_image']['url'] ) ) {   
                                              $html .= '<div class="swiper-slide">';
                                                  $html .= '<div class="unique-slider-item">';
                                                      $html .= '<div class="thumbnail">';
                                                          $html .= '<img src="' . $serie_gal['serie_gallery_image']['url'] . '" alt="' . $serie_gal['serie_gallery_title'] . '">';
                                                      $html .= '</div>';
                                                  $html .= '</div>';
                                              $html .= '</div>';
                                            }
                                          }
                                      $html .= '</div>';
                                      $html .= '<div class="next-icon swiper-control">';
                                          $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 27.929 18.72">';
                                              $html .= '<path
                                                  d="M8.306,12.638C6.982,8.666,7.7,4.635,7.464.6c0-.181.421-.481.662-.542A1.5,1.5,0,0,1,9.569.423a5.844,5.844,0,0,1,1.865,3.851,46.352,46.352,0,0,1,.481,9.988,8.976,8.976,0,0,1,.12,1.264,46.5,46.5,0,0,1,.12,4.994,22.391,22.391,0,0,1,3.851-3.309,1.46,1.46,0,0,1,2.106.361,1.792,1.792,0,0,1,.361,2.226,25,25,0,0,1-2.527,3.129c-1.564,1.5-3.249,2.828-4.874,4.272h0a1.3,1.3,0,0,1-1.745.6l-.662-.361c-3.55-1.805-5.716-5.054-8.6-7.521-.12-.12-.06-.6.12-.842a1.363,1.363,0,0,1,1.264-.722,5.488,5.488,0,0,1,3.971,1.324c.842.722,1.745,1.384,2.587,2.046a15.411,15.411,0,0,1-.181-2.347C7.885,17.09,8.125,14.864,8.306,12.638Z"
                                                  transform="translate(27.929) rotate(90)" fill="#fff" />';
                                          $html .= '</svg>';
                                      $html .= '</div>';
                                      $html .= '<div class="prev-icon swiper-control">';
                                          $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083">';
                                              $html .= '<path
                                                  d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z"
                                                  transform="translate(47.79 -30.712) rotate(90)" fill="#fff" />';
                                          $html .= '</svg>';
                                      $html .= '</div>';
                                  $html .= '</div>';
                              $html .= '</div>';
                            }
                            if ( !empty( $video_gallery ) ) { 
                              $html .= '<div class="tab-pane fade" id="video">';
                                  $html .= '<div class="unique-slider-two">';
                                      $html .= '<div class="swiper-wrapper">';
                                        foreach ( $video_gallery as $video_gal ) {
                                            if ( !empty( $video_gal['serie_video_gallery_cover']['url'] && $video_gal['serie_video_gallery_video_url'] ) ) {   
                                              $html .= '<div class="swiper-slide">';
                                                  $html .= '<div class="unique-slider-item">';
                                                      $html .= '<div class="thumbnail">';
                                                          $html .= '<img src="' . $video_gal['serie_video_gallery_cover']['url'] . '" alt="' . $video_gal['serie_video_gallery_title'] . '">';
                                                          $html .= '<a class="video-play-btn style-01 mfp-iframe" href="' . $video_gal['serie_video_gallery_video_url'] . '">';
                                                              $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 26">';
                                                                  $html .= '<g transform="translate(24) rotate(90)" fill="none">';
                                                                      $html .= '<path d="M13,0,26,24H0Z" stroke="none"></path>';
                                                                      $html .= '<path d="M 13 4.199178695678711 L 3.357889175415039 22 L 22.64211082458496 22 L 13 4.199178695678711 M 13 0 L 26 24 L 0 24 L 13 0 Z" stroke="none" fill="#fff"></path>';
                                                                  $html .= '</g>';
                                                              $html .= '</svg>';
                                                          $html .= '</a>';
                                                      $html .= '</div>';
                                                  $html .= '</div>';
                                              $html .= '</div>';
                                            }
                                        }
                                      $html .= '</div>';
                                      $html .= '<div class="next-icon swiper-control">';
                                          $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 27.929 18.72">';
                                              $html .= '<path d="M8.306,12.638C6.982,8.666,7.7,4.635,7.464.6c0-.181.421-.481.662-.542A1.5,1.5,0,0,1,9.569.423a5.844,5.844,0,0,1,1.865,3.851,46.352,46.352,0,0,1,.481,9.988,8.976,8.976,0,0,1,.12,1.264,46.5,46.5,0,0,1,.12,4.994,22.391,22.391,0,0,1,3.851-3.309,1.46,1.46,0,0,1,2.106.361,1.792,1.792,0,0,1,.361,2.226,25,25,0,0,1-2.527,3.129c-1.564,1.5-3.249,2.828-4.874,4.272h0a1.3,1.3,0,0,1-1.745.6l-.662-.361c-3.55-1.805-5.716-5.054-8.6-7.521-.12-.12-.06-.6.12-.842a1.363,1.363,0,0,1,1.264-.722,5.488,5.488,0,0,1,3.971,1.324c.842.722,1.745,1.384,2.587,2.046a15.411,15.411,0,0,1-.181-2.347C7.885,17.09,8.125,14.864,8.306,12.638Z" transform="translate(27.929) rotate(90)" fill="#fff" />';
                                          $html .= '</svg>';
                                      $html .= '</div>';
                                      $html .= '<div class="prev-icon swiper-control">';
                                          $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083">';
                                              $html .= '<path d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z" transform="translate(47.79 -30.712) rotate(90)" fill="#fff" />';
                                          $html .= '</svg>';
                                      $html .= '</div>';
                                  $html .= '</div>';
                              $html .= '</div>';
                            }
                            if ( !empty( $video_360_gallery ) ) { 
                              $html .= '<div class="tab-pane fade" id="video-02">';
                                  $html .= '<div class="unique-slider-two">';
                                      $html .= '<div class="swiper-wrapper">';
                                        foreach ( $video_360_gallery as $video_360_gal ) {
                                            if ( !empty( $video_360_gal['serie_360_video_gallery_cover']['url'] && $video_360_gal['serie_360_video_gallery_video_url'] ) ) {   
                                              $html .= '<div class="swiper-slide">';
                                                  $html .= '<div class="unique-slider-item">';
                                                      $html .= '<div class="thumbnail">';
                                                          $html .= '<img src="' . $video_360_gal['serie_360_video_gallery_cover']['url'] . '" alt="' . $video_360_gal['serie_360_video_gallery_title'] . '">';
                                                          $html .= '<a class="video-play-btn style-01 mfp-iframe" href="' . $video_360_gal['serie_360_video_gallery_video_url'] . '">';
                                                              $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 26">';
                                                                  $html .= '<g transform="translate(24) rotate(90)" fill="none">';
                                                                      $html .= '<path d="M13,0,26,24H0Z" stroke="none"></path>';
                                                                      $html .= '<path d="M 13 4.199178695678711 L 3.357889175415039 22 L 22.64211082458496 22 L 13 4.199178695678711 M 13 0 L 26 24 L 0 24 L 13 0 Z" stroke="none" fill="#fff"></path>';
                                                                  $html .= '</g>';
                                                              $html .= '</svg>';
                                                          $html .= '</a>';
                                                      $html .= '</div>';
                                                  $html .= '</div>';
                                              $html .= '</div>';
                                            }
                                        }
                                      $html .= '</div>';
                                      $html .= '<div class="next-icon swiper-control">';
                                          $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 27.929 18.72">';
                                              $html .= '<path d="M8.306,12.638C6.982,8.666,7.7,4.635,7.464.6c0-.181.421-.481.662-.542A1.5,1.5,0,0,1,9.569.423a5.844,5.844,0,0,1,1.865,3.851,46.352,46.352,0,0,1,.481,9.988,8.976,8.976,0,0,1,.12,1.264,46.5,46.5,0,0,1,.12,4.994,22.391,22.391,0,0,1,3.851-3.309,1.46,1.46,0,0,1,2.106.361,1.792,1.792,0,0,1,.361,2.226,25,25,0,0,1-2.527,3.129c-1.564,1.5-3.249,2.828-4.874,4.272h0a1.3,1.3,0,0,1-1.745.6l-.662-.361c-3.55-1.805-5.716-5.054-8.6-7.521-.12-.12-.06-.6.12-.842a1.363,1.363,0,0,1,1.264-.722,5.488,5.488,0,0,1,3.971,1.324c.842.722,1.745,1.384,2.587,2.046a15.411,15.411,0,0,1-.181-2.347C7.885,17.09,8.125,14.864,8.306,12.638Z" transform="translate(27.929) rotate(90)" fill="#fff" />';
                                          $html .= '</svg>';
                                      $html .= '</div>';
                                      $html .= '<div class="prev-icon swiper-control">';
                                          $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083">';
                                              $html .= '<path d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z" transform="translate(47.79 -30.712) rotate(90)" fill="#fff" />';
                                          $html .= '</svg>';
                                      $html .= '</div>';
                                  $html .= '</div>';
                              $html .= '</div>';
                            }
                            if ( !empty( $serie_maps ) ) { 
                              $html .= '<div class="tab-pane fade" id="map">';
                                  $html .= '<div class="unique-slider-two">';
                                      $html .= '<div class="swiper-wrapper">';
                                        foreach ( $serie_maps as $serie_map ) {
                                            if ( !empty( $serie_map['serie_maps_link'] ) ) {   
                                              $html .= '<div class="swiper-slide">';
                                                  $html .= '<div class="unique-slider-item">';
                                                      $html .= '<iframe src="';
                                                        $html .= $serie_map['serie_maps_link'];
                                                      $html .= '"width="100%" height="628" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                                                     

                                                  $html .= '</div>';
                                              $html .= '</div>';
                                            }
                                        }
                                      $html .= '</div>';
                                      $html .= '<div class="next-icon swiper-control">';
                                          $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 27.929 18.72">';
                                              $html .= '<path d="M8.306,12.638C6.982,8.666,7.7,4.635,7.464.6c0-.181.421-.481.662-.542A1.5,1.5,0,0,1,9.569.423a5.844,5.844,0,0,1,1.865,3.851,46.352,46.352,0,0,1,.481,9.988,8.976,8.976,0,0,1,.12,1.264,46.5,46.5,0,0,1,.12,4.994,22.391,22.391,0,0,1,3.851-3.309,1.46,1.46,0,0,1,2.106.361,1.792,1.792,0,0,1,.361,2.226,25,25,0,0,1-2.527,3.129c-1.564,1.5-3.249,2.828-4.874,4.272h0a1.3,1.3,0,0,1-1.745.6l-.662-.361c-3.55-1.805-5.716-5.054-8.6-7.521-.12-.12-.06-.6.12-.842a1.363,1.363,0,0,1,1.264-.722,5.488,5.488,0,0,1,3.971,1.324c.842.722,1.745,1.384,2.587,2.046a15.411,15.411,0,0,1-.181-2.347C7.885,17.09,8.125,14.864,8.306,12.638Z" transform="translate(27.929) rotate(90)" fill="#fff" />';
                                          $html .= '</svg>';
                                      $html .= '</div>';
                                      $html .= '<div class="prev-icon swiper-control">';
                                          $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083">';
                                              $html .= '<path d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z" transform="translate(47.79 -30.712) rotate(90)" fill="#fff" />';
                                          $html .= '</svg>';
                                      $html .= '</div>';
                                  $html .= '</div>';
                              $html .= '</div>';
                            }
                        $html .= '</div>';
                    $html .= '</div>';
                  }
              $html .= '</div>';
          $html .= '</div>';
		  if(get_field("ctabutton_url",$psid)){
			$html .= '<div class=cta_price><div class=btn-wrap ><a href="'.get_field("ctabutton_url",$psid).'" class="boxed-btn round-btn">'.get_field("ctabutton_name",$psid).'</a></div></div>';
		  }
      $html .= '</div>';
    }
    return $html;
}
*/


function earchi_serie_plan() {
  global $earchi_options;
  $serie_options            = get_post_meta( get_the_ID(), 'serie_options', true );
  $serie_plans              = serie_get_option( 'serie_plans' );
  $serie_plan_title_count   = 0;
  $serie_plan_tab_count     = 0;

    $html = '';
    if ( !empty( $serie_options['serie_plans_title'] ) ) {   
      $html .= '<div class="site-plan-section margin-top-90">';
          $html .= '<div class="container custom-container-03">';
              $html .= '<div class="row">';
                  $html .= '<div class="col-lg-12">';
                      $html .= '<div class="section-title-wrapper">';
                          $html .= '<div class="theme-section-title">';
                              $html .= '<div class="title">' . $serie_options['serie_plans_title'] . '</div>';
                          $html .= '</div>';
                          if ( !empty( $serie_plans ) ) {
                            $html .= '<ul class="nav nav-pills">';
                              foreach ( $serie_plans as $serie_plan ) {
                                  if ( !empty( $serie_plan['serie_plans_title'] ) ) {   
                                    $serie_plan_title_count++;
                                    $active_class = ( $serie_plan_title_count === 1 ) ? 'active' : '';
                                    $html .= '<li class="nav-item">';
                                        $html .= '<a href="#" class="nav-link ' . $active_class . ' style-0' . $serie_plan_title_count . '" data-bs-toggle="pill" data-bs-target="#plan-' . $serie_plan_title_count . '">APARTMENT</a>';
                                    $html .= '</li>';
                                  }
                                }
                            $html .= '</ul>';
                          }
                      $html .= '</div>';
                  $html .= '</div>';
              $html .= '</div>';
              if ( !empty( $serie_plans ) ) {
                $html .= '<div class="row">';
                    $html .= '<div class="tab-content">';
                      foreach ( $serie_plans as $serie_plan ) {
                        if ( !empty( $serie_plan['serie_plans_image']['url'] ) ) {   
                        $serie_plan_tab_count++;
                        $active_class = ( $serie_plan_tab_count === 1 ) ? 'active' : '';
                        $show_class   = ( $serie_plan_tab_count === 1 ) ? 'show' : '';
                        $html .= '<div class="tab-pane fade ' . $show_class . ' ' . $active_class . '" id="plan-' . $serie_plan_tab_count . '">';
                            $html .= '<div class="thumbnail">';
                                $html .= '<img src="' . $serie_plan['serie_plans_image']['url'] . '" alt="' . $serie_plan['serie_plans_title'] . '">';
                            $html .= '</div>';
                        $html .= '</div>';
                        }
                      }                       
                    $html .= '</div>';
                $html .= '</div>';
              }
          $html .= '</div>';
      $html .= '</div>';
    }
    return $html;
}

function earchi_serie_related() {
  global $earchi_options;
  $serie_options = get_post_meta( get_the_ID(), 'serie_options', true );

    if ( $serie_options['related_serie'] == 1 ) {
      $html = '';
      $html .= '<section class="related-section-area margin-top-115">';
          $html .= '<div class="container custom-container-03">';
              $html .= '<div class="row">';
                  $html .= '<div class="col-lg-4">';
                      if ( !empty( $serie_options['related_serie_title'] ) ) {
                        $html .= '<div class="theme-section-title">';
                          if ( !empty( $serie_options['related_serie_title'] ) ) {
                            $html .= '<h4 class="title">' . $serie_options['related_serie_title'] . '</h4>';
                          }
                          if ( !empty( $serie_options['related_serie_text'] ) ) {
                            $html .= '<p>' . $serie_options['related_serie_text'] . '</p>';
                          }
                        $html .= '</div>';
                      }
                      $html .= '<div class="next-icon swiper-control">';
                          $html .= '<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m13.2 6.8l1.4 1.4-6.8 6.8h20.1v2h-20.1l6.8 6.8-1.4 1.4-8.5-8.5-0.7-0.7 0.7-0.7z"/></svg>';
                      $html .= '</div>';
                      $html .= '<div class="prev-icon swiper-control">';
                        $html .= '<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path id="Layer" class="s0" d="m18.7 6.8l-1.4 1.4 6.8 6.8h-20.1v2h20.1l-6.8 6.8 1.4 1.4 8.5-8.5 0.7-0.7-0.7-0.7z"/></svg>';
                    $html .= '</div>';
                      
                  $html .= '</div>';
                  $html .= '<div class="col-lg-8">';
                      $html .= '<div class="related-slider-one">';
                          $html .= '<div class="swiper-wrapper">';

                                $args = array(
                                    'post_type' => 'series',
                                    'posts_per_page' => 8,
                                );
                                $serie_query = new WP_Query($args);
                                  if ($serie_query->have_posts()) {
                                      while ($serie_query->have_posts()) {
                                          $serie_options            = get_post_meta( get_the_ID(), 'serie_options', true );
                                          $serie_query->the_post();
                                          $html .= '<div class="swiper-slide">';
                                              $html .= '<div class="service-single-item">';
                                                  if (has_post_thumbnail()) {
                                                      $html .= '<div class="thumbnail">';
                                                        $html .= '<a href="' . get_the_permalink() . '"><img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '"></a>';
                                                      $html .= '</div>';
                                                  }
                                                  $html .= '<div class="content">';
                                                      $html .= '<a href="' . get_the_permalink() . '">';
                                                          $html .= '<h3 class="title">' . get_the_title() . '</h3>';
                                                      $html .= '</a>';
                                                       $html .= '<p>' . $serie_options['serie_location'] . '</p>';
                                                  $html .= '</div>';
                                              $html .= '</div>';
                                          $html .= '</div>';   
                                      }
                                      wp_reset_postdata();
                                  }
                          $html .= '</div>';
                      $html .= '</div>';
                  $html .= '</div>';
              $html .= '</div>';
          $html .= '</div>';
      $html .= '</section>';

      return $html;
  }
}

function earchi_serie_archive_before_content() {
  global $earchi_options;
  $serie_options = get_post_meta( get_the_ID(), 'serie_options', true );

    $html = '';
	$html = '<section class="innerpage_header"></section>';
    $html .= '<section class="project-section-area forsale_cat_area innerpage_wrap">';
        $html .= '<div class="container custom-container-03 innerhed_">';

    return $html;
}

function earchi_serie_archive_after_content() {
  global $earchi_options;
  $serie_options = get_post_meta( get_the_ID(), 'serie_options', true );

    $html = '';
      $html .= '</div>';
    $html .= '</section>';

    return $html;
}


function earchi_serie_archive_title() {
  global $earchi_options;
  $serie_options = get_post_meta( get_the_ID(), 'serie_options', true );

    $html = '';
    if ( !empty( $earchi_options['earchi_serie_archive_title'] ) || !empty( $earchi_options['earchi_serie_archive_sub_title'] ) || !empty( $earchi_options['earchi_serie_archive_text'] ) ) {
      $html .= '<div class="row">';
          $html .= '<div class="col-lg-3">';
              $html .= '<div class="theme-section-title newpadding_top">';
                  if ( !empty( $earchi_options['earchi_serie_archive_title'] ) ) {
                    $html .= '<h1 class="title">' . $earchi_options['earchi_serie_archive_title'] . '</h1>';
                  }
                  if ( !empty( $earchi_options['earchi_serie_archive_sub_title'] ) ) {
                    $html .= '<h6 class="subtitle">' . $earchi_options['earchi_serie_archive_sub_title'] . '<span class="line-one wow animate__animated"></span>';
                      $html .= '<span class="line-two wow animate__animated"></span>';
                    $html .= '</h6>';
                  }
              $html .= '</div>';
          $html .= '</div>';
          $html .= '<div class="col-lg-6 col-md-9 newpadding_top">';
              if ( !empty( $earchi_options['earchi_serie_archive_text'] ) ) {
                $html .= '<div class="project-details">';
                    $html .= '<p>' . $earchi_options['earchi_serie_archive_text'] . '</p>';
					if ( !empty( $earchi_options['earchi_serie_archive_button_title'] ) ) {
					$html .= '<p><a href="'.$earchi_options['earchi_serie_archive_button_url'].'" class=series_bnr_btn>' . $earchi_options['earchi_serie_archive_button_title'] . '</a></p>';
					}
                $html .= '</div>';
              }
          $html .= '</div>';
		  
		  /* For Sales Map */
		   
		  $html .= '<div class="col-lg-2 col-md-3">';
              if ( !empty( $earchi_options['earchi_serie_archive_map']['url'] ) ) {
                $html .= '<div class="project-details-map">';
				if ( !empty( $earchi_options['earchi_serie_archive_map_txt'] ) ) {
					$html .= '<div class=maptxt_><p>'.$earchi_options['earchi_serie_archive_map_txt'].'</p></div>';
				}
					$html .= '<img src="' . $earchi_options['earchi_serie_archive_map']['url'] . '" alt="' . $earchi_options['earchi_serie_archive_residence_title'] . '">';
                $html .= '</div>';
              }
          $html .= '</div>';
		  
      $html .= '</div>';
    }

    return $html;
}

function earchi_serie_archive_categories() {
  global $earchi_options;
  $serie_options = get_post_meta( get_the_ID(), 'serie_options', true );


  $categories = get_terms(array(
      'taxonomy' => 'seriestax',
      'hide_empty' => true,
	  'exclude'  => array(27),
  ));

	
    if (!empty($categories)) {
		
      $html = '';
      $html .= '<div class="row justify-content-center series_sec2">';
          $html .= '<div class="col-lg-12">';
              $html .= '<ul class="nav nav-pills">';
                  $is_first = true;

$uncategory_query = new WP_Query( array(
    'post_type' => 'series',
    'tax_query' => array(
        array(
            'taxonomy' => 'seriestax',
            'field' => 'id',
            'terms' => 27
        )
    )
) );
$uncategory_count = $uncategory_query->found_posts;
				  

					/* */
					$active_class = $is_first ? 'active' : '';
					$count_posts = wp_count_posts( 'series' )->publish;
					$final_count = $count_posts - $uncategory_count;
					
					$html .= '<li class="nav-item">';
                        $html .= '<a href="#" class="nav-link ' . $active_class . '" data-bs-toggle="pill" data-bs-target="#view-all">';
                            $html .= '<span class="number">';
                                $html .= $final_count;
                            $html .= '</span>';
                            $html .= "VIEW ALL";
                        $html .= '</a>';
                    $html .= '</li>';
					/* */
					
					
                  foreach ($categories as $category) {
                    $category_name = $category->name;
                    $category_slug = $category->slug;
                    $post_count = $category->count;

                     //$active_class = $is_first ? 'active' : '';
					 $active_class = $is_first ? '' : '';
					
					$html .= '<li class="nav-item">';
                        $html .= '<a href="#" class="nav-link ' . $active_class . '" data-bs-toggle="pill" data-bs-target="#' . $category_slug . '">';
                            $html .= '<span class="number">';
                                $html .= $post_count;
                            $html .= '</span>';
                            $html .= $category_name;
                        $html .= '</a>';
                    $html .= '</li>';
                    $is_first = false;
                  }
              $html .= '</ul>';
          $html .= '</div>';
      $html .= '</div>';

      wp_reset_postdata();

      return $html;
  }
}        
    
function earchi_serie_archive_projects() {
  global $earchi_options;
  $serie_options = get_post_meta( get_the_ID(), 'serie_options', true );

  $categories = get_terms(array(
      'taxonomy' => 'seriestax',
      'hide_empty' => true,
	  'exclude'  => array(27),
  ));

  if (!empty($categories)) {
    $is_first_category = true;
    $html = '';
    $html .= '<div class="tab-content series_cont_item">';
	
	/*  */
	$active_class = $is_first_category ? 'show active' : '';
	$html .= '<div class="tab-pane fade  ' . $active_class . '" id="view-all">';
	$html .= '<div id=list_all class="row">';

$tax_count = 0;
	foreach ($categories as $category) {
		$tax_count = $tax_count + 1;
          $category_name = $category->name;
          $category_slug = $category->slug;
          $sr_args = array(
              'post_type' => 'series',
              'posts_per_page' => -1,
			  'orderby'   => 'title',
				'order' => 'DESC',
				'tax_query' => array(
                  array(
                      'taxonomy' => 'seriestax',
					  'terms' => array(27),
                      'field' => 'term_id',
                      'operator' => 'NOT IN',
                  ),
              ),
			/*
              'tax_query' => array(
                  array(
                      'taxonomy' => 'seriestax',
                      'field' => 'term_id',
                      'terms' => $category->term_id,
                  ),
              ),
			  */
          );
		  
          $all_serie_query = new WP_Query($sr_args);
          $active_class = $is_first_category ? 'show active' : '';
		  if($tax_count == 1){
          if ($all_serie_query->have_posts()) {
              while ($all_serie_query->have_posts()) {
                  $all_serie_query->the_post();
                  $serie_options = get_post_meta( get_the_ID(), 'serie_options', true );
				  //$srpost_id = get_the_ID();
				  $url_opt = get_field('sr_disable_url');
				  $img = get_field('seriesp_featured_image');
				  $sr_status = get_field( 'seriesp_status' );
				  $sr_status_title = get_field( 'seriesp_status_title' );
				  if($sr_status !== "soldseries"){
					  $new_status = " | <span class=new>".$sr_status_title."</span>";
					  $txt_state = get_the_date('Ymd');
				  } else{
					  $sold_status = " | <span class=sold>SOLD</span>";
					  $txt_state = "2023".get_the_date('md');
				  }
				  
                  $html .= '<div class="col-lg-4 series-item '.$sr_status.'" data-series-item="'.$txt_state.'">';
                      $html .= '<div class="service-single-item series_single_item verse2">';
                          if (has_post_thumbnail()) {
                              $html .= '<div class="thumbnail">';
								if( $url_opt && in_array('disable', $url_opt) ) {
									$html .= '<img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '">';
								} else {
									$html .= '<a href="' . get_the_permalink() . '"><img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '"></a>';
								}
                              $html .= '</div>';
                          }
                          $html .= '<div class="content">';
								if( $url_opt && in_array('disable', $url_opt) ) {
									if($sr_status !== "soldseries"){
										$html .= '<h3 class="title">' . get_the_title() . $new_status .'</span></h3>';
									} else{
										$html .= '<h3 class="title">' . get_the_title() . $sold_status .'</h3>';
									}
								}
								else{
								  $html .= '<a href="' . get_the_permalink() . '" clas=test1>';
								  if($sr_status !== "soldseries"){
									$html .= '<h3 class="title">' . get_the_title() . $new_status .'</span></h3>';
								  } else{
									$html .= '<h3 class="title">' . get_the_title() . $sold_status .'</h3>';
								  }
								  $html .= '</a>';
								}
							  if(!empty($serie_options['serie_location'])){
								$html .= '<p>' . $serie_options['serie_location'] . '</p>';
							  }
                          $html .= '</div>';
                      $html .= '</div>';
                  $html .= '</div>';
              }
          }
}
          wp_reset_postdata();
          $is_first_category = false;
      }
	$html .= '</div>';
	$html .= '</div>';
	
	/* */
	
	
	
	
	
	
	
      foreach ($categories as $category) {
          $category_name = $category->name;
          $category_slug = $category->slug;
          $args = array(
              'post_type' => 'series',
              'posts_per_page' => -1,
              'tax_query' => array(
                  array(
                      'taxonomy' => 'seriestax',
                      'field' => 'term_id',
                      'terms' => $category->term_id,
                  ),
              ),
			  'meta_key'       => 'seriesp_status', // Replace with your ACF field key
              'orderby'       => array(
                  'meta_value_num' => 'ASC', // Sort by the ACF field (numerical)
                  'date'           => 'DESC' // Then sort by date
              ),
              'order'          => 'DESC'
          );
		  
		  /* Using jQuery for Series sorting added directly on the page temp footer. */
		  
          $category_serie_query = new WP_Query($args);
          //$active_class = $is_first_category ? 'show active' : '';
          if ($category_serie_query->have_posts()) {
            /* $html .= '<div class="tab-pane fade  ' . $active_class . '" id="' . $category->slug . '">'; */
			$html .= '<div class="tab-pane fade  ' . $active_class . '" id="' . $category->slug . '">';
                $html .= '<div class="row">';
              while ($category_serie_query->have_posts()) {
                  $category_serie_query->the_post();
                  $serie_options = get_post_meta( get_the_ID(), 'serie_options', true );
				  //$srpost_id = get_the_ID();
				  $url_opt = get_field('sr_disable_url');
				  $img = get_field('seriesp_featured_image');
				  $sr_status = get_field( 'seriesp_status' );
				  $sr_status_title = get_field( 'seriesp_status_title' );
				  /*
				  if($sr_status !== "soldseries"){
					  $new_status = " | <span class=new>".$sr_status_title."</span>";
				  } else{
					  $sold_status = " | <span class=sold>SOLD</span>";
				  }
				  */
				   if($sr_status !== "soldseries"){
					  $new_status = " | <span class=new>".$sr_status_title."</span>";
					  $txt_state = get_the_date('Ymd');
				  } else{
					  $sold_status = " | <span class=sold>SOLD</span>";
					  $txt_state = "2023".get_the_date('md');
				  }
				  $html .= '<div class="col-lg-4 series-item '.$sr_status.'" data-series-item="'.$txt_state.'">';
                  //$html .= '<div class="col-lg-4 series-item"  data-series-item="'.$txt_state.'">';
                      $html .= '<div class="service-single-item series_single_item verse1">';
                          if (has_post_thumbnail()) {
                              $html .= '<div class="thumbnail">';
								if( $url_opt && in_array('disable', $url_opt) ) {
									$html .= '<img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '">';
								} else {
									$html .= '<a href="' . get_the_permalink() . '"><img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '"></a>';
								}
                              $html .= '</div>';
                          }
                          $html .= '<div class="content">';
								if( $url_opt && in_array('disable', $url_opt) ) {
									/* $html .= '<h3 class="title">' . get_the_title() . '</h3>'; */
									if($sr_status !== "soldseries"){
										$html .= '<h3 class="title">' . get_the_title() . $new_status .'</span></h3>';
									} else{
										$html .= '<h3 class="title">' . get_the_title() . $sold_status .'</h3>';
									}
								}
								else{
								  $html .= '<a href="' . get_the_permalink() . '">';
								  /* $html .= '<h3 class="title">' . get_the_title() . '</h3>'; */
								  if($sr_status !== "soldseries"){
										$html .= '<h3 class="title">' . get_the_title() . $new_status .'</span></h3>';
									} else{
										$html .= '<h3 class="title">' . get_the_title() . $sold_status .'</h3>';
									}
								  $html .= '</a>';
								}
							  if(!empty($serie_options['serie_location'])){
								$html .= '<p>' . $serie_options['serie_location'] . '</p>';
							  }
                          $html .= '</div>';
                      $html .= '</div>';
                  $html .= '</div>';
              }
              $html .= '</div>';
            $html .= '</div>';
          }
          wp_reset_postdata();
          $is_first_category = false;
      }
    $html .= '</div>';
    return $html;
  }
}

function earchi_serie_archive_residence() {
  global $earchi_options;
  $serie_options            = get_post_meta( get_the_ID(), 'serie_options', true );
  $earchi_serie_residences  = earchi_get_option( 'earchi_serie_archive_residence_gallery' );

      if ( !empty( $earchi_options['earchi_serie_archive_residence_image']['url'] && $earchi_options['earchi_serie_archive_residence_title'] ) ) {
      
        $html = '';
        $html .= '<section class="residence-section-area margin-top-120">';
          $html .= '<div class="container-fluid">';
              $html .= '<div class="row">';
                  if ( !empty( $earchi_options['earchi_serie_archive_residence_image']['url'] ) ) {
                  $html .= '<div class="col-lg-6">';
                      $html .= '<div class="thumbnail">';
                          $html .= '<img src="' . $earchi_options['earchi_serie_archive_residence_image']['url'] . '" alt="' . $earchi_options['earchi_serie_archive_residence_title'] . '">';
                      $html .= '</div>';
                  $html .= '</div>';
                  }
                  $html .= '<div class="col-lg-6">';
                      $html .= '<div class="residencial-item">';
                          $html .= '<div class="theme-section-title">';
                              if ( !empty( $earchi_options['earchi_serie_archive_residence_sub_title'] ) ) {
                                $html .= '<h6 class="subtitle">' . $earchi_options['earchi_serie_archive_residence_sub_title'] . ' <span class="line-one wow animate__animated"></span>';
                                  $html .= '<span class="line-two wow animate__animated"></span>';
                                $html .= '</h6>';
                              }
                              if ( !empty( $earchi_options['earchi_serie_archive_residence_title'] ) ) {
                                $html .= '<h4 class="title">' . $earchi_options['earchi_serie_archive_residence_title'] . '</h4>';
                              }
                              if ( !empty( $earchi_options['earchi_serie_archive_residence_text'] ) ) {
                                $html .= '<p class="max-width">' . $earchi_options['earchi_serie_archive_residence_text'] . '</p>';
                              }
                          $html .= '</div>';

                          if ( ! empty( $earchi_serie_residences ) ) {
                            $html .= '<div class="living-room-slider">';
                                $html .= '<div class="residence-slider-one">';
                                    $html .= '<div class="swiper-wrapper">';
                                      foreach ( $earchi_serie_residences as $earchi_serie_residence ) {
                                        if ( ! empty( $earchi_serie_residence['earchi_serie_archive_residence_gallery_image_title'] ) && ! empty( $earchi_serie_residence['earchi_serie_archive_residence_gallery_image']['url'] ) ) {
                                          $html .= '<div class="swiper-slide">';
                                            $html .= '<div class="thumbnail">';
                                                $html .= '<img src="' . $earchi_serie_residence['earchi_serie_archive_residence_gallery_image']['url'] . '" alt="' . $earchi_serie_residence['earchi_serie_archive_residence_gallery_image_title'] . '">';
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
              $html .= '</div>';
          $html .= '</div>';
      $html .= '</section>';

    return $html;

  }
}

function earchi_serie_archive_testimonials() {
  global $earchi_options;
  $serie_options            = get_post_meta( get_the_ID(), 'serie_options', true );
  $testimonials               = earchi_get_option( 'earchi_serie_archive_testimonials' );

      if ( !empty( $earchi_options['earchi_serie_archive_testimonials_title'] ) ) {
        $html = '';
        $html .= '<section class="testimonial-section margin-top-115">';
          $html .= '<div class="container custom-container-03">';
              $html .= '<div class="row justify-content-center">';
                  $html .= '<div class="col-lg-6">';
                      $html .= '<div class="theme-section-title desktop-center black">';
                          $html .= '<h6 class="subtitle">';
                              $html .= '<span class="line-three wow animate__ animated"></span>';
                              $html .= '<span class="line-four wow animate__ animated"></span> Students Testimonial<span class="line-one wow animate__ animated"></span>';
                              $html .= '<span class="line-two wow animate__ animated"></span>';
                          $html .= '</h6>';
                          $html .= '<h4 class="title">What Our Client Say</h4>';
                      $html .= '</div>';
                  $html .= '</div>';
              $html .= '</div>';
              $html .= '<div class="testimonial-slider-wrap">';
                  $html .= '<img src="' . get_template_directory_uri() . '/assets/img/sections/testimonial/testi-bg.png" class="testi-bg" alt="' . $earchi_options['earchi_serie_archive_testimonials_title'] . '">';
                  $html .= '<div class="service-slider-one">';
                      $html .= '<div class="swiper-wrapper">';
                          if ( ! empty( $testimonials ) ) {
                              foreach ( $testimonials as $testimonial ) {
                              $html .= '<div class="swiper-slide">';
                                  $html .= '<div class="testimonial-single-item">';
                                      $html .= '<div class="icon">';
                                          $html .= '<img src="' . get_template_directory_uri() . '/assets/img/icon/testimonial-icon.png" alt="' . $earchi_options['earchi_serie_archive_testimonials_title'] . '">';
                                      $html .= '</div>';
                                      $html .= '<div class="content">';
                                        if ( !empty( $testimonial['earchi_serie_archive_testimonial_text'] ) ) {
                                          $html .= '<p>' . $testimonial['earchi_serie_archive_testimonial_text'] . '</p>';
                                        }
                                          $html .= '<div class="meta-wrap">';
                                              $html .= '<div class="author-meta">';
                                                  if ( !empty( $testimonial['earchi_serie_archive_testimonial_name'] ) ) {
                                                    $html .= '<span class="name">' . $testimonial['earchi_serie_archive_testimonial_name'] . '</span>';
                                                  }
                                                  if ( !empty( $testimonial['earchi_serie_archive_testimonial_job'] ) ) {
                                                    $html .= '<p class="designation">' . $testimonial['earchi_serie_archive_testimonial_job'] . '</p>';
                                                  }
                                              $html .= '</div>';
                                              $html .= '<div class="ratings">';
                                                  $html .= '<i class="fas fa-star"></i>';
                                                  $html .= '<i class="fas fa-star"></i>';
                                                  $html .= '<i class="fas fa-star"></i>';
                                                  $html .= '<i class="fas fa-star"></i>';
                                                  $html .= '<i class="fas fa-star"></i>';
                                              $html .= '</div>';
                                          $html .= '</div>';
                                      $html .= '</div>';
                                  $html .= '</div>';
                              $html .= '</div>';
                            }
                          }
                      $html .= '</div>';
                  $html .= '</div>';
              $html .= '</div>';
          $html .= '</div>';
      $html .= '</section>';

      return $html;
    }
}

/* Series Options */

if( class_exists( 'CSF' ) ) {

	$prefix = 'serie_options';
	
	
	CSF::createMetabox( $prefix, array(
	  'title'     => 'Series General',
	  'post_type' => 'series',
	) );
	
	CSF::createSection( $prefix, array(
	  'title'  => 'Series General',
	  'fields' => array(
	  array(
		  'id'    => 'serie_location',
		  'type'  => 'text',
		  'title' => 'Series Location',
		),
  
		  array(
		  'id'    => 'serie_button_text',
		  'type'  => 'text',
		  'title' => 'Series Button Text',
		),
  
		array(
		  'id'    => 'serie_button_link',
		  'type'  => 'text',
		  'title' => 'Series Button Link',
		),
	  )
	) );
  
	CSF::createSection( $prefix, array(
	  'title'  => 'Series Features',
	  'fields' => array(
  
		  array(
			'id'        => 'serie_features',
			'type'      => 'group',
			'title'     => 'Series Features',
			'fields'    => array(
			  array(
				'id'    => 'serie_features_title',
				'type'  => 'text',
				'title' => 'Feature Title',
			  ),
  
			  array(
				'id'    => 'serie_features_text',
				'type'  => 'text',
				'title' => 'Feature Text',
			  ),
  
			  array(
				'id'    => 'serie_features_image',
				'type'  => 'media',
				'title' => 'Feature Image',
				'library' => 'image',
			  ),
			),
		  ),
	  )
	) );

	/*
	CSF::createSection( $prefix, array(
	  'title'  => 'Series List',
	  'fields' => array(
		  array(
			'id'        => 'serie_serie_list',
			'type'      => 'group',
			'title'     => 'Series List',
			'fields'    => array(
			  array(
				'id'    => 'serie_serie_category',
				'type'  => 'text',
				'title' => 'Series Category',
			  ),
  
			  array(
				'id'    => 'serie_serie_title',
				'type'  => 'text',
				'title' => 'Series Title',
			  ),
  
			  array(
				'id'    => 'serie_serie_text',
				'type'  => 'wp_editor',
				'title' => 'Series Text',
			  ),
  
			  array(
				'id'    => 'serie_serie_image',
				'type'  => 'media',
				'title' => 'Series Image',
			  ),
			),
		  ),
	  )
	) );
  
	  CSF::createSection( $prefix, array(
	  'title'  => 'Series Facilities',
	  'fields' => array(
		  array(
			'id'    => 'serie_facilities_title',
			'type'  => 'text',
			'title' => 'Series Facilities Title',
		  ),
		  array(
			'id'        => 'serie_facilities',
			'type'      => 'group',
			'title'     => 'Series Facilities',
			'fields'    => array(
			  array(
				'id'    => 'serie_facilities_title',
				'type'  => 'text',
				'title' => 'Facilities Title',
			  ),
  
			  array(
				'id'    => 'serie_facilities_text',
				'type'  => 'text',
				'title' => 'Facilities Text',
			  ),
			),
		  ),
	  )
	) );
  */
	  CSF::createSection( $prefix, array(
	  'title'  => 'Series Gallery',
	  'fields' => array(
		  array(
			'id'    => 'serie_gallery_title',
			'type'  => 'text',
			'title' => 'Series Gallery Title',
		  ),
		  array(
			'id'        => 'serie_gallery',
			'type'      => 'group',
			'title'     => 'Series Gallery',
			'fields'    => array(
			  array(
				'id'    => 'serie_gallery_title',
				'type'  => 'text',
				'title' => 'Gallery Title',
			  ),
  
			  array(
				'id'    => 'serie_gallery_image',
				'type'  => 'media',
				'title' => 'Gallery Image',
				'library' => 'image',
			  ),
			),
		  ),
	  )
	) );
  
	  CSF::createSection( $prefix, array(
	  'title'  => 'Video Gallery',
	  'fields' => array(
		  array(
			'id'    => 'serie_video_title',
			'type'  => 'text',
			'title' => 'Series Video Title',
		  ),
		  array(
			'id'        => 'video_gallery',
			'type'      => 'group',
			'title'     => 'Video Gallery',
			'fields'    => array(
			  array(
				'id'    => 'serie_video_gallery_title',
				'type'  => 'text',
				'title' => 'Video Gallery Title',
			  ),
  
			  array(
				'id'    => 'serie_video_gallery_video_url',
				'type'  => 'text',
				'title' => 'Video Gallery Video URL',
			  ),
  
			  array(
				'id'    => 'serie_video_gallery_cover',
				'type'  => 'media',
				'title' => 'Video Gallery Cover Image',
				'library' => 'image',
			  ),
			),
		  ),
	  )
	) );
  
  /*
	  CSF::createSection( $prefix, array(
	  'title'  => '360 Video Gallery',
	  'fields' => array(
		  array(
			'id'    => 'serie_360_video_title',
			'type'  => 'text',
			'title' => 'Series 360 Video Title',
		  ),
		  array(
			'id'        => 'video_360_gallery',
			'type'      => 'group',
			'title'     => '360 Video Gallery',
			'fields'    => array(
			  array(
				'id'    => 'serie_360_video_gallery_title',
				'type'  => 'text',
				'title' => '360 Video Gallery Title',
			  ),
  
			  array(
				'id'    => 'serie_360_video_gallery_video_url',
				'type'  => 'text',
				'title' => '360 Video Gallery Video URL',
			  ),
  
			  array(
				'id'    => 'serie_360_video_gallery_cover',
				'type'  => 'media',
				'title' => '360 Video Gallery Cover Image',
				'library' => 'image',
			  ),
			),
		  ),
	  )
	) );
  
	  CSF::createSection( $prefix, array(
	  'title'  => 'Series Maps',
	  'fields' => array(
		  array(
			'id'    => 'serie_map_title',
			'type'  => 'text',
			'title' => 'Series Map Title',
		  ),
		  array(
			'id'        => 'serie_maps',
			'type'      => 'group',
			'title'     => 'Series Maps',
			'fields'    => array(
			  array(
				'id'    => 'serie_maps_link',
				'type'  => 'text',
				'title' => 'Map Link',
			  ),
			),
		  ),
	  )
	) );
  
	  CSF::createSection( $prefix, array(
	  'title'  => 'Series Plans',
	  'fields' => array(
		  array(
			'id'    => 'serie_plans_title',
			'type'  => 'text',
			'title' => 'Series Plans Title',
		  ),
		  array(
			'id'        => 'serie_plans',
			'type'      => 'group',
			'title'     => 'Series Plans',
			'fields'    => array(
			  array(
				'id'    => 'serie_plans_title',
				'type'  => 'text',
				'title' => 'Plan Title',
			  ),
			  array(
				'id'    => 'serie_plans_image',
				'type'  => 'media',
				'title' => 'Plan Image',
				'library' => 'image',
			  ),
			),
		  ),
	  )
	) );
  
	  CSF::createSection( $prefix, array(
	  'title'  => 'Related Series',
	  'fields' => array(
			array(
			  'id'    => 'related_series',
			  'type'  => 'switcher',
			  'title' => 'Related Series',
			),
  
			  array(
				'id'    => 'related_series_title',
				'type'  => 'text',
				'title' => 'Related Series Title',
			  ),
		   array(
				'id'    => 'related_series_text',
				'type'  => 'text',
				'title' => 'Related Series Text',
			  ),	  
	  )
	) );
	*/
  }
  
/* Floor Plan Options

if( class_exists( 'CSF' ) ) {
	
	$prefix = 'floorplan_options';
	
	CSF::createMetabox( $prefix, array(
    'title'     => 'Floor Plan General',
    'post_type' => 'floorplan-pos',
	) );


  CSF::createSection( $prefix, array(
    'title'  => 'Floor Plan General',
    'fields' => array(
    array(
	    'id'    => 'floorplan_location',
	    'type'  => 'text',
	    'title' => 'Floor Plan Location',
	  ),

		array(
	    'id'    => 'floorplan_button_text',
	    'type'  => 'text',
	    'title' => 'Floor Plan Button Text',
	  ),

	  array(
	    'id'    => 'floorplan_button_link',
	    'type'  => 'text',
	    'title' => 'Floor Plan Button Link',
	  ),
    )
  ) );


	
  CSF::createSection( $prefix, array(
    'title'  => 'Floor Plan Features',
    'fields' => array(

		array(
		  'id'        => 'floorplan_features',
		  'type'      => 'group',
		  'title'     => 'Floor Plan Features',
		  'fields'    => array(
		    array(
		      'id'    => 'floorplan_features_title',
		      'type'  => 'text',
		      'title' => 'Feature Title',
		    ),

		    array(
		      'id'    => 'floorplan_features_text',
		      'type'  => 'text',
		      'title' => 'Feature Text',
		    ),

		    array(
		      'id'    => 'floorplan_features_image',
		      'type'  => 'media',
		      'title' => 'Feature Image',
		      'library' => 'image',
		    ),
		  ),
		),
    )
  ) );

 

    CSF::createSection( $prefix, array(
    'title'  => 'Floor Plan Gallery',
    'fields' => array(
		array(
		  'id'    => 'floorplan_gallery_title',
		  'type'  => 'text',
		  'title' => 'Floor Plan Gallery Title',
		),
		array(
		  'id'        => 'floorplan_gallery',
		  'type'      => 'group',
		  'title'     => 'Floor Plan Gallery',
		  'fields'    => array(
		    array(
		      'id'    => 'floorplan_gallery_title',
		      'type'  => 'text',
		      'title' => 'Gallery Title',
		    ),

		    array(
		      'id'    => 'floorplan_gallery_image',
		      'type'  => 'media',
		      'title' => 'Gallery Image',
		      'library' => 'image',
		    ),
		  ),
		),
    )
  ) );

    CSF::createSection( $prefix, array(
    'title'  => 'Video Gallery',
    'fields' => array(
		array(
		  'id'    => 'floorplan_video_title',
		  'type'  => 'text',
		  'title' => 'Floor Plan Video Title',
		),
		array(
		  'id'        => 'video_gallery',
		  'type'      => 'group',
		  'title'     => 'Video Gallery',
		  'fields'    => array(
		    array(
		      'id'    => 'floorplan_video_gallery_title',
		      'type'  => 'text',
		      'title' => 'Video Gallery Title',
		    ),

		    array(
		      'id'    => 'floorplan_video_gallery_video_url',
		      'type'  => 'text',
		      'title' => 'Video Gallery Video URL',
		    ),

		    array(
		      'id'    => 'floorplan_video_gallery_cover',
		      'type'  => 'media',
		      'title' => 'Video Gallery Cover Image',
		      'library' => 'image',
		    ),
		  ),
		),
    )
  ) );
}
 */
 ?>