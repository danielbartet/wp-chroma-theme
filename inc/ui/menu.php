<?php
// Register Custom Menus
if ( !function_exists( 'register_menus' ) ) {
function register_menus() {
	register_nav_menus(
		array(
			'main-menu' => __( 'Main Menu', 'chroma-text' ),
			'mobile-menu' => __( 'Fly-Out Menu', 'chroma-text' ),
			'overlay-menu' => __( 'Overlay Menu', 'chroma-text' ),
			'SiteMap-menu' => __( 'SiteMap', 'chroma-text' ),
			'SiteMap-menu2' => __( 'SiteMap2', 'chroma-text' ),
			'Wallpapers-menu' => __( 'Wallpapers', 'chroma-text' ),
			'wallpapersSM-menu' => __( 'Wallpapers Sitemap', 'chroma-text' ),
			'WPFilter-menu' => __( 'WP Filters', 'chroma-text' ),
			'footer-menu' => __( 'Footer Menu', 'chroma-text' ))
	  	);
	  }
}
add_action( 'init', 'register_menus' );

// Register walker Menu
add_filter( 'walker_nav_menu_start_el', 'wpse63345_walker_nav_menu_start_el', 10, 4 );
function wpse63345_walker_nav_menu_start_el( $item_output, $item, $depth, $args ) {
	global $wp_query;
  // The walker dropdown only applies to the main navigation.
  // Your theme location name may be different, "main" is just something I tend to use.
  if ( 'main-menu' !== $args->theme_location )
    return $item_output;

  return $item_output;
}
