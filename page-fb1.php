<?php
	/* Template Name: Facebook 1
		Template Post Type: post, page */

        global $page, $pages, $numpages, $multipage;
        get_header();
        ?>
        <style>
            .post-info-right {
                justify-content: flex-end;
            }
            .figcaption_link {
                display: none;
            }
        </style>
        <!-- load facebook sdk first -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1991298094438021";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <link rel="canonical" href="<?php echo get_permalink().$numpages.'/'?>" />
        <?php
          $nextPage = 1 + $page;
          $thisPage = get_permalink() . $nextPage;
          $pageNumber = $page - 1;
          $modifiedNumpages = count($pages) - 1;
          $lastPage = $numpages - 1;
        ?>
        <!-- gallery header -->
        <?php
        if($page <= $numpages - 2) { ?>
        <?php } ?>
        
        
        <!-- main container -->
        <div class="carousel-box page-<?php echo $page; echo ($page == $numpages) ? ' end-of-gallery' : null;?>">
          <!--header ad-->
          <?php
          if ($page < ($numpages - 1) && $page != 1)  {
            get_template_part('template-parts/ads/slider/slider-top');
          }
        // Layout Conditions based on page number
        // if page is last page add top ad above title
        if($page === $numpages): ?>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- top of view all page -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-4229549892174356"
             data-ad-slot="2518863342"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <?php endif; ?>
        <?php 
        if ($page <= $numpages) {
          /* Display First Page page */
          if ($pageNumber == 0)
             get_template_part( 'template-parts/post/content-header' );
        
        //if the page is the last page do this -->
          if ( $page == $lastPage ) {
            get_template_part('template-parts/slider/end-page');
          } elseif ($page != $numpages) {
            echo '<div id="content-main" class="content-main">';
            remove_filter ('the_content','Chromma_Lazy_Load_Module::content_lazyload_filter');
            add_filter( 'the_content', 'chroma_custom_content_filter' );
            the_content();
            if($page == $numpages - 2) {
              echo "<button class='comments-icon box-shadow-default'>Comment</button>";
            } 
            echo '</div>';
          }
        
          if ($pageNumber == 0)
            echo '</article>'; //close article tag that was opened in content-header
        }
        if ($page == $numpages) {
          echo '<style>.post-nav-links{display:none}.carousel-box .ad-box{margin: 4px auto 0px}</style>';
          get_template_part('template-parts/post/content-header');
          echo '<div id="content-main" class="content-main">';
            $sliderContentFull = chroma_convert_multipage_post( $post->post_content );
            $sliderContentFull = wp_make_content_images_responsive($sliderContentFull);
            $sliderContentFull = wpautop($sliderContentFull);
            $sliderContentFull = apply_filters( 'as3cf_filter_post_s3_to_local)', $sliderContentFull );
            $sliderContentFull = do_shortcode($sliderContentFull);
            $sliderContentFull = chroma_custom_content_filter($sliderContentFull);
            if (class_exists('Chromma_Lazy_Load_Module'))
              $sliderContentFull = Chromma_Lazy_Load_Module::content_lazyload_filter($sliderContentFull);
            echo $sliderContentFull;
          echo '<div id="fb-box"></div></div></article>'; 
          if (stripos( $_SERVER['REQUEST_URI'], "teads" )): ?>
          <amp-ad
          width=300
          height=1
          type="teads"
          data-pid="5727"
          layout="responsive">
          </amp-ad>
          <script type="text/javascript" class="teads" src="//a.teads.tv/page/5727/tag" async="true"></script>
          <script type="text/javascript" class="teads" async="true" src="//a.teads.tv/page/90623/tag"></script>
          <?php endif; ?>
          <script>
          // Creates iframe container for view-all pages for embed block
          setTimeout(() => {
            let video = document.querySelectorAll('.wp-block-embed__wrapper');
            video = Array.from(video);
            video.map((wrapper) => {
              
              let iframe = document.createElement('iframe');
              let url = wrapper.textContent.split('/');
              
              let newUrl = 'https://youtube.com/embed/' + url[url.length - 1];
              iframe.src = newUrl;
              iframe.width = '700';
              iframe.height = '400';
              wrapper.appendChild(iframe);
            })
            .then(video.map((wrapper) => {
              wrapper.removeChild(wrapper.childNodes[0]);
            }))
          }, 2000)
          </script>
        <?php
        } ?>
        <!-- facebook engagemment box -->
        
        <?php if ($page < ($numpages - 1) )  { ?>
          <?php
            //get slide bottom slider unit for end of slider
            get_template_part('template-parts/ads/slider/slider-bottom-default');
          ?>
        <?php } ?>
        
        <!-- navigation arrows -->
        <nav class="post-nav-links carousel-box-post-nav-links" id="slidernav">
          <?php
            wp_link_pages(array('before'=>' ', 'next_or_number'=>'next', 'previouspagelink' => '<div class="prev"></div>', 'nextpagelink'=>'<div class="next"></div>'));
          ?>
        </nav>
        
        <!-- Slide Tip -->
        <?php
          if ( $page < $numpages - 1 ) {
            $nextPage = 1 + $page;
            $nextNumber =  $numpages - $page - 2;
            if ( $page == ( $numpages - 2 ) ) { ?>
                 <a href="<?php echo get_the_permalink() . $nextPage . '/'; ?>" class="slide-tip">
                    Next
                </a>
            <?php
            } else {
                $nextNumber =  $numpages - $page - 2;
              ?>
             <a href="<?php echo get_the_permalink() . $nextPage . '/'; ?>" class="slide-tip">
                   Next Up <span class="bubble"><span class="bubble-white"><span class="bubblenum"><?php echo $nextNumber; ?></span></span></span>
               </a>
            <?php }
            echo '<span class="slide-tip2">Or use arrows to navigate</span>';
        
            $layout_value = get_post_meta( get_the_ID(), 'layout_options', true );
            }
        ?>
        
        <!-- footer ads -->
        <!-- revcontent, content.ads, adsense container, appended to if triggered by FB cookie -->
        <?php if ($page < ($numpages - 1) )  { ?>
          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- top of view all page -->
          <ins class="adsbygoogle"
          style="display:block"
          data-ad-client="ca-pub-4229549892174356"
          data-ad-slot="2518863342"
          data-ad-format="auto"
          data-full-width-responsive="true"></ins>
          <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
        <div class="content_ad_container" id="content_ad_container"></div>
        <?php }
        if ($page != $numpages - 1) { ?>
        <div class="content_ad_container" id="content_ad_container"></div>
        <?php } ?>
        </div>
        <div class='galleryFooter'>
        <div class="share-text">Share</div>
        <?php
          $socialShare = new social_share_component(
            array(
              'setFacebook' => true,
              'setTwitter' => true,
              'setEmail' => true,
              'setFlipboard' => true,
              'setComment' => true,
              'setDots' => true,
              'classList' => 's-slider',
              'moreBox' => true
            )
          );
          setPostViews(get_the_ID());
          if($page <= 1):
            $defaults = array(
                'before'           => '<div id="carousel-nav-controller">Jump To:</div><nav id="carousel-nav">',
                'after'            => '</nav>',
                'link_before'      => '<span>',
                'link_after'       => '</span>',
                'next_or_number'   => 'number',
                'separator'        => ' ',
                'pagelink'         => '%',
                'echo'             => 1
            );
          wp_link_pages( $defaults );
          endif;
        get_template_part('partials/micro-footer'); ?>
        </div>
        <!-- EZOIC_REMOVE_BEGIN -->
        <script id="chroma-ezoic-strip">appendScript("", "(adsbygoogle = window.adsbygoogle || []).push({google_ad_client: 'ca-pub-4229549892174356',enable_page_level_ads: true});", '');</script><!-- EZOIC_REMOVE_END -->
        