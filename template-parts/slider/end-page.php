<?php ?>
<style>.carousel-box-post-nav-links a:nth-of-type(2){display: none;}
.carousel-box-post-nav-links a:nth-of-type(1){left: -1000px;}
@media(min-width: 320px) and (max-width: 480px) {
  .carousel-box-post-nav-links a:nth-of-type(1){left: -320px;}
}
</style>
<!-- related posts -->
<?php
 date_default_timezone_set('America/Los_Angeles');
 // get current date
 $current = date('Y-m-d');
 // get date from a month ago
 $currentBefore = date("Y-m-d", strtotime('-1 months'));
 // queries the posts from the database to be displayed on end page
 $related_posts = get_posts(array(
  'post_type' => 'post', // your post type
  'posts_per_page' => -1, // grab all the posts
  'meta_key' => 'related_slideshow',
  // data query to set the upper and lower limits of the posts to display, filtered by date
  'date_query' => array(
    array(
      'after' => $currentBefore,
      'before' => $current,
      'inclusive' => true,
  ),
  ),
));
// $related_posts = new WP_Query( $related_args );
//print_r($related_args);
shuffle($related_posts);
 if( $related_posts ): ?>
 <div class="gallery-windows">
    <h3 class="side-list-title carousel-box_side-list-title">For You</h3>
    <!-- giveaway gallery ad -->
          <a href="https://www.idropnews.com/giveaways/" class="gallery-window box-shadow-rise">
            <?php
              $attachment_id = attachment_url_to_postid( 'https://cdn.idropnews.com/wp-content/uploads/2017/01/13143528/2016-MacBook-Pro-with-Touch-Bar.jpg' );
              echo wp_get_attachment_image( $attachment_id, 'chroma-medium-thumb', false, array('class' => 'gallery-window-img') );
            ?>
            <span>Enter to Win a free iPhone 13 Pro Max, iPad Air, MacBook Pro and much more.</span>
          </a>
    <?php $i = 1; foreach( $related_posts as $post): // variable must be called $post (IMPORTANT)
         // set how many posts are displayed on the endpage
         if ($i > 10) {
          break;
          } ?>
         <?php setup_postdata($post); ?>
            <a href="<?php the_permalink(); ?>" class="gallery-window box-shadow-rise">
                  <img src="<?php the_post_thumbnail_url( 'chroma-medium-thumb' ); ?>" class="gallery-window-img"/>
              <span><?php the_title(); ?></span>
            </a>
        <?php $i++; endforeach; ?>
 </div>
  <?php wp_reset_postdata(); ?>
  <?php endif; ?>
<!-- Comment Box -->
