<div class="c-wp-col-right">
       <?php
             $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
             $args = array(
               'meta_key' => 'post_views',
               'orderby' => 'meta_value_num',
               'pagination' => true,
               'posts_per_page' => '12',
               'order' => 'DESC',
               'post_type' => 'iphone-wallpapers',
               'paged' => $paged,
             );

             $popularpost = new WP_Query( $args );

             while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
          <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" class="wp-archive-thumb box-shadow-default" style="background:url('<?php the_post_thumbnail_url( 'large' ); ?>'); background-position: center center; background-size: cover; background-repeat: no-repeat;">
         </a>
       <?php	endwhile;
        ?>
        <div class="clearfix"></div>
       </div>
       <div class="pagination wp-pagination">
          <?php
          $big = 999999999;
          $paginate_links = paginate_links( array(
               'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
               'format' => '?paged=%#%',
               'current' => max( 1, get_query_var('paged') ),
               'total' => $popularpost->max_num_pages,
               'mid_size' => 5,
               'prev_next' => True,
               'prev_text' => __('&laquo previous'),
               'next_text' => __('next &raquo;'),
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
  wp_reset_postdata();
  ?>
