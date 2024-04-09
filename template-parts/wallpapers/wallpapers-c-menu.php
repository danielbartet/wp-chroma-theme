<?php
/**
 * Template part for displaying Wallpapers Menu and HEader
 */
?>
<?php get_header(); ?>
<nav class="c-wp-menu-toggle">
	<div id="c-wp-menu-toggle"><span><div></div>Menu</span></div>
	<a href="<?php echo get_site_url(); ?>/iphone-wallpapers/"><span><div></div>Popular</span></a>
	<a href="<?php  echo get_site_url(); ?>/latest-iphone-wallpapers/"><span><div></div>Latest</span></a>
</nav>
<nav class="c-wp-container">
		 <div class="c-wp-col-left box-shadow-nohover">
			  <div>
			 <h4>Categories:</h4>
						<?php wp_nav_menu( array( 'theme_location' => 'Wallpapers-menu' ) ); ?>
				</div>
				 <div>
					<h4>Filter:</h4>
					<?php wp_nav_menu( array( 'theme_location' => 'WPFilter-menu' ) ); ?>
				</div>
		 </nav>
