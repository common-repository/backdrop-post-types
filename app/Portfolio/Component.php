<?php
/**
 * Portfolio component.
 *
 * @package   Backdrop Post Types
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/backdrop-post-types
 */

namespace Backdrop\PostTypes\Portfolio;
use Backdrop\PostTypes\Contracts\Types\Type as Portfolio;

/**
 * Register Post Type - Portfolio
 * 
 * @since  2.0.0
 * @access public
 * @return void
 */
class Component extends Portfolio {
    public function __construct() {

        // Create post type - Portfolio.
        $this->create_post_type( 'portfolio', 'Portfolio', 'Portfolios' );
    }
}