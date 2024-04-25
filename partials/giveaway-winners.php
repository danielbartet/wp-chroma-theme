<a name="ga_winners"></a>
<h3 class="ga-h3">Previous Winners</h3>
<div class="giveaway-container">
  <span class="scroll-indicator ga-scroll">Scroll</span>
  <div class="ga_winners dragscroll">
    <?php
  $images = get_field('giveaway_winners', '45911' );
  if( $images ): ?>
  <?php foreach( $images as $image ) : ?>
  <div class="winner-card" style="background-image:url('<?php echo $image['url']; ?>')" alt="<?php echo $image['alt']; ?>">
    <?php	if( $image['caption'] ) { ?>
        <p class="gallery-caption"><?php echo $image['caption']; ?></p>
  <?php } ?>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>
  </div>
</div>
