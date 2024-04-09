<?php
//modifying conditions for my main query presented on home page, archive, author and category level pages
function modify_main_query( $query ) {
	if ( ($query->is_archive() || $query->is_author() ) && $query->is_main_query() ) {
    $query->set( 'posts_per_page', 24 );
	}
	if ( $query->is_category() && $query->is_main_query() ) {
    $query->set( 'posts_per_page', 16 );
	}
	if ( $query->is_home() && $query->is_main_query() ) {
    $query->set( 'posts_per_page', 16 );
    $query->set( 'post_type', 'post' );
    $query->set( 'category_name' , array('news, how to, rumors, reviews, iphone 8') );
    $query->set( 'category__not_in' , array('644') );
    $query->set( 'post_status' , 'publish' );
	}
  if ( $query->is_search() ) {
    $query->set( 'cat', -33565 );
  }
}
add_action( 'pre_get_posts', 'modify_main_query' );
