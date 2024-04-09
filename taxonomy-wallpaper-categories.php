<?php
 global $page, $numpages, $multipage;
?>
			<?php
			 $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			 ?>
			<?php get_template_part( 'template-parts/wallpapers/wallpapers-c-menu'); ?>
      <?php
        //get wallpapers bottom top
        get_template_part( 'template-parts/ads/wallpaper/wallpaper-top');
      ?>
      <h1 class="wph1"><?php echo $term->name; ?></h1>
      <div class="scroll-indicator">Scroll</div>
			<div class="c-wp-col-right fade-in">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	         <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" class="wp-archive-thumb box-shadow-default">
             <img src="<?php the_post_thumbnail_url( 'chroma-tiny-thumb' ); ?>" data-src="<?php the_post_thumbnail_url( 'inside-post' ); ?>" class="lazyload-img llreplace wallpaper-card"/>
	         </a>
	       	<?php endwhile; endif; ?>
								 <div class="clearfix"></div>
								</div>
								<div class="pagination wp-pagination">
									<?php
									global $wp_query;
									$total = $wp_query->max_num_pages;
									if ( $total > 1 )  {
									 if ( !$current_page = get_query_var('paged') )
												$current_page = 1;
									$paginate_links = paginate_links( array(
											 'base'     => get_pagenum_link(1) . '%_%',
											 'format' => '/page/%#%',
											 'current'  => $current_page,
											 'total'    => $total,
											 'mid_size' => 1,
											 'prev_next' => True,
											 'prev_text' => __('prev'),
											 'next_text' => __('next'),
											 'type' => 'list'
									 ) );
								 }
									 if ( $paginate_links ) {
											 echo '<div class="pagination-centered">';
											 echo $paginate_links;
											 echo '</div>';
									 } ?>
					 		</div>
							<?php
									if ($current_page == $total) {
										echo '<style>
										.post-nav-links a:only-of-type {
											left: 0 !important;
											right: 100% !important;
										}
										</style>';
									}
							?>
					 <?php
					 wp_reset_postdata();
					 ?>
					 <div class="clearfix"></div>
           <?php
             //get wallpapers bottom ad
             get_template_part( 'template-parts/ads/wallpaper/wallpaper-bottom');
           ?>
    <div class="wallpaper-footer">
         <?php echo category_description(); ?>
    </div>
	 <?php get_template_part( 'template-parts/wallpapers/wallpapers-footer'); ?>
