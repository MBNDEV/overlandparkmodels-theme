<?php

add_action('rest_api_init', function () {
    register_rest_route('earchi/v1', '/greviews', array(
        'methods' => 'GET',
        'callback' => 'earchi_get_greviews_api',
        'permission_callback' => '__return_true',
    ));
});

function earchi_get_greviews_api() {
    $reviews = earchi_get_greviews();
    if( !$reviews || is_wp_error($reviews) ) {
        return new WP_Error('api_error', 'Failed to fetch records Google Places API', array('status' => 422));
    }

    return rest_ensure_response($reviews);
}

function earchi_get_greviews() {

  if( !function_exists('get_field') ) {
    return new WP_Error('function_not_found', 'ACF is not installed', array('status' => 422));
  }

  $gapikey = get_field('greview_google_api_key', 'option');
  $gplaceid = get_field('greview_google_place_id', 'option');
  $gcachestale = get_field('greview_google_review_cache_stale', 'option');

  $gcachekey = 'greview_google_reviews_' . $gplaceid;

  $cached_data = get_transient($gcachekey);
  if ($cached_data !== false) {
    return array(
        'data' => $cached_data,
        'message' => 'Data fetched from cache',
        'placeid' => $gplaceid
    );
  }

  if( !$gplaceid ) {
    return new WP_Error('place_id_not_found', 'Place ID not found', array('status' => 422));
  }

  $query_args = array(
    'place_id' => $gplaceid,
    'key' => $gapikey,
    'fields' => 'name,rating,user_ratings_total',
  );
  
  $api_url = 'https://maps.googleapis.com/maps/api/place/details/json?' . http_build_query($query_args);
  $response = wp_remote_get($api_url);
  if (is_wp_error($response)) {
    return new WP_Error('api_error', 'Failed to fetch from Google Places API', array('status' => 422));
  }

  $body = wp_remote_retrieve_body($response);
  $data = json_decode($body, true);
  if (json_last_error() !== JSON_ERROR_NONE) {
    return new WP_Error('json_error', 'Failed to decode API response', array('status' => 422));
  }

  set_transient($gcachekey, $data, $gcachestale);

  return array(
    'data' => $data,
    'message' => 'Data fetched from API',
    'placeid' => $gplaceid
  );
}



function earchi_greviews_simple_shortcode($atts = array()) {
    // Accept shortcode arguments
    $atts = shortcode_atts(
        array(
            'islcp' => false,
        ),
        $atts ?? array(),
        'earchi_greviews'
    );

    $is_lcp = filter_var($atts['islcp'], FILTER_VALIDATE_BOOLEAN);

    $loading = $is_lcp ? 'lazy' : 'eager';
    
    $result = earchi_get_greviews(); // Assuming this is the main function in your file

    // Check for WP_Error or missing data
    if (is_wp_error($result) || !$result || !isset($result['data']['result'])) {
        return "";
    }

    ob_start();
    $shortcode_uid = 'earchi-greviews-' . uniqid();
    ?>
    <style type="text/css">
        #greviews-<?php echo esc_attr($shortcode_uid); ?> {
            background-color: #f0f0f0;
            padding: 5px 10px;
            border-radius: 4px;
            opacity: 0.5;
        }

        #greviews-<?php echo esc_attr($shortcode_uid); ?> img {
            width: 77px; 
            height: 24px;
            display: block;
        }

        #greviews-<?php echo esc_attr($shortcode_uid); ?> .greviews-rating {
            display: flex;
            align-items: center;
            gap: 2px;
        } 

        #greviews-<?php echo esc_attr($shortcode_uid); ?> .greviews-rating img {
            max-width: 13px;
            max-height: 13px;
        }

        #greviews-<?php echo esc_attr($shortcode_uid); ?> .greviews-rating-text {
            text-transform: uppercase;
            font-size: 10px!important;
            margin-top: 5px;
        }

        #greviews-<?php echo esc_attr($shortcode_uid); ?> .greviews-rating-text span {
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
    <div id="greviews-<?php echo esc_attr($shortcode_uid); ?>" class="greviews-content-js">
        <a href="http://search.google.com/local/reviews?placeid=<?php echo esc_attr($result['placeid']); ?>" role="button" target="_blank" title="Google Reviews" rel="noopener nofollow">
            <div class="greviews-summary">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/greviews/googlelogo.svg'); ?>" alt="Google" width="150" height="25" loading="<?php echo esc_attr($loading); ?>" decoding="async">
                <div class="greviews-rating">
                    <?php 
                    $rating = isset($result['data']['result']['rating']) ? $result['data']['result']['rating'] : 0;
                    $rounded_rating = round(floatval($rating));
                    $max_stars = 5;
                    for ($i = 1; $i <= $max_stars; $i++) {
                        if ($i <= $rounded_rating) {
                            ?>
                                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/greviews/f.svg'); ?>" alt="Google Rating Star <?php echo esc_attr($i); ?>" width="17" height="17" loading="<?php echo esc_attr($loading); ?>" decoding="async">
                            <?php
                        } else {
                            ?>
                                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/greviews/f2.svg'); ?>" alt="Google Rating Star <?php echo esc_attr($i); ?>" width="17" height="17" loading="<?php echo esc_attr($loading); ?>" decoding="async">
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="greviews-rating-text">
                    based on
                    <span>
                        <?php echo esc_html(isset($result['data']['result']['user_ratings_total']) ? $result['data']['result']['user_ratings_total'] : '0'); ?> reviews
                    </span>
                </div>
            </div>
        </a>
    </div>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', async function() {
            const greviewStarf = "<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/greviews/f.svg'); ?>";
            const greviewStarf2 = "<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/greviews/f2.svg'); ?>";
            const greviewSelector = document.getElementById('greviews-<?php echo esc_attr($shortcode_uid); ?>');

            try {
                const response = await fetch('<?php echo esc_url(rest_url('earchi/v1/greviews')); ?>');
                const data = await response.json();

                if (data && data.data && data.data.result) {
                    greviewSelector.querySelector('.greviews-rating-text span').innerHTML = data.data.result.user_ratings_total + " reviews";
                    
                    let graviewStar = "";
                    const greviewRoundedRating = Math.round(data.data.result.rating);
                    const greviewMax = 5;
                    for(let i = 1; i <= greviewMax; i++) {
                        if(i <= greviewRoundedRating) {
                            graviewStar += `<img src="${greviewStarf}" alt="Google Rating Star ${i}" width="17" height="17" loading="lazy" decoding="async">`;
                        } else {
                            graviewStar += `<img src="${greviewStarf2}" alt="Google Rating Star ${i}" width="17" height="17" loading="lazy" decoding="async">`;
                        }
                    }
                    greviewSelector.querySelector('.greviews-rating').innerHTML = graviewStar;
                }
            } catch(error) {
                // nothing to do
            } finally {
                // show widget
                greviewSelector.style.opacity = 1;
            }
        });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('earchi_greviews', 'earchi_greviews_simple_shortcode');
