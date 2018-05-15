<?php
/**
 * [WPOP] WordPress Phoenix Options Panel - Field Builder Classes
 *
 * @authors 🌵 WordPress Phoenix 🌵 / Seth Carstens, David Ryan
 * @package wpop
 * @version 5.0.0
 * @license GPL-2.0+ - please retain comments that express original build of this file by the author.
 */

class WordPress_Options_Panels {
	/**
	 * Installed Directory
	 *
	 * @var string
	 */
	public $installed_dir;

	/**
	 * Installed URI
	 *
	 * @var string
	 */
	public $installed_dir_uri;

	/**
	 * WordPress_Options_Panels constructor.
	 *
	 * @param string $installed_dir Installed directory from plugin or theme.
	 * @param string $installed_dir_uri Installed URI from plugin or theme.
	 */
	function __construct( $installed_dir, $installed_dir_uri ) {
		$this->installed_dir = $installed_dir . 'lib/wordpress-phoenix/wordpress-options-builder-class/src';
		$this->installed_dir_uri = $installed_dir_uri . 'lib/wordpress-phoenix/wordpress-options-builder-class/src';
		$this->load_files();
	}

	/**
	 * Load files required to use this utility.
	 */
	public function load_files() {
		// Data api wrappers.
		require_once 'inc/api/class-read.php';
		require_once 'inc/api/class-update.php';

		require_once 'inc/class-assets.php';

		require_once 'inc/class-panel.php';
		require_once 'inc/class-page.php';
		require_once 'inc/class-section.php';
		require_once 'inc/class-part.php';

		// Must require base input class first because others extend.
		require_once 'inc/parts/class-input.php';
		foreach ( glob( trailingslashit( dirname( __FILE__ ) ) . 'inc/parts/class-*.php' ) as $file ) {
			if ( false !== stripos( $file, 'inc/parts/class-input.php' ) ) {
				continue; // Don't re-require file.
			}
			require_once $file;
		}
	}
}