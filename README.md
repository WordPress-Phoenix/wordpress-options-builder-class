# WordPress Phoenix Options Panel 

WordPress options builder class is a library that helps you set up theme or plugin options that store data in the database with just a few lines of code.

### Updated in 5.0

* Updated WordPress Coding Standards
* Improved Composer configuration
* Added support for the [.editorconfig standard](https://editorconfig.org)
* Rewrote encryption on the Password field type to use OpenSSL instead of mcrypt
* Removed the Markdown field type
* Refactored library code

Builds protected by CircleCI: [![CircleCI](https://circleci.com/gh/WordPress-Phoenix/wordpress-options-builder-class.svg?style=svg)](https://circleci.com/gh/WordPress-Phoenix/wordpress-options-builder-class)

## Table of Contents

*   [Installation](#installation)
*   [Upgrading to version 5.x](#upgrading-to-version-5x)
*   [Usage](#usage)

## Installation

### Composer style (recommended)

1.  Include in your plugin by creating or adding the following to your composer.json file in the root of the plugin
    ```json
    {
      "require": {
        "WordPress-Phoenix/wordpress-options-builder-class": "^5.0.0"
      }
    }
    ```
2.  Confirm that composer is installed in your development enviroment using `which composer`.
3.  Open CLI into your plugins root directory and run `composer install`.
4.  Confirm that it created the vendor folder in your plugin.
5.  In your plugins main file, near the code where you include other files place the following:
    ```php
    if ( file_exists( dirname( __FILE__ ) . 'vendor/autoload.php' ) ) {
      include_once dirname( __FILE__ ) . 'vendor/autoload.php';
    }
    ```

### Manual Installation

1.  Download the most updated copy of this repository from `https://api.github.com/repos/WordPress-Phoenix/wordpress-options-builder-class/zipball`
2.  Extract the zip file, and copy the PHP file into your plugin project.
3.  Include the `src/class-wordpress-options-panels.php` file in your plugin.

## Upgrading to version 5.x

Version 5.0 is a major rewrite of the WordPress Phoenix Options Panel and there are a few required update steps.

*   If not using an autoloader, include `src/class-wordpress-options-panels.php` (instead of `wpop-init.php`)
*   Reference the `\WPOP\V_5_0\*` namespace instead of `\WPOP\V_4_1\*`
*   If you aren't using an autoloader, manually load the class files into memory:
    ```php
    \WPOP\V_5_0\WordPress_Options_Panels::load_files();
    ```
*   The Markdown field type has been removed; consider switching to `include_partial` and rendering the markdown through a PHP class of your choosing (WordPress Phoenix Options Panel version 4.x used [erusev/parsedown](https://packagist.org/packages/erusev/parsedown))
*   Update your array of `$args` to `new \WPOP\V_5_0\Page( $args, $fields );` to include an `installed_dir_uri` key and value, representing the public URL path to your installation of this library (required to load CSS and JS assets used to style the options panels)

## Usage

*   [Get started](https://github.com/WordPress-Phoenix/wordpress-options-builder-class/wiki) at the Wiki describing Panel, Section and Part schemas
*   [See a full example](https://github.com/WordPress-Phoenix/wpop-example-panel/) in the WPOP Example Plugin
*   [Generate a working copy](https://github.com/WordPress-Phoenix/wordpress-development-toolkit/releases) using the WordPress Development Toolkit and the [Abstract Plugin Base](https://github.com/WordPress-Phoenix/abstract-plugin-base).

## Contributing

Pull requests with bug fixes and enhancements can be made by forking this repository and then submitting your new PR.
