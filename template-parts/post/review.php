<?php
/**
 * Template part for Reviews */
?>
<div class="review-data">

<?php if (get_field('price')) { ?>
<div class="price">
  <span class="review-attribute">Price: </span>$<?php the_field('price'); ?>
  <a href="<?php the_field('website_to_purchase'); ?>" class="review-data_button">Buy</a>
</div>
<?php } else if(!get_field('price')) { ?>
  <?php if(get_field('enable_custom_review_text') && get_field('custom_review_text')) { ?>
    <a href="<?php the_field('website_to_purchase'); ?>" class="review-data_button" style='margin-left: 0px'><?php echo get_field('custom_review_text'); ?></a>
  <?php } 
} ?>

<?php if (get_field('rating') >= 2) { ?>
<div>
  <span class="review-attribute">Editor's Rating:</span>
  <span class="rating">
  <?php if (get_field('rating') == '1 Star') { ?>
    <span>★</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
<?php  } ?>
<?php if (get_field('rating') == '2 Stars') { ?>
  <span>★</span><span>★</span><span>☆</span><span>☆</span><span>☆</span>
<?php  } ?>
<?php if (get_field('rating') == '3 Stars') { ?>
  <span>★</span><span>★</span><span>★</span><span>☆</span><span>☆</span>
<?php  } ?>
<?php if (get_field('rating') == '4 Stars') { ?>
  <span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>
<?php  } ?>
<?php if (get_field('rating') == '5 Stars') { ?>
  <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
<?php  } ?>
</span>
</div>
<?php } ?>

<?php if (get_field('pros')) { ?>
<div>
  <span><span class="review-attribute">Pros: </span><?php the_field('pros'); ?></span>
</div>
<?php } ?>

<?php if (get_field('cons')) { ?>
<div>
  <span><span class="review-attribute">Cons: </span><?php the_field('cons'); ?></span>
</div>
<?php } ?>
<?php if (get_field('bottom_line')) { ?>
<div>
  <span><span class="review-attribute">Bottom Line: </span><?php the_field('bottom_line') ?></span>
</div>
<?php } ?>

</div>
