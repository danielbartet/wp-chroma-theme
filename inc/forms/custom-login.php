<?php
// Custom Login
// function login_failed() {
//   $login_page  = home_url( '/idrop-forums-login/' );
//   wp_redirect( $login_page . '?login=failed' );
//   exit;
// }
// add_action( 'wp_login_failed', 'login_failed' );
// remove_action( 'wp_login_failed', 'login_failed' );

function verify_username_password( $user, $username, $password ) {
  $login_page  = home_url( '/idrop-forums-login/' );
    if( $username == "" || $password == "" ) {
        wp_redirect( $login_page . "?login=empty" );
        exit;
    }
}
add_filter( 'authenticate', 'verify_username_password', 1, 3);
function logout_page() {
  $login_page  = home_url( '/idrop-forums-login/' );
  wp_redirect( $login_page . "?login=false" );
  exit;
}
add_action('wp_logout','logout_page');

//Registration Form Redirect For recaptcha
function my_registration_page_redirect() {
	global $pagenow;
	if ( ( strtolower($pagenow) == 'wp-login.php') && array_key_exists('action', $_GET) && ( strtolower( $_GET['action'] ) == 'register' ) ) {
		wp_redirect( home_url('/forums-register/') );
	}
}

add_filter( 'init', 'my_registration_page_redirect' );
