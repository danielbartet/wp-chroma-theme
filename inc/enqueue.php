<?php
// Enqueue Javascript/CSS Files
if ( !function_exists( 'chroma_scripts_method' ) ) {
function chroma_scripts_method() {
	global $wp_styles;
	//css versioning
	$csstime = filemtime( get_template_directory() . '/dist/css/main.css' );
	//js versioning
	$jstime = filemtime( get_template_directory() . '/dist/js/main.js' );
  //deregister
  wp_deregister_script( 'wp-embed' );
  wp_deregister_script( 'jquery' );
  //enqueue style
	wp_enqueue_style( 'chroma-styles', get_template_directory_uri() . '/dist/css/main.css', '', $csstime );
  //register
	//wp_enqueue_script('redux', get_template_directory_uri() . '/node_modules/redux/dist/redux.min.js', '', $jstime, true);
	wp_register_script('main', get_template_directory_uri() . '/dist/js/main.js', 'redux', $jstime, true);
	wp_register_script('masonry-layout', get_template_directory_uri() . '/dist/js/gallery.js', array('main'), $jstime, true);
	wp_register_script( 'apple-affiliate-linker', get_template_directory_uri() . '/dist/js/apple-affiliate-linker.js', array('main'), $jstime, true);
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, '1.12.4');
  //enqueue core script
	wp_enqueue_script('main');

  //slider script
  if(is_page_template('page-imageRefresh.php'))
    wp_enqueue_script('slider', get_template_directory_uri() . '/dist/js/slider.js', '', '', true);

	//addme script
	wp_register_script('addme', get_template_directory_uri() . '/dist/js/addme.js', '', '', true);
	wp_enqueue_script('addme');

	//conditional enqueues
	if (is_single()) {
    //enqueue gleam tracking script
    wp_enqueue_script('gleam-tracking', get_template_directory_uri() . '/dist/js/gleam-tracking.js', array('main'), '', true);

    //local disqus path get_template_directory_uri() . '/dist/js/count.js' <script id="dsq-count-scr" src="//EXAMPLE.disqus.com/count.js" async></script>
    wp_enqueue_script('disqus-comment-count', '//idropnews.disqus.com/count.js', '', null, true);
    function disqus_config() {
      echo "<script>var disqus_config = function(){this.page.title = '".addslashes(htmlentities(get_the_title(get_the_ID())))."';this.page.url = '".addslashes(get_the_permalink(get_the_ID()))."';this.page.identifier ='idropnews-". get_the_ID()."';}</script>";
    }
    //post object
    wp_localize_script('main', 'chromaPost', array( 'ID' => get_the_ID()) );
    add_action('wp_footer', 'disqus_config');
	}
	//enqueue wallpapers scripts and like button
	if (has_term('','wallpaper-categories') || is_tax( 'wallpaper-categories' ) || is_page_template('page-wallpaper-latest.php')) {
    wp_register_script( 'wallscript', get_template_directory_uri() . '/dist/js/wallscript.js', array('main'), filemtime( get_template_directory() . '/dist/js/wallscript.js' ), true);
    //like button object
    wp_localize_script('wallscript', 'ajaxPage', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce')
    ));
    wp_enqueue_style( 'wallpapers', get_template_directory_uri() . '/dist/css/wallpaper.css',false, filemtime( get_template_directory() . '/dist/css/wallpaper.css' ),'all');
    wp_enqueue_script('wallscript');
	}

		if (get_post_format() && in_array( get_post_format(), array( 'gallery' ) ) ) {
      wp_enqueue_script('jquery');
      wp_enqueue_script('masonry-layout');
      wp_enqueue_script('masonry-layout-init', get_template_directory_uri() . '/src/js/gallery-initial.js', array('masonry-layout'), '', true);
    }

		if (has_category('Apps'))
				wp_enqueue_script('apple-affiliate-linker');

    if (is_page('unsubscribe'))
      wp_enqueue_script('subscription_form', get_template_directory_uri() . '/dist/js/form.js', array('main'), '', true);

	}
}

add_action('wp_enqueue_scripts', 'chroma_scripts_method', 10);

function priority_enqueue() {
  if ( is_home() || is_front_page() || is_category() || is_search() || is_author() || is_tag()) {
      wp_register_script('infinite-scroll', get_template_directory_uri() . '/dist/js/chroma-infinite.js', '', filemtime( get_template_directory() . '/dist/js/chroma-infinite.js' ), true);
      wp_enqueue_script('infinite-scroll');
  }
}
add_action('wp_enqueue_scripts', 'priority_enqueue', 0);

function dequeue_jquery_migrate( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
		$jquery_dependencies = $scripts->registered['jquery']->deps;
		$scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
	}
}
add_action( 'wp_default_scripts', 'dequeue_jquery_migrate' );
remove_action ('wp_head', 'wp_site_icon', 99);

//async script loading function - very important
function chroma_async_scripts( $tag, $handle, $src ) {
    // the handles of the enqueued scripts we want to async
    $async_scripts = array( 'main', 'layout','masonry-layout');
		$defer_scripts = array(  'disqus', 'addme', 'apple-affiliate-linker', 'wallscript', 'infinite-scroll', 'like-button', 'masonry-layout-init', 'gleam-tracking' );

    if ( in_array( $handle, $async_scripts ) ) {
        return '<script src="' . $src . '"></script>' . "\n";
    } elseif ( in_array( $handle, $defer_scripts) ) {
				return '<script defer src="' . $src . '"></script>' . "\n";
		}

    //apply data attributes
    if ($handle == 'disqus-comment-count') {
      return '<script defer id="dsq-count-scr" src="' . $src . '"></script>';
    }

    return $tag;
}
add_filter( 'script_loader_tag', 'chroma_async_scripts', 10, 3 );
