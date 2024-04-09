<!-- Displaying relative post blocks -->
<?php
if (get_field('related_posts')) {
$post_objects = get_field('related_posts');
if( $post_objects ) { ?>
<div class="related-posts">
  <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
    <?php setup_postdata($post); ?>
      <a href="<?php the_permalink(); ?>" class="related-card box-shadow-default ripple">
      <?php the_post_thumbnail( 'small-thumb', array( 'class' => 'lazyload-img llreplace' ) ); ?>
        <p><?php the_title(); ?></p>
      </a>
  <?php endforeach; ?>
  <?php wp_reset_postdata(); ?>
</div>


<?php } } ?>
