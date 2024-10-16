<?php
/**
 * Template part for displaying post content
*/

$recent_args = array(
  'numberposts' => -1,
  'orderby' => 'post_date',
  'order' => 'DESC',
  'post_type' => array('post','cm-quiz'),
  'post_status' => 'publish',
  'posts_per_page' => '1',
  'paged' => $paged,
  'category__and' => 207,
  'suppress_filters' => true
);
$home_posts = new WP_Query( $recent_args );
$i = 0;
?>
<head>
    <script async src="//www.googletagservices.com/tag/js/gpt.js"></script>
    <!-- prebid.js -->
    <script type='text/javascript' src='https://www.healthiguide.com/hbid/prebid.js'></script> 
    <!-- bid.js -->
    <script type='text/javascript' src='https://www.healthiguide.com/hbid/bid.js'></script>
    <style>
        .fade-in {
            opacity: 1 !important;
            animation: none !important;
        }
        

            @media(min-width: 320px) and (max-width: 480px) {
                .saamba-mobile {
                    display: none !important;
                }
            }
    </style>
</head>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=1651785334891460&autoLogAppEvents=1" nonce="BnKHa3pS"></script>
  <div id="content-main" class="content-main">
        <?php
        //declare layout options
        $layout_value = get_post_meta( get_the_ID(), 'layout_options', true );

        if (get_post_meta( $post->ID, 'stoc-simple_toc', true ) == "enabletoc")
        {
          add_filter("the_content","simple_table_of_contents_render");
          get_template_part( 'template-parts/table-of-contents');
        }
        else
        {
          get_template_part( 'template-parts/table-of-contents');
        }
        ?>
        <?php if (has_category('reviews')) {
          get_template_part( 'template-parts/post/review' );
        }

        if( ($layout_value === 'howto' ) ) {
            get_template_part( 'template-parts/post/howto' );
       } else {
         add_filter( 'the_content', 'chroma_custom_content_filter', 99 );
         if (class_exists('Chromma_Lazy_Load_Module'))
         {
           add_filter( 'the_content', 'Chromma_Lazy_Load_Module::content_lazyload_filter', 99 );
         }
         add_filter( 'the_content', 'tbn_ads_inside_content' );

         function tbn_ads_inside_content( $content ) {
        
              //We don't want to modify the_content in de admin area
              if( !is_admin() ) {
                  $adsense_ads = '
                <div style="display: flex; justify-content: center; align-items: center;">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4229549892174356"
                    crossorigin="anonymous"></script>
                    <!-- Saamba 1 -->
                    <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4229549892174356"
                    data-ad-slot="4705182835"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <!-- AD BREAK -->
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4229549892174356"
                    crossorigin="anonymous"></script>
                    <!-- Saamba 2 -->
                    <ins class="adsbygoogle saamba-mobile"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4229549892174356"
                    data-ad-slot="7707778366"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                  ';
                  $ads_two = '
                  <div class="floatfixAd floatfixAd--footer" style="margin: 5% 0;">
                  <!-- Ezoic - postFooter - bottom_of_page -->
                    <div id="ezoic-pub-ad-placeholder-105">
                      <!-- flexbottom -->
                      <ins class="adsbygoogle"
                           style="display:block"
                           data-ad-client="ca-pub-4229549892174356"
                           data-ad-slot="6715665020"
                           data-ad-format="auto"></ins>
                      <script>
                      (adsbygoogle = window.adsbygoogle || []).push({});
                      </script>
                    </div>
                      <!-- End Ezoic - postFooter - bottom_of_page -->
                  </div>';
                  $ads = '
                  <div class="floatfixAd asideAd" id="asideAd">
                  <!-- Ezoic - asideAd - mid_content -->
                  <div id="ezoic-pub-ad-placeholder-104">
                    <!-- Middle Ad 5 -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-4229549892174356"
                         data-ad-slot="3762198620"
                         data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    </div>
                    <!-- End Ezoic - asideAd - mid_content -->
                  </div>
                  ';
                  $p_array = explode('</p>', $content );
                  $p_count = 3;
                  $p_count_two = 10;
                  $p_count_samba = 0;
        
                  if( !empty( $p_array ) ){
                      array_splice($p_array, $p_count_samba, 0, $adsense_ads);
                      array_splice( $p_array, $p_count, 0, $ads );
                      $output = '';
        
                      foreach( $p_array as $key=>$value ){
        
                          $output .= $value;
        
                       }
                  }
        
              }
        
              return $output;
        
         }
        the_content();
       } ?>
      <!-- FACEBOOK LIKE AND SHARE --->
      <?php 
      $url = $_SERVER['REQUEST_URI'];
  
      if(strpos($url, 'fbclid')) {
      ?>
      <div class='fbLikeContainer' style='margin: 2% 0;'>
        <div class="fb-like" style="margin: 0 2%;" data-href="https://www.facebook.com/idropnews/" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
        <div class="fb-share-button" data-href="<?php echo $curr_url; ?>" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
      </div>
      <?php } ?>
      <!-- FACEBOOK LIKE AND SHARE --->
       <?php if (has_category('giveaways')) {
         get_template_part( 'template-parts/post/review' );
       } ?>
      <div id="read_next"><strong>Read Next:</strong>
      <?php 
        if ( $home_posts->have_posts()) :
        while ( $home_posts->have_posts()) { $home_posts->the_post(); ?>
        <a href='<?php echo get_permalink(); ?>'><?php echo the_title(); ?></a>
        <?php    $i++; 
        }; ?>

        <?php
        wp_reset_postdata();
        endif;
      ?>
      </div>
  </div>
</article>
<div class="floatfixAd floatfixAd--footer">
<!-- Ezoic - postFooter - bottom_of_page -->
<div id="ezoic-pub-ad-placeholder-105">
    <!-- flexbottom -->
    <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-4229549892174356"
        data-ad-slot="6715665020"
        data-ad-format="auto"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>
    <!-- End Ezoic - postFooter - bottom_of_page -->
</div>

<?php
if( ($layout_value === 'howto' ) && have_rows('phase') ) { ?>
  <nav class="anchor-nav" id="contentmap">
      <ol>
          <?php
              while( have_rows('phase') ) { the_row(); ?>
              <li>
                <?php
                $contentlink = get_sub_field('phase_title');
                $contentlink = str_replace(' ', '', $contentlink);
                ?>
                  <a href="#<?php echo $contentlink; ?>"><?php the_sub_field('phase_title'); ?></a>
              </li>
          <?php } ?>
          <li><span id="comments-anchor">Comments</span></li>
      </ol>
  </nav>
<?php } ?>