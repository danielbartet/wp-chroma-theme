<?php if(!is_single('81674')) { ?>
<a name="comments"></a>
<h3 class="comments-title">Comments</h3>
<div class="disqus" id="disqus" data-page-title="<?php echo addslashes($post->post_title); ?>" data-page-url="<?php echo get_permalink($post->ID); ?>"
  data-page-identifer="idropnews-<?php echo $post->ID; ?>">
</div>
<?php } ?>
