<?php
/**
 * SiteOptions builder class
 * @author: Seth Carstens
 * @package: SM-Utilities
 * @version: 1.3.0
 * @licence: GPL 2.0 - please retain comments that express original build of this file by the author.
 */

//avoid direct calls to this file, because now WP core and framework has been used
if ( ! function_exists( 'add_filter' ) ) {
	header('Status: 403 Forbidden'); header('HTTP/1.1 403 Forbidden'); exit();
}

if(defined('SITEOPTION_PREFIX')) define('SM_SITEOP_PREFIX', SITEOPTION_PREFIX);
if(!defined('SM_SITEOP_PREFIX')) define('SM_SITEOP_PREFIX', 'sm_option_');
define('SM_SITEOP_DEBUG', FALSE);

//provide a simpler way to get the custom site options created
if(!function_exists('get_custom_option')) {
	function get_custom_option($s='') {
		return get_site_option(SM_SITEOP_PREFIX.$s);
	}
}

//stop dbug calls from throwing errors when the sm-debug-bar plugin is not active
if(!function_exists('dbug')){function dbug(){}}
dbug('Version 1.3.0');

class sm_options_container
{
	// property declaration
	public $parts;          public $parent_id;
	public $capability;     public $id;
	public $notifications;  public $security_check;

	public function __construct($i, $args = array()) {
		$this->id = preg_replace('/_/','-',$i);
		$this->parts = array();
		$this->parent_id = '';
		$this->capability = 'read';
		$this->notifications = array();
		$this->security_check = false;
	}

	public function add_part($part) {
		$this->parts[] = $part;
	}

	public function save_options() {
		$any_updated = false;

		//make sure that a nonce was passed or do not save options
		if(!empty($_REQUEST['_wpnonce'])) $nonce = $_REQUEST['_wpnonce'];
		else return false;

		//check the nonce for security and save it to the class object or end function
		if($this->security_check || wp_verify_nonce($nonce, $this->id)) $this->security_check = true;
		else return false;

		//verified to save options, continue saving
		foreach($this->parts as $part) {
			$part->security_check = $this->security_check;
			if(is_a($part, 'sm_option')) $updated = $part->update_option();
			else $updated = $part->save_options();
			if($updated) $any_updated = true;
		}
		if(defined('SM_SITEOP_DEBUG') && SM_SITEOP_DEBUG) dbug("Save Options ($this->id): ".var_export($updated, true));
		if($any_updated) $this->notifications['update'] = '<div class="updated">Your options have been saved!</div>';
		return $any_updated;
	}

	public function echo_notifications() {
		do_action('wlfw_after_option_save', $this);
		if(defined('SM_SITEOP_DEBUG') && SM_SITEOP_DEBUG) dbug($this->notifications);
		foreach ($this->notifications as $notify_html) echo $notify_html;
	}

}


class sm_options_page extends sm_options_container
{
	// property declaration
	public $page_title;   public $menu_title;
	public $libraries;    public $icon;
	public $disable_styles; public $theme_page;

	// method declaration
	public function __construct($args = array()) {
		$defaults = array(
			'parts' => array(),
			'parent_id' => 'options-general.php',
			'page_title' => 'Custom Site Options',
			'menu_title' => 'Custom Site Options',
			'capability' => 'manage_options',
			'id' => 'custom-site-options',
			'icon' => 'icon-options-general',
			'libraries' => array(),
			'disable_styles' => FALSE,
			'theme_page' => FALSE
		);
		$args = array_merge($defaults, $args);
		parent::__construct($args['id']);
		foreach($args as $name => $value)
			$this->$name = $value;
	}

	public function build() {
		add_action('admin_menu', array($this, 'build_page'));
		add_action('admin_print_scripts', array($this, 'media_upload_scripts'));
		add_action('admin_print_styles', array($this, 'media_upload_styles'));
		//TODO - add if statement to determine if media uploader scripts should be enqueued or not
		if(isset($_POST['submit']) && $_POST['submit'] )
			add_action('admin_init', array($this, 'save_options'));
	}

	public function build_page() {
		if($this->theme_page) add_theme_page($this->page_title, $this->menu_title, $this->capability, $this->id, array($this, 'build_parts'));
		else add_submenu_page( $this->parent_id, $this->page_title, $this->menu_title, $this->capability, $this->id, array($this, 'build_parts') );
	}

