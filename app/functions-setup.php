<?php
/**
 * Boot the framework.
 * 
 * Container classes should be used for storing, retrieving, and resolving
 * classes/objects passed into them.
 *
 * @package   Backdrop Post Types
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Benlumia007\Backdrop\PostTypes;

add_action( 'plugins_loaded', function() {
    load_plugin_textdomain( 'backdrop-post-types', false, basename( dirname( __FILE__ ) ) . '/languages' );
} );
