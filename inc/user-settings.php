<?php

if (
    ( current_user_can('contributor') || current_user_can('author') )
    && (wp_get_current_user()->user_nicename !== "jesse-hollington" && wp_get_current_user()->user_nicename !== "nicholas-fearn")
  ) {
	add_filter('parse_query', 'filter_self_posts_query' );
}

function filter_self_posts_query( $wp_query ) {
    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/edit.php' ) !== false ) {
      global $current_user;
      $wp_query->set( 'author', $current_user->id );
     }
}
// Add/Remove User Contact Info
if ( !function_exists( 'new_contactmethods' ) ) {
  function new_contactmethods( $contactmethods ) {
    $contactmethods['facebook'] = 'Facebook'; // Add Facebook
    $contactmethods['twitter'] = 'Twitter'; // Add Twitter
    unset($contactmethods['yim']); // Remove YIM
    unset($contactmethods['aim']); // Remove AIM
    unset($contactmethods['jabber']); // Remove Jabber
    return $contactmethods;
  }
}
add_filter('user_contactmethods','new_contactmethods',10,1);
