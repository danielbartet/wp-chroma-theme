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
} ?>
<?php get_template_part('partials/tags'); ?>
<?php get_template_part('partials/stack-widget'); ?>
<a name="comments"></a>
<h3 class="comments-title">Comments</h3>
<?php get_template_part('template-parts/post/disqus'); ?>
<?php if ( has_category('giveaways')) { } else { ?>
<div id="article-ad">
<h3>Recommended</h3>
<?php $articlead = get_option('mvp_article_ad'); if ($articlead) { echo html_entity_decode($articlead); } ?>
</div><!--article-ad-->
<?php } ?>
</div><!--content-area-->
</article>
