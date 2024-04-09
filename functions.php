<?php
//Theme Setup
if ( ! function_exists( 'chroma_setup' ) ) {
  function chroma_setup() {
    load_theme_textdomain('chroma-text', get_template_directory() . '/languages');
    $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";
    if ( is_readable( $locale_file ) )
      require( $locale_file );
    add_theme_support( 'post-formats', array(
      'gallery',
      'video'
    ) );
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'customize-selective-refresh-widgets' );
   }
}
add_action('after_setup_theme', 'chroma_setup');

// Register Thumbnails
if ( function_exists( 'add_theme_support' ) ) {
  remove_image_size('medium_large');
  remove_image_size('large');
  remove_image_size('thumbnail');
  //Note That MEDIUM is available by default and configured in wp-admin > settings > media
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 1000, 600, true );
  //add_image_size( 'full-size' , 2000, 2000, false);
  add_image_size( 'iphone-7-thumb', 1080, 1920, array( 'center', 'center' ) );
  add_image_size( 'inside-post', 800, 480, false );
  add_image_size( 'chroma-small-thumb', 80, 80, array( 'center', 'center' ) );
  add_image_size( 'chroma-tiny-thumb', 20, 12, true);
  //instagram thumb
  add_image_size( 'instagram-thumb', 1080, 1080, array( 'center', 'center' ));
}
// Register the three useful image sizes for use in Add Media modal
add_filter( 'image_size_names_choose', 'chroma_custom_sizes' );
function chroma_custom_sizes( $sizes ) {
  return array_merge( $sizes, array(
    'inside-post' => __( 'Inside a Post Thumbnail' ),
  ) );
}

//This sets output buffering for wordpress after most of it is loaded.
//Turning on output buffering alone decreases the amount of time it takes to download and render our HTML because it's not being sent to the browser in pieces as PHP processes the HTML.
//All the fancy stuff we can do with PHP strings, we can now do with our whole HTML page as one variable.
//@ https://stackoverflow.com/questions/2832010/what-is-output-buffering
function start_output_buffer() {
  ob_start();
}
add_action('wp_head', 'start_output_buffer', 1);
function end_output_buffer() {
  echo ob_get_clean();
}
add_action('wp_footer', 'end_output_buffer', 100);

/*


//THE FOLLOWING CONTENT WAS THE ORIGINAL CODE TO CREATE A SORTABLE WORD COUNT COLUMN. I WAS UN
//UNABLE TO REWORK IT TO IGNORE TAGS IN THE SORTING. THIS FUNCTION HAS BBEEN MOVED TO THE PLUGIN fsj_wordcount

// Add custom column to post list //
function add_content_size_column( $columns ) {
  return array_merge( $columns, array( 'content_size' => __( 'Size', 'your_text_domain' ) ) );
}
add_filter( 'manage_posts_columns' , 'add_content_size_column' );

// my attempt
//Display custom column
function display_posts_content_size( $column, $post_id ) {
  if ( 'content_size' == $column ) {

    $content = get_post_field( 'post_content', $post_id );
    $decode_content = html_entity_decode( $content );
    $filter_shortcode = strip_shortcodes( $decode_content );
  //removes embedded video and images code
  $remove_videos = preg_replace('/<figure class="wp-block-embed is-type-video is-provider-tiktok">(.*?)<\/figure>/s', '', $filter_shortcode);
  $remove_images = preg_replace('/<div class="wp-block-chroma-blocks-media-upload none">(.*?)<\/div>/s', '', $filter_shortcode);
  //strips the html tags
  $strip_tags = wp_strip_all_tags( $remove_images, true );
  //counts the words
  $count = str_word_count( strip_shortcodes($strip_tags) );
  echo $count;
  }
}
add_action( 'manage_posts_custom_column' , 'display_posts_content_size', 10, 2 );

// Set custom column as sortable //
function set_content_size_column_as_sortable( $columns ) {
  $columns['content_size'] = 'content_size';

  return $columns;
}
add_filter( 'manage_edit-post_sortable_columns', 'set_content_size_column_as_sortable' );


function my_content_size_orderby( $orderby ) {
  global $wpdb;

  // Run this filter only once, when needed (it will be added by pre_get_posts)
  remove_filter( 'posts_orderby', 'my_content_size_orderby' );

  $orderby = str_replace( "{$wpdb->posts}.post_date ", "LENGTH( {$wpdb->posts}.post_content ) ", $orderby );

  return $orderby;
}

function my_content_size_modify_orderby( $query ) {
  if ( ! is_admin() ) return;

  if ( 'content_size' == $query->get( 'orderby' ) ) {
      add_filter( 'posts_orderby', 'my_content_size_orderby' );
  }
}
add_action( 'pre_get_posts', 'my_content_size_modify_orderby' );



*/



//originial script

/*
// Add Length Column
add_filter('manage_post_posts_columns', function ( $columns )
{
    $_columns = [];

    foreach( (array) $columns as $key => $label )
    {
        $_columns[$key] = $label;
        if( 'title' === $key )
            $_columns['ryu_post_content_length'] = __( 'Length' );  
    }
    return $_columns;
} );

*/

//Strips content and counts words
function fsj_count_content_words( $content ) {
  $decode_content = html_entity_decode( $content );
  $filter_shortcode = strip_shortcodes( $decode_content );
  //removes embedded video and images code
  $remove_videos = preg_replace('/<figure class="wp-block-embed is-type-video is-provider-tiktok">(.*?)<\/figure>/s', '', $filter_shortcode);
  $remove_images = preg_replace('/<div class="wp-block-chroma-blocks-media-upload none">(.*?)<\/div>/s', '', $filter_shortcode);
  //strips the html tags
  $strip_tags = wp_strip_all_tags( $remove_images, true );
  //counts the words
  $count = str_word_count( strip_shortcodes($strip_tags) );

  return $count;
}


