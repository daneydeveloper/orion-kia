<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kingcabs
 */
get_header(); 
	
	/**
	 * Main Banner Section Area
	*/
		get_template_part( 'sections/section', 'carousel' );

	/**
	 * Home Page Widget 
	*/
	if ( is_active_sidebar( 'homewidget-1' ) ) { 

		dynamic_sidebar( 'homewidget-1' );  

	}else{

		/**
		 * Main Fearurs Area 
		*/
			get_template_part( 'sections/section', 'features' );

		/**
		 * Our Fleet Section Area
		*/
			get_template_part( 'sections/section', 'fleet' );

		/**
		 * About Services Area 
		*/
			get_template_part( 'sections/section', 'aboutservice' );

		/**
		 * Call To Action Section Area
		*/
			get_template_part( 'sections/section', 'cta' );

		/**
		 * Main Service Section Area
		*/
			get_template_part( 'sections/section', 'mainservices' );

		/**
		 * Counter Section Area
		*/
			get_template_part( 'sections/section', 'counter' );

		/**
		 * Testimonial Section Area
		*/
			get_template_part( 'sections/section', 'testimonial' );

		/**
		 * Driver Section Area
		*/
			get_template_part( 'sections/section', 'driver' );

		/**
		 * Client/Brand Logo Section Area
		*/
			get_template_part( 'sections/section', 'clients' );
	}
	

 get_footer();