<?php
// Enqueue and register scripts and styles for the theme

function get_latest_file($dir, $prefix) {
    $latest_mtime = 0;
    $latest_file = '';

    $base_path = get_template_directory() . $dir;
    $base_url = get_template_directory_uri() . $dir;

    foreach (glob($base_path . $prefix . '*') as $file) {
        if (filemtime($file) > $latest_mtime) {
            $latest_mtime = filemtime($file);
            $latest_file = $base_url . '/' . basename($file);
        }
    }

    return $latest_file;
}

function chroma_scripts_method() {
    // Deregister default WordPress scripts
    wp_deregister_script('wp-embed');
    wp_deregister_script('jquery');

    // Register and enqueue styles
    $main_css = get_latest_file('/dist/css/', 'main');
    wp_enqueue_style('chroma-styles', $main_css, array(), null);

    // Register Redux script if used and needed before main.js
    wp_register_script('redux', 'https://cdn.jsdelivr.net/npm/redux@4.0.5/dist/redux.min.js', [], null, true);
    wp_enqueue_script('redux');

    // Register main JavaScript file with dependency on Redux
    $main_js = get_latest_file('/dist/js/', 'main');
    wp_register_script('main', $main_js, ['redux'], null, true);
    wp_enqueue_script('main');

    // Register additional scripts with dependencies
    $gallery_js = get_latest_file('/dist/js/', 'gallery');
    wp_register_script('masonry-layout', $gallery_js, ['main'], null, true);

    $affiliate_js = get_latest_file('/dist/js/', 'apple-affiliate-linker');
    wp_register_script('apple-affiliate-linker', $affiliate_js, ['main'], null, true);

    $chroma_js = get_latest_file('/dist/js/', 'chroma');
    wp_register_script('chroma', $chroma_js, ['main'], null, true);

    // Enqueue scripts based on specific conditions
    if (is_single()) {
        $gleam_js = get_latest_file('/dist/js/', 'gleam-tracking');
        wp_enqueue_script('gleam-tracking', $gleam_js, ['main'], null, true);
        wp_enqueue_script('disqus-comment-count', '//idropnews.disqus.com/count.js', '', null, true);
        add_action('wp_footer', 'disqus_config');
    }

    if (has_term('', 'wallpaper-categories') || is_tax('wallpaper-categories') || is_page_template('page-wallpaper-latest.php')) {
        $wallpapers_css = get_latest_file('/dist/css/', 'wallpaper');
        wp_enqueue_style('wallpapers', $wallpapers_css, array(), null);
        $wallscript_js = get_latest_file('/dist/js/', 'wallscript');
        wp_enqueue_script('wallscript', $wallscript_js, ['main'], null, true);
    }

    if (get_post_format() && in_array(get_post_format(), array('gallery'))) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('masonry-layout');
    }

    if (has_category('Apps') || is_page('unsubscribe')) {
        wp_enqueue_script('apple-affiliate-linker');
    }

    if (is_page('unsubscribe')) {
        $form_js = get_latest_file('/dist/js/', 'form');
        wp_enqueue_script('subscription_form', $form_js, ['main'], null, true);
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
