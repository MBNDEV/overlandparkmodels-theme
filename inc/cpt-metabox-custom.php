<?php

/* Project Options */

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
}

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
    'title'  => 'Floor Plan List',
    'fields' => array(
		array(
		  'id'        => 'floorplan_serie_list',
		  'type'      => 'group',
		  'title'     => 'Floor Plan List',
		  'fields'    => array(
		    array(
		      'id'    => 'floorplan_serie_category',
		      'type'  => 'text',
		      'title' => 'Floor Plan Category',
		    ),

		    array(
		      'id'    => 'floorplan_floorplan_title',
		      'type'  => 'text',
		      'title' => 'Floor Plan Title',
		    ),

		    array(
		      'id'    => 'floorplan_floorplan_text',
		      'type'  => 'wp_editor',
		      'title' => 'Floor Plan Text',
		    ),

		    array(
		      'id'    => 'floorplan_floorplan_image',
		      'type'  => 'media',
		      'title' => 'Floor Plan Image',
		    ),
		  ),
		),
    )
  ) );

    CSF::createSection( $prefix, array(
    'title'  => 'Floor Plan Facilities',
    'fields' => array(
		array(
		  'id'    => 'floorplan_facilities_title',
		  'type'  => 'text',
		  'title' => 'Floor Plan Facilities Title',
		),
		array(
		  'id'        => 'floorplan_facilities',
		  'type'      => 'group',
		  'title'     => 'Floor Plan Facilities',
		  'fields'    => array(
		    array(
		      'id'    => 'floorplan_facilities_title',
		      'type'  => 'text',
		      'title' => 'Facilities Title',
		    ),

		    array(
		      'id'    => 'floorplan_facilities_text',
		      'type'  => 'text',
		      'title' => 'Facilities Text',
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

    CSF::createSection( $prefix, array(
    'title'  => '360 Video Gallery',
    'fields' => array(
		array(
		  'id'    => 'floorplan_360_video_title',
		  'type'  => 'text',
		  'title' => 'Floor Plan 360 Video Title',
		),
		array(
		  'id'        => 'floorplan_360_gallery',
		  'type'      => 'group',
		  'title'     => '360 Video Gallery',
		  'fields'    => array(
		    array(
		      'id'    => 'floorplan_360_video_gallery_title',
		      'type'  => 'text',
		      'title' => '360 Video Gallery Title',
		    ),

		    array(
		      'id'    => 'floorplan_360_video_gallery_video_url',
		      'type'  => 'text',
		      'title' => '360 Video Gallery Video URL',
		    ),

		    array(
		      'id'    => 'floorplan_360_video_gallery_cover',
		      'type'  => 'media',
		      'title' => '360 Video Gallery Cover Image',
		      'library' => 'image',
		    ),
		  ),
		),
    )
  ) );

    CSF::createSection( $prefix, array(
    'title'  => 'Floor Plan Maps',
    'fields' => array(
		array(
		  'id'    => 'floorplan_map_title',
		  'type'  => 'text',
		  'title' => 'Floor Plan Map Title',
		),
		array(
		  'id'        => 'floorplan_maps',
		  'type'      => 'group',
		  'title'     => 'Floor Plan Maps',
		  'fields'    => array(
		    array(
		      'id'    => 'floorplan_maps_link',
		      'type'  => 'text',
		      'title' => 'Map Link',
		    ),
		  ),
		),
    )
  ) );

    CSF::createSection( $prefix, array(
    'title'  => 'Floor Plan Plans',
    'fields' => array(
		array(
		  'id'    => 'floorplan_plans_title',
		  'type'  => 'text',
		  'title' => 'Floor Plan Plans Title',
		),
		array(
		  'id'        => 'floorplan_plans',
		  'type'      => 'group',
		  'title'     => 'Floor Plan Plans',
		  'fields'    => array(
		    array(
		      'id'    => 'floorplan_plans_title',
		      'type'  => 'text',
		      'title' => 'Plan Title',
		    ),
		    array(
		      'id'    => 'floorplan_plans_image',
		      'type'  => 'media',
		      'title' => 'Plan Image',
		      'library' => 'image',
		    ),
		  ),
		),
    )
  ) );

    CSF::createSection( $prefix, array(
    'title'  => 'Related Floor Plan',
    'fields' => array(
		  array(
		    'id'    => 'related_floorplan',
		    'type'  => 'switcher',
		    'title' => 'Related Floor Plan',
		  ),

			array(
			  'id'    => 'related_floorplan_title',
			  'type'  => 'text',
			  'title' => 'Related Floor Plan Title',
			),
		 array(
			  'id'    => 'related_floorplan_text',
			  'type'  => 'text',
			  'title' => 'Related Floor Plan Text',
			),	  
    )
  ) );
}