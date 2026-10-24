<?php 

if( class_exists( 'CSF' ) ) {

	$prefix = 'earchi_options';
  
	CSF::createSection( $prefix, array(
	  'title'  => 'Series Page',
	  'icon'    => 'fas fa-tasks',
	  'fields' => array(
  
		array(
		  'id'    => 'earchi_serie_archive_title',
		  'type'  => 'text',
		  'title' => 'Series Archive Title',
		),
  
		array(
		  'id'    => 'earchi_serie_archive_sub_title',
		  'type'  => 'text',
		  'title' => 'Series Archive Sub Title',
		),
  
		array(
		  'id'    => 'earchi_serie_archive_text',
		  'type'  => 'text',
		  'title' => 'Series Archive Text',
		),
  
		array(
		  'id'    => 'earchi_serie_archive_residence_title',
		  'type'  => 'text',
		  'title' => 'Series Archive Residence Title',
		),
  
		array(
		  'id'    => 'earchi_serie_archive_residence_sub_title',
		  'type'  => 'text',
		  'title' => 'Series Archive Residence Sub Title',
		),
  
		array(
		  'id'    => 'earchi_serie_archive_residence_text',
		  'type'  => 'text',
		  'title' => 'Series Archive Residence Text',
		),
  
		array(
		  'id'    => 'earchi_serie_archive_residence_image',
		  'type'  => 'media',
		  'title' => 'Series Archive Residence Image',
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
		  'title' => 'Series Archive Testimonials Title',
		),
  
		array(
		  'id'    => 'earchi_serie_archive_testimonials_sub_title',
		  'type'  => 'text',
		  'title' => 'Series Archive Testimonials Sub Title',
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
	
	
	//$prefix2 = 'floorplan_options';
  
	CSF::createSection( $prefix, array(
	  'title'  => 'Floor Plan Page',
	  'icon'    => 'fas fa-tasks',
	  'fields' => array(
  
		array(
		  'id'    => 'earchi_floorplan_archive_title',
		  'type'  => 'text',
		  'title' => 'Floor Plan Archive Title',
		),
  
		array(
		  'id'    => 'earchi_floorplan_archive_sub_title',
		  'type'  => 'text',
		  'title' => 'Floor Plan Archive Sub Title',
		),
  
		array(
		  'id'    => 'earchi_floorplan_archive_text',
		  'type'  => 'text',
		  'title' => 'Floor Plan Archive Text',
		),
  
		array(
		  'id'    => 'earchi_floorplan_archive_residence_title',
		  'type'  => 'text',
		  'title' => 'Floor Plan Archive Residence Title',
		),
  
		array(
		  'id'    => 'earchi_floorplan_archive_residence_sub_title',
		  'type'  => 'text',
		  'title' => 'Floor Plan Archive Residence Sub Title',
		),
  
		array(
		  'id'    => 'earchi_floorplan_archive_residence_text',
		  'type'  => 'text',
		  'title' => 'Floor Plan Archive Residence Text',
		),
  
		array(
		  'id'    => 'earchi_floorplan_archive_residence_image',
		  'type'  => 'media',
		  'title' => 'Floor Plan Archive Residence Image',
		  'library' => 'image',
		),
  
		array(
		  'id'        => 'earchi_floorplan_archive_residence_gallery',
		  'type'      => 'group',
		  'title'     => 'Residence Gallery',
		  'fields'    => array(
			array(
			  'id'    => 'earchi_floorplan_archive_residence_gallery_image_title',
			  'type'  => 'text',
			  'title' => 'Residence Gallery Image Title',
			),
  
			array(
			  'id'    => 'earchi_floorplan_archive_residence_gallery_image',
			  'type'  => 'media',
			  'title' => 'Residence Gallery Image',
			  'library' => 'image',
			),
		  ),
		),
  
		array(
		  'id'    => 'earchi_floorplan_archive_testimonials_title',
		  'type'  => 'text',
		  'title' => 'Floor Plan Archive Testimonials Title',
		),
  
		array(
		  'id'    => 'earchi_floorplan_archive_testimonials_sub_title',
		  'type'  => 'text',
		  'title' => 'Floor Plan Archive Testimonials Sub Title',
		),
  
		array(
		  'id'        => 'earchi_floorplan_archive_testimonials',
		  'type'      => 'group',
		  'title'     => 'Testimonials',
		  'fields'    => array(
			array(
			  'id'    => 'earchi_floorplan_archive_testimonial_name',
			  'type'  => 'text',
			  'title' => 'Testimonial Name',
			),
  
			array(
			  'id'    => 'earchi_floorplan_archive_testimonial_job',
			  'type'  => 'text',
			  'title' => 'Testimonial Job',
			),
  
			array(
			  'id'    => 'earchi_floorplan_archive_testimonial_text',
			  'type'  => 'text',
			  'title' => 'Testimonial Text',
			),
  
		  ),
		),
  
	  )
	) );
}