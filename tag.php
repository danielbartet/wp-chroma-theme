<?php global $page, $numpages, $multipage; ?>
<?php get_header(); ?>
  <?php if( is_tag( array('iPhone Wallpaper', 'iPad Wallpaper', 'Mac Wallpaper', 'Desktop Wallpaper', 'Android Wallpaper') ) ) { ?>
    <?php get_template_part( 'template-parts/wallpapers/wallpapers-c-menu'); ?>
    <h1 class="tag-title"><?php single_tag_title(); ?></h1>
    <div class="c-wp-col-right fade-in">
      <?php
          $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
          $custom_taxterms = wp_get_object_terms( $post->ID, 'wallpaper-categories', array('fields' => 'ids') );
          $args = array(
          'paged' => $paged,
          'post_type' => 'wallpapers',
          'posts_per_page' => 10,
          'orderby' => 'date',
          'order' => 'DESC',
          'tax_query' => array(
              array(
                  'taxonomy' => 'wallpaper-categories',
                  'field' => 'id',
                  'terms' => $custom_taxterms
                )
            ),
            );
            if (have_posts()) : while (have_posts()) : the_post();
            if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
          <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" class="wp-archive-thumb box-shadow-default" style="background:url('<?php the_post_thumbnail_url( 'large' ); ?>'); background-position: center center; background-size: cover; background-repeat: no-repeat;">
          </a>
    <?php } endwhile; ?>
    <div class="pagination wp-pagination">
      <?php
            global $wp_query;
            $total = $wp_query->max_num_pages;
            if ( $total > 1 )  {
             if ( !$current_page = get_query_var('paged') )
                  $current_page = 1;
            $paginate_links = paginate_links( array(
                 'base'     => get_pagenum_link(1) . '%_%',
                 'format' => '?paged=%#%',
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
       <div class="post-nav-links">
     <?php previous_posts_link('<div class="prev"></div>',''); ?>
     <?php next_posts_link('<div class="next"></div>', $the_query->max_num_pages ); ?>
      </div>
     <?php wp_reset_postdata(); ?>
   <?php endif; ?>
     <?php
     	if ( $multipage ) {
     		if ( $page != $numpages ) {
     		} else { ?>
     		<style>
     		.post-nav-links a:only-of-type {
     			left: 0 !important;
     		}
     		</style>
     	<?php	}	} ?>
    <div class="clearfix"></div>
        </div>
     <?php get_template_part( 'template-parts/wallpapers/wallpapers-footer'); ?>
    <?php } else { ?>
          <div id="home-main-wrap" class="left relative">
							<h1 class="tag-title">All Stories in <?php single_tag_title(); ?></h1>
              <section class="flex-cards" id="infinite-data">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php get_template_part('/partials/cards/post-card') ?>

               <?php endwhile; else : ?>
                 <p><?php echo 'Sorry, no posts matched your criteria.'  ?></p>
               <?php endif; ?>
             </section>
  </div><!--home-main-wrap-->
  <div class="clearfix"></div>
  <div class="nav-links">
    <div class="nav-links">
      <?php  $archiveNav = get_the_posts_navigation( array(
              'prev_text' => '',
              'next_text' => '',
              'screen_reader_text' => ""
            ));
            echo filter_archive_nav($archiveNav); ?>
    </div><!--nav-links-->
  </div><!--nav-links-->
  <?php
    get_template_part('template-parts/archive/more-posts-button')
  ?>
</div><!--home-main-wrap-->
<br>
  <?php } ?>
<?php get_footer(); ?>
