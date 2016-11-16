<?php
/**
 * SiteOptions builder class
 * @author : Seth Carstens
 * @package: SM-Utilities
 * @version: 1.5.2
 * @license: GPL 2.0 - please retain comments that express original build of this file by the author.
 */

// avoid direct calls to this file, because now WP core and framework has been used
if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

if ( defined( 'SITEOPTION_PREFIX' ) ) {
	define( 'SM_SITEOP_PREFIX', SITEOPTION_PREFIX );
}
if ( ! defined( 'SM_SITEOP_PREFIX' ) ) {
	define( 'SM_SITEOP_PREFIX', 'sm_option_' );
}
define( 'SM_SITEOP_DEBUG', false );

//provide a simpler way to get the custom site options created
if ( ! function_exists( 'get_custom_option' ) ) {
	function get_custom_option( $s = '', $network_option = false ) {
		if ( $network_option ) {
			return get_site_option( SITEOPTION_PREFIX . $s );
		} else {
			return get_option( SITEOPTION_PREFIX . $s );
		}
	}
}

// stop dbug calls from throwing errors when the sm-debug-bar plugin is not active
if ( ! function_exists( 'dbug' ) ) {
	function dbug() {
	}
}
dbug( 'Version 1.5.1' );

class sm_options_container {

	// property declaration
	public $parts;
	public $parent_id;
	public $capability;
	public $id;
	public $notifications;
	public $security_check;

	public function __construct( $i, $args = array() ) {
		$this->id             = preg_replace( '/_/', '-', $i );
		$this->parts          = array();
		$this->parent_id      = '';
		$this->capability     = 'read';
		$this->notifications  = array();
		$this->security_check = false;
	}

	public function add_part( $part ) {
		$this->parts[ $part->id ] = $part;
	}

	public function save_options() {
		$any_updated = false;

		// make sure that a nonce was passed or do not save options
		if ( ! empty( $_REQUEST['_wpnonce'] ) ) {
			$nonce = $_REQUEST['_wpnonce'];
		} else {
			return false;
		}

		// check the nonce for security and save it to the class object or end function
		if ( $this->security_check || wp_verify_nonce( $nonce, $this->id ) ) {
			$this->security_check = true;
		} else {
			return false;
		}

		// verified to save options, continue saving
		foreach ( $this->parts as $part ) {
			$part->security_check = $this->security_check;
			if ( is_a( $part, 'sm_option' ) ) {
				$updated = $part->update_option();
			} else {
				$updated = $part->save_options();
			}
			if ( $updated ) {
				$any_updated = true;
			}
		}
		if ( defined( 'SM_SITEOP_DEBUG' ) && SM_SITEOP_DEBUG ) {
			dbug( "Save Options ($this->id): " . var_export( $updated, true ) );
		}
		if ( $any_updated ) {
			$this->notifications['update'] = '<div class="notice notice-success"><p>' .
			                                 __('All options saved successfully!', 'sm-options' ) .
			                                 '</p></div>';
		}

		return $any_updated;
	}

	public function echo_notifications() {
		do_action( 'sm_after_option_save', $this );
		if ( defined( 'SM_SITEOP_DEBUG' ) && SM_SITEOP_DEBUG ) {
			dbug( $this->notifications );
		}
		foreach ( $this->notifications as $notify_html ) {
			echo $notify_html;
		}
	}

}


class sm_options_page extends sm_options_container {
	// property declaration
	public $page_title;
	public $menu_title;
	public $libraries;
	public $icon;
	public $disable_styles;
	public $theme_page;
	public $network_page;

	// method declaration
	public function __construct( $args = array() ) {
		$defaults = array(
			'parts'          => array(),
			'parent_id'      => 'options-general.php',
			'page_title'     => 'Custom Site Options',
			'menu_title'     => 'Custom Site Options',
			'capability'     => 'manage_options',
			'id'             => 'custom-site-options',
			'icon'           => 'icon-options-general',
			'libraries'      => array(),
			'disable_styles' => false,
			'theme_page'     => false,
			'network_page'   => false
		);
		$args     = array_merge( $defaults, $args );
		parent::__construct( $args['id'] );
		foreach ( $args as $name => $value ) {
			$this->$name = $value;
		}
	}

	public function build() {

		// Load build_page() function in WordPress Network Admin and Single Site
		if ( $this->network_page ) {
			add_action( 'network_admin_menu', array( $this, 'build_page' ) );
		} else {
			add_action( 'admin_menu', array( $this, 'build_page' ) );
		}

		// Enqueue WP Media Uploader Scripts
		add_action( 'admin_print_scripts', array( $this, 'media_upload_scripts' ) );

		// Enqueue WP Media Uploader CSS
		add_action( 'admin_print_styles', array( $this, 'media_upload_styles' ) );

		// Run Save Options
		// TODO - add if statement to determine if media uploader scripts should be enqueued or not
		if ( isset( $_POST['submit'] ) && $_POST['submit'] ) {
			add_action( 'admin_init', array( $this, 'save_options' ) );
		}
	}

	// Register Page with WordPress
	public function build_page() {
		if ( $this->theme_page ) {
			add_theme_page(
				$this->page_title,
				$this->menu_title,
				$this->capability,
				$this->id, array(
					$this,
					'build_parts'
		        )
			);
		} else {
			add_submenu_page(
				$this->parent_id,
				$this->page_title,
				$this->menu_title,
				$this->capability,
				$this->id,
				array(
					$this,
					'build_parts'
				)
			);
		}
	}

	public function build_parts() {
		echo '<div id="smSiteOptions">';

		if ( ! $this->disable_styles ) {
			$this->inline_styles();
		}

		// build the header
		echo '<div class="wrap">';
			echo '<header>';
				echo '<h2></h2>'; // needed for notices to work, relocated below
			echo '</header>';
			echo '<form method="post" class="pure-form"
				  onReset="return confirm(\'Reset ALL site options? (Save still required)\')">';

					if ( isset( $_POST['submit'] ) && $_POST['submit'] ) {
						$this->echo_notifications();
					}
					echo '<div id="smOptionsContent" class="pure-g">';

					// build the navigation menu if turned on for this page object
					// @TODO - convert if statement and its dependencies to allow javascript navigation to be disabled using libraries array
					if ( true ) {
						ob_start(); ?>
						<div class="sm-loader-wrapper">
							<div class="loader-inner ball-clip-rotate-multiple">
								<div></div>
								<div></div>
							</div>
						</div>
						<div id="smOptionsNav" class="pure-u-1 pure-u-md-6-24">
						<!-- BEGIN MENU -->
						<div class="pure-menu sm-options-menu">
							<span class="pure-menu-heading"><?php echo $this->page_title; ?></span>
						<p class="submit" style="margin: 5px 20px;"><input type="submit" value="Save" class="button-primary"
						name="submit" style="margin-right:10px;"><input type="reset" value="Reset" class="button-secondary"
						name="reset"></p>
						<ul class="pure-menu-list"><?php
							echo ob_get_clean();
							foreach ( $this->parts as $key => $part ) {
								dbug( $part );
								if ( ( ( intval( $key ) + 1 ) % 2 ) == 0 ) {
									$part->classes[] = 'even';
								}
								echo '<li id="' . $part->id . '-nav" class="pure-menu-item"><a href="#' . $part->id .
								     '" class="pure-menu-link">' . $part->title . '</a></li>';
							}
						echo '</ul>';
						echo '</div>';
						// END MENU
						echo wp_nonce_field( $this->id, '_wpnonce', true, false );
						echo '</div>';
					}
					echo '<div id="smOptions" class="pure-u-1 pure-u-md-18-24">';
					echo '<ul id="smOptNavUl" style="list-style: none;">';
					// build the content parts
					foreach ( $this->parts as $key => $part ) {
						if ( defined( 'SM_SITEOP_DEBUG' ) && SM_SITEOP_DEBUG ) {
							echo $part->id . '[$part->echo_html()]->[' . __CLASS__ . '->echo_html()]<br />';
						}
						$part->echo_html();
					}
					echo '<li></ul></div>';
					echo '<div class="clear"></div></div>';// end of #smOptionsContent
				echo '</div>';// end of #smSiteOptions;
			echo '</form>'; // end form
		echo '</div>'; // end .wrap
	}

