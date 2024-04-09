<?php get_template_part( 'template-parts/wallpapers/wallpapers-c-menu'); ?>
<?php
  //get wallpapers bottom top
  get_template_part( 'template-parts/ads/wallpaper/wallpaper-top');
?>
				 <h1 class="wph1">Popular iPhone Wallpapers</h1>
				 <div class="scroll-indicator">Scroll</div>
				 <div class="c-wp-col-right fade-in">
								<?php
											$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
											$args = array(
												'meta_key' => 'trending_multiplier',
												'orderby' => 'meta_value_num',
												'pagination' => true,
												'posts_per_page' => '10',
												'order' => 'DESC',
												'post_type' => 'wallpapers',
												'paged' => $paged,
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
                <?php
                  //get wallpapers bottom ad
                  get_template_part( 'template-parts/ads/wallpaper/wallpaper-bottom');
                ?>
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
						            'prev_text' => __('prev'),
						            'next_text' => __('next'),
						            'type' => 'list'
						        ) );

						        // Display the pagination if more than one page is found
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
					 <div class="wallpaper-footer">
					 <h2>Browse iPhone Wallpapers</h2>
				   <p>Our curated iPhone Wallpapers gallery featuring high definition wallpapers, with premium artistic designs. Our collection of iPhone Wallpapers pair wonderfully with Apple iPhone devices.
				   We offer a seemless experience for our community to find the perfect iPhone Wallpaper. We currently support dimensions for iPhone 5 Wallpapers, iPhone 6 Wallpapers, iPhone 7 Wallpapers and the upcoming iPhone 7s and iPhone 8 Wallpapers. We include everything from abstract designs to deep space imagery to vivid nature photograpgy.</p>
				 	<h3>Fresh iPhone Backgrounds</h3>
				 	<p>Changing your iPhone Background provides a unique mood and expression of individuality. A new wallpaper delivers a unique identity for you and your phone. We aim to provide iphone backgrounds that
				 		showcase fresh, unique and stylish artwork and photography.
				 	</p>
				</div>
		 <?php get_template_part( 'template-parts/wallpapers/wallpapers-footer'); ?>