	public function build_parts() {
		echo '<div id="smSiteOptions">';
		if(!$this->disable_styles) $this->inline_styles();

		//build the header
		if($this->icon && !empty($this->icon)) echo "<div class=\"icon32\" id=\"$this->icon\"><br></div>";
		echo "<h2>$this->page_title</h2>";
		echo '<div id="smOptionsContent">';

		//build the navigation menu if turned on for this page object
		//TODO - convert if statement and its dependencies to allow javascript navigation to be disabled using libraries array
		if(true) {
			echo '<div id="smOptionsNav"><ul>';
			foreach($this->parts as $key => $part) {
				dbug($part);
				if(((intval($key)+1) % 2) == 0) $part->classes[] = 'even';
				echo '<li id="'.$part->id.'-nav"><a href="#'.$part->id.'">'.$part->title.'</a></li>';
			}
			echo '</ul></div>';
		}

		if(isset($_POST['submit']) && $_POST['submit'])
			$this->echo_notifications();
		echo '<div id="smOptions"><form method="post" onReset="return confirm(\'Do you really want to reset ALL site options? (You will still need to click save changes)\')"><ul style="list-style: none;">';
		//build the content parts
		foreach($this->parts as $key => $part) {
			if(((intval($key)+1) % 2) == 0) $part->classes[] = 'even';
			if(defined('SM_SITEOP_DEBUG') && SM_SITEOP_DEBUG) echo $part->id.'[$part->echo_html()]->['.__CLASS__.'->echo_html()]<br />';
			$part->echo_html();
		}
		echo '<li><p class="submit"><input type="submit" value="Save Changes" class="button-primary" name="submit" style="margin-right:10px;"><input type="reset" value="Reset" class="button-primary" name="reset"></p>'
			.wp_nonce_field($this->id, '_wpnonce', true, false).'</li>'.'</ul></form></div>';
		echo '<div class="clear"></div></div>';//end of #smOptionsContent
		echo '</div>';//end of #smSiteOptions;
	}