	public function inline_styles() {

		ob_start();
		?>
		<style>
		/*!
		Pure Base v0.6.0
		Copyright 2014 Yahoo! Inc. All rights reserved.
		Licensed under the BSD License.
		https://github.com/yahoo/pure/blob/master/LICENSE.md
		normalize.css v^3.0 | MIT License | git.io/normalize
		Copyright (c) Nicolas Gallagher and Jonathan Neal
		*/
		html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background-color:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:700}dfn{font-style:italic}h1{font-size:2em;margin:.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{-moz-box-sizing:content-box;box-sizing:content-box;height:0}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type=button],input[type=reset],input[type=submit]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type=checkbox],input[type=radio]{box-sizing:border-box;padding:0}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}input[type=search]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend{border:0;padding:0}textarea{overflow:auto}optgroup{font-weight:700}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}.hidden,[hidden]{display:none!important}.pure-img{max-width:100%;height:auto;display:block}.pure-g{letter-spacing:-.31em;*letter-spacing:normal;*word-spacing:-.43em;text-rendering:optimizespeed;font-family:FreeSans,Arimo,"Droid Sans",Helvetica,Arial,sans-serif;display:-webkit-flex;-webkit-flex-flow:row wrap;display:-ms-flexbox;-ms-flex-flow:row wrap;-ms-align-content:flex-start;-webkit-align-content:flex-start;align-content:flex-start}.opera-only :-o-prefocus,.pure-g{word-spacing:-.43em}.pure-u{display:inline-block;*display:inline;zoom:1;letter-spacing:normal;word-spacing:normal;vertical-align:top;text-rendering:auto}.pure-g [class *="pure-u"]{font-family:sans-serif}.pure-u-1,.pure-u-1-1,.pure-u-1-2,.pure-u-1-3,.pure-u-2-3,.pure-u-1-4,.pure-u-3-4,.pure-u-1-5,.pure-u-2-5,.pure-u-3-5,.pure-u-4-5,.pure-u-5-5,.pure-u-1-6,.pure-u-5-6,.pure-u-1-8,.pure-u-3-8,.pure-u-5-8,.pure-u-7-8,.pure-u-1-12,.pure-u-5-12,.pure-u-7-12,.pure-u-11-12,.pure-u-1-24,.pure-u-2-24,.pure-u-3-24,.pure-u-4-24,.pure-u-5-24,.pure-u-6-24,.pure-u-7-24,.pure-u-8-24,.pure-u-9-24,.pure-u-10-24,.pure-u-11-24,.pure-u-12-24,.pure-u-13-24,.pure-u-14-24,.pure-u-15-24,.pure-u-16-24,.pure-u-17-24,.pure-u-18-24,.pure-u-19-24,.pure-u-20-24,.pure-u-21-24,.pure-u-22-24,.pure-u-23-24,.pure-u-24-24{display:inline-block;*display:inline;zoom:1;letter-spacing:normal;word-spacing:normal;vertical-align:top;text-rendering:auto}.pure-u-1-24{width:4.1667%;*width:4.1357%}.pure-u-1-12,.pure-u-2-24{width:8.3333%;*width:8.3023%}.pure-u-1-8,.pure-u-3-24{width:12.5%;*width:12.469%}.pure-u-1-6,.pure-u-4-24{width:16.6667%;*width:16.6357%}.pure-u-1-5{width:20%;*width:19.969%}.pure-u-5-24{width:20.8333%;*width:20.8023%}.pure-u-1-4,.pure-u-6-24{width:25%;*width:24.969%}.pure-u-7-24{width:29.1667%;*width:29.1357%}.pure-u-1-3,.pure-u-8-24{width:33.3333%;*width:33.3023%}.pure-u-3-8,.pure-u-9-24{width:37.5%;*width:37.469%}.pure-u-2-5{width:40%;*width:39.969%}.pure-u-5-12,.pure-u-10-24{width:41.6667%;*width:41.6357%}.pure-u-11-24{width:45.8333%;*width:45.8023%}.pure-u-1-2,.pure-u-12-24{width:50%;*width:49.969%}.pure-u-13-24{width:54.1667%;*width:54.1357%}.pure-u-7-12,.pure-u-14-24{width:58.3333%;*width:58.3023%}.pure-u-3-5{width:60%;*width:59.969%}.pure-u-5-8,.pure-u-15-24{width:62.5%;*width:62.469%}.pure-u-2-3,.pure-u-16-24{width:66.6667%;*width:66.6357%}.pure-u-17-24{width:70.8333%;*width:70.8023%}.pure-u-3-4,.pure-u-18-24{width:75%;*width:74.969%}.pure-u-19-24{width:79.1667%;*width:79.1357%}.pure-u-4-5{width:80%;*width:79.969%}.pure-u-5-6,.pure-u-20-24{width:83.3333%;*width:83.3023%}.pure-u-7-8,.pure-u-21-24{width:87.5%;*width:87.469%}.pure-u-11-12,.pure-u-22-24{width:91.6667%;*width:91.6357%}.pure-u-23-24{width:95.8333%;*width:95.8023%}.pure-u-1,.pure-u-1-1,.pure-u-5-5,.pure-u-24-24{width:100%}.pure-button{display:inline-block;zoom:1;line-height:normal;white-space:nowrap;vertical-align:middle;text-align:center;cursor:pointer;-webkit-user-drag:none;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.pure-button::-moz-focus-inner{padding:0;border:0}.pure-button{font-family:inherit;font-size:100%;padding:.5em 1em;color:#444;color:rgba(0,0,0,.8);border:1px solid #999;border:0 rgba(0,0,0,0);background-color:#E6E6E6;text-decoration:none;border-radius:2px}.pure-button-hover,.pure-button:hover,.pure-button:focus{filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#1a000000', GradientType=0);background-image:-webkit-gradient(linear,0 0,0 100%,from(transparent),color-stop(40%,rgba(0,0,0,.05)),to(rgba(0,0,0,.1)));background-image:-webkit-linear-gradient(transparent,rgba(0,0,0,.05) 40%,rgba(0,0,0,.1));background-image:-moz-linear-gradient(top,rgba(0,0,0,.05) 0,rgba(0,0,0,.1));background-image:-o-linear-gradient(transparent,rgba(0,0,0,.05) 40%,rgba(0,0,0,.1));background-image:linear-gradient(transparent,rgba(0,0,0,.05) 40%,rgba(0,0,0,.1))}.pure-button:focus{outline:0}.pure-button-active,.pure-button:active{box-shadow:0 0 0 1px rgba(0,0,0,.15) inset,0 0 6px rgba(0,0,0,.2) inset;border-color:#000\9}.pure-button[disabled],.pure-button-disabled,.pure-button-disabled:hover,.pure-button-disabled:focus,.pure-button-disabled:active{border:0;background-image:none;filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);filter:alpha(opacity=40);-khtml-opacity:.4;-moz-opacity:.4;opacity:.4;cursor:not-allowed;box-shadow:none}.pure-button-hidden{display:none}.pure-button::-moz-focus-inner{padding:0;border:0}.pure-button-primary,.pure-button-selected,a.pure-button-primary,a.pure-button-selected{background-color:#0078e7;color:#fff}.pure-form input[type=text],.pure-form input[type=password],.pure-form input[type=email],.pure-form input[type=url],.pure-form input[type=date],.pure-form input[type=month],.pure-form input[type=time],.pure-form input[type=datetime],.pure-form input[type=datetime-local],.pure-form input[type=week],.pure-form input[type=number],.pure-form input[type=search],.pure-form input[type=tel],.pure-form input[type=color],.pure-form select,.pure-form textarea{padding:.5em .6em;display:inline-block;border:1px solid #ccc;box-shadow:inset 0 1px 3px #ddd;border-radius:4px;vertical-align:middle;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.pure-form input:not([type]){padding:.5em .6em;display:inline-block;border:1px solid #ccc;box-shadow:inset 0 1px 3px #ddd;border-radius:4px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.pure-form input[type=color]{padding:.2em .5em}.pure-form input[type=text]:focus,.pure-form input[type=password]:focus,.pure-form input[type=email]:focus,.pure-form input[type=url]:focus,.pure-form input[type=date]:focus,.pure-form input[type=month]:focus,.pure-form input[type=time]:focus,.pure-form input[type=datetime]:focus,.pure-form input[type=datetime-local]:focus,.pure-form input[type=week]:focus,.pure-form input[type=number]:focus,.pure-form input[type=search]:focus,.pure-form input[type=tel]:focus,.pure-form input[type=color]:focus,.pure-form select:focus,.pure-form textarea:focus{outline:0;border-color:#129FEA}.pure-form input:not([type]):focus{outline:0;border-color:#129FEA}.pure-form input[type=file]:focus,.pure-form input[type=radio]:focus,.pure-form input[type=checkbox]:focus{outline:thin solid #129FEA;outline:1px auto #129FEA}.pure-form .pure-checkbox,.pure-form .pure-radio{margin:.5em 0;display:block}.pure-form input[type=text][disabled],.pure-form input[type=password][disabled],.pure-form input[type=email][disabled],.pure-form input[type=url][disabled],.pure-form input[type=date][disabled],.pure-form input[type=month][disabled],.pure-form input[type=time][disabled],.pure-form input[type=datetime][disabled],.pure-form input[type=datetime-local][disabled],.pure-form input[type=week][disabled],.pure-form input[type=number][disabled],.pure-form input[type=search][disabled],.pure-form input[type=tel][disabled],.pure-form input[type=color][disabled],.pure-form select[disabled],.pure-form textarea[disabled]{cursor:not-allowed;background-color:#eaeded;color:#cad2d3}.pure-form input:not([type])[disabled]{cursor:not-allowed;background-color:#eaeded;color:#cad2d3}.pure-form input[readonly],.pure-form select[readonly],.pure-form textarea[readonly]{background-color:#eee;color:#777;border-color:#ccc}.pure-form input:focus:invalid,.pure-form textarea:focus:invalid,.pure-form select:focus:invalid{color:#b94a48;border-color:#e9322d}.pure-form input[type=file]:focus:invalid:focus,.pure-form input[type=radio]:focus:invalid:focus,.pure-form input[type=checkbox]:focus:invalid:focus{outline-color:#e9322d}.pure-form select{height:2.25em;border:1px solid #ccc;background-color:#fff}.pure-form select[multiple]{height:auto}.pure-form label{margin:.5em 0 .2em}.pure-form fieldset{margin:0;padding:.35em 0 .75em;border:0}.pure-form legend{display:block;width:100%;padding:.3em 0;margin-bottom:.3em;color:#333;border-bottom:1px solid #e5e5e5}.pure-form-stacked input[type=text],.pure-form-stacked input[type=password],.pure-form-stacked input[type=email],.pure-form-stacked input[type=url],.pure-form-stacked input[type=date],.pure-form-stacked input[type=month],.pure-form-stacked input[type=time],.pure-form-stacked input[type=datetime],.pure-form-stacked input[type=datetime-local],.pure-form-stacked input[type=week],.pure-form-stacked input[type=number],.pure-form-stacked input[type=search],.pure-form-stacked input[type=tel],.pure-form-stacked input[type=color],.pure-form-stacked input[type=file],.pure-form-stacked select,.pure-form-stacked label,.pure-form-stacked textarea{display:block;margin:.25em 0}.pure-form-stacked input:not([type]){display:block;margin:.25em 0}.pure-form-aligned input,.pure-form-aligned textarea,.pure-form-aligned select,.pure-form-aligned .pure-help-inline,.pure-form-message-inline{display:inline-block;*display:inline;*zoom:1;vertical-align:middle}.pure-form-aligned textarea{vertical-align:top}.pure-form-aligned .pure-control-group{margin-bottom:.5em}.pure-form-aligned .pure-control-group label{text-align:right;display:inline-block;vertical-align:middle;width:10em;margin:0 1em 0 0}.pure-form-aligned .pure-controls{margin:1.5em 0 0 11em}.pure-form input.pure-input-rounded,.pure-form .pure-input-rounded{border-radius:2em;padding:.5em 1em}.pure-form .pure-group fieldset{margin-bottom:10px}.pure-form .pure-group input,.pure-form .pure-group textarea{display:block;padding:10px;margin:0 0 -1px;border-radius:0;position:relative;top:-1px}.pure-form .pure-group input:focus,.pure-form .pure-group textarea:focus{z-index:3}.pure-form .pure-group input:first-child,.pure-form .pure-group textarea:first-child{top:1px;border-radius:4px 4px 0 0;margin:0}.pure-form .pure-group input:first-child:last-child,.pure-form .pure-group textarea:first-child:last-child{top:1px;border-radius:4px;margin:0}.pure-form .pure-group input:last-child,.pure-form .pure-group textarea:last-child{top:-2px;border-radius:0 0 4px 4px;margin:0}.pure-form .pure-group button{margin:.35em 0}.pure-form .pure-input-1{width:100%}.pure-form .pure-input-2-3{width:66%}.pure-form .pure-input-1-2{width:50%}.pure-form .pure-input-1-3{width:33%}.pure-form .pure-input-1-4{width:25%}.pure-form .pure-help-inline,.pure-form-message-inline{display:inline-block;padding-left:.3em;color:#666;vertical-align:middle;font-size:.875em}.pure-form-message{display:block;color:#666;font-size:.875em}@media only screen and (max-width :480px){.pure-form button[type=submit]{margin:.7em 0 0}.pure-form input:not([type]),.pure-form input[type=text],.pure-form input[type=password],.pure-form input[type=email],.pure-form input[type=url],.pure-form input[type=date],.pure-form input[type=month],.pure-form input[type=time],.pure-form input[type=datetime],.pure-form input[type=datetime-local],.pure-form input[type=week],.pure-form input[type=number],.pure-form input[type=search],.pure-form input[type=tel],.pure-form input[type=color],.pure-form label{margin-bottom:.3em;display:block}.pure-group input:not([type]),.pure-group input[type=text],.pure-group input[type=password],.pure-group input[type=email],.pure-group input[type=url],.pure-group input[type=date],.pure-group input[type=month],.pure-group input[type=time],.pure-group input[type=datetime],.pure-group input[type=datetime-local],.pure-group input[type=week],.pure-group input[type=number],.pure-group input[type=search],.pure-group input[type=tel],.pure-group input[type=color]{margin-bottom:0}.pure-form-aligned .pure-control-group label{margin-bottom:.3em;text-align:left;display:block;width:100%}.pure-form-aligned .pure-controls{margin:1.5em 0 0}.pure-form .pure-help-inline,.pure-form-message-inline,.pure-form-message{display:block;font-size:.75em;padding:.2em 0 .8em}}.pure-menu{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.pure-menu-fixed{position:fixed;left:0;top:0;z-index:3}.pure-menu-list,.pure-menu-item{position:relative}.pure-menu-list{list-style:none;margin:0;padding:0}.pure-menu-item{padding:0;margin:0;height:100%}.pure-menu-link,.pure-menu-heading{display:block;text-decoration:none;white-space:nowrap}.pure-menu-horizontal{width:100%;white-space:nowrap}.pure-menu-horizontal .pure-menu-list{display:inline-block}.pure-menu-horizontal .pure-menu-item,.pure-menu-horizontal .pure-menu-heading,.pure-menu-horizontal .pure-menu-separator{display:inline-block;*display:inline;zoom:1;vertical-align:middle}.pure-menu-item .pure-menu-item{display:block}.pure-menu-children{display:none;position:absolute;left:100%;top:0;margin:0;padding:0;z-index:3}.pure-menu-horizontal .pure-menu-children{left:0;top:auto;width:inherit}.pure-menu-allow-hover:hover>.pure-menu-children,.pure-menu-active>.pure-menu-children{display:block;position:absolute}.pure-menu-has-children>.pure-menu-link:after{padding-left:.5em;content:"\25B8";font-size:small}.pure-menu-horizontal .pure-menu-has-children>.pure-menu-link:after{content:"\25BE"}.pure-menu-scrollable{overflow-y:scroll;overflow-x:hidden}.pure-menu-scrollable .pure-menu-list{display:block}.pure-menu-horizontal.pure-menu-scrollable .pure-menu-list{display:inline-block}.pure-menu-horizontal.pure-menu-scrollable{white-space:nowrap;overflow-y:hidden;overflow-x:auto;-ms-overflow-style:none;-webkit-overflow-scrolling:touch;padding:.5em 0}.pure-menu-horizontal.pure-menu-scrollable::-webkit-scrollbar{display:none}.pure-menu-separator{background-color:#ccc;height:1px;margin:.3em 0}.pure-menu-horizontal .pure-menu-separator{width:1px;height:1.3em;margin:0 .3em}.pure-menu-heading{text-transform:uppercase;color:#565d64}.pure-menu-link{color:#777}.pure-menu-children{background-color:#fff}.pure-menu-link,.pure-menu-disabled,.pure-menu-heading{padding:.5em 1em}.pure-menu-disabled{opacity:.5}.pure-menu-disabled .pure-menu-link:hover{background-color:transparent}.pure-menu-active>.pure-menu-link,.pure-menu-link:hover,.pure-menu-link:focus{background-color:#eee}.pure-menu-selected .pure-menu-link,.pure-menu-selected .pure-menu-link:visited{color:#000}.pure-table{border-collapse:collapse;border-spacing:0;empty-cells:show;border:1px solid #cbcbcb}.pure-table caption{color:#000;font:italic 85%/1 arial,sans-serif;padding:1em 0;text-align:center}.pure-table td,.pure-table th{border-left:1px solid #cbcbcb;border-width:0 0 0 1px;font-size:inherit;margin:0;overflow:visible;padding:.5em 1em}.pure-table td:first-child,.pure-table th:first-child{border-left-width:0}.pure-table thead{background-color:#e0e0e0;color:#000;text-align:left;vertical-align:bottom}.pure-table td{background-color:transparent}.pure-table-odd td{background-color:#f2f2f2}.pure-table-striped tr:nth-child(2n-1) td{background-color:#f2f2f2}.pure-table-bordered td{border-bottom:1px solid #cbcbcb}.pure-table-bordered tbody>tr:last-child>td{border-bottom-width:0}.pure-table-horizontal td,.pure-table-horizontal th{border-width:0 0 1px;border-bottom:1px solid #cbcbcb}.pure-table-horizontal tbody>tr:last-child>td{border-bottom-width:0}

		/*!
		Pure Responsive Grids v0.6.0
		Copyright 2014 Yahoo! Inc. All rights reserved.
		Licensed under the BSD License.
		https://github.com/yahoo/pure/blob/master/LICENSE.md
		*/
		@media screen and (min-width:35.5em){.pure-u-sm-1,.pure-u-sm-1-1,.pure-u-sm-1-2,.pure-u-sm-1-3,.pure-u-sm-2-3,.pure-u-sm-1-4,.pure-u-sm-3-4,.pure-u-sm-1-5,.pure-u-sm-2-5,.pure-u-sm-3-5,.pure-u-sm-4-5,.pure-u-sm-5-5,.pure-u-sm-1-6,.pure-u-sm-5-6,.pure-u-sm-1-8,.pure-u-sm-3-8,.pure-u-sm-5-8,.pure-u-sm-7-8,.pure-u-sm-1-12,.pure-u-sm-5-12,.pure-u-sm-7-12,.pure-u-sm-11-12,.pure-u-sm-1-24,.pure-u-sm-2-24,.pure-u-sm-3-24,.pure-u-sm-4-24,.pure-u-sm-5-24,.pure-u-sm-6-24,.pure-u-sm-7-24,.pure-u-sm-8-24,.pure-u-sm-9-24,.pure-u-sm-10-24,.pure-u-sm-11-24,.pure-u-sm-12-24,.pure-u-sm-13-24,.pure-u-sm-14-24,.pure-u-sm-15-24,.pure-u-sm-16-24,.pure-u-sm-17-24,.pure-u-sm-18-24,.pure-u-sm-19-24,.pure-u-sm-20-24,.pure-u-sm-21-24,.pure-u-sm-22-24,.pure-u-sm-23-24,.pure-u-sm-24-24{display:inline-block;*display:inline;zoom:1;letter-spacing:normal;word-spacing:normal;vertical-align:top;text-rendering:auto}.pure-u-sm-1-24{width:4.1667%;*width:4.1357%}.pure-u-sm-1-12,.pure-u-sm-2-24{width:8.3333%;*width:8.3023%}.pure-u-sm-1-8,.pure-u-sm-3-24{width:12.5%;*width:12.469%}.pure-u-sm-1-6,.pure-u-sm-4-24{width:16.6667%;*width:16.6357%}.pure-u-sm-1-5{width:20%;*width:19.969%}.pure-u-sm-5-24{width:20.8333%;*width:20.8023%}.pure-u-sm-1-4,.pure-u-sm-6-24{width:25%;*width:24.969%}.pure-u-sm-7-24{width:29.1667%;*width:29.1357%}.pure-u-sm-1-3,.pure-u-sm-8-24{width:33.3333%;*width:33.3023%}.pure-u-sm-3-8,.pure-u-sm-9-24{width:37.5%;*width:37.469%}.pure-u-sm-2-5{width:40%;*width:39.969%}.pure-u-sm-5-12,.pure-u-sm-10-24{width:41.6667%;*width:41.6357%}.pure-u-sm-11-24{width:45.8333%;*width:45.8023%}.pure-u-sm-1-2,.pure-u-sm-12-24{width:50%;*width:49.969%}.pure-u-sm-13-24{width:54.1667%;*width:54.1357%}.pure-u-sm-7-12,.pure-u-sm-14-24{width:58.3333%;*width:58.3023%}.pure-u-sm-3-5{width:60%;*width:59.969%}.pure-u-sm-5-8,.pure-u-sm-15-24{width:62.5%;*width:62.469%}.pure-u-sm-2-3,.pure-u-sm-16-24{width:66.6667%;*width:66.6357%}.pure-u-sm-17-24{width:70.8333%;*width:70.8023%}.pure-u-sm-3-4,.pure-u-sm-18-24{width:75%;*width:74.969%}.pure-u-sm-19-24{width:79.1667%;*width:79.1357%}.pure-u-sm-4-5{width:80%;*width:79.969%}.pure-u-sm-5-6,.pure-u-sm-20-24{width:83.3333%;*width:83.3023%}.pure-u-sm-7-8,.pure-u-sm-21-24{width:87.5%;*width:87.469%}.pure-u-sm-11-12,.pure-u-sm-22-24{width:91.6667%;*width:91.6357%}.pure-u-sm-23-24{width:95.8333%;*width:95.8023%}.pure-u-sm-1,.pure-u-sm-1-1,.pure-u-sm-5-5,.pure-u-sm-24-24{width:100%}}@media screen and (min-width:48em){.pure-u-md-1,.pure-u-md-1-1,.pure-u-md-1-2,.pure-u-md-1-3,.pure-u-md-2-3,.pure-u-md-1-4,.pure-u-md-3-4,.pure-u-md-1-5,.pure-u-md-2-5,.pure-u-md-3-5,.pure-u-md-4-5,.pure-u-md-5-5,.pure-u-md-1-6,.pure-u-md-5-6,.pure-u-md-1-8,.pure-u-md-3-8,.pure-u-md-5-8,.pure-u-md-7-8,.pure-u-md-1-12,.pure-u-md-5-12,.pure-u-md-7-12,.pure-u-md-11-12,.pure-u-md-1-24,.pure-u-md-2-24,.pure-u-md-3-24,.pure-u-md-4-24,.pure-u-md-5-24,.pure-u-md-6-24,.pure-u-md-7-24,.pure-u-md-8-24,.pure-u-md-9-24,.pure-u-md-10-24,.pure-u-md-11-24,.pure-u-md-12-24,.pure-u-md-13-24,.pure-u-md-14-24,.pure-u-md-15-24,.pure-u-md-16-24,.pure-u-md-17-24,.pure-u-md-18-24,.pure-u-md-19-24,.pure-u-md-20-24,.pure-u-md-21-24,.pure-u-md-22-24,.pure-u-md-23-24,.pure-u-md-24-24{display:inline-block;*display:inline;zoom:1;letter-spacing:normal;word-spacing:normal;vertical-align:top;text-rendering:auto}.pure-u-md-1-24{width:4.1667%;*width:4.1357%}.pure-u-md-1-12,.pure-u-md-2-24{width:8.3333%;*width:8.3023%}.pure-u-md-1-8,.pure-u-md-3-24{width:12.5%;*width:12.469%}.pure-u-md-1-6,.pure-u-md-4-24{width:16.6667%;*width:16.6357%}.pure-u-md-1-5{width:20%;*width:19.969%}.pure-u-md-5-24{width:20.8333%;*width:20.8023%}.pure-u-md-1-4,.pure-u-md-6-24{width:25%;*width:24.969%}.pure-u-md-7-24{width:29.1667%;*width:29.1357%}.pure-u-md-1-3,.pure-u-md-8-24{width:33.3333%;*width:33.3023%}.pure-u-md-3-8,.pure-u-md-9-24{width:37.5%;*width:37.469%}.pure-u-md-2-5{width:40%;*width:39.969%}.pure-u-md-5-12,.pure-u-md-10-24{width:41.6667%;*width:41.6357%}.pure-u-md-11-24{width:45.8333%;*width:45.8023%}.pure-u-md-1-2,.pure-u-md-12-24{width:50%;*width:49.969%}.pure-u-md-13-24{width:54.1667%;*width:54.1357%}.pure-u-md-7-12,.pure-u-md-14-24{width:58.3333%;*width:58.3023%}.pure-u-md-3-5{width:60%;*width:59.969%}.pure-u-md-5-8,.pure-u-md-15-24{width:62.5%;*width:62.469%}.pure-u-md-2-3,.pure-u-md-16-24{width:66.6667%;*width:66.6357%}.pure-u-md-17-24{width:70.8333%;*width:70.8023%}.pure-u-md-3-4,.pure-u-md-18-24{width:75%;*width:74.969%}.pure-u-md-19-24{width:79.1667%;*width:79.1357%}.pure-u-md-4-5{width:80%;*width:79.969%}.pure-u-md-5-6,.pure-u-md-20-24{width:83.3333%;*width:83.3023%}.pure-u-md-7-8,.pure-u-md-21-24{width:87.5%;*width:87.469%}.pure-u-md-11-12,.pure-u-md-22-24{width:91.6667%;*width:91.6357%}.pure-u-md-23-24{width:95.8333%;*width:95.8023%}.pure-u-md-1,.pure-u-md-1-1,.pure-u-md-5-5,.pure-u-md-24-24{width:100%}}@media screen and (min-width:64em){.pure-u-lg-1,.pure-u-lg-1-1,.pure-u-lg-1-2,.pure-u-lg-1-3,.pure-u-lg-2-3,.pure-u-lg-1-4,.pure-u-lg-3-4,.pure-u-lg-1-5,.pure-u-lg-2-5,.pure-u-lg-3-5,.pure-u-lg-4-5,.pure-u-lg-5-5,.pure-u-lg-1-6,.pure-u-lg-5-6,.pure-u-lg-1-8,.pure-u-lg-3-8,.pure-u-lg-5-8,.pure-u-lg-7-8,.pure-u-lg-1-12,.pure-u-lg-5-12,.pure-u-lg-7-12,.pure-u-lg-11-12,.pure-u-lg-1-24,.pure-u-lg-2-24,.pure-u-lg-3-24,.pure-u-lg-4-24,.pure-u-lg-5-24,.pure-u-lg-6-24,.pure-u-lg-7-24,.pure-u-lg-8-24,.pure-u-lg-9-24,.pure-u-lg-10-24,.pure-u-lg-11-24,.pure-u-lg-12-24,.pure-u-lg-13-24,.pure-u-lg-14-24,.pure-u-lg-15-24,.pure-u-lg-16-24,.pure-u-lg-17-24,.pure-u-lg-18-24,.pure-u-lg-19-24,.pure-u-lg-20-24,.pure-u-lg-21-24,.pure-u-lg-22-24,.pure-u-lg-23-24,.pure-u-lg-24-24{display:inline-block;*display:inline;zoom:1;letter-spacing:normal;word-spacing:normal;vertical-align:top;text-rendering:auto}.pure-u-lg-1-24{width:4.1667%;*width:4.1357%}.pure-u-lg-1-12,.pure-u-lg-2-24{width:8.3333%;*width:8.3023%}.pure-u-lg-1-8,.pure-u-lg-3-24{width:12.5%;*width:12.469%}.pure-u-lg-1-6,.pure-u-lg-4-24{width:16.6667%;*width:16.6357%}.pure-u-lg-1-5{width:20%;*width:19.969%}.pure-u-lg-5-24{width:20.8333%;*width:20.8023%}.pure-u-lg-1-4,.pure-u-lg-6-24{width:25%;*width:24.969%}.pure-u-lg-7-24{width:29.1667%;*width:29.1357%}.pure-u-lg-1-3,.pure-u-lg-8-24{width:33.3333%;*width:33.3023%}.pure-u-lg-3-8,.pure-u-lg-9-24{width:37.5%;*width:37.469%}.pure-u-lg-2-5{width:40%;*width:39.969%}.pure-u-lg-5-12,.pure-u-lg-10-24{width:41.6667%;*width:41.6357%}.pure-u-lg-11-24{width:45.8333%;*width:45.8023%}.pure-u-lg-1-2,.pure-u-lg-12-24{width:50%;*width:49.969%}.pure-u-lg-13-24{width:54.1667%;*width:54.1357%}.pure-u-lg-7-12,.pure-u-lg-14-24{width:58.3333%;*width:58.3023%}.pure-u-lg-3-5{width:60%;*width:59.969%}.pure-u-lg-5-8,.pure-u-lg-15-24{width:62.5%;*width:62.469%}.pure-u-lg-2-3,.pure-u-lg-16-24{width:66.6667%;*width:66.6357%}.pure-u-lg-17-24{width:70.8333%;*width:70.8023%}.pure-u-lg-3-4,.pure-u-lg-18-24{width:75%;*width:74.969%}.pure-u-lg-19-24{width:79.1667%;*width:79.1357%}.pure-u-lg-4-5{width:80%;*width:79.969%}.pure-u-lg-5-6,.pure-u-lg-20-24{width:83.3333%;*width:83.3023%}.pure-u-lg-7-8,.pure-u-lg-21-24{width:87.5%;*width:87.469%}.pure-u-lg-11-12,.pure-u-lg-22-24{width:91.6667%;*width:91.6357%}.pure-u-lg-23-24{width:95.8333%;*width:95.8023%}.pure-u-lg-1,.pure-u-lg-1-1,.pure-u-lg-5-5,.pure-u-lg-24-24{width:100%}}@media screen and (min-width:80em){.pure-u-xl-1,.pure-u-xl-1-1,.pure-u-xl-1-2,.pure-u-xl-1-3,.pure-u-xl-2-3,.pure-u-xl-1-4,.pure-u-xl-3-4,.pure-u-xl-1-5,.pure-u-xl-2-5,.pure-u-xl-3-5,.pure-u-xl-4-5,.pure-u-xl-5-5,.pure-u-xl-1-6,.pure-u-xl-5-6,.pure-u-xl-1-8,.pure-u-xl-3-8,.pure-u-xl-5-8,.pure-u-xl-7-8,.pure-u-xl-1-12,.pure-u-xl-5-12,.pure-u-xl-7-12,.pure-u-xl-11-12,.pure-u-xl-1-24,.pure-u-xl-2-24,.pure-u-xl-3-24,.pure-u-xl-4-24,.pure-u-xl-5-24,.pure-u-xl-6-24,.pure-u-xl-7-24,.pure-u-xl-8-24,.pure-u-xl-9-24,.pure-u-xl-10-24,.pure-u-xl-11-24,.pure-u-xl-12-24,.pure-u-xl-13-24,.pure-u-xl-14-24,.pure-u-xl-15-24,.pure-u-xl-16-24,.pure-u-xl-17-24,.pure-u-xl-18-24,.pure-u-xl-19-24,.pure-u-xl-20-24,.pure-u-xl-21-24,.pure-u-xl-22-24,.pure-u-xl-23-24,.pure-u-xl-24-24{display:inline-block;*display:inline;zoom:1;letter-spacing:normal;word-spacing:normal;vertical-align:top;text-rendering:auto}.pure-u-xl-1-24{width:4.1667%;*width:4.1357%}.pure-u-xl-1-12,.pure-u-xl-2-24{width:8.3333%;*width:8.3023%}.pure-u-xl-1-8,.pure-u-xl-3-24{width:12.5%;*width:12.469%}.pure-u-xl-1-6,.pure-u-xl-4-24{width:16.6667%;*width:16.6357%}.pure-u-xl-1-5{width:20%;*width:19.969%}.pure-u-xl-5-24{width:20.8333%;*width:20.8023%}.pure-u-xl-1-4,.pure-u-xl-6-24{width:25%;*width:24.969%}.pure-u-xl-7-24{width:29.1667%;*width:29.1357%}.pure-u-xl-1-3,.pure-u-xl-8-24{width:33.3333%;*width:33.3023%}.pure-u-xl-3-8,.pure-u-xl-9-24{width:37.5%;*width:37.469%}.pure-u-xl-2-5{width:40%;*width:39.969%}.pure-u-xl-5-12,.pure-u-xl-10-24{width:41.6667%;*width:41.6357%}.pure-u-xl-11-24{width:45.8333%;*width:45.8023%}.pure-u-xl-1-2,.pure-u-xl-12-24{width:50%;*width:49.969%}.pure-u-xl-13-24{width:54.1667%;*width:54.1357%}.pure-u-xl-7-12,.pure-u-xl-14-24{width:58.3333%;*width:58.3023%}.pure-u-xl-3-5{width:60%;*width:59.969%}.pure-u-xl-5-8,.pure-u-xl-15-24{width:62.5%;*width:62.469%}.pure-u-xl-2-3,.pure-u-xl-16-24{width:66.6667%;*width:66.6357%}.pure-u-xl-17-24{width:70.8333%;*width:70.8023%}.pure-u-xl-3-4,.pure-u-xl-18-24{width:75%;*width:74.969%}.pure-u-xl-19-24{width:79.1667%;*width:79.1357%}.pure-u-xl-4-5{width:80%;*width:79.969%}.pure-u-xl-5-6,.pure-u-xl-20-24{width:83.3333%;*width:83.3023%}.pure-u-xl-7-8,.pure-u-xl-21-24{width:87.5%;*width:87.469%}.pure-u-xl-11-12,.pure-u-xl-22-24{width:91.6667%;*width:91.6357%}.pure-u-xl-23-24{width:95.8333%;*width:95.8023%}.pure-u-xl-1,.pure-u-xl-1-1,.pure-u-xl-5-5,.pure-u-xl-24-24{width:100%}}

		/* SM Options Pure CSS3 ON / OFF
		 *
		 * Generated by David Ryan
		 * @see https://proto.io/freebies/onoff
		 */
		.onOffSwitch{position:relative;width:100px;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;margin-left:auto;margin-right:12px}input[type=checkbox].onOffSwitch-checkbox{display:none}.onOffSwitch-label{display:block;overflow:hidden;cursor:pointer;border:2px solid #EEE;border-radius:20px}.onOffSwitch-inner{display:block;width:200%;margin-left:-100%;transition:margin .4s cubic-bezier(1,0,0,1) 0s}.onOffSwitch-inner:after,.onOffSwitch-inner:before{display:block;float:left;width:50%;height:30px;padding:0;line-height:30px;font-size:17px;font-family:Trebuchet,Arial,sans-serif;font-weight:700;box-sizing:border-box}.onOffSwitch-inner:before{content:"ON";padding-left:10px;background-color:#21759B;color:#FFF}.onOffSwitch-inner:after{content:"OFF";padding-right:10px;background-color:#EEE;color:#BCBCBC;text-align:right}.onOffSwitch-switch{display:block;width:18px;margin:6px;background:#BCBCBC;position:absolute;top:0;bottom:0;right:66px;border:2px solid #EEE;border-radius:20px;transition:all .4s cubic-bezier(1,0,0,1) 0s}.onOffSwitch-checkbox:checked+.onOffSwitch-label .onOffSwitch-inner{margin-left:0}.onOffSwitch-checkbox:checked+.onOffSwitch-label .onOffSwitch-switch{right:0;background-color:#D54E21}

		/* SM Save Indicator
		 *
		 * @see https://github.com/ConnorAtherton/loaders.css/blob/master/demo/demo.html#L54
		 */
		.sm-loader-wrapper{position:fixed;top:45%;right:45%;z-index:99999;display:none}
		.ball-clip-rotate-multiple{position:relative}.ball-clip-rotate-multiple>div{position:absolute;left:-20px;
			                                             top:-20px;border:3px solid #cd1713;border-bottom-color:transparent;border-top-color:transparent;border-radius:100%;height:35px;width:35px;-webkit-animation:rotate .99s 0s ease-in-out infinite;animation:rotate 1s 0s ease-in-out infinite}.ball-clip-rotate-multiple>div:last-child{display:inline-block;top:-10px;left:-10px;width:15px;height:15px;-webkit-animation-duration:.33s;animation-duration:.33s;border-color:#cd1713 transparent;-webkit-animation-direction:reverse;animation-direction:reverse}@keyframes rotate{0%{-webkit-transform:rotate(0) scale(1);transform:rotate(0) scale(1)}50%{-webkit-transform:rotate(180deg) scale(.6);transform:rotate(180deg) scale(.6)}100%{-webkit-transform:rotate(360deg) scale(1);transform:rotate(360deg) scale(1)}}

			#smOptNavUl {
				margin-top: 0;
			}

			.sm-options-menu {
				margin-bottom: 8em;
			}

			#smOptionsContent {
				background: #F1F1F1;
				border: 1px solid #D8D8D8;
			}

			.pure-g [class *= "pure-u"] {
				font-family: "Open Sans", "Helvetica Neue", "Helvetica", sans-serif;
			}

			.pure-form select {
				min-width: 320px;
			}

			.selectize-control {
				max-width: 98.5%;
			}

			.pure-menu-link,
			.pure-menu-disabled,
			.pure-menu-heading {
				padding: 1.3em 2em;
			}

			.pure-menu-active>.pure-menu-link, .pure-menu-link:hover, .pure-menu-link:focus {
				background: inherit;
			}

			#smSiteOptions header {
				overflow: hidden;
			}

			#smOptionsNav p.submit input {
				width: 100%;
			}

			#smOptions {
				background: #ffffff;
			}

			.white-text a.pure-menu-link {
				color: #fff !important;
			}

			#smOptionsContent .section {
				display: none;
				width: 100%;
			}

			#smOptionsContent input[type="submit"] {
				height: 50px;
				margin-bottom: 10px;
			}

			#smOptionsContent .section.active {
				display: inline-block;
			}

			/* TODO - finish setting up javascript to detect image size and provide smaller image with preview text button
			#smOptionsContent .img-preview { max-height: 36px; overflow: hidden; padding: 12px; margin-top: -15px;  }
			#smOptionsContent .img-preview.full-preview { height: auto; overflow: visible; padding: 12px; margin-top: -15px;  }
			*/
			.clear {
				clear: both;
			}

			.section {
				padding: 0 0 5px 0;
			}

			.section h3 {
				margin: 0 0 10px;
				padding: 2vw 1.5vw;
			}

			.section h4.label {
				margin-top: 0;
				font-weight: 900;
				font-size: 110%;
			}

			.section li.sm-item {
				margin-top: 2.5em;
				margin-bottom: 2.5em;
			}

			.twothirdfat {
				width: 66.6%;
			}

			span.spacer {
				display: block;
				position: relative;
				width: 98%;
				border: 0;
				height: 0;
				border-top: 1px solid rgba(0, 0, 0, 0.1);
				border-bottom: 1px solid rgba(255, 255, 255, 0.3);			}

			.section ul {
				padding-left: 1.5vw;
			}

			li.even.option {
				background-color: #ccc;
			}

			input[disabled='disabled'] {
				background-color: #CCC;
			}

			.cb {
				float: right;
				position: relative;
				right: 20px;
			}

			.description {
				padding: 1vw .66vw;
				background: rgba(0,0,0,0.05);
				margin: 8px 20px 8px 0;
				font-weight: 300;
				font-size: 12px;
			}

			.description:after {
				display: block;
				position: relative;
				width: 98%;
				border-top: 1px solid rgba(0, 0, 0, 0.1);
				border-bottom: 1px solid rgba(255, 255, 255, 0.3);
			}

			img.active {
				border: 1px solid #da172d;
				padding: 2px !important;
				border-radius: .6em;
			}

			img.colorpicker {
				padding: 3px;
				position: relative;
				top: 6px;
			}
		</style>
		<?php
		$css = ob_get_clean();
		ob_start(); ?>
			<script>
			
			jQuery(document).ready(function () {

				// force the page not jump to the hash location on load
				jQuery('html, body').animate({scrollTop: 0});

				jQuery('.section h3').addClass('wp-ui-primary');

				jQuery('input[type="submit"]').click( function() {
					jQuery('.sm-loader-wrapper').css('display', 'inherit');
				});

				jQuery('#smOptionsNav li a').click(function ($) {
					var page_active = jQuery( ( jQuery(this).attr('href') ) ).addClass('active');
					var menu_active = jQuery( (jQuery(this).attr('href') + '-nav') ).addClass('active wp-ui-primary ' +
						'white-text');

					// add tab's location to URL but stay at the top of the page
					window.location.hash = jQuery(this).attr('href');
					window.scrollTo(0, 0);
					jQuery(page_active).siblings().removeClass('active');
					jQuery(menu_active).siblings().removeClass('active wp-ui-primary white-text');

					return false;
				});

				// load hashed section if avail, otherwise load first section
				if (hash = window.location.hash) {
					jQuery(hash + '-nav a').trigger('click');
				}
				else {
					jQuery('#smOptionsNav li:first a').trigger('click');
				}

				// prepare the media uploader tool
				storeSendToEditor = window.send_to_editor;
				newSendToEditor = function (html) {
					imgurl = jQuery('img', html).attr('src');
					jQuery("#" + uploadID.name).val(imgurl);
					tb_remove();
					window.send_to_editor = storeSendToEditor;
				};

			});

			function sm_option_media_uploader(id) {
				window.send_to_editor = newSendToEditor;
				uploadID = id;
				formfield = jQuery('.upload').attr('name');
				tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
				return false;
			}
		</script>
		<?php
		$js = ob_get_clean();
		echo PHP_EOL . $css . PHP_EOL . $js . PHP_EOL;
	}

	public function media_upload_scripts() {
		// media uploader
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_script( 'thickbox' );
		// colorpicker
		wp_enqueue_script( 'wp-color-picker' );
	}

	public function media_upload_styles() {
		// media uploader
		wp_enqueue_style( 'thickbox' );
		// colorpicker
		wp_enqueue_style( 'wp-color-picker' );
	}

} // END class sm_options_container

