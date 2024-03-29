<?php
/**
 * Plugin recommendation.
 *
 * @package Editorial_Mag
 */

// Load TGM library.
require_once trailingslashit( get_template_directory() ) . 'sparklethemes/tgm/class-tgm-plugin-activation.php';

if ( ! function_exists( 'kingcabs_register_recommended_plugins' ) ) :

	/**
	 * Register recommended plugins.
	 *
	 * @since 1.0.0
	 */
	function kingcabs_register_recommended_plugins() {

		$plugins = array(

            array(
				'name' => esc_html__( 'Page Builder by SiteOrigin', 'kingcabs' ),
				'slug' => 'siteorigin-panels',
				'required' => false,
            ),
            
            array(
				'name' => esc_html__( 'Contact Form 7', 'kingcabs' ),
				'slug' => 'contact-form-7',
				'required' => false,
            ),

            array(
				'name' => esc_html__( 'Regenerate Thumbnails', 'kingcabs' ),
				'slug' => 'regenerate-thumbnails',
				'required' => false,
            ),

            array(
            	'name'     => esc_html__( 'WooCommerce', 'kingcabs' ),
            	'slug'     => 'woocommerce',
            	'required' => false,
            )
		);

		$config = array();

		tgmpa( $plugins, $config );

	}

endif;

add_action( 'tgmpa_register', 'kingcabs_register_recommended_plugins' );