	public function inline_styles() {
		?>
		<style>
			#smOptionsContent {
				background: #F1F1F1;
				border: 1px solid #D8D8D8;
				border-top-right-radius: 0.7em; border-bottom-right-radius: 0.7em; border-bottom-left-radius: 0.7em;
				margin-right: 12px;
				width: 704px;
			}
			#smSiteOptions .icon32 { margin: -8px 8px 0 0; }
			#smOptionsNav { float: left; width: 180px; }
			#smOptionsNav li { border-top: 1px solid #FFF; margin: 0px; border-bottom: 1px solid #D8D8D8;  }
			#smOptionsNav li.active { background: #FFF; border-right: #FFF;}
			#smOptionsNav li a { display:block; font-family:Georgia, Arial, serif; font-size: 13px; padding: 12px; text-decoration: none;}
			#smOptions { background: #FFF; float: left; padding: 12px; width: 500px;
				border-top-right-radius: 0.7em; border-bottom-right-radius: 0.7em; border-bottom-left-radius: 0.7em; }
			#smOptions input { margin-right: 6px; }
			#smOptionsContent .section { display: none; }
			#smOptionsContent .section.active { display: block; }

			/* TODO - finish setting up javascript to detect image size and provide smaller image with preview text button
			#smOptionsContent .img-preview { max-height: 36px; overflow: hidden; padding: 12px; margin-top: -15px;  }
			#smOptionsContent .img-preview.full-preview { height: auto; overflow: visible; padding: 12px; margin-top: -15px;  }
			*/
			.clear { clear:both; }
			.section { padding: 5px; margin-right: 20px; }
			.section h3 { border-bottom: 1px solid #999; margin:0 0 10px; padding: 0 0 5px; }
			li.even.option { background-color: #ccc; }
			label {  width:200px; display:block; float:left; }
			label.option-label {  width:auto; display: inherit; float: none; }
			/* On/Off Switch */
			form a.switch { display:block; margin-left:200px; height:30px; width:70px; text-indent:-9999px; background: url(http://lh3.googleusercontent.com/-knVz5thrqgw/Ts05srH_FbI/AAAAAAAAAB4/X1UaAz9Ejn0/s70/bg-checkbox.gif) no-repeat;
			}
			form .off { background-position: 0 0!important; }
			form .on { background-position: 0 -31px!important; }
			input[disabled='disabled'] { background-color: #CCC; }
			.description { margin-left: 200px; margin-bottom: 15px; }
			img.active { border: 1px solid #da172d; padding: 2px !important; border-radius: .6em;  }
			img.colorpicker { padding: 3px; position: relative; top: 6px;}
			@media (min-width: 1100px){
				#smOptionsContent { width: 904px;}
				#smOptions { width:700px;}
			}
			@media (min-width: 1300px){
				#smOptionsContent { width: 1104px;}
				#smOptions { width:900px;}
			}
		</style>
		<script>
			jQuery(document).ready(function () {

				// force the page not jump to the hash location on load
				jQuery('html, body').animate({scrollTop: 0});

				jQuery(' input:checkbox.onOffSwitch').each(function (i) {
					// add class on if box is checked
					if (jQuery(this).is(':checked')) addclass = 'on';
					else addclass = '';
					// create on/off link for switch graphic
					jQuery(this).before('<a href="#" id="button-' + jQuery(this).attr('id') + '" class="switch ' + addclass + '"></a>');
					// hide the check box
					jQuery(this).hide();
				});

				jQuery('form a.switch').click(function (e) {
					e.preventDefault();
					// change switch class
					jQuery(this).toggleClass('on').toggleClass('off');
					// save check box object
					thebox = jQuery(this).attr('id');
					thebox = '#' + thebox.replace('button-', '');
					// check and uncheck box
					if (jQuery(thebox).is(':checked')) jQuery(thebox).removeAttr('checked');
					else jQuery(thebox).attr('checked', 'checked');
				});


				jQuery('#smOptionsNav li a').click(function () {
					var active = jQuery((jQuery(this).attr('href')) + ', ' + (jQuery(this).attr('href') + '-nav')).addClass('active');
					// add tab's location to URL but stay at the top of the page
					window.location.hash = jQuery(this).attr('href');
					window.scrollTo(0, 0);
					jQuery(active).siblings().removeClass('active');

					return false;
				});
				// load hashed section if avail, otherwise load first section
				if (hash = window.location.hash) {
					console.log(jQuery(hash + '-nav a').trigger('click'));
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
	}

	public function media_upload_scripts() {
		//media uploader
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		//colorpicker
		wp_enqueue_script( 'farbtastic' );
	}

	public function media_upload_styles() {
		//media uploader
		wp_enqueue_style('thickbox');
		//colorpicker
		wp_enqueue_style( 'farbtastic' );
	}

}

class sm_section extends sm_options_container {
	public $wrapper;  public $type;
	public $classes;  public $title;

	public function __construct($i, $args = array() ) {
		parent::__construct($i);
		$defaults = array(
			'wrapper' => array('<ul>','</ul><div class="hr-divider"></div>'),
			'type' => 'default',
			'classes' => array('section', 'active'),
			'title' => 'My Custom Section'
		);
		$args = array_merge($defaults, $args);
		foreach($args as $name => $value)
			$this->$name = $value;
	}

	private function get_classes($echo = false) {
		$the_classes = '';
		foreach($this->classes as $class) {
			if(!empty($the_classes)) $the_classes .= ' ';
			$the_classes .= $class;
		}
		if(!empty($the_classes)) $the_classes = 'class="'.$the_classes.'"';
		if($echo) echo $the_classes;
		return $the_classes;
	}

	public function echo_html() {
		$option = '<li id="'.$this->id.'" '.$this->get_classes().">";
		if(!empty($this->title)) $option .= "<h3>$this->title</h3>";
		$option .= $this->wrapper[0];
		foreach($this->parts as $part) {
			if($appendHTML = $part->get_html()) $option .= $appendHTML;
			else {echo $option; unset($option); $part->echo_html();}
		}
		$option .= $this->wrapper[1];
		$option .= '</li>';
		echo apply_filters('echo_html_option', $option);
		unset($option);
	}
}

class sm_option
{
	// property declaration
	public $id;       public $type;
	public $label;      public $default_value;
	public $classes;    public $rel;
	public $atts;     public $width;
	public $height;     public $length;
	public $wrapper;    public $description;



	// method declaration
	public function __construct($i, $args = array() ) {
		extract($args);
		$this->id = $i;
		$defaults = array(
			'type' => 'text',
			'label' => 'Option 1',
			'default_value' => '',
			'classes' => array('option'),
			'rel' => '',
			'atts' => array(),
			'width' => '',
			'height' => '',
			'length' => '',
			'wrapper' => array('<li>','</li>'),
			'description' => '',
			'atts' => array('disabled' => NULL)
		);
		$args = array_merge($defaults, $args);

		foreach($args as $name => $value)
			$this->$name = $value;
	}

	public function get_classes($echo = false) {
		$the_classes = '';
		foreach($this->classes as $class) {
			if(!empty($the_classes)) $the_classes .= ' ';
			$the_classes .= $class;
		}
		if(!empty($the_classes)) $the_classes = 'class="'.$the_classes.'"';
		if($echo) echo $the_classes;
		return $the_classes;
	}

	public function update_option() {
		if(!isset($_POST[$this->id])) $_POST[$this->id] = '';

		if($_POST[$this->id] == '')
			$updated = delete_option(SM_SITEOP_PREFIX.$this->id);
		else
			$updated = update_option(SM_SITEOP_PREFIX.$this->id, $_POST[$this->id]);
		return $updated;
	}
}

class sm_textfield extends sm_option
{
	public function get_html() {
		$html = $this->wrapper[0];
		$html .= "<label>$this->label</label>";
		if($this->atts['disabled']) $disabled = 'disabled="disabled"'; else $disabled = '';
		$html .= "<input id=\"$this->id\" name=\"$this->id\" type=\"text\" value=\"".get_option(SM_SITEOP_PREFIX.$this->id)."\" ".$disabled." />";
		if($this->description) $html .= '<div class="description clear">'.$this->description.'</div>';
		$html .= "<div class=\"clear\"></div>";
		$html .= $this->wrapper[1];
		return $html;
	}
	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters('echo_html_option', $html);
	}
}

class sm_passwordfield extends sm_option
{

	public function __construct($i, $args = array()) {
		parent::__construct($i, $args);
		if(!defined('MYSECRETKEY')) define('MYSECRETKEY',sha1(basename(__FILE__),TRUE));
	}

	public function get_html() {
		$option_val = get_option(SM_SITEOP_PREFIX.$this->id);
		$html = $this->wrapper[0];
		$html .= "<label>$this->label</label>";
		if($this->atts['disabled']) $disabled = 'disabled="disabled"'; else $disabled = '';
		$html .= "<input id=\"$this->id\" name=\"$this->id\" type=\"password\" value=\"".get_option(SM_SITEOP_PREFIX.$this->id)."\" ".$disabled." />";
		$html .= '<a href="#" onClick="jQuery(this).prev().val(null); return false;">[clear]</a>';
		if($this->description) $html .= '<div class="description clear">'.$this->description.'</div>';
		$html .= "<input style=\"display:none;\" id=\"prev_$this->id\" name=\"prev_$this->id\" type=\"text\" value=\"".get_option(SM_SITEOP_PREFIX.$this->id)."\" readonly=\"readonly\" />";
		//$html .= "<div class=\"pwhidden\">".$this->unencrypted_pass(get_option(SM_SITEOP_PREFIX.$this->id))."</div>";
		$html .= "<div class=\"clear\"></div>";
		$html .= $this->wrapper[1];
		return $html;
	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters('echo_html_option', $html);
	}

	//you should only call this function when passing password to the third party service,
	//never display this password on an unsecured form or you risk password theft
	public function unencrypted_pass($encrypted_encoded) {
		$encrypted_decoded = base64_decode($encrypted_encoded);
		return mcrypt_decrypt(MCRYPT_RIJNDAEL_256, MYSECRETKEY, $encrypted_decoded, MCRYPT_MODE_ECB);
	}

	//lets override the default function to better secure the saved data
	public function update_option() {
		if(!isset($_POST[$this->id])) $_POST[$this->id] = '';
		//if the password was not changed (the encrypted values match) don't update anything
		if($_POST[$this->id] === $_POST['prev_'.$this->id]) {
			return false;
		}
		if($_POST[$this->id] == '') {
			$updated = delete_option(SM_SITEOP_PREFIX.$this->id);
		}
		else {
			$encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, MYSECRETKEY, $_POST[$this->id], MCRYPT_MODE_ECB);
			//note base64 is required, not a part of any hack. Without it, storing the encryption
			//into a wp_option value is most likely impossible, or at least very unreliable.
			$encrypted_encoded = base64_encode($encrypted);
			$updated = update_option(SM_SITEOP_PREFIX.$this->id, $encrypted_encoded);
		}
		return $updated;
	}
}


class sm_textarea extends sm_option
{
	public function get_html() {
		$html = $this->wrapper[0];
		$html .= "<label>$this->label</label>";
		if($this->atts['disabled']) $disabled = 'disabled="disabled"';
		$html .= "<textarea id=\"$this->id\" name=\"$this->id\" cols=\"50\" rows=\"10\" ".$disabled.">".stripslashes (get_option(SM_SITEOP_PREFIX.$this->id) )."</textarea>";
		if($this->description) $html .= '<div class="description clear">'.$this->description.'</div>';
		$html .= "<div class=\"clear\"></div>";
		$html .= $this->wrapper[1];
		return $html;
	}
	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters('echo_html_option', $html);
	}
}

class sm_dropdown extends sm_option
{
	public $values;

	public function __construct($i, $v) {
		parent::__construct($i);
		$this->values = ( !empty($v) ) ?  $v : array();
	}

	public function get_html() {
		$html = $this->wrapper[0];
		$html .= "<select id=\"$this->id\" name=\"$this->id\" value=\"".get_option(SM_SITEOP_PREFIX.$this->id)."\" />";
		$html .= '<option value="">Select a Value</option>';
		$stored_value = get_option(SM_SITEOP_PREFIX.$this->id);
		foreach($this->values as $key => $value) {
			if($value == $stored_value) $selected = 'selected="selected"'; else $selected='';
			$html .= "<option value=\"$value\" $selected>$value</option>";
		}
		$html .= '</select> Value: '.get_option(SM_SITEOP_PREFIX.$this->id);
		$html .= "<div class=\"clear\"></div>";
		$html .= $this->wrapper[1];
		return $html;
	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters('echo_html_option', $html);
	}
}


class sm_checkbox extends sm_option
{

	public $value;

	public function __construct($i, $args=array()) {
		parent::__construct($i, $args);
		$defaults = array(
			'value' => ''
		);
		$args = array_merge($defaults, $args);

		foreach($args as $name => $value)
			$this->$name = $value;
	}

	public function get_html() {
		if(!isset($display)) $display ='';
		$html = $this->wrapper[0];
		if(get_option(SM_SITEOP_PREFIX.$this->id) == $this->value) { $checked=" checked=\"checked\""; } else { $checked=""; }
		$html .= "<label>$this->label</label>";
		$html .= "<input type=\"checkbox\" value=\"$this->value\" id=\"$this->id\" name=\"$this->id\"".$checked.$display.$this->get_classes().">";
		$html .= "<div class=\"clear\"></div>";
		$html .= $this->wrapper[1];
		return $html;
	}
	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters('echo_html_option', $html);
	}

}


class sm_radio_buttons extends sm_option
{
	public $values;

	public function __construct($i, $v) {
		parent::__construct($i);
		$this->values = ( !empty($v) ) ?  $v : array();
	}

	public function get_html() {
		$html = $this->wrapper[0];
		$html .= "<label>$this->label</label>";

		$html .= "<div style=\"float:left;\">";
		foreach($this->values as $key => $value) {
			if( !is_numeric($key) ) { $radioLabel = $key; } else { $radioLabel = $value; }

			if( get_option(SM_SITEOP_PREFIX.$this->id) ) { $selectedVal = get_option(SM_SITEOP_PREFIX.$this->id); }
			else if( isset( $this->default_value) ) { $selectedVal = $this->default_value; }
			else { $selectedVal =''; }

			if($selectedVal == $value) { $checked=" checked=\"checked\""; } else { $checked=""; }

			$html .= "<label class=\"option-label\"><input type=\"radio\" name=\"$this->id\" value=\"$value\" id=\"$this->id\" $checked /> $radioLabel</label>";
			$html .= "<div class=\"clear\"></div>";
		}
		$html .= "</div>";
		$html .= "<div class=\"clear\"></div>";
		if($this->description) $html .= '<br /><div class="description clear">'.$this->description.'</div>';
		$html .= $this->wrapper[1];
		return $html;
	}

	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters('echo_html_option', $html);
	}
}

class sm_media_upload extends sm_option
{
	public function get_html() {
		$disabled = '';
		$html = $this->wrapper[0];
		$html .= "<label>$this->label</label>";
		if($this->atts['disabled']) $disabled = 'disabled="disabled"';
		$html .= "<input id=\"$this->id\" name=\"$this->id\" type=\"text\" value=\"".get_option(SM_SITEOP_PREFIX.$this->id)."\" ".$disabled." />";
		$html .= '<input id="'.$this->id.'_button" type="button" value="Upload Image" onclick="sm_option_media_uploader('.$this->id.')"'.$disabled.'/><input id="'.$this->id.'_reset" type="button" value="X" onclick="jQuery(\'#'.$this->id.'\').val(\'\');" />';
		if($this->description) $html .= '<div class="description clear">'.$this->description.'</div>';
		if(get_option(SM_SITEOP_PREFIX.$this->id)) $html .= "<div class=\"clear\"></div><div class=\"img-preview description collapsed\"><img id=\"image_$this->id\" src=\"".get_option(SM_SITEOP_PREFIX.$this->id)."\" /></div>";
		$html .= "<div class=\"clear\"></div>";
		$html .= $this->wrapper[1];
		return $html;
	}
	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters('echo_html_option', $html);
	}
}

