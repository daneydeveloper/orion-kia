<?php
/**
 * Main Custom admin functions area
 *
 * @since SparkleThemes
 *
 * @param King_Cabs
 *
*/

/**
 * Load Custom Admin functions that act independently of the theme functions.
*/
require get_theme_file_path('sparklethemes/functions.php');


/**
 * Load Custom Admin functions that act independently of the theme functions.
*/

require get_theme_file_path('sparklethemes/breadcrumbs.php');

/**
 * Load Font Awesome Array List.
*/
require get_theme_file_path('sparklethemes/font-awesome-list.php');

/**
 * Custom functions that act independently of the theme header.
*/
require get_theme_file_path('sparklethemes/core/custom-header.php');

/**
 * Custom functions that act independently of the theme templates.
*/
require get_theme_file_path('sparklethemes/core/template-functions.php');

/**
 * Custom template tags for this theme.
*/
require get_theme_file_path('sparklethemes/core/template-tags.php');

/**
 * Load Jetpack compatibility file.
 */

if ( defined( 'JETPACK__VERSION' ) ) {

   require get_theme_file_path('sparklethemes/core/jetpack.php');

}

/**
 * Load woocommerce hooks file.
*/
if ( kingcabs_is_woocommerce_activated() ) {
	
	require get_theme_file_path('sparklethemes/woocommerce.php');
}

/**
 * Features Widget Load File.
*/
require get_theme_file_path('sparklethemes/widget/features-widget.php');

require get_theme_file_path('sparklethemes/widget/aboutservices.php');

require get_theme_file_path('sparklethemes/widget/mainservicesarea.php');

require get_theme_file_path('sparklethemes/widget/calltoaction.php');

require get_theme_file_path('sparklethemes/widget/testimonial-widget.php');

require get_theme_file_path('sparklethemes/widget/ourfleet.php');

require get_theme_file_path('sparklethemes/widget/ourteammember.php');

require get_theme_file_path('sparklethemes/widget/brandlogo-widget.php');


require get_theme_file_path('sparklethemes/siteorigin-panels.php');

/**
 * Customizer additions.
*/
require get_theme_file_path('sparklethemes/customizer/customizer.php');

/**
 * Load  Custom Controller file.
*/
require get_theme_file_path('sparklethemes/customizer/kingcabs-custom-control.php');

/**
 * Load TGM file.
*/
require get_theme_file_path('sparklethemes/tgm.php');

/**
 * Load theme about page
*/
require get_theme_file_path('sparklethemes/admin/about-theme/kingcabs-about.php');


/**
 * Load in customizer upgrade to pro
*/
require get_theme_file_path('sparklethemes/customizer/customizer-pro/class-customize.php');