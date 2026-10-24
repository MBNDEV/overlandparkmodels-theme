<?php
$earchi_options = get_option( 'earchi_options' ); 
$column = $earchi_options['earchi_archive_page_sidebar'] == 1 ? 8 : 12;
?>

<?php get_header(); ?>
<?php echo earchi_title_bar(); ?>

<section class="blog-section style-01">
    <div class="container custom-container-03">
        <div class="row">
            <div class="col-lg-<?php echo esc_html( $column ); ?>">
                <div class="row">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <div class="col-lg-6 col-md-6">
                        <div class="blog-grid-item <?php if ( is_sticky() ) { echo "sticky-post"; } ?>">
                            <?php 
                            if ( has_post_thumbnail() ) {
                                echo '<div class="thumbnail">';
                                    echo '<img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '">';
                                echo '</div>';
                            } ?>
                            <ul class="post-meta">
                                
                                <li>
                                    <span class="posted-on">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                                            <span class="entry-date style-01 published updated"><i class="fas fa-calendar-alt"></i><?php echo get_the_date(); ?></span>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                            <div class="content">
                                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                            </div>
                            <div class="btn-wrap">
                                <a href="<?php the_permalink(); ?>" class="boxed-btn read-btn style-02"><?php echo esc_html__( 'Read More', 'earchi' ); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083">
                                        <path d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z" transform="translate(47.79 -30.712) rotate(90)" fill="#ba9778"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                  <?php endwhile; ?>
                   <div class="blog-pagination margin-top-30">
                      <ul>
                        <?php wp_pagination(); ?>
                          
                      </ul>
                    </div>
                  <?php endif; ?>
                </div>
            </div>
            <?php if ( $earchi_options['earchi_archive_page_sidebar'] == 1 ) { ?>
            <div class="col-lg-4">
                <ul>
                    <?php if ( is_active_sidebar( 'main-sidebar' ) ) { ob_start(); dynamic_sidebar( 'main-sidebar' ); } ?>
                </ul>
            </div>
            <?php } ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>