class sm_section extends sm_options_container {

	public $wrapper;
	public $type;
	public $classes;
	public $title;

	public function __construct( $i, $args = array() ) {
		parent::__construct( $i );
		$defaults = array(
			'wrapper' => array( '<ul>', '</ul>' ),
			'type'    => 'default',
			'classes' => array( 'section', 'active' ),
			'title'   => 'My Custom Section'
		);
		$args     = array_merge( $defaults, $args );
		foreach ( $args as $name => $value ) {
			$this->$name = $value;
		}
	}

	private function get_classes( $echo = false ) {
		$the_classes = '';
		foreach ( $this->classes as $class ) {
			if ( ! empty( $the_classes ) ) {
				$the_classes .= ' ';
			}
			$the_classes .= $class;
		}
		if ( ! empty( $the_classes ) ) {
			$the_classes = 'class="' . $the_classes . '"';
		}
		if ( $echo ) {
			echo $the_classes;
		}

		return $the_classes;
	}

	public function echo_html() {
		$option = '<li id="' . $this->id . '" ' . $this->get_classes() . '>';

		if ( ! empty( $this->title ) ) {
			$option .= "<h3 class='section-head'>$this->title</h3>";
		}

		$option .= $this->wrapper[0];

		foreach ( $this->parts as $part ) {
			if ( $appendHTML = $part->get_html() ) {
				$option .= $appendHTML;
			} else {
				echo $option;
				unset( $option );
				$part->echo_html();
				$option = '';
			}
		}

		$option .= $this->wrapper[1];
		$option .= '</li>';
		echo apply_filters( 'echo_html_option', $option );
		unset( $option );
	}
}

