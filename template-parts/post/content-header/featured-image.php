<?php
global $post;
if( get_post_format() == 'video' && strpos(get_post_meta($post->ID, 'embed-code', true), 'https' ) === 0 ) {
  $embedCode = trim(get_post_meta($post->ID, 'embed-code', true));
  echo '<div class="videowrapper videowrapper-featured" id="header-content" style="background: #000;"><iframe src="'.$embedCode.'?rel=0&playsinline=1&webkit-playsinline=1&autoplay=1&enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" autoplay playsinline webkit-playsinline allowsInlineMediaPlayback="true"></iframe></div>';
} else {
//featured image
$caption_link = get_post_meta(get_post_thumbnail_id(), 'chroma_caption_hyperlink', true);
$caption_text = get_the_post_thumbnail_caption();
if (get_post_meta($post->ID, "chromma-featured-image", true) !== "hide") { ?>
      <?php if ( has_post_thumbnail()  ) { ?>
        <figure class="post-feat-img" id="header-content">
        <?php  the_post_thumbnail('post-thumbnail', ['class' => 'parallax-move', 'title' => 'Feature image']); ?>
          <?php
            if(get_field('hover_cred_url')) {
            ?>
              <a class="hover-cred" href="<?php the_field('hover_cred_url'); ?>" target="_blank" rel="noopener">Credit: <?php the_field('hover_cred_name'); ?></a>
          <?php
        } elseif(!empty($caption_link) && !empty($caption_text)) { ?>
              <a class="hover-cred" href="<?php echo $caption_link; ?>" target="_blank" rel="noopener">Credit: <?php echo $caption_text; ?></a>
        <?php } ?>
        </figure><!--post-feat-img-->
      <?php } ?>
  <?php }

  if (get_field('caption'))
    echo '<p class="thumbnail-caption">' . get_field('caption') . '</p>';
}
