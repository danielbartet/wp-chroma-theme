<?php
	/* Template Name: Site Map */
?>
<?php get_header(); ?>
<style>body, .body-main-wrap, .site{background: linear-gradient(45deg, rgba(72,49,255,1) 0%, rgba(255,119,0,0) 100%),linear-gradient(225deg, rgba(255,114,31,1) 0%, rgba(255,114,31,0) 100%),linear-gradient(135deg, rgba(255,0,245,0) 0%, rgba(255,0,245,0) 100%),rgba(255,0,0,1);</style>
<div class="sitemap-page">
	<h1 class="post-title"><?php single_post_title(); ?></h1>
    <?php wp_nav_menu( array( 'theme_location' => 'SiteMap-menu2' ) ); ?>
</div>
<?php get_footer(); ?>