class sm_option {

	// property declaration
	public $id;
	public $type;
	public $label;
	public $default_value;
	public $classes;
	public $rel;
	public $atts;
	public $width;
	public $height;
	public $length;
	public $wrapper;
	public $description;


	// method declaration
	public function __construct( $i, $args = array() ) {
		extract( $args );
		$this->id = $i;
		$defaults = array(
			'type'           => 'text',
			'label'          => 'Option 1',
			'default_value'  => '',
			'classes'        => array( 'option' ),
			'rel'            => '',
			'width'          => '',
			'height'         => '',
			'length'         => '',
			'wrapper'        => array( '<li class="sm-item">', '</li><span class="spacer"></span>' ),
			'description'    => '',
			'atts'           => array( 'disabled' => null ),
			'network_option' => false
		);
		$args     = array_merge( $defaults, $args );

		foreach ( $args as $name => $value ) {
			$this->$name = $value;
		}
	}

	public function html_process_atts( $atts ) {
		$att_markup = [];

		foreach ( $atts as $key => $att ) {
			if ( false == empty( $att ) ) {
				$att_markup[] = sprintf( '%s="%s"', $key, $att );
			}
		}

		return implode( ' ', $att_markup );
	}

	public function get_classes( $echo = false, $passed_str_classes = '' ) {
		$the_classes = '';
		foreach ( $this->classes as $class ) {
			if ( ! empty( $the_classes ) ) {
				$the_classes .= ' ';
			}
			$the_classes .= $class;
		}
		if ( ! empty( $passed_str_classes ) ) {
			$the_classes = $the_classes . ' ' . $passed_str_classes;
		}
		if ( ! empty( $the_classes ) ) {
			$the_classes = 'class="' . $the_classes . '"';
		}
		if ( $echo ) {
			echo $the_classes;
		}

		return $the_classes;
	}

