<?php
/**
 * Template part for displaying Social Sharing Buttons
 */
 global $post2;
?>
<div class="social-sharing-bot" id="social-share">
  <!-- <div class="share-button">
    <?php//echo get_post_meta($post->ID,'fb_share_count', true); ?>
  </div> -->

  <!--fb share -->
  <button aria-label="share this article on facebook" class="share-button facebook-share box-shadow-default ripple" title="share on facebook" target="_blank" rel="noopener">
    <svg class="svg-shadow share-svg" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
      <path d="M1343 12v264h-157q-86 0-116 36t-30 108v189h293l-39 296h-254v759h-306v-759h-255v-296h255v-218q0-186 104-288.5t277-102.5q147 0 228 12z">
      </path>
    </svg>
  </button>

  <!-- twitter share -->
  <button class="share-button twitter-share box-shadow-default ripple" aria-label="share this article on twitter" title="tweet this article">
    <svg class="svg-shadow share-svg" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
      <path d="M1684 408q-67 98-162 167 1 14 1 42 0 130-38 259.5t-115.5 248.5-184.5 210.5-258 146-323 54.5q-271 0-496-145 35 4 78 4 225 0 401-138-105-2-188-64.5t-114-159.5q33 5 61 5 43 0 85-11-112-23-185.5-111.5t-73.5-205.5v-4q68 38 146 41-66-44-105-115t-39-154q0-88 44-163 121 149 294.5 238.5t371.5 99.5q-8-38-8-74 0-134 94.5-228.5t228.5-94.5q140 0 236 102 109-21 205-78-37 115-142 178 93-10 186-50z">
      </path>
    </svg>
  </button>


  <button class="share-button google-share box-shadow-default ripple" title="Share on Google Plus" aria-label="share this article on google plus" target="_blank" rel="noopener">
    <svg class="svg-shadow share-svg google-svg" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
      <path d="M1181 913q0 208-87 370.5t-248 254-369 91.5q-149 0-285-58t-234-156-156-234-58-285 58-285 156-234 234-156 285-58q286 0 491 192l-199 191q-117-113-292-113-123 0-227.5 62t-165.5 168.5-61 232.5 61 232.5 165.5 168.5 227.5 62q83 0 152.5-23t114.5-57.5 78.5-78.5 49-83 21.5-74h-416v-252h692q12 63 12 122zm867-122v210h-209v209h-210v-209h-209v-210h209v-209h210v209h209z">
      </path>
    </svg>
  </button>

 <script defer src="https://cdn.flipboard.com/web/buttons/js/flbuttons.min.js"></script>
  <div class="share-button flipboard-share box-shadow-default ripple">
  <img src="https://cdn.idropnews.com/wp-content/uploads/2016/12/27153039/Logomark_DIGITAL_White_50X50-px.png" alt="flipboard-share"/>
    <a data-flip-widget="flipit" href="https://flipboard.com" title="Share on Flipboard" aria-label="share this article on flipboard" target="_blank" rel="noopener"></a>
  </div>

  <button class="share-button reddit-share box-shadow-default ripple" title="Share on Reddit" aria-label="share this article on reddit" href="//www.reddit.com/submit" target="_blank" rel="noopener">
    <svg class="svg-shadow share-svg" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
      <path d="M1792 846q0 58-29.5 105.5t-79.5 72.5q12 46 12 96 0 155-106.5 287t-290.5 208.5-400 76.5-399.5-76.5-290-208.5-106.5-287q0-47 11-94-51-25-82-73.5t-31-106.5q0-82 58-140.5t141-58.5q85 0 145 63 218-152 515-162l116-521q3-13 15-21t26-5l369 81q18-37 54-59.5t79-22.5q62 0 106 43.5t44 105.5-44 106-106 44-105.5-43.5-43.5-105.5l-334-74-104 472q300 9 519 160 58-61 143-61 83 0 141 58.5t58 140.5zm-1374 199q0 62 43.5 106t105.5 44 106-44 44-106-44-105.5-106-43.5q-61 0-105 44t-44 105zm810 355q11-11 11-26t-11-26q-10-10-25-10t-26 10q-41 42-121 62t-160 20-160-20-121-62q-11-10-26-10t-25 10q-11 10-11 25.5t11 26.5q43 43 118.5 68t122.5 29.5 91 4.5 91-4.5 122.5-29.5 118.5-68zm-3-205q62 0 105.5-44t43.5-106q0-61-44-105t-105-44q-62 0-106 43.5t-44 105.5 44 106 106 44z"/></svg>
  </button>

  <?php
  //make title valid in html5
  $mailto_title = str_replace(' ', '%20', get_the_title());
  ?>
  <button class="share-button email-share box-shadow-default ripple" title="email" aria-label="email this article" href="mailto:&amp;subject=<?php echo $mailto_title; ?>&amp;Body=<?php the_permalink(); ?>">
    <svg class="svg-shadow share-svg" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
      <path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z" /></svg>
  </button>
</div>
