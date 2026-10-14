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


<?php if(is_tax()){
    $tax_ = get_queried_object();
    if(get_field("custom_code", $tax_)){
?>
    <!-- Custom Code Tax - Start //-->
    <?php echo get_field("custom_code", $tax_); ?>
    <!-- Custom Code Tax - End //-->
<?php
    }
} ?>
<?php if(get_field("custom_code")){ ?>
    <!-- Custom Code Post/Page - Start //-->
    <?php echo get_field("custom_code"); ?>
    <!-- Custom Code - End //-->
<?php } ?>


<?php echo earchi_colors(); ?>
<?php echo earchi_fonts(); ?>
<style>
:root {
    --main-color-one:#16914E !important;
}
</style>
</head>
<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T3ZKG7WB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
      <?php wp_body_open(); ?>
      <?php //echo earchi_preloader(); ?>
      <?php echo earchi_sidebar_menu(); ?>
      <?php //echo earchi_header_one(); ?>
	<?php echo earchi_header_one_home(); ?>