	public function update_option() {
		if ( ! isset( $_POST[ $this->id ] ) ) {
			$_POST[ $this->id ] = '';
		}

		if ( $this->network_option ) {
			if ( $_POST[ $this->id ] == '' ) {
				$updated = delete_site_option( SM_SITEOP_PREFIX . $this->id );
			} else {
				$updated = update_site_option( SM_SITEOP_PREFIX . $this->id, $_POST[ $this->id ] );
			}

			return $updated;
		} else {
			if ( $_POST[ $this->id ] == '' ) {
				$updated = delete_option( SM_SITEOP_PREFIX . $this->id );
			} else {
				$updated = update_option( SM_SITEOP_PREFIX . $this->id, $_POST[ $this->id ] );
			}

			return $updated;
		}

	}
}

class sm_section_description extends sm_option {

	public function get_html() {

		$html = $this->wrapper[0];
		$html .= $this->description;
		$html .= $this->wrapper[1];
		$html .= '<span class="spacer"></span>';

		return $html;
	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters( 'echo_html_option', $html );
	}
}

class sm_numberfield extends sm_option {

	public function get_html() {
		if ( $this->network_option ) {
			$option_val = get_site_option( SM_SITEOP_PREFIX . $this->id );
		} else {
			$option_val = get_option( SM_SITEOP_PREFIX . $this->id );
		}

		if ( false === $option_val || empty( $option_val ) ) {
			$option_val = $this->default_value;
		}
		$html = $this->wrapper[0];
		$html .= "<h4 class='label'>$this->label</h4>";

		$att_markup = $this->html_process_atts( $this->atts );

		$html .= '<input id="' . $this->id . '" name="' . $this->id . '" type="number" value="' . $option_val . '" ' . $this->get_classes() . ' ' . $att_markup . ' />';
		if ( $this->description ) {
			$html .= '<div class="description clear">' . $this->description . '</div>';
		}
		$html .= '<div class="clear"></div>';
		$html .= $this->wrapper[1];

		return $html;
	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters( 'echo_html_option', $html );
	}
} // end class sm_numberfield

