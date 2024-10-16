<?php
	/* Template Name: Full Width --- Author */
?>
<?php get_header(); ?>
<div id="post-main-wrap" class="left relative" itemscope itemtype="http://schema.org/Article">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-left-col" class="relative">
			<article id="post-area" <?php post_class(); ?>>
				<div id="post-header">
					<h1 class="post-title left" itemprop="name headline31239812983"></h1>
				</div><!--post-header-->
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<div id="post-feat-img" class="left relative">
						<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), ''); ?>
						<img itemprop="image" src="<?php echo $thumb['0']; ?>" />
					</div><!--post-feat-img-->
				<?php } ?>
				<div id="content-area" itemprop="articleBody" <?php post_class(); ?>>
					<div id="content-main" class="content-main left relative">
						<?php the_content(); ?>
<?php wp_list_authors('show_fullname=1&optioncount=1&orderby=post_count&order=DESC&number=9'); ?>
						<?php wp_link_pages(); ?>
						<div class="posts-nav-link">
							<?php posts_nav_link(); ?>
						</div><!--posts-nav-link-->
						<?php if ( comments_open() ) { ?>
							<?php $disqus_id = get_option('mvp_disqus_id'); if ($disqus_id) { if (isset($disqus_id)) {  ?>
								<div id="comments-button" class="left relative comment-click com-but-click">
								</div><!--comments-button-->
								<?php $disqus_id2 = esc_html($disqus_id); mvp_disqus_embed($disqus_id2); ?>
							<?php } } else { ?>
								<?php $mvp_click_id = get_the_ID(); ?>
								<div id="comments-button" class="left relative comment-click-<?php echo esc_html($mvp_click_id); ?> com-but-<?php echo esc_html($mvp_click_id); ?>">
								</div><!--comments-button-->
								<?php comments_template(); ?>
							<?php } ?>
						<?php } ?>
					</div><!--content-main-->
				</div><!--content-area-->
			</article>
		</div><!--post-left-col-->
	<?php endwhile; endif; ?>
</div><!--post-main-wrap-->
<?php get_footer(); ?>
