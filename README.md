# WordPress Options Builder Class Library

WordPress options builder class is a library that helps you setup theme or plugin options that store data in the database with just a line or two of code!

## Table of Contents:
- [Installation](#installation)
- [Usage](#usage)


# Installation

## Composer style (recommended)

1. Include in your plugin by creating or adding the following to your composer.json file in the root of the plugin
```json
{
  "require": {
    "WordPress-Phoenix/wordpress-options-builder-class": "1.*"
  }
}
```
2. Confirm that composer is installed in your development enviroment using `which composer`.
3. Open CLI into your plugins root directory and run `composer install`.
4. Confirm that it created the vendor folder in your plugin.
5. In your plugins main file, near the code where you include other files place the following:
```php
if( file_exists( dirname( __FILE__ ) . 'vendor/autoload.php' ) ) {
  include_once dirname( __FILE__ ) . 'vendor/autoload.php';
}
```

## Manual Installation
1. Download the most updated copy of this repository from `https://api.github.com/repos/WordPress-Phoenix/wordpress-options-builder-class/zipball`
2. Extract the zip file, and copy the PHP file into your plugin project.
3. Use SSI (Server Side Includes) to include the file into your plugin.

# Usage

### WARNING: This documentation isn't yet current to v2 -- coming soon!

## Site Options Page
The following is example code which can be run to create a very basic site options page. You can use standard OOP principals shown in the below code to expand upon the sample. Please read through the class names in the library to find all the different types of fields you can include into your options page, or build your own field types by extending the existing classes.

```php
			$this->site_options_page = new sm_options_page( array (
				'parent_id'  => 'themes.php',
				'id'         => 'custom-options',
				'page_title' => 'Custom Settings',
				'menu_title' => 'Settings',
			) );
			$this->site_options_page->add_part($section = new sm_section('branding_options', array('title'=>'Branding')) );
			$section->add_part( $cpt_header_background = new sm_media_upload( 'cpt_header_bg_image', array(
				'label'       => 'Header Background Image',
				'description' => 'Background image to be used in the header on the Custom archive page.'
			) ) );
			$section->add_part( $cpt_header_logo = new sm_textfield( 'cpt_header_logo', array(
				'label'       => 'Header Logo',
				'description' => 'Logo to be used in the header on the Custom archive page.'
			) ) );
			$section->add_part( $cpt_description = new sm_textarea( 'cpt_description', array(
				'label'       => 'Custom Description',
				'value'       => 'Custom Description',
				'description' => 'Description to be used in the header on the Custom archive page.',
			) ) );
			$section->add_part( $cpt_color_overlay = new sm_color_picker( 'cpt_color_overlay', array(
				'label'       => 'Custom Color Overlay',
				'value'       => 'Custom Color Overlay',
				'description' => 'Color overlay to be used over header image only on the Custom archive page.',
			) ) );
			$section->add_part( $cpt_coming_soon_header = new sm_media_upload( 'cpt_coming_soon_header', array(
				'label'       => 'Custom Coming Soon Header Image',
				'description' => 'Header image to be used on Custom Coming Soon page.'
			) ) );
			$section->add_part( $cpt_coming_soon_content = new sm_textarea( 'cpt_coming_soon_content', array(
				'label'       => 'Custom Coming Soon Content',
				'value'       => 'Custom Coming Soon Content',
				'description' => 'Coming Soon content to be used on Custom Coming Soon page.',
			) ) );
			// recommended you move this build line into an init action hook priority 20+
			$this->site_options_page->build();
```

## Network Options Page

Simply set the `network_page` flag to true, and if you are on a multisite install, your options page will be in the mutlsite network admin navigation. **Note: plugin must be network activated to show network settings.** Here is an example:
```php
// create network-wide settings page
	$this->network_options_page = new sm_options_page( array (
		'parent_id'    => 'settings.php',
		'id'           => 'network_settings',
		'page_title'   => 'Network Options',
		'menu_title'   => 'Network Options',
		'network_page' => true
	) );
```