class sm_textfield extends sm_option {

	public function get_html() {
		if ( $this->network_option ) {
			$option_val = get_site_option( SM_SITEOP_PREFIX . $this->id );
		} else {
			$option_val = get_option( SM_SITEOP_PREFIX . $this->id );
		}
		$html = $this->wrapper[0];
		$html .= "<h4 class='label'>$this->label</h4>";

		$att_markup = $this->html_process_atts( $this->atts );

		$html .= '<input id="' . $this->id . '" name="' . $this->id . '" type="text" value="' . $option_val . '" ' .
		         $this->get_classes(false, 'twothirdfat' ) . ' ' . $att_markup . ' />';
		if ( $this->description ) {
			$html .= '<div class="description clear">' . $this->description . '</div>';
		}
		$html .= '<div class="clear"></div>';
		$html .= $this->wrapper[1];

		return $html;
	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters( 'echo_html_option', $html );
	}
}

class sm_passwordfield extends sm_option {

	public function __construct( $i, $args = array() ) {
		parent::__construct( $i, $args );
		if ( ! defined( 'MYSECRETKEY' ) ) {
			$key = sha1( basename( __FILE__ ), true );
			define( 'MYSECRETKEY', static::pad_key( $key ) );
		}
	}

	public function get_html() {
		if ( $this->network_option ) {
			$option_val = get_site_option( SM_SITEOP_PREFIX . $this->id );
		} else {
			$option_val = get_option( SM_SITEOP_PREFIX . $this->id );
		}
		$html = $this->wrapper[0];
		$html .= "<h4 class='label'>$this->label</h4>";

		$att_markup = $this->html_process_atts( $this->atts );

		$html .= "<input id=\"$this->id\" name=\"$this->id\" type=\"password\" value=\"" . $option_val . "\" " .
		         $att_markup . $this->get_classes(false, 'twothirdfat' ) . " />";
		$html .= ' <a href="#" onClick="jQuery(this).prev().val(null); return false;" class="button button-secondary">clear</a>';
		if ( $this->description ) {
			$html .= '<div class="description clear">' . $this->description . '</div>';
		}
		$html .= "<input style=\"display:none;\" id=\"prev_$this->id\" name=\"prev_$this->id\" type=\"text\" value=\"" . $option_val . "\" readonly=\"readonly\" />";
		// $html .= "<div class=\"pwhidden\">".$this->unencrypted_pass(get_option(SM_SITEOP_PREFIX.$this->id))."</div>";
		$html .= "<div class=\"clear\"></div>";
		$html .= $this->wrapper[1];

		return $html;
	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters( 'echo_html_option', $html );
	}

