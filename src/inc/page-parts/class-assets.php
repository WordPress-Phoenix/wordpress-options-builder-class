<?php
/**
 * Assets
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

/**
 * Class Assets
 */
class Assets {

	/**
	 * Installed Directory URI
	 *
	 * @var string
	 */
	public $installed_dir_uri;

	/**
	 * Asset versions
	 *
	 * @var string
	 */
	public $version = '5.0.0';

	/**
	 * Instantiate an Assets class with the directory URI
	 *
	 * @param string $installed_dir_uri Install directory of the plugin.
	 * @return void
	 */
	public function __construct( $installed_dir_uri ) {
		$this->installed_dir_uri = $installed_dir_uri;
	}

	/**
	 * Register and enequeue CSS
	 *
	 * @return void
	 */
	public function register_css() {
		/**
		 * Pure v1.0.0
		 * Copyright 2013 Yahoo!
		 *
		 * @license BSD License.
		 * @see     https://github.com/yahoo/pure/blob/master/LICENSE.md
		 *
		 * normalize.css v^3.0 | MIT License | git.io/normalize
		 * Copyright (c) Nicolas Gallagher and Jonathan Neal
		 */
		wp_register_style(
			'wpop-purecss-css',
			esc_url_raw( $this->installed_dir_uri ) . '/assets/yahoo-purecss.css',
			[],
			$this->version,
			'all'
		);

		/**
		 * Pure v1.0.0
		 * Copyright 2013 Yahoo!
		 *
		 * @license BSD License.
		 * @see     https://github.com/yahoo/pure/blob/master/LICENSE.md
		 */
		wp_register_style(
			'wpop-purecss-responsive-grid-css',
			esc_url_raw( $this->installed_dir_uri ) . '/assets/yahoo-purecss-responsive-grid.css',
			[
				'wpop-purecss-css',
			],
			$this->version,
			'all'
		);

		/**
		 * CSS selectize.css (v0.12.4)
		 * Copyright (c) 2013–2015 Brian Reavis & contributors
		 *
		 * Licensed under the Apache License, Version 2.0 (the "License"); you may not use this
		 * file except in compliance with the License. You may obtain a copy of the License at:
		 * http://www.apache.org/licenses/LICENSE-2.0
		 *
		 * Unless required by applicable law or agreed to in writing, software distributed under
		 * the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF
		 * ANY KIND, either express or implied. See the License for the specific language
		 * governing permissions and limitations under the License.
		 *
		 * @author Brian Reavis <brian@thirdroute.com>
		 */
		wp_register_style(
			'wpop-selectize-css',
			esc_url_raw( $this->installed_dir_uri ) . '/assets/selectize.css',
			[],
			$this->version,
			'all'
		);

		wp_register_style(
			'wpop-css',
			esc_url_raw( $this->installed_dir_uri ) . '/assets/wpop.css',
			[
				'wpop-purecss-responsive-grid-css',
				'wpop-selectize-css',
			],
			$this->version,
			'all'
		);

		// Enqueue all dependencies up the tree.
		wp_enqueue_style( 'wpop-css' );
	}

	/**
	 * Register and enqueue JavaScript
	 *
	 * @return void
	 */
	public function register_js() {
		/**
		 * Selectize Plugin
		 *
		 * @see selectize.js Version 0.12.4 | https://github.com/selectize/selectize.js | Apache License (v2).
		 */
		wp_register_script(
			'wpop-selectize-js',
			esc_url_raw( $this->installed_dir_uri ) . '/assets/selectize.js',
			[
				'jquery',
			],
			$this->version,
			false
		);

		wp_register_script(
			'wpop-js',
			esc_url_raw( $this->installed_dir_uri ) . '/assets/wpop.js',
			[
				'wpop-selectize-js',
			],
			$this->version,
			false
		);

		// Enqueue all dependencies up the tree.
		wp_enqueue_script( 'wpop-js' );
	}

	/**
	 * Inline JavaScript above </body> close tag
	 *
	 * @return void
	 */
	public function inline_js_footer() {
		?>
		<script type="text/html" id="tmpl-wpop-media-stats">
			<div class="pure-g media-stats">
				<div class="pure-u-1 pure-u-sm-18-24">
					<table class="widefat striped">
						<thead>
						<tr>
							<td colspan="2"><span class="dashicons dashicons-format-image"></span>
								<a href="{{ data.url }}">{{ data.filename }}</a>
								<a href="{{ data.editLink }}" class="button" style="float:right;">Edit Image</a>
							</td>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>uploaded</td>
							<td>{{ data.dateFormatted }}</td>
						</tr>
						<tr>
							<td>orientation</td>
							<td>{{ data.orientation }}</td>
						</tr>
						<tr>
							<td>size</td>
							<td>{{ data.width }}x{{ data.height }} {{ data.filesizeHumanReadable }}</td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="pure-u-sm-1-24"></div>
				<div class="pure-u-1 pure-u-sm-5-24">
					<img src="{{ data.sizes.thumbnail.url }}" class="img-preview"/>
				</div>
			</div>
		</script>

		<script type="text/javascript">
			jQuery( document ).ready( function () {
				wpop.hooks.doAction( 'wpopFooterScripts' );
			} );
		</script>
		<?php
	}

}
