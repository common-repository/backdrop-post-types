<?php

namespace Backdrop\PostTypes\Portfolio;

// Custom columns on the edit portfolio items screen.
add_filter( 'manage_edit-backdrop-portfolio_columns', __NAMESPACE__ . '\bpt_backdrop_portfolio_columns' );
add_action( 'manage_backdrop-portfolio_posts_custom_column', __NAMESPACE__ . '\bct_backdrop_portfolio_custom_column', 10, 2 );


function bpt_backdrop_portfolio_columns( $columns ) {

	$new_columns = [
		'cb'    => $columns['cb'],
		'title' => __( 'Project', 'backdrop-post-types' )
	];

	if ( current_theme_supports( 'post-thumbnails' ) )
		$new_columns['thumbnail'] = __( 'Thumbnail', 'backdrop-post-types' );

	$columns = array_merge( $new_columns, $columns );

	$columns['title'] = $new_columns['title'];

	return $columns;
}


function bct_backdrop_portfolio_custom_column( $column, $post_id ) {
	if ( 'thumbnail' === $column ) {

		if ( has_post_thumbnail() ) {
			the_post_thumbnail( array( 100, 100 ) );
		}			
	}
}