	// you should only call this function when passing password to the third party service,
	// never display this password on an unsecured form or you risk password theft
	public static function unencrypted_pass( $encrypted_encoded ) {
		$encrypted_decoded = base64_decode( $encrypted_encoded );
		$value = mcrypt_decrypt( MCRYPT_RIJNDAEL_256, MYSECRETKEY, $encrypted_decoded, MCRYPT_MODE_ECB );

		// trim the return value because there's a chance extra bytes got tacked onto the end during save
		// why? ¯\_(ツ)_/¯
		return trim( $value );
	}

	// lets override the default function to better secure the saved data
	public function update_option() {
		if ( ! isset( $_POST[ $this->id ] ) ) {
			$_POST[ $this->id ] = '';
		}
		// if the password was not changed (the encrypted values match) don't update anything
		if ( $_POST[ $this->id ] === $_POST[ 'prev_' . $this->id ] ) {
			return false;
		}

		if ( $this->network_option ) {
			if ( $_POST[ $this->id ] == '' ) {
				if ( $this->network_option ) {
					$updated = delete_site_option( SM_SITEOP_PREFIX . $this->id );
				} else {
					$updated = delete_option( SM_SITEOP_PREFIX . $this->id );
				}
			} else {
				$encrypted = mcrypt_encrypt( MCRYPT_RIJNDAEL_256, MYSECRETKEY, $_POST[ $this->id ], MCRYPT_MODE_ECB );
				// note base64 is required, not a part of any hack. Without it, storing the encryption
				// into a wp_option value is most likely impossible, or at least very unreliable.
				$encrypted_encoded = base64_encode( $encrypted );
				if ( $this->network_option ) {
					$updated = update_site_option( SM_SITEOP_PREFIX . $this->id, $encrypted_encoded );
				} else {
					$updated = update_option( SM_SITEOP_PREFIX . $this->id, $encrypted_encoded );
				}
			}

			return $updated;
		} else {
			if ( $_POST[ $this->id ] == '' ) {
				if ( $this->network_option ) {
					$updated = delete_site_option( SM_SITEOP_PREFIX . $this->id );
				} else {
					$updated = delete_option( SM_SITEOP_PREFIX . $this->id );
				}
			} else {
				$encrypted = mcrypt_encrypt( MCRYPT_RIJNDAEL_256, MYSECRETKEY, $_POST[ $this->id ], MCRYPT_MODE_ECB );
				// note base64 is required, not a part of any hack. Without it, storing the encryption
				// into a wp_option value is most likely impossible, or at least very unreliable.
				$encrypted_encoded = base64_encode( $encrypted );
				if ( $this->network_option ) {
					$updated = update_site_option( SM_SITEOP_PREFIX . $this->id, $encrypted_encoded );
				} else {
					$updated = update_option( SM_SITEOP_PREFIX . $this->id, $encrypted_encoded );
				}
			}

			return $updated;
		}
	}

	/**
	 * Fixes PHP7 issues where mcrypt_decrypt expects a specific key size.
	 * Specifically, this used on the Constant set for "MYSECRETKEY"
     * See: http://stackoverflow.com/questions/27254432/mcrypt-decrypt-error-change-key-size
	 * You'll still have to run trim on the end result when decrypting, as you
	 * can see in the "unencrypted_pass" function.
	 *
	 * @param $key
	 *
	 * @return bool|string
	 */
	static function pad_key( $key ) {
		    // key is too large
		    if ( strlen( $key ) > 32 ) {
			    return false;
		    }

		    // set sizes
		    $sizes = array( 16, 24, 32 );

		    // loop through sizes and pad key
		    foreach ( $sizes as $s ) {
			    while ( strlen( $key ) < $s ) {
				    $key = $key . "\0";
			    }
			    if ( strlen( $key ) == $s ) {
				    break;
			    } // finish if the key matches a size
		    }

		    // return
		    return $key;
	    }
} // end class sm_passwordfield

class sm_textarea extends sm_option {

	public function get_html() {
		if ( $this->network_option ) {
			$option_val = get_site_option( SM_SITEOP_PREFIX . $this->id );
		} else {
			$option_val = get_option( SM_SITEOP_PREFIX . $this->id );
		}
		$html = $this->wrapper[0];
		$html .= "<h4 class='label'>$this->label</h4>";

		$att_markup = $this->html_process_atts( $this->atts );

		$html .= "<textarea id=\"$this->id\" name=\"$this->id\" cols=\"45\" rows=\"10\" " . $att_markup . ">
" . stripslashes( $option_val ) . "</textarea>";
		if ( $this->description ) {
			$html .= '<div class="description clear">' . $this->description . '</div>';
		}
		$html .= "<div class=\"clear\"></div>";
		$html .= $this->wrapper[1];

		return $html;
	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters( 'echo_html_option', $html );
	}
}

class sm_dropdown extends sm_option {

	public $values;
	public $meta;

	public function __construct( $i, $v, $m ) {
		parent::__construct( $i );
		$this->values = ( ! empty( $v ) ) ? $v : array();
		$this->meta   = ( ! empty( $m ) ) ? $m : array();

		if ( isset( $this->meta['network_option'] ) ) {
			$this->network_option = $this->meta['network_option'];
		} else {
			$this->network_option = false;
		}
	}

