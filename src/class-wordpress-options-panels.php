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
	 * Load files required to use this utility.
	 */
	public static function load_files() {
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

		// Load the individual parts.
		foreach ( glob( trailingslashit( dirname( __FILE__ ) ) . 'inc/parts/class-*.php' ) as $file ) {
			if ( false !== stripos( $file, 'inc/parts/class-input.php' ) ) {
				continue; // Don't re-require file.
			}

			require_once $file;
		}
	}

}