class sm_include_file extends sm_option
{
	public $filename;

	public function __construct($i,$f,$v = array()) {
		parent::__construct($i);
		$this->values = ( !empty($v) ) ?  $v : array();
		$this->filename = ( !empty($f) ) ?  $f : 'set_the_filename.php';
	}
	public function get_html() {
		return false;
	}
	public function echo_html() {
		if(!empty($this->filename)) include_once($this->filename);
	}
}

class sm_color_picker extends sm_option
{
	public function get_html() {
		$disabled = '';
		$html = $this->wrapper[0];
		$html .= "<label>$this->label</label>";
		if($this->atts['disabled']) $disabled = 'disabled="disabled"';
		if($the_color = get_option(SM_SITEOP_PREFIX.$this->id)) {} else $the_color = '#ffffff';
		$colorpicker_icon = 'data:image/png;base64,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';
		$html .= "<input id=\"$this->id\" name=\"$this->id\" type=\"text\" value=\"".$the_color."\" ".$disabled." /> <img style=\"width: 22px; height: auto;\" class=\"colorpicker\" src=\"".$colorpicker_icon."\" />";
		$html .= '<div id="'.$this->id.'_palette" class="sm_palettes"></div>';
		$html .= '
<script type="text/javascript">
var prev_palette = jQuery("");
jQuery(document).ready(function() {
	jQuery("#'.$this->id.'_palette").hide();
	jQuery("#'.$this->id.'_palette").farbtastic("#'.$this->id.'");
	jQuery("#'.$this->id.'").next().click(function(){
		curr_palette = jQuery("#'.$this->id.'_palette");
		if(curr_palette.attr("id") == prev_palette.attr("id")) { curr_palette.slideToggle(); curr_palette.prev().toggleClass("active"); }
		else {
			jQuery(".sm_palettes").hide();
			curr_palette.prev().addClass("active");
			prev_palette.prev().removeClass("active");
			var pos   = jQuery(this).offset();
			var width = 0;//jQuery(this).width();
			jQuery("#'.$this->id.'_palette").css({"position":"absolute", "left": (pos.left - 100 + width) + "px", "top":(pos.top - 100) + "px" });
			curr_palette.slideDown();
		}
		prev_palette = curr_palette;
	});
});
</script>';
		if($this->description) $html .= '<div class="description clear">'.$this->description.'</div>';
		$html .= "<div class=\"clear\"></div>";
		$html .= $this->wrapper[1];
		return $html;
	}
	public function echo_html() {
		$html = $this->get_html();
		echo apply_filters('echo_html_option', $html);
	}
}
