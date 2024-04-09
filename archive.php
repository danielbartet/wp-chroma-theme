<?php get_header(); ?>
<div id="home-main-wrap" class="left relative">
	<div class="home-wrap-out1">
			<div id="home-left-wrap" class="left relative">
				<div id="home-left-col" class="relative">
					<div id="home-mid-wrap" class="left relative">
						<div id="archive-list-wrap" class="left relative">
							<?php if(is_tag() ) { ?>
								<h1 class="arch-head"><?php single_tag_title(); ?></h1>
							<?php } else if( is_tag( 'iPhone Wallpaper' ) ) { ?><h1 class="arch-head"><?php single_tag_title(); ?>s</h1><?php } ?>
							<?php if(get_option('mvp_arch_layout') == 'Column' ) { ?>
								<ul class="archive-col-list left relative infinite-content">
							<?php } else { ?>
								<ul class="archive-list left relative infinite-content">
							<?php } ?>
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
										<li class="infinite-post">
											<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
													<?php get_template_part('/partials/cards/post-card') ?>
											<?php } else { ?>
												  <?php get_template_part('/partials/cards/post-card') ?>
											<?php } ?>
										</li>
								<?php endwhile; endif; ?>
							</ul>
							<?php $mvp_infinite_scroll = get_option('mvp_infinite_scroll'); if ($mvp_infinite_scroll == "true") { if (isset($mvp_infinite_scroll)) { ?>
								<a href="#" class="inf-more-but"><?php _e( 'More Posts', 'mvp-text' ); ?></a>
							<?php } } ?>
							<div class="nav-links">
								<?php if (function_exists("pagination")) { pagination($wp_query->max_num_pages); } ?>
							</div><!--nav-links-->
						</div><!--archive-list-wrap-->
					</div><!--home-mid-wrap-->
				</div><!--home-left-col-->
			</div><!--home-left-wrap-->
	</div><!--home-wrap-out1-->
</div><!--home-main-wrap-->
<?php get_footer(); ?>
