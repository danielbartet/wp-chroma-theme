<?php
	/* Template Name: Latest Wallpapers Page */
?>
			<?php get_template_part( 'template-parts/wallpapers/wallpapers-c-menu'); ?>
			<div class="clearfix"></div>
      <?php
        //get wallpapers bottom top
        get_template_part( 'template-parts/ads/wallpaper/wallpaper-top');
      ?>
			<h1 class="wph1"><?php the_title(); ?></h1>
			<div class="scroll-indicator">Scroll</div>
			<div class="c-wp-col-right fade-in">

								<?php
											$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
											$args = array(
												'orderby' => 'date',
												'pagination' => true,
												'posts_per_page' => '10',
												'order' => 'DESC',
												'post_type' => 'wallpapers',
												'paged' => $paged,
												'tax_query' => array(
											    array(
											        'taxonomy' => 'wallpaper-categories',
											        'field' => 'slug',
											        'terms' => 'featured-collections',
											        'operator' => 'NOT IN'
															    )
															)
											);
											$popularpost = new WP_Query( $args );

											while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
											<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" class="wp-archive-thumb box-shadow-default">
					              <img src="<?php the_post_thumbnail_url( 'chroma-tiny-thumb' ); ?>" data-src="<?php the_post_thumbnail_url( 'inside-post' ); ?>" class="lazyload-img llreplace wallpaper-card"/>
					 	         </a>
								<?php	endwhile;
								 ?>
								 <div class="clearfix"></div>
								</div>
								<div class="pagination wp-pagination">
									 <?php
									 global $wp_query;
										 $total = $wp_query->max_num_pages;
										 if ( !$current_page = get_query_var('paged') )
													$current_page = 1;
									 $big = 999999999;
									 $paginate_links = paginate_links( array(
										 		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
												'format' => '?paged=%#%',
												'current' => max( 1, get_query_var('paged') ),
						            'total' => $popularpost->max_num_pages,
						            'mid_size' => 1,
						            'prev_next' => True,
						            'prev_text' => __('Prev'),
						            'next_text' => __('Next'),
						            'type' => 'list'
						        ) );
						        if ( $paginate_links ) {
						            echo '<div class="pagination-centered">';
						            echo $paginate_links;
						            echo '</div><!--// end .pagination -->';
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
             get_template_part('template-parts/ads/wallpaper/wallpaper-bottom');
           ?>
		 <?php get_template_part( 'template-parts/wallpapers/wallpapers-footer'); ?>
</div>
