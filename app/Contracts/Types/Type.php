<?php
/**
 * Type contract.
 *
 * @package   Backdrop Post Types
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/backdrop-post-types
 */

namespace Backdrop\PostTypes\Contracts\Types;
use Backdrop\Contracts\Bootable;

/**
 * Register Post Type
 * 
 * @since  2.0.0
 * @access public
 * @return void
 */
class Type implements Bootable {
	/**
	 * $post post.
	 *
	 * @var $this Controller.
	 */
	protected $posts;

	/**
	 * Subject taxonomy
	 */
	/**
	 * Category Taxonomy
	 */
	public function category_labels() {
		$category_labels = [
			'name'                       => __( 'Categories',                           'backdrop-post-types' ),
			'singular_name'              => __( 'Category',                            'backdrop-post-types' ),
			'menu_name'                  => __( 'Categories',                           'backdrop-post-types' ),
			'name_admin_bar'             => __( 'Category',                            'backdrop-post-types' ),
			'search_items'               => __( 'Search Categories',                    'backdrop-post-types' ),
			'popular_items'              => __( 'Popular Categories',                   'backdrop-post-types' ),
			'all_items'                  => __( 'All Categories',                       'backdrop-post-types' ),
			'edit_item'                  => __( 'Edit Category',                       'backdrop-post-types' ),
			'view_item'                  => __( 'View Category',                       'backdrop-post-types' ),
			'update_item'                => __( 'Update Category',                     'backdrop-post-types' ),
			'add_new_item'               => __( 'Add New Category',                    'backdrop-post-types' ),
			'new_item_name'              => __( 'New Category Name',                   'backdrop-post-types' ),
			'not_found'                  => __( 'No Categories found.',                 'backdrop-post-types' ),
			'no_terms'                   => __( 'No Categories',                        'backdrop-post-types' ),
			'pagination'                 => __( 'Categories list navigation',           'backdrop-post-types' ),
			'list'                       => __( 'Categories list',                      'backdrop-post-types' ),
	
			// Non-hierarchical only.
			'separate_items_with_commas' => __( 'Separate Categories with commas',      'backdrop-post-types' ),
			'add_or_remove_items'        => __( 'Add or remove Categories',             'backdrop-post-types' ),
			'choose_from_most_used'      => __( 'Choose from the most used Categories', 'backdrop-post-types' ),
		];

		return apply_filters( 'backdrop/post/type/Category/label', $category_labels );
	}

	/**
	 * Category Taxonomy
	 */
	public function tag_labels() {
		$tag_labels = [
			'name'                       => __( 'Tags',                           'backdrop-post-types' ),
			'singular_name'              => __( 'Tag',                            'backdrop-post-types' ),
			'menu_name'                  => __( 'Tags',                           'backdrop-post-types' ),
			'name_admin_bar'             => __( 'Tag',                            'backdrop-post-types' ),
			'search_items'               => __( 'Search Tags',                    'backdrop-post-types' ),
			'popular_items'              => __( 'Popular Tags',                   'backdrop-post-types' ),
			'all_items'                  => __( 'All Tags',                       'backdrop-post-types' ),
			'edit_item'                  => __( 'Edit Tag',                       'backdrop-post-types' ),
			'view_item'                  => __( 'View Tag',                       'backdrop-post-types' ),
			'update_item'                => __( 'Update Tag',                     'backdrop-post-types' ),
			'add_new_item'               => __( 'Add New Tag',                    'backdrop-post-types' ),
			'new_item_name'              => __( 'New Tag Name',                   'backdrop-post-types' ),
			'not_found'                  => __( 'No Tags found.',                 'backdrop-post-types' ),
			'no_terms'                   => __( 'No Tags',                        'backdrop-post-types' ),
			'pagination'                 => __( 'Tags list navigation',           'backdrop-post-types' ),
			'list'                       => __( 'Tags list',                      'backdrop-post-types' ),
	
			// Non-hierarchical only.
			'separate_items_with_commas' => __( 'Separate Tags with commas',      'backdrop-post-types' ),
			'add_or_remove_items'        => __( 'Add or remove Tags',             'backdrop-post-types' ),
			'choose_from_most_used'      => __( 'Choose from the most used Tags', 'backdrop-post-types' ),
		];

		return apply_filters( 'backdrop/post/type/Tag/label', $tag_labels );
	}

	/**
	 * Register Custom Post Types.
	 */
	public function register_post_types() {
		foreach ( $this->posts as $name => $value ) {
			if ( ! apply_filters( "backdrop/post/type/{$name}", false ) ) {
				register_post_type( $name, $value );
			}
		}
	}

	/**
	 * Create Posts by create_post_type().
	 *
	 * @param string $type a post type.
	 * @param string $singular_label a single label.
	 * @param string $plural_label a more than one.
	 */
	public function create_post_type( $type, $singular_label, $plural_label ) {

		$labels = [
			'name'					=> sprintf( esc_html__( '%s', 						'backdrop-post-types' ),	$singular_label ),
			'singular_name'			=> sprintf( esc_html__( '%s', 						'backdrop-post_types' ),	$singular_label ),
			'name_admin_bar'		=> sprintf( esc_html__( '%s', 						'backdrop-post_types' ),	$singular_label ),
			'add_new'				=> sprintf( esc_html__( 'New %s', 					'backdrop-post-types' ),	$singular_label ),
			'add_new_item'			=> sprintf( esc_html__( 'Add New %s', 				'backdrop-post-types' ),	$singular_label ),
			'edit_item'				=> sprintf( esc_html__( 'Edit %s', 					'backdrop-post-types' ),	$singular_label ),
			'new_item'				=> sprintf( esc_html__( 'New %s', 					'backdrop-post-types' ),	$singular_label ),
			'view_item'				=> sprintf( esc_html__( 'View %s', 					'backdrop-post-types' ),	$singular_label ),
			'search_items'			=> sprintf( esc_html__( 'Search %s', 				'backdrop-post-types' ),	$plural_label ),
			'not_found'				=> sprintf( esc_html__( 'No %s Found', 				'backdrop-post-types' ),	$plural_label ),
			'not_found_in_trash' 	=> sprintf( esc_html__( 'No %s Found in Trash',		'backdrop-post-types' ),	$plural_label ),
		];

		$args = [
			'labels' => $labels,
			'public' => true,
			'has_archive'  => true,
			'menu_icon'    => 'dashicons-category',
			'show_ui'      => true,
			'show_in_rest' => true,
			'supports'     => [ 'title', 'editor', 'thumbnail' ],
			'rewrite'      => [ 'with_front' => false, 'slug' => $type ]
		];

		$this->posts[ 'backdrop-' . $type ] = array_merge( $labels, $args );
	}

	public function register_taxonomies() {
		foreach ( $this->posts as $key => $value ) {
			$this->create_taxonomies( $key );
		}
	}

	public function create_taxonomies( $type ) {

		$category_args = [
			'labels'            => $this->category_labels(),
			'public'            => true,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_admin_column' => true,
			'hierarchical'      => false,
			'show_in_rest'      => true,
		];

		$tag_args = [
			'labels'            => $this->tag_labels(),
			'public'            => true,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_admin_column' => true,
			'hierarchical'      => false,
			'show_in_rest'      => true,
		];

		register_taxonomy( $type . '-category', [ $type ], $category_args );
		register_taxonomy( $type . '-tag', [ $type ], $tag_args );
	}

	/**
	 * Construct.
	 */
	public function boot() {
		add_action( 'init', [ $this, 'register_post_types' ] );
		add_action( 'init', [ $this, 'register_taxonomies' ] );
	}
}