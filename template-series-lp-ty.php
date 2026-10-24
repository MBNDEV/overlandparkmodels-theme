<?php /* Template Name: Series - LP TY Page*/ ?>

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

</head>

<body <?php body_class(); ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T3ZKG7WB"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<?php wp_body_open(); ?>
	<?php echo earchi_header_lander(); ?>
	
	<?php echo earchi_title_barx(); ?>

<div class="thankyou-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 align-self-center">
				<div class="thankyou-inner">
					<?php 
						if ( have_posts() ) {
							while ( have_posts() ) {
								the_post(); 
								the_content();
								
							} // end while
						} // end if
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>