//just strips content
function fsj_strip_tags( $content ) {
  $decode_content = html_entity_decode( $content );
  $filter_shortcode = strip_shortcodes( $decode_content );
  //removes embedded video and images code
  $remove_videos = preg_replace('/<figure class="wp-block-embed is-type-video is-provider-tiktok">(.*?)<\/figure>/s', '', $filter_shortcode);
  $remove_images = preg_replace('/<div class="wp-block-chroma-blocks-media-upload none">(.*?)<\/div>/s', '', $filter_shortcode);
  //strips the html tags
  $strip_tags = wp_strip_all_tags( $remove_images, true );
  //counts the words
  $strippedContent =  strip_shortcodes($strip_tags) ;

  return $strippedContent;
}

/*
// Fill Column With Word Counts
add_action( 'manage_post_posts_custom_column', function ( $column_name, $post_id )
{
    
    if ( $column_name == 'ryu_post_content_length')
      $thecount = fsj_count_content_words(get_post( $post_id )->post_content);
        //echo $thecount;
        if (get_post_meta($post_id, 'contentLength', true) != $thecount){
          update_post_meta($post_id, 'contentLength', $thecount);
        }
        $meta = get_post_meta($post_id, 'contentLength', true);
        echo $thecount;
        

        
        
        
        //echo str_word_count( wp_strip_all_tags( get_post( $post_id )->post_content ) );

}, 10, 2 );
// Make Column Orderable
add_filter( 'manage_edit-post_sortable_columns', function ( $columns )
{
  $columns['ryu_post_content_length'] = 'ryu_post_content_length';
  return $columns;
} );
// Order Through Proper Filter
/*
add_action( 'pre_get_posts', 'my_word_orderby' );
function my_word_orderby( $query ) {
    if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
    $_order = $query->get( 'order' );

    echo $_order;
   
    if( 'ryu_post_content_length' == $orderby ) {
      global $wpdb;

      $sql = 'SELECT * FROM $wpdb->posts
      LEFT JOIN $wpdb->postmeta ON($wpdb->posts.ID = $wpdb->postmeta.post_id)
      ORDER BY $wpdb->postmeta.contentLength' ;

      $fullQuery = $sql . ' ' . $_order;

      $results =  $wpdb->get_results($fullQuery);
        //$query->set('meta_key','contentLength');
        //$query->set('orderby','meta_value_num');
    }
    return $results;
}
*/


/*
// Original Version. sorted by length INCLUDING tags, despite displaying without tags
add_filter( 'posts_orderby', function( $orderby, WP_Query $q )
{
    $_orderby = $q->get( 'orderby' );
    $_order   = $q->get( 'order' );

    if(
           is_admin()
        && $q->is_main_query()
        && 'ryu_post_content_length' === $_orderby
        && in_array( strtolower( $_order ), [ 'asc', 'desc' ] )
    ) {
        global $wpdb;
        $orderby = " LENGTH( {$wpdb->posts}.post_content ) " . $_order . " ";
    }
    return $orderby;
}, 10, 2 );

*/

//enqueuing, script modifiers and asset routing logic
require get_template_directory() . '/inc/enqueue.php';
//Theme Options
require get_template_directory() . '/inc/options/theme-options-panel.php';
//ad placement options
require get_template_directory() . '/inc/options/ad-placement-panel.php';
//menu
require get_template_directory() . '/inc/ui/menu.php';
//menu
require get_template_directory() . '/inc/ui/mobile-menu.php';
//pagination
require get_template_directory() . '/inc/ui/pagination.php';
//wallpapers
require get_template_directory() . '/inc/wallpapers/wallpapers.php';
//SEO related functionality
require get_template_directory() . '/inc/seo/seo.php';
//register widgets
require get_template_directory() . '/widgets/sidebar-widget.php';
//user settings
require get_template_directory().'/inc/user-settings.php';
//redirect default rss feeds to feedburner feeds
require get_template_directory().'/inc/feedburner-modifier.php';
//add or modify custom meta boxes
//require(get_template_directory().'/inc/post-meta-boxes/meta-box-controller.php');
require get_template_directory().'/inc/post-meta-boxes/layout-options.php';
//require(get_template_directory().'/inc/post-meta-boxes/ads-toggle.php');

//modifying conditions for my main query presented on home page, archive, author and category level pages
require get_template_directory().'/inc/query-modifiers.php';
//Custom Forms
require get_template_directory() . '/inc/forms/custom-login.php';
require get_template_directory() . '/inc/forms/custom-registration.php';

//content filters
require get_template_directory() . '/inc/content-filters/iframe-and-lightbox-filters.php';

//convert multipage post by concatenating content and injecting ads
require get_template_directory() . '/template-parts/ads/slider/chroma-convert-multipage-post.php';


/* Admin CSS styles */
function fsjadminStylesCss() {
  $url = get_settings('siteurl');
  $url = $url . '/wp-content/themes/chroma/css/wp-admin.css';
  echo '<!-- Admin CSS styles -->
        <link rel="stylesheet" type="text/css" href="' . $url . '" />
        <!-- /end Admin CSS styles -->';
}
add_action('pre-upload-ui', 'fsjadminStylesCss');
