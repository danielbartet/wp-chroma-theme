<?php
//Creating a function to create our CPT
function custom_post_type() {
// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Wallpapers', 'Post Type General Name' ),
		'singular_name'       => _x( 'Wallpaper', 'Post Type Singular Name' ),
		'menu_name'           => __( 'Wallpapers' ),
		'parent_item_colon'   => __( 'Parent Wallpaper' ),
		'all_items'           => __( 'All Wallpaper' ),
		'view_item'           => __( 'View Wallpaper' ),
		'add_new_item'        => __( 'Add New Wallpaper' ),
		'add_new'             => __( 'Add New' ),
		'edit_item'           => __( 'Edit Wallpaper' ),
		'update_item'         => __( 'Update Wallpaper' ),
		'search_items'        => __( 'Search Wallpaper' ),
		'not_found'           => __( 'Not Found' ),
		'not_found_in_trash'  => __( 'Not found in Trash' ),
	);
// Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'wallpaper' ),
		'description'         => __( 'iPhone and iPad wallpapers' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy.
		'taxonomies'          => array( 'post_tag','wallpaper-categories' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
    'menu_icon'           => 'dashicons-format-image',
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 30,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'rewrite' => array('slug' => 'iphone-wallpapers','with_front' => false, 'hierarchical' => true)
	);
	// Registering your Custom Post Type
	register_post_type( 'wallpapers', $args );
}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'custom_post_type', 0 );
function themes_taxonomy() {
  register_taxonomy(
    'wallpaper-categories',
    'wallpapers',        //post type name
    array(
        'hierarchical' => true,
        'label' => 'Wallpaper Categories',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'iphone-8-wallpapers',
    				'hierarchical' => true,
    				'with_front' => false
        )
    )
  );
}
/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/
add_action( 'init', 'themes_taxonomy');

//changing posts per page for Wallpapers Post Type Archive pages
function custom_posts_per_page( $query ) {
  if ( $query->is_post_type_archive('wallpapers') ) {
    set_query_var('posts_per_page', 10);
  }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

function add_custom_types_to_tax( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    // Get all your post types
    $post_types = get_post_types();
    $query->set( 'post_type', $post_types );
    return $query;
  }
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );

// ONLY MOVIE CUSTOM TYPE POSTS
add_filter('manage_wallpapers_posts_columns', 'chroma_columns_head_wallpapers', 10);
add_action('manage_wallpapers_posts_custom_column', 'chroma_columns_content_wallpapers', 10, 2);

// CREATE TWO FUNCTIONS TO HANDLE THE COLUMN
function chroma_columns_head_wallpapers($defaults) {
    $defaults['wallpaper'] = 'Wallpaper';
    return $defaults;
}
function chroma_columns_content_wallpapers($column_name, $post_ID) {
    if ($column_name == 'wallpaper') {
        echo
        '<div style="width: 81px; height: 144px; overflow: hidden;">
          <img style="width: 100%; height: 100%; object-fit: cover;" src="'.get_the_post_thumbnail_url($post_ID, 'medium').'" />
        </div>';
    }
}
