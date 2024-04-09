<?php
/**
 * Template part for Stack Commerce */
if(is_single('81674')) { ?>
<?php } elseif( have_rows('product', 48301) ) { ?>
  <span class="comments-title related-title">
      Sponsored
  </span>
<div class="related-posts">

      <?php
            // loop through rows (parent repeater)
          $i = 0;
          while( have_rows('product', 48301) && $i <= 2 ) { the_row(); ?>
          <?php $customProductImage = get_sub_field('custom_product_image'); ?>
          <a href="<?php the_sub_field('product-url'); ?>" onclick="ga('send', 'event', 'Stack Widget', 'Card Click Position: <?php echo $i ?> (<?php the_sub_field('product_title'); ?>)'); return true;" target="_blank" rel="noopener" class="related-card box-shadow-default ripple stack-card" >

            <?php $product_image = wp_get_attachment_image_src(get_sub_field('product_image'), 'medium'); ?>
            <div class="lazyload-container">
              <?php if($customProductImage): ?>
              <img style='object-fit: scale-down;' src='<?php echo $customProductImage;?>' class='lazyload-img llreplace' />
              <?php else: ?>
              <img src="<?php echo $product_image[0]; ?>" alt="<?php echo get_the_title(get_sub_field('product_image')) ?>" class="lazyload-img llreplace" />
              <?php endif; ?>
            </div>
              <p><?php the_sub_field('product_title'); ?></p>
                
              <?php
              $productPrice = get_sub_field('product_price');
              $slashOutPrice = get_sub_field('slash_out_price');
              $percentOff = (($productPrice / $slashOutPrice)  * 100);
              $percentOff = round ($percentOff);
              $percentOff = (100 - $percentOff);
              $special_product = get_sub_field('special_product');
              $special_product_text = get_sub_field('special_product_text');
              $special_product_button_text = get_sub_field('special_product_button_text');
              ?>
              <?php if(!$special_product): ?>
              <div class="prices">
                  <span>$<?php the_sub_field('product_price'); ?></span>
                  <span><?php echo $percentOff . "% off"; ?></span>
                  <span>$<?php the_sub_field('slash_out_price'); ?></span>
              </div>
              <?php else: ?>
                <div class="prices">
                  <i style='margin: 0% auto; color: #00ce83; font-size: 0.95em;'><?php echo $special_product_text ?></i>
                </div>
              <?php endif;?>
              <?php if($special_product): ?>
              <div class="stackadd blue-gradient box-shadow-nohover"><?php echo $special_product_button_text ? $special_product_button_text : 'Get Started'; ?></div>
              <?php else: ?>
              <div class="stackadd blue-gradient box-shadow-nohover">Shop</div>
              <?php endif; ?>

         </a>
      <?php  $i++;  } ?>
      <button>Next</button>
</div>
<?php
$adsOn = get_post_meta( $post->ID, 'chromma-toggle-ads', true );
if ( ($adsOn == "on") || ($adsOn == "auto_adsense") ): ?>
<!-- AdSense ad inserted 021320 -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- above footer new -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4229549892174356"
     data-ad-slot="8023974189"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php endif; 
}  ?>
