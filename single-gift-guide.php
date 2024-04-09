<?php
/* Template Name: Gift Guide Post
Template Post Type: post */
?>
<?php get_header(); ?>
<?php global $author; $userdata = get_userdata($author); ?>
	<div class="post-wrap-out1">
			<main id="post-left-col" class="relative" role="main">
					<?php if (have_posts()) : while (have_posts()) : the_post();
					get_template_part( 'template-parts/post/content-header' ); ?>
					<!-- get_template_part( 'template-parts/post/content' ); -->

					<article>
						<?php the_content() ?>
					</article>


				<?php	/* get_template_part( 'template-parts/post/content-footer' );*/
					get_template_part('partials/socialsharing');
				endwhile; endif;
				 ?>
				</main>
				<!-- <aside id="post-right-col" class="post-right-col relative fade-in fade-in-medium">
					<div class="theiaStickySidebar">
							<?php /* get_template_part('popular'); */ ?>
					</div>
				</aside> -->
		</div>
<?php get_footer(); ?>
