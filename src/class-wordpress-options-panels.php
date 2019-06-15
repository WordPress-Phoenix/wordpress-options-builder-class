<?php
/**
 * [WPOP] WordPress Phoenix Options Panel - Field Builder Classes
 *
 * @authors 🌵 WordPress Phoenix 🌵 / Seth Carstens, David Ryan
 * @package wpop
 * @version 5.0.0
 * @license GPL-2.0+ - please retain comments that express original build of this file by the author.
 */

namespace WPOP\V_5_0;

/**
 * Class WordPress_Options_Panels
 */
class WordPress_Options_Panels {

	/**
	 * @var string
	 */
	public $installed_dir;

	/**
	 * @var string
	 */
	public $installed_url;

	/**
	 * Load files required to use this utility.
	 *
	 * @param $plugins_installed_dir
	 * @param $plugins_installed_url
	 * @param $plugin_basedir
	 */
	public function __construct( $plugins_installed_dir, $plugins_installed_url, $plugin_basedir ) {
		$current_dir         = dirname( __FILE__ );
		$relative_dir        = str_replace( $plugin_basedir . '/', '', $current_dir );
		$this->installed_dir = $plugin_basedir . '/' . $relative_dir;
		$this->installed_url = $plugins_installed_url . $relative_dir;
		// Data api wrappers.
		foreach ( glob( trailingslashit( dirname( __FILE__ ) ) . 'inc/api/class-*.php' ) as $file ) {
			include_once $file;
		}

		// Register classes that represent root objects
		include_once 'inc/class-page.php';
		include_once 'inc/api/class-part.php';
		include_once 'inc/api/class-mcrypt.php';

		// Register classes that represent objects placed into root objects
		include_once 'inc/page-parts/class-assets.php';
		include_once 'inc/page-parts/class-panel.php';

		// Register Panel Parts
		include_once 'inc/panel-parts/class-section.php';

		// Load the individual parts.
		foreach ( glob( trailingslashit( dirname( __FILE__ ) ) . 'inc/fields/class-*.php' ) as $file ) {
			require_once $file;
		}

		if ( ! defined( 'WPOP_OPENSSL_ENCRYPTION_KEY' ) ) {
			// IMPORTANT: If you don't define a key, the class hashes the AUTH_KEY found in wp-config.php,
			// locking the encrypted value to the current environment.
			define( 'WPOP_OPENSSL_ENCRYPTION_KEY', hash( 'sha256', wp_salt(), true ) );
		}
	}

	/**
	 * Helper registration function makes it easy to begin using the classes.
	 *
	 * @param string      $options_page_slug
	 * @param string      $options_page_type A value of either main_menu or sub_menu
	 * @param string|null $parent_menu_id    if sub_menu then parent_menu_id is required, usually a string of the php
	 *                                       file like options-general.php
	 *                                       https://developer.wordpress.org/reference/functions/add_submenu_page/#comment-1404
	 *
	 * @return \WPOP\V_5_0\Page
	 */
	public function register_page( $options_page_slug, $options_page_type, $parent_menu_id = null ) {

		return new Page( $options_page_slug, $options_page_type, $parent_menu_id, $this->installed_dir, $this->installed_url );
	}

}
