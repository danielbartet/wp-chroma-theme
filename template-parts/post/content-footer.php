<div id="content-main" class="content-main">
  <?php
  if ( has_post_format( 'gallery' )) {
      get_template_part('partials/gallery');
    }
    get_template_part('partials/cornerstone-links');
    ?>
  <div class="post-nav-links">
  <?php wp_link_pages(array('next_or_number'=>'next', 'previouspagelink' => '&#9664; Prev', 'nextpagelink'=>'Next &#9654;')); ?>
  </div>
  <?php if ( has_category('giveaways')) {
      get_template_part('partials/giveaway-winners');
      get_template_part('partials/giveaway-posts');
  }
    if(get_field('website_to_purchase')) {
      get_template_part('template-parts/post/review/review-cta');
    }
  //display content ads on bottom of post
  if (get_post_meta( $post->ID, 'chromma-toggle-ads', true ) !== 'off')
    get_template_part('template-parts/ads/google-matched-content');
  ?>
  <?php get_template_part('partials/stack-widget'); ?>
</div>
