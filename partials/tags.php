
<?php
/**
 * Template part for displaying Tags on a Post
 */
?>
<?php $tags = get_tags(); ?>
    <?php
  	$tags = get_the_tags();
  	if( $tags) : ?>
      <div id="post-tags-container" onclick="ga('send', 'event', 'Tag Widget', 'Tag Widget Click');">
        <p class="topics">Related:</p>
        <p>
            <?php foreach( $tags as $tag ) {
        			if( $tag->slug == 'home' )
        				continue;
        			echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="tag">#'. $tag->name .'</a> ';
          		}
            ?>
        </p>
    </div>
  	<?php endif;
  ?>
