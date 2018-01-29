# WordPress Phoenix Options Panel 

WordPress options builder class is a library that helps you setup theme or plugin options that store data in the database with just a few lines of code.

### Updated in 3.0
* Fully escaped & sanitized
* More data storage APIs
* Cleaned up styles
* Improved Media field
* Cruft cleanup
* Inline docblocks
* ... and much more!

Builds protected by CircleCI: [![CircleCI](https://circleci.com/gh/WordPress-Phoenix/wordpress-options-builder-class.svg?style=svg)](https://circleci.com/gh/WordPress-Phoenix/wordpress-options-builder-class)

## Table of Contents:
- [Installation](#installation)
- [Usage](#usage)


# Installation

## Composer style (recommended)

1. Include in your plugin by creating or adding the following to your composer.json file in the root of the plugin
```json
{
  "require": {
    "WordPress-Phoenix/wordpress-options-builder-class": "3.*"
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

* [Get started](https://github.com/WordPress-Phoenix/wordpress-options-builder-class/wiki) at the Wiki describing Panel, Section and Part schemas
* [See a full example](https://github.com/WordPress-Phoenix/wpop-example-panel/blob/master/app/admin/class-options-panel.php) in the WPOP Example Plugin
* [Generate a working copy](https://github.com/WordPress-Phoenix/wordpress-development-toolkit/releases) using the WordPress Development Toolkit and the [Abstract Plugin Base](https://github.com/WordPress-Phoenix/abstract-plugin-base).

