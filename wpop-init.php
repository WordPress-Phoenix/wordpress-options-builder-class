<?php
/**
 * [WPOP] WordPress Phoenix Options Panel - Field Builder Classes
 *
 * @authors 🌵 WordPress Phoenix 🌵 / Seth Carstens, David Ryan
 * @package wpop
 * @version 4.1.1
 * @license GPL-2.0+ - please retain comments that express original build of this file by the author.
 */

/**
 * Some tips:
 * * Panel + Page work together to register panel, create WordPress admin page.
 * * The resulting Panel supports tabbed Sections.
 * * Sections contain Parts (which are either inputs or non-data display values)
 */
if ( ! function_exists( 'add_filter' ) ) { // avoid direct calls to file
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

// data api wrappers
require_once 'inc/api/class-read.php';
require_once 'inc/api/class-update.php'; // contains delete functions as well, relies on Update for creation

// base part
require_once 'inc/class-part.php';

// core files
require_once 'inc/class-assets.php';
require_once 'inc/class-section.php';
require_once 'inc/class-panel.php';
require_once 'inc/class-page.php';

// must require base input class first because others extend
require_once 'inc/parts/class-input.php';
foreach ( glob( trailingslashit( dirname( __FILE__ ) ) . 'inc/parts/class-*.php' ) as $file ) {
	if ( false !== stripos( $file, 'inc/parts/class-input.php' ) ) {
		continue; // don't re-require file
	}
	require_once $file;
}
