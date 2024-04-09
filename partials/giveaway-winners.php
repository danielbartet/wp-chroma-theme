<a name="ga_winners"></a>
<h3 class="ga-h3">Previous Winners</h3>
<div class="giveaway-container">
  <span class="scroll-indicator ga-scroll">Scroll</span>
  <div class="ga_winners dragscroll">
    <?php
    $images = get_field('giveaway_winners', '45911');
    if($images && is_array($images)):
      foreach($images as $image):
        if(is_array($image) && isset($image['url']) && isset($image['alt'])): ?>
          <div class="winner-card" style="background-image:url('<?php echo esc_url($image['url']); ?>')" alt="<?php echo esc_attr($image['alt']); ?>">
            <?php if(!empty($image['caption'])): ?>
              <p class="gallery-caption"><?php echo esc_html($image['caption']); ?></p>
            <?php endif; ?>
          </div>
        <?php endif;
      endforeach;
    endif; ?>
  </div>
</div>