	public function get_html() {
		if ( $this->network_option ) {
			$option_val = get_site_option( SM_SITEOP_PREFIX . $this->id );
		} else {
			$option_val = get_option( SM_SITEOP_PREFIX . $this->id );
		}

		if ( isset( $this->meta['option_default'] ) ) {
			$default_option = $this->meta['option_default'];
		} else {
			$default_option = 'Select a Value';
		}

		$html = $this->wrapper[0];
		$html .= "<h4 class='label'>". $this->meta['label'] ."</h4>";
		$html .= "<select id=\"$this->id\" name=\"$this->id\" value=\"" . $option_val . "\" />";
		$html .= '<option value="">'. $default_option .'</option>';
		foreach ( $this->values as $key => $value ) {
			if ( $value == $option_val ) {
				$selected = 'selected="selected"';
			} else {
				$selected = '';
			}
			$html .= "<option value=\"$value\" $selected>$value</option>";
		}
		$html .= '</select>';
		$html .= "<div class=\"clear\"></div>";
		$html .= $this->wrapper[1];

		return $html;
	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters( 'echo_html_option', $html );
	}
}

class sm_multiselect extends sm_option {

	public $values;
	public $meta;

	public function __construct( $i, $v, $m ) {
		parent::__construct( $i );
		$this->values = ( ! empty( $v ) ) ? $v : array();
		$this->meta   = ( ! empty( $m ) ) ? $m : array();

		if ( isset( $this->meta['network_option'] ) ) {
			$this->network_option = $this->meta['network_option'];
		} else {
			$this->network_option = false;
		}
	}

	public function get_html() {
		if ( $this->network_option ) {
			$option_val = get_site_option( SM_SITEOP_PREFIX . $this->id );
		} else {
			$option_val = get_option( SM_SITEOP_PREFIX . $this->id );
		}

		// if $option_val is empty it needs set to an empty array since we use in_array later
		if ( empty( $option_val ) ) {
			$option_val = array();
		}

		$html = $this->wrapper[0];
		$html .= "<div class='pure-u-1 pure-md-6'>";
		$html .= "<h4 class='label'>". $this->meta['label'] ."</h4>";
		$html .= '</div>';
		$html .= "<div class='pure-u-1 pure-md-6'>";
		$html .= '<select multiple="multiple" id="' . $this->id . '" name="' . $this->id . '[]" class="fs-multiselect" style="width:280px;"  />';
		$html .= '<option value="">Select a Value</option>';
		foreach ( $this->values as $key => $value ) {
			if ( in_array( $key, $option_val ) ) {
				$selected = 'selected="selected"';
			} else {
				$selected = '';
			}
			$html .= '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
		}
		$html .= '</select>';
		$html .= '</div>';
		$html .= "<div class=\"clear\"></div>";
		$html .= $this->wrapper[1];

		return $html;
	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters( 'echo_html_option', $html );
	}
}

class sm_checkbox extends sm_option {

	public $value;

	public function __construct( $i, $args = array() ) {
		parent::__construct( $i, $args );
		$defaults = array(
			'value' => ''
		);
		$args     = array_merge( $defaults, $args );

		foreach ( $args as $name => $value ) {
			$this->$name = $value;
		}
	}

	public function get_html() {
		if ( ! isset( $display ) ) {
			$display = '';
		}
		if ( $this->network_option ) {
			$option_val = get_site_option( SM_SITEOP_PREFIX . $this->id );
		} else {
			$option_val = get_option( SM_SITEOP_PREFIX . $this->id );
		}

		$html = $this->wrapper[0];

		if ( $option_val == $this->value ) {
			$checked = " checked=\"checked\"";
		} else {
			$checked = "";
		}

		$switch = ( 'class="onOffSwitch"' == $this->get_classes() )? true : false;

			ob_start(); ?>
				<div class="pure-g">
					<div class="pure-u-1 pure-u-md-3-5">
						<h4 class="label">
							<?php echo $this->label; ?>
						</h4>
					</div>
					<div class="pure-u-1 pure-u-md-2-5">
						<div <?php echo $this->get_classes(); ?>>
							<input type="checkbox"
							       name="<?php echo $this->id; ?>"
							       id="<?php echo $this->id; ?>"
							       value="<?php echo $this->value; ?>"
									<?php echo $checked . $display;
									       if ( true === $switch ) {
										       echo 'class="onOffSwitch-checkbox"';
									       } else {
										       echo 'class="cb"';
									       } ?> />
							<?php if ( true === $switch ) { ?>
								<label class="onOffSwitch-label"
									for="<?php echo $this->id; ?>">
									<div class="onOffSwitch-inner"></div>
									<span class="onOffSwitch-switch"></span>
								</label>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php
			$html .= ob_get_clean();
			$html .= "<div class=\"clear\"></div>";
			$html .= $this->wrapper[1];
			return $html;

	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters( 'echo_html_option', $html );
	}

}


class sm_radio_buttons extends sm_option {

	public $values;

	public function __construct( $i, $v ) {
		parent::__construct( $i );
		$this->values = ( ! empty( $v ) ) ? $v : array();
	}

	public function get_html() {
		$html = $this->wrapper[0];
		$html .= "<h4 class='label'>$this->label</h4>";

		$html .= "<div>";
		foreach ( $this->values as $key => $value ) {

			if ( $this->network_option ) {
				$option_val = get_site_option( SM_SITEOP_PREFIX . $this->id );
			} else {
				$option_val = get_option( SM_SITEOP_PREFIX . $this->id );
			}
			if ( ! is_numeric( $key ) ) {
				$radioLabel = $key;
			} else {
				$radioLabel = $value;
			}

			if ( $option_val ) {
				$selectedVal = $option_val;
			} else if ( isset( $this->default_value ) ) {
				$selectedVal = $this->default_value;
			} else {
				$selectedVal = '';
			}

			if ( $selectedVal == $value ) {
				$checked = " checked=\"checked\"";
			} else {
				$checked = "";
			}

			$html .= "<label class=\"option-label\"><input type=\"radio\" name=\"$this->id\" value=\"$value\" id=\"$this->id\" $checked /> $radioLabel</label>";
			$html .= "<div class=\"clear\"></div>";
		}
		$html .= "</div>";
		$html .= "<div class=\"clear\"></div>";
		if ( $this->description ) {
			$html .= '<br /><div class="description clear">' . $this->description . '</div>';
		}
		$html .= $this->wrapper[1];

		return $html;
	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters( 'echo_html_option', $html );
	}
}

class sm_media_upload extends sm_option {

	public function get_html() {
		if ( $this->network_option ) {
			$option_val = get_site_option( SM_SITEOP_PREFIX . $this->id );
		} else {
			$option_val = get_option( SM_SITEOP_PREFIX . $this->id );
		}
		$html     = $this->wrapper[0];
		$html .= "<h4 class='label'>$this->label</h4>";

		$att_markup = $this->html_process_atts( $this->atts );

		$html .= "<input id=\"$this->id\" name=\"$this->id\" type=\"text\" value=\"" . $option_val . "\" " . $att_markup . " />";
		$html .= '<input id="' . $this->id . '_button" type="button" class="button button-secondary" value="Upload Image" onclick="sm_option_media_uploader(' . $this->id . ')"' . $att_markup . '/><input id="' . $this->id . '_reset" type="button" class="button button-secondary" value="X" onclick="jQuery(\'#' . $this->id . '\').val(\'\');" />';
		if ( $this->description ) {
			$html .= '<div class="description clear">' . $this->description . '</div>';
		}
		if ( $option_val ) {
			$html .= "<div class=\"clear\"></div><div class=\"img-preview description collapsed\"><img id=\"image_$this->id\" src=\"" . $option_val . "\" /></div>";
		}
		$html .= "<div class=\"clear\"></div>";
		$html .= $this->wrapper[1];

		return $html;
	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters( 'echo_html_option', $html );
	}
}

class sm_include_file extends sm_option {

	public $filename;

	public function __construct( $i, $f, $v = array() ) {
		parent::__construct( $i );
		$this->values   = ( ! empty( $v ) ) ? $v : array();
		$this->filename = ( ! empty( $f ) ) ? $f : 'set_the_filename.php';
	}

	public function get_html() {
		return false;
	}

	public function echo_html() {
		if ( ! empty( $this->filename ) ) {
			include_once( $this->filename );
		}
	}
}

class sm_color_picker extends sm_option {

	public function get_html() {
		if ( $this->network_option ) {
			$option_val = get_site_option( SM_SITEOP_PREFIX . $this->id );
		} else {
			$option_val = get_option( SM_SITEOP_PREFIX . $this->id );
		}
		$html     = $this->wrapper[0];
		ob_start(); ?>
		<h4 class='label'><?php $this->label; ?></h4>
		<?php $att_markup = $this->html_process_atts( $this->atts );
		if ( $the_color = $option_val ) {
		} else {
			$the_color = '#ffffff';
		} ?>

		<input id="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" class="color-picker" type="text"
		value="<?php echo
		$the_color; ?>" <?php echo $att_markup; ?> />

		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('.color-picker').wpColorPicker();
			});
		</script>

		<?php if ( $this->description ) { ?>
			<div class="description clear"><?php echo $this->description; ?></div>
		<?php } ?>
		<div class="clear"></div>
		<?php
		$html .= ob_get_clean();
		$html .= $this->wrapper[1];

		return $html;
	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters( 'echo_html_option', $html );
	}
} // END class sm_color_picker
