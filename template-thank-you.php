<?php
/* Template Name: Thank You Page*/
get_header();
echo earchi_title_barx();
?>
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