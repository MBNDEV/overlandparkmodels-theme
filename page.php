<?php $page_options = get_post_meta( get_the_ID(), 'page_options', true ); ?>
<?php get_header(); ?>
<?php if ( $page_options['page_title_bar'] == 1) { echo earchi_title_barx(); } elseif(!is_page(268)){ ?>
	<div class=innerpage_header style="height: 1px;"></div>
<?php }  ?>
<?php echo earchi_page_content2(); ?>
<?php get_footer(); ?> 