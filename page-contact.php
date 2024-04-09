<?php
	/* Template Name: Contact Page */
    if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
        wpcf7_enqueue_scripts();
    }

    if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
        wpcf7_enqueue_styles();
    }
?>
<?php get_header(); ?>
<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), ''); ?>
<div class="alt-cat-header" itemprop="image"  style="background-image: url('<?php echo $thumb['0']; ?>')"><div class="alt-cat-header-overlay">
<h1><?php the_title(); ?></h1>
</div>
</div>
<?php } ?>
<div class="contact-wrap" itemscope itemtype="http://schema.org/Article">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-area" <?php post_class(); ?>>

				<div id="content-area" itemprop="articleBody" <?php post_class(); ?>>
					<div id="content-main" class="content-main">
						<?php the_content(); ?>
					</div><!--content-main-->
				</div><!--content-area-->
			</article>
	<?php endwhile; endif; ?>
</div><!--contact-wrap-->
<style> .contact-wrap {max-width: 700px; margin: 0 auto;} </style>
<?php get_footer(); ?>
