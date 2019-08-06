<?php
/**
 * About page of kingcabs Theme
 *
 * @package Sparkle Themes
 * @subpackage Kingcabs
 * @since 1.0.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kingcabs' ) ) :

class Kingcabs {

	/**
	 * Constructor.
	*/
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'hide_notices' ) );
		add_action( 'load-themes.php', array( $this, 'admin_notice' ) );

	}

	/**
	 * Add admin menu.
	 */
	public function admin_menu() {
		$theme = wp_get_theme( get_template() );

		$page = add_theme_page( esc_html__( 'Setup', 'kingcabs' ) . ' ' . esc_attr( $theme->display( 'Name' ) ), esc_html__( 'Setup', 'kingcabs' ) . ' ' . esc_attr( $theme->display( 'Name' ) ), 'activate_plugins', 'kingcabs-welcome', array( $this, 'welcome_screen' ) );
		
		add_action( 'admin_print_styles-' . $page, array( $this, 'enqueue_styles' ) );
	}

	/**
	 * Enqueue styles.
	*/
	public function enqueue_styles() {

		global $kingcabs_version;

		wp_enqueue_style( 'kingcabs-about-theme', get_template_directory_uri() . '/sparklethemes/admin/about-theme/about.css', array(), $kingcabs_version );
	}

	/**
	 * Add admin notice.
	*/
	public function admin_notice() {
		global $kingcabs_version, $pagenow;
		// Let's bail on theme activation.
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
			update_option( 'kingcabs_admin_notice_welcome', 1 );

		// No option? Let run the notice wizard again..
		} elseif( ! get_option( 'kingcabs_admin_notice_welcome' ) ) {

			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );

		}
	}

	/**
	 * Hide a notice if the GET variable is set.
	*/
	public static function hide_notices() {
		if ( isset( $_GET['kingcabs-hide-notice'] ) && isset( $_GET['_kingcabs_notice_nonce'] ) ) {

			if ( ! wp_verify_nonce( sanitize_key( $_GET['_kingcabs_notice_nonce'] ), 'kingcabs_hide_notices_nonce' ) ) {
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'kingcabs' ) );
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( esc_html__( 'Cheatin&#8217; huh?', 'kingcabs' ) );
			}

			$hide_notice = sanitize_text_field( sanitize_key($_GET['kingcabs-hide-notice'] ) );
			update_option( 'kingcabs_admin_notice_' . $hide_notice, 1 );
		}
	}

	/**
	 * Show welcome notice.
	 */
	public function welcome_notice() {
		?>
		<div id="message" class="updated kingcabs-message">
			<a class="kingcabs-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'kingcabs-hide-notice', 'welcome' ) ), 'kingcabs_hide_notices_nonce', '_kingcabs_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'kingcabs' ); ?></a>
			
			<p><?php printf( esc_html__( 'Welcome! Thank you for choosing kingcabs! To fully take advantage of the best our theme can offer please make sure you visit our %1$s welcome page %2$s.', 'kingcabs' ), '<a href="' . esc_url( admin_url( 'themes.php?page=kingcabs-welcome' ) ) . '">', '</a>' ); ?></p>
			
			<p class="submit">
				<a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=kingcabs-welcome' ) ); ?>"><?php esc_html_e( 'Get started with Kingcabs', 'kingcabs' ); ?></a>
			</p>
		</div>
		<?php
	}

	/**
	 * Intro text/links shown to all about pages.
	 *
	 * @access private
	 */
	private function intro() {
		global $kingcabs_version;
		$theme = wp_get_theme( get_template() );

		// Drop minor version if 0
		//$major_version = substr( $kingcabs_version, 0, 3 );
		?>
		<div class="kingcabs-theme-info">
				<h1>
					<?php esc_html_e('About', 'kingcabs'); ?>
					<?php echo esc_attr( $theme->display( 'Name' ) ); ?>
					<?php printf( '%s', esc_attr( $kingcabs_version ) ); ?>
				</h1>

			<div class="welcome-description-wrap">
				<div class="about-text"><?php echo esc_attr( $theme->display( 'Description' ) ); ?></div>

				<div class="kingcabs-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" />
				</div>
			</div>
		</div>

		<p class="kingcabs-actions">		
			
			<a href="<?php echo esc_url( 'https://www.sparklewpthemes.com/wordpress-themes/kingcabs/' ); ?>" class="button button-secondry" target="_blank"><?php esc_html_e( 'Theme Details', 'kingcabs' ); ?></a>
			
			<a href="<?php echo esc_url( apply_filters( 'kingcabs_pro_theme_url', 'http://demo.sparklewpthemes.com/kingcabs/' ) ); ?>" class="button button-secondry docs" target="_blank"><?php esc_html_e( 'View Demo', 'kingcabs' ); ?></a>


			<a href="<?php echo esc_url( apply_filters( 'kingcabs_pro_theme_url', 'https://www.sparklewpthemes.com/wordpress-themes/kingcabspro' ) ); ?>" class="button button-primary docs" target="_blank"><?php esc_html_e( 'Upgrade to Pro  ', 'kingcabs' ); ?></a>

		</p>

		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php if ( empty( $_GET['tab'] ) && $_GET['page'] == 'kingcabs-welcome' ) echo esc_attr( 'nav-tab-active' ); ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'kingcabs-welcome' ), 'themes.php' ) ) ); ?>">
				<?php echo esc_attr( $theme->display( 'Name' ) ); ?>
			</a>
			
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'kingcabs-welcome', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Free Vs Pro', 'kingcabs' ); ?>
			</a>

			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'more_themes' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'kingcabs-welcome', 'tab' => 'more_themes' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'More Themes', 'kingcabs' ); ?>
			</a>

			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'changelog' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'kingcabs-welcome', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Changelog', 'kingcabs' ); ?>
			</a>
		</h2>
		<?php
	}

	/**
	 * Welcome screen page.
	 */
	public function welcome_screen() {
		
		$current_tab = empty( $_GET['tab'] ) ? 'about' : sanitize_key( $_GET['tab'] );

		// Look for a {$current_tab}_screen method.
		if ( is_callable( array( $this, $current_tab . '_screen' ) ) ) {
			return $this->{ $current_tab . '_screen' }();
		}

		// Fallback to about screen.
		return $this->about_screen();
	}

	/**
	 * Output the about screen.
	 */
	public function about_screen() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<div class="changelog point-releases">
				<div class="under-the-hood two-col">
					
					<div class="col">
						<h3><?php esc_html_e( 'Setting Static Front Page', 'kingcabs' ); ?></h3>
						<p><?php esc_html_e( 'Create a new page to display on front page ( Ex: Home ). Select A static page then Front page and Posts page to display front page specific sections. Note: Static page will be set automatically when you "Checked to Set Kingcabs frontpage?".', 'kingcabs' ) ?></p>
						<p><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=static_front_page' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customization', 'kingcabs' ); ?></a></p>
					</div>


					<div class="col">
						<h3><?php esc_html_e( 'Documentation', 'kingcabs' ); ?></h3>
						<p><?php esc_html_e( 'Kindly check our theme documentation for detailed information and video instructions.', 'kingcabs' ) ?></p>
						<p><a href="<?php echo esc_url( 'http://docs.sparklewpthemes.com/kingcabs/' ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Documentation', 'kingcabs' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Theme Customizer', 'kingcabs' ); ?></h3>
						<p><?php esc_html_e( 'Start customizing every aspect of the website with customizer.', 'kingcabs' ) ?></p>
						<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'kingcabs' ); ?></a></p>
					</div>


					<div class="col">
						<h3><?php esc_html_e( 'Customize Everything', 'kingcabs' ); ?></h3>
						<p><?php esc_html_e( 'This is 100% free theme and has premium version. Either Upgrade to Pro or Feel free to contact us any time if you need any customization service.', 'kingcabs' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://www.sparklewpthemes.com/request-wordpress-customization-with-our-dedicated-support-team/' ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Customization', 'kingcabs' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Need more features ?', 'kingcabs' ); ?></h3>
						<p><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'kingcabs' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://www.sparklewpthemes.com/wordpress-themes/kingcabspro/' ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'View PRO version', 'kingcabs' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Got theme support question?', 'kingcabs' ); ?></h3>
						<p><?php esc_html_e( 'Please put it in our dedicated support forum.', 'kingcabs' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://www.sparklewpthemes.com/support/' ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Support', 'kingcabs' ); ?></a></p>
					</div>

				</div>
			</div>

			<div class="return-to-dashboard kingcabs">
				<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
					<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
						<?php is_multisite() ? esc_html_e( 'Return to Updates', 'kingcabs' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'kingcabs' ); ?>
					</a> |
				<?php endif; ?>
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'kingcabs' ) : esc_html_e( 'Go to Dashboard', 'kingcabs' ); ?></a>
			</div>
		</div>
		<?php
	}

	/**
	 * Output the more themes screen
	 */
	public function more_themes_screen() {
?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>
			<div class="theme-browser rendered">
				<div class="themes wp-clearfix">
					<?php
						// Set the argument array with author name.
						$args = array(
							'author' => 'sparklewpthemes',
						);
						// Set the $request array.
						$request = array(
							'body' => array(
								'action'  => 'query_themes',
								'request' => serialize( (object)$args )
							)
						);
						$themes = $this->kingcabs_get_themes( $request );
						$active_theme = wp_get_theme()->get( 'Name' );
						$counter = 1;

						// For currently active theme.
						foreach ( $themes->themes as $theme ) {
							if( $active_theme == $theme->name ) { ?>

								<div id="<?php echo esc_attr( $theme->slug ); ?>" class="theme active">
									<div class="theme-screenshot">
										<img src="<?php echo esc_url( $theme->screenshot_url ); ?>"/>
									</div>
									<h3 class="theme-name" id="kingcabs-name"><strong><?php esc_html_e( 'Active', 'kingcabs' ); ?></strong>: <?php echo esc_attr( $theme->name ); ?></h3>
									<div class="theme-actions">
										<a class="button button-primary customize load-customize hide-if-no-customize" href="<?php echo esc_url( get_site_url() ). '/wp-admin/customize.php' ?>"><?php esc_html_e( 'Customize', 'kingcabs' ); ?></a>
									</div>
								</div><!-- .theme active -->
							<?php
							$counter++;
							break;
							}
						}

						// For all other themes.
						foreach ( $themes->themes as $theme ) {
							if( $active_theme != $theme->name ) {
								// Set the argument array with author name.
								$args = array(
									'slug' => $theme->slug,
								);
								// Set the $request array.
								$request = array(
									'body' => array(
										'action'  => 'theme_information',
										'request' => serialize( (object)$args )
									)
								);
								$theme_details = $this->kingcabs_get_themes( $request );
							?>
								<div id="<?php echo esc_attr( $theme->slug ); ?>" class="theme">
									<div class="theme-screenshot">
										<img src="<?php echo esc_url( $theme->screenshot_url ); ?>"/>
									</div>

									<h3 class="theme-name"><?php echo esc_attr( $theme->name ); ?></h3>

									<div class="theme-actions">
										<?php if( wp_get_theme( $theme->slug )->exists() ) { ?>	

											<!-- Activate Button -->
											<a  class="button button-secondary activate"
												href="<?php echo esc_url( wp_nonce_url( admin_url( 'themes.php?action=activate&amp;stylesheet=' . urlencode( $theme->slug ) ), 'switch-theme_' . $theme->slug ) ); ?>" ><?php esc_html_e( 'Activate', 'kingcabs' ) ?></a>
										<?php } else {
											// Set the install url for the theme.
											$install_url = add_query_arg( array(
													'action' => 'install-theme',
													'theme'  => $theme->slug,
												), self_admin_url( 'update.php' ) );
										?>
											<!-- Install Button -->
											<a data-toggle="tooltip" data-placement="bottom" title="<?php echo 'Downloaded ' . number_format( $theme_details->downloaded ) . ' times'; ?>" class="button button-secondary activate" href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>" ><?php esc_html_e( 'Install Now', 'kingcabs' ); ?></a>
										<?php } ?>

										<a class="button button-primary load-customize hide-if-no-customize" target="_blank" href="<?php echo esc_url( $theme->preview_url ); ?>"><?php esc_html_e( 'Live Preview', 'kingcabs' ); ?></a>
									</div>
								</div><!-- .theme -->
								<?php
							}
						}


					?>
				</div>
			</div><!-- .mt-theme-holder -->
		</div><!-- .wrap.about-wrap -->
<?php
	}

	/** 
	 * Get all our themes by using API.
	 */
	private function kingcabs_get_themes( $request ) {

		// Generate a cache key that would hold the response for this request:
		$key = 'kingcabs_' . md5( serialize( $request ) );

		// Check transient. If it's there - use that, if not re fetch the theme
		if ( false === ( $themes = get_transient( $key ) ) ) {

			// Transient expired/does not exist. Send request to the API.
			$response = wp_remote_post( 'http://api.wordpress.org/themes/info/1.0/', $request );

			// Check for the error.
			if ( !is_wp_error( $response ) ) {

				$themes = unserialize( wp_remote_retrieve_body( $response ) );

				if ( !is_object( $themes ) && !is_array( $themes ) ) {

					// Response body does not contain an object/array
					return new WP_Error( 'theme_api_error', 'An unexpected error has occurred' );
				}

				// Set transient for next time... keep it for 24 hours should be good
				set_transient( $key, $themes, 60 * 60 * 24 );
			}
			else {
				// Error object returned
				return $response;
			}
		}
		return $themes;
	}
	
	/**
	 * Output the changelog screen.
	 */
	public function changelog_screen() {
		global $wp_filesystem;

		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<h4><?php esc_html_e( 'View changelog below:', 'kingcabs' ); ?></h4>

			<?php
				$changelog_file = apply_filters( 'kingcabs_changelog_file', get_template_directory() . '/readme.txt' );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = $this->parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
		<?php
	}

	/**
	 * Parse changelog from readme file.
	 * @param  string $content
	 * @return string
	 */
	private function parse_changelog( $content ) {
		$matches   = null;
		$regexp    = '~==\s*Changelog\s*==(.*)($)~Uis';
		$changelog = '';

		if ( preg_match( $regexp, $content, $matches ) ) {
			$changes = explode( '\r\n', trim( $matches[1] ) );

			$changelog .= '<pre class="changelog">';

			foreach ( $changes as $index => $line ) {
				$changelog .= wp_kses_post( preg_replace( '~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line ) );
			}

			$changelog .= '</pre>';
		}

		return wp_kses_post( $changelog );
	}

	/**
	 * Output the free vs pro screen.
	 */
	public function free_vs_pro_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<h4><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'kingcabs' ); ?></h4>

			<table>
				<thead>
					<tr>
						<th class="table-feature-title"><h3><?php esc_html_e( 'Features', 'kingcabs' ); ?></h3></th>
						<th><h3><?php esc_html_e( 'kingcabs', 'kingcabs' ); ?></h3></th>
						<th><h3><?php esc_html_e( 'Kingcabs Pro', 'kingcabs' ); ?></h3></th>
					</tr>
				</thead>
				<tbody>

					<tr>
						<td><h3><?php esc_html_e( 'Price', 'kingcabs' ); ?></h3></td>
						<td><?php esc_html_e( 'Free', 'kingcabs' ); ?></td>
						<td><?php esc_html_e( '$55', 'kingcabs' ); ?></td>
					</tr>

					<tr>
						<td><h3><?php esc_html_e( 'Import Demo Data', 'kingcabs' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>


					<tr>
						<td><h3><?php esc_html_e( 'Reorder All Sections', 'kingcabs' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					<tr>
						<td><h3><?php esc_html_e( 'SiteOrigin Page Builder', 'kingcabs' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					<tr>
						<td><h3><?php esc_html_e( 'Header Layouts', 'kingcabs' ); ?></h3></td>
						<td><?php esc_html_e( '1', 'kingcabs' ); ?></td>
						<td><?php esc_html_e( '4', 'kingcabs' ); ?></td>
					</tr>

					
					<tr>
						<td><h3><?php esc_html_e( 'No. of Widgets', 'kingcabs' ); ?></h3></td>
						<td><?php esc_html_e( '7', 'kingcabs' ); ?></td>
						<td><?php esc_html_e( '11+', 'kingcabs' ); ?></td>
					</tr>

					<tr>
						<td><h3><?php esc_html_e( 'Unlimited Colors', 'kingcabs' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>					

					<tr>
						<td><h3><?php esc_html_e( 'Footer Copyright', 'kingcabs' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					<tr>
						<td><h3><?php esc_html_e( 'Custom Shortcodes', 'kingcabs' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>


					<tr>
						<td><h3><?php esc_html_e( 'Plugins Compatible', 'kingcabs' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>


					<tr>
						<td><h3><?php esc_html_e( 'WooCommerce Compatible', 'kingcabs' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					<tr>
						<td><h3><?php esc_html_e( 'Contact Form 7 Plugin Compatible', 'kingcabs' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					<tr>
						<td><h3><?php esc_html_e( 'Responsive Design', 'kingcabs' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					<tr>
						<td><h3><?php esc_html_e( 'SEO Optimized', 'kingcabs' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					<tr>
						<td><h3><?php esc_html_e( 'Child Theme Support', 'kingcabs' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					<tr>
						<td><h3><?php esc_html_e( 'Quality Code', 'kingcabs' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td></td>
						<td class="btn-wrapper">
							<a href="<?php echo esc_url( apply_filters( 'kingcabs_theme_url', 'https://wordpress.org/themes/kingcabs/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Download', 'kingcabs' ); ?></a>
						</td>
						<td class="btn-wrapper">
							<a href="<?php echo esc_url( apply_filters( 'kingcabs_pro_theme_url', 'https://www.sparklewpthemes.com/wordpress-themes/kingcabspro/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Buy Pro', 'kingcabs' ); ?></a>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<?php
	}
}

endif;

return new Kingcabs();