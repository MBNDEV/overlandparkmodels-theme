<?php /* Template Name: For Sale (Page) */ ?>
<?php get_header(); ?>
<?php //echo earchi_title_barx(); ?>
<?php //echo earchi_serie_archive_residence(); ?>
<?php echo earchi_serie_archive_before_content(); ?>
<?php echo earchi_serie_archive_title(); ?>
<?php echo earchi_serie_archive_categories(); ?>

<style>
.project-section-area .nav-pills {margin-bottom: 0px;}
.button-group{display: flex; gap: 20px; width: 100%; justify-content: center;}
.filte-section{display: flex; gap: 10px; justify-content: center;}
	
.status-item {
  cursor: pointer;
  color: #000;
  font-weight: 500;
  position: relative;
  transition: 0.3s;
  border: 1px solid #24DF79;
  background: transparent;
  margin: 20px 7px;
  padding: 0;
  min-height: 40px;
  min-width: 120px;
  border-radius: 20px;
  text-transform: uppercase;
}

.status-item:hover {
  color: #fff;
  background:#24DF79;
}

.status-item.is-checked {
  color: #fff;
  background: #16914E;
  border: 1px solid #16914E;
  
}
 
/* SEPARATOR */
.status-item:not(:last-child)::before {
  content: "";
  position: absolute;
  top: 0;
  right: -18px;
  background: #24DF79;
  width: 1px; 
  height: 40px;
}
@media (max-width: 720px) {
	.button-group {margin-bottom: 20px;}
	.status-item {margin: 0px 7px;width: auto;}
}
@media (max-width: 620px) {
	.button-group {flex-wrap: wrap; margin-top: 20px; margin-bottom: 20px;}
	.status-item {margin: 0px 7px;width: 40%;}
	.button-group .status-item:nth-child(2):before{content: none;}
}
</style>
<?php /**/ ?>
<div class="filte-section">
	<div id="filters" class="button-group">
		<button class="button status-item is-checked" data-filter="*">All</button>
		<button class="button status-item" data-filter=".newseries">New 2026</button>
		<button class="button status-item" data-filter=".comingsoon">Coming Soon</button>
		<button class="button status-item" data-filter=".soldseries">Sold</button>
	</div>
</div>

<style>
	.no-results {
		display: none;
	}
</style>

<p class="no-results" style=" text-align:center; margin-top: 50px; margin-bottom: 50px; font-size: 16px; line-height: 2.18 !important; max-width: 900px; margin-inline: auto;">
  We’re preparing to add park model homes to this collection. Check back soon for upcoming inventory, fresh floor plans, and new options. In the meantime, feel free to explore our currently available park model homes in the other categories.
</p>


<?php echo earchi_serie_archive_projects(); ?>
<?php //echo earchi_project_archive_testimonials(); ?>
<?php echo earchi_serie_archive_after_content(); ?>
<?php //include( get_stylesheet_directory() . '/inner-contact-section.php' ); ?>
<script>
jQuery(document).ready(function(){
	//setTimeout(function() { 
	/*
		var allseries = jQuery(".series-item");
		var temp = allseries.sort(function(a,b){
			return parseInt(jQuery(b).data("series-item")) - parseInt(jQuery(a).data("series-item"));
		});
		jQuery("#list_all").html(temp);			
	*/
		//}, 2000);
		
		
});

jQuery(document).ready(function(){
	$( ".series_cont_item .tab-pane" ).each(function( index ) {
		$srs_id = this.id;
		//console.log( index + ": " + $srs_id );
		
		var allseries = jQuery("#"+$srs_id+" .series-item");
		
		var temp = allseries.sort(function(a,b){
			return parseInt(jQuery(b).data("series-item")) - parseInt(jQuery(a).data("series-item"));
		});
	jQuery("#"+$srs_id+" .row").html(temp);			
		
	});
});
</script>
<?php get_footer(); ?>

<script>
document.addEventListener("DOMContentLoaded", function () {

  /* =============================
     FILTER LOGIC
  ============================== */
  const filterButtons = document.querySelectorAll("#filters .button");

  filterButtons.forEach(button => {
    button.addEventListener("click", function () {
      filterButtons.forEach(btn => btn.classList.remove("is-checked"));
      this.classList.add("is-checked");

      const filter = this.getAttribute("data-filter");
      const activeTab = document.querySelector(".tab-pane.active.show");
		
		const emptyText2 = document.querySelector(".no-results");   /* Added */
		
      if (!activeTab) return;
		
		let visibleCount = 0;   /* Added */

      activeTab.querySelectorAll(".series-item").forEach(item => {
        if (filter === "*") {
          item.style.display = "block";
        } else {
          item.style.display = item.classList.contains(filter.substring(1))
            ? "block"
            : "none";
			
			
			/* Added */
			const isMatch = item.classList.contains(filter.substring(1));
			let hasMatch = false;
			
			console.log("filter = " + filter);
			
			if (filter === ".comingsoon" && !hasMatch) {
				
				if (isMatch) {
					hasMatch = true;
				} else {
					
				}
				
				visibleCount++;
				
				if (visibleCount === 0) {
					emptyText2.style.display = "none";
				} else {
					emptyText2.style.display = "block";
				}
				
			}
			
			/* -------  */
			
			
        }
      });
		
		/* Added */
		
		console.log("Visible Count = " + visibleCount);
		
		if (visibleCount === 0) {
			emptyText2.style.display = "none";
		}		
		
		/* -------  */
		
    });
  });

  /* =============================
     RESET FILTER WHEN TAB CHANGES
  ============================== */
  document.querySelectorAll('[data-bs-toggle="pill"]').forEach(tab => {
    tab.addEventListener("shown.bs.tab", function () {

      const activeTab = document.querySelector(".tab-pane.active.show");
		
	  const noResults = document.querySelector(".no-results");
	  if (noResults) noResults.style.display = "none";

      if (!activeTab) return;

      // Reset items
      activeTab.querySelectorAll(".series-item").forEach(item => {
        item.style.display = "block";
      });

      // Reset filter buttons UI
      filterButtons.forEach(btn => btn.classList.remove("is-checked"));

      const showAllBtn = document.querySelector(
        '#filters .button[data-filter="*"]'
      );
      if (showAllBtn) showAllBtn.classList.add("is-checked");

    });
  });

});
</script>