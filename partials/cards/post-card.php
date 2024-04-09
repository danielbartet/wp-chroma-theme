<a class="post-block-link alt-cat-post postcard" href="<?php the_permalink(); ?>">
  <div class="entry-img">
    <div class="lazyload-container">
      <img src="<?php the_post_thumbnail_url( 'chroma-medium-thumb' ); ?>" data-src="<?php the_post_thumbnail_url( 'small' ); ?>" class="lazyload-img llreplace"/>
    </div>
  <?php if ( has_post_format( "video" )) { ?>
  <div class="feat-vid-but">
  <i class="fa fa-play fa-3"></i>
  </div><!--feat-vid-but-->
  <?php } ?>
  <?php if(has_category('News')) {
    echo '<div title="News" class="alt-cat-cat red-gradient2">News</div>';
  }  else if (has_category('Rumors')) {
      echo '<div title="Rumors" class="alt-cat-cat green-gradient">Rumors</div>';
  } else if (has_category('How To')) {
    echo '<div title="How To" class="alt-cat-cat blue-gradient">How To</div>';
  } else if (has_category('Reviews')) {
    echo '<div title="Reviews" class="alt-cat-cat orange-gradient">Reviews</div>';
  } else if (has_category('Fast Tech')) {
    echo '<div title="Fast Tech" class="alt-cat-cat blurple-gradient">Fast Tech</div>';
  } else if (has_category('Giveaways')) {
    echo '<div title="Giveaways" class="alt-cat-cat op-gradient">Giveaways</div>';
  } else { echo '<div title="Misc" class="alt-cat-cat blue-gradient">Misc</div>'; }
   ?>
  </div>

  <div class="postcard_title_box">
    <h3 class="postcard_title"><?php echo the_title(); ?></h3>
    <?php if(get_field('subtitle')) { ?>
      <span class="postcard_sub_title"><?php the_field('subtitle'); ?><span>
    <?php } ?>
  </div>

  <div class="alt-cat-metabot" >
    <span class="alt-cat-post-author"><?php the_author(); ?></span>
    <span class="alt-cat-post-timecard"><?php posted_time_stamp(); ?></span>
  </div>

</a>
