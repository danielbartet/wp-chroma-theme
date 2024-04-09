<?php
          // Get the ID of a given category
          $category = get_the_category();
          $category_id = $category[0]->cat_ID;

          // Get the URL of this category
          $category_link = get_category_link( $category_id );
      ?>
      <div class="alt-cat-body">
      <div class="alt-cat-bar">
      </div>
      <?php
      $term =  single_cat_title("", false);
      ?>

<div class="alt-cat-header" style="background-image: url('<?php the_field('cat_image', $queried_object); ?>'); }">
        <?php if(is_category ('Apple Keynote Fall 2018')) { ?>
          <iframe src="https://twitter.com/i/videos/tweet/1039159459816394757?embed_source=clientlib&amp;player_id=0&amp;rpc_init=1&amp;autoplay=1&amp;language_code=en&amp;use_syndication_guest_id=true" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;" allowfullscreen allow="autoplay; fullscreen"></iframe>
        <?php } ?>
      <div class="alt-cat-header-overlay" style="z-index: 500; position: absolute; top: 0px;">
      <h1><?php single_cat_title(); ?></h1>
      <div style="height: 0;opacity: 0;">
        <p style="display: inline-block;">By:&nbsp;</p>
        <p style="display: inline-block;">
        <?php the_field('category_author', $queried_object); ?>
        </p>
      </div>
      <div style="height: 0;opacity: 0; z-index: 500;"><p style="display: inline-block; ">Published:&nbsp;</p><p style="display: inline-block;"><?php posted_time_stamp(); ?></p></div>
      <div style="z-index: 500;"><p style="display: inline-block;">Updated:&nbsp;</p><p style="display: inline-block;"><?php modified_time_stamp(); ?></p></div>
      </div>
      </div>
<br>
    <div class="flex-cards" id="infinite-data">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php static $count = 0;
          if ($count == "25") { break; }
          else { ?>
            <?php get_template_part('/partials/cards/post-card') ?>
            <?php $count++; } ?>
            <?php endwhile; ?>
            <?php endif;	wp_reset_postdata(); ?>
          </div>