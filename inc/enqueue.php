<?php
// Enqueue and register scripts and styles for the theme

function chroma_scripts_method() {
    // Versioning based on file modification times
    $csstime = filemtime(get_template_directory() . '/dist/css/main.css');
    $jstime = filemtime(get_template_directory() . '/dist/js/main.js');

    // Deregister default WordPress scripts
    wp_deregister_script('wp-embed');
    wp_deregister_script('jquery');

    // Register and enqueue styles
    wp_enqueue_style('chroma-styles', get_template_directory_uri() . '/dist/css/main.css', array(), $csstime);

    // Register Redux script if used and needed before main.js
    wp_register_script('redux', 'https://cdn.jsdelivr.net/npm/redux@4.0.5/dist/redux.min.js', [], null, true);
    wp_enqueue_script('redux');

    // Register main JavaScript file with dependency on Redux
    wp_register_script('main', get_template_directory_uri() . '/dist/js/main.js', ['redux'], $jstime, true);
    wp_enqueue_script('main');

    // Register additional scripts with dependencies
    wp_register_script('masonry-layout', get_template_directory_uri() . '/dist/js/gallery.js', ['main'], $jstime, true);
    wp_register_script('apple-affiliate-linker', get_template_directory_uri() . '/dist/js/apple-affiliate-linker.js', ['main'], $jstime, true);
    wp_register_script('addme', get_template_directory_uri() . '/dist/js/addme.js', array(), '', true);
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, '1.12.4', true);
    
    // Enqueue scripts based on specific conditions
    if (is_single()) {
        wp_enqueue_script('gleam-tracking', get_template_directory_uri() . '/dist/js/gleam-tracking.js', ['main'], '', true);
        wp_enqueue_script('disqus-comment-count', '//idropnews.disqus.com/count.js', '', null, true);
        add_action('wp_footer', 'disqus_config');
    }

    if (has_term('', 'wallpaper-categories') || is_tax('wallpaper-categories') || is_page_template('page-wallpaper-latest.php')) {
        wp_enqueue_style('wallpapers', get_template_directory_uri() . '/dist/css/wallpaper.css', false, filemtime(get_template_directory() . '/dist/css/wallpaper.css'), 'all');
        wp_enqueue_script('wallscript');
    }

    if (get_post_format() && in_array(get_post_format(), array('gallery'))) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('masonry-layout');
    }

    if (has_category('Apps') || is_page('unsubscribe')) {
        wp_enqueue_script('apple-affiliate-linker');
    }

    if (is_page('unsubscribe')) {
        wp_enqueue_script('subscription_form', get_template_directory_uri() . '/dist/js/form.js', ['main'], '', true);
    }
}

add_action('wp_enqueue_scripts', 'chroma_scripts_method', 10);

function disqus_config() {
    echo "<script>var disqus_config = function(){this.page.title = '" . addslashes(htmlentities(get_the_title(get_the_ID()))) . "';this.page.url = '" . addslashes(get_the_permalink(get_the_ID())) . "';this.page.identifier ='idropnews-" . get_the_ID() . "';}</script>";
}

// Optionally remove jQuery migrate if not needed
function dequeue_jquery_migrate($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
}

add_action('wp_default_scripts', 'dequeue_jquery_migrate');

// Async and Defer script loading for performance improvement
function chroma_async_scripts($tag, $handle, $src) {
    $async_scripts = ['main', 'layout', 'masonry-layout'];
    $defer_scripts = ['disqus', 'addme', 'apple-affiliate-linker', 'wallscript', 'like-button', 'masonry-layout-init', 'gleam-tracking'];

    if (in_array($handle, $async_scripts)) {
        return '<script src="' . $src . '" async></script>' . "\n";
    } elseif (in_array($handle, $defer_scripts)) {
        return '<script src="' . $src . '" defer></script>' . "\n";
    }
    return $tag;
}

add_filter('script_loader_tag', 'chroma_async_scripts', 10, 3);

