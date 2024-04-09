<?php
/**
 * Template part for Stack Commerce */
if(is_single('81674')) { ?>
<?php } elseif( have_rows('product', 48301) ) { ?>
  <style>
    .hidden {
      visibility: hidden;
      opacity: 0;
      transition: all linear 200ms;
    }
    .stack-btn-overlay-next {
      position: absolute !important;
      top: 40%;
      right: 0;
      background: linear-gradient(135deg, #007aff, #4831ff);
      overflow: hidden;
      padding: 2% 0;
      box-shadow: 4px 4px 12px rgb(0 0 0 / 15%);
      z-index: 10;
      border-radius: 5px;
    }

    .stack-btn-overlay-prev {
      position: absolute !important;
      top: 40%;
      left: 0;
      background: linear-gradient(135deg, #007aff, #4831ff);
      overflow: hidden;
      padding: 2% 0;
      box-shadow: 4px 4px 12px rgb(0 0 0 / 15%);
      z-index: 10;
      border-radius: 5px;
    }
    
    .stack-card {
      transition: all linear 200ms;
    }

    .stack-vector-img {
      width: 70% !important;
    }
  </style>
  <span class="comments-title related-title">
      Sponsored
  </span>
<div class="related-posts-hidden" style="position: absolute; top: 0; visibility: hidden;">

      <?php
            // loop through rows (parent repeater)
          $i = 0;
          $data = array();

          while( have_rows('product', 48301) && $i < 6) { 
          the_row(); 
          ?>
          <?php $customProductImage = get_sub_field('custom_product_image'); ?>
            <a id="<?php echo $i; ?>" href="<?php the_sub_field('product-url'); ?>" onclick="ga('send', 'event', 'Stack Widget', 'Card Click Position: <?php echo $i ?> (<?php the_sub_field('product_title'); ?>)'); return true;" target="_blank" rel="noopener" class="related-card box-shadow-default ripple stack-card" >
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
</div>

<div class='related-posts' style='position: relative;'></div>

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


<script>

  window.mobileAndTabletCheck = function() {
    let check = false;
    (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
    return check;
  };

  let isMobile = window.mobileAndTabletCheck();

  let cards = Array.from(document.querySelectorAll('.stack-card'));
  let related_posts = document.querySelector('.related-posts');

  if(isMobile) {
    for(let i = 0; i < cards.length; i++) {
      related_posts.appendChild(cards[i]);
    }
  } else {
      let prev_btn = document.createElement('button');
      let next_btn = document.createElement('button');
      let start = 0;
      let end = 2;
      next_btn.innerHTML = '<h2 style="margin: 0; color: white; padding: 0 2px;">&#62;</h2>';
      prev_btn.innerHTML = '<h2 style="margin: 0; color: white; padding: 0 2px;">&#60;</h2>';
      prev_btn.classList.add('hidden');
      cards[end].classList.add('stack-btn-container');
      next_btn.classList.add('stack-btn-overlay-next');
      prev_btn.classList.add('stack-btn-overlay-prev');

      related_posts.appendChild(prev_btn);

      for(let i = 0; i < cards.length; i++) {
          related_posts.appendChild(cards[i]);
          if(parseInt(cards[i].id) > end) {
            cards[i].style.display = 'none';
          }
      }

      related_posts.appendChild(next_btn);

      next_btn.addEventListener('click', () => {
        transition(3,5, next_btn, prev_btn);
      });

      prev_btn.addEventListener('click', () => {
        transition(0,2, prev_btn, next_btn);
      })


      function transition(startIndex, endIndex, button1, button2) {
        console.log(start, end);
      for(let i = start; i <= end; i++) {
          cards[i].style.display = 'none';
        }
        start = startIndex;
        end = endIndex;

        for(let i = start; i <= end; i++) {
          cards[i].style.display = 'block';
        }

        button1.classList.add('hidden');
        button2.classList.remove('hidden');
    }
  }

  
</script>