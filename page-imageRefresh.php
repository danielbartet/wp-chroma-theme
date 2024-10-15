<?php
  /* Template Name: Impressions Gallery
    Template Post Type: post, page */
global $page, $pages, $numpages, $multipage;
get_header();
?>
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
    console.log('hello')
    let video = document.querySelectorAll('.wp-block-embed__wrapper');
    
    video = Array.from(video);
    console.log(video)
    video.map((wrapper) => {
      let iframe = document.createElement('iframe');
      let url = wrapper.innerText.split('=');
      
      let newUrl = 'https://youtube.com/embed/' + url[url.length - 1];
      console.log(newUrl)
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
<?php 
  // sponsorship post being used on post id 48301
  $sponsorship_active = get_field("sponsorship_active");
  if($sponsorship_active) {
    $sponsorship_title = get_field("sponsorship_title", 48301);
    $sponsorship_image = get_field("sponsorship_image", 48301);
    $sponsorship_link = get_field("sponsorship_link", 48301);
    $sponsorship_paragraph_number = get_field("sponsorship_paragraph_number", 48301);
    $sponsorship_description = get_field("sponsorship_description", 48301);
    $sponsorship = "
    <div class='post_sponsorship'>
    <a class='post_sponsorship_link' href=" . $sponsorship_link . " target='_blank'>
        <div>
            <h3> " . $sponsorship_title . "</h3>
            <p> " . $sponsorship_description . " </p>
        </div>
        <img src=" . $sponsorship_image . " />
    </a>
    </div>";
    echo $sponsorship;
  }
?>
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
    if( $layout_value !== 'disablefullpage'  )
    {
    if ($page == 1)
      { ?>
        <div class="more-wrap box-shadow-rise">
          <div class="more-white">
            <a href="<?php the_permalink(); echo $numpages; ?>/" class="inf-more-but">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               viewBox="0 0 60.123 60.123" style="enable-background:new 0 0 60.123 60.123;" xml:space="preserve" width="22px" height="22px" fill="url(#grad1)">
               <defs>
                  <linearGradient id="grad1" x1="0%" y1="-100%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:rgb(227, 0, 134);stop-opacity:1" />
                    <stop offset="100%" style="stop-color:rgb(163, 0, 200);stop-opacity:1" />
                  </linearGradient>
                </defs>
                <path d="M57.124,51.893H16.92c-1.657,0-3-1.343-3-3s1.343-3,3-3h40.203c1.657,0,3,1.343,3,3S58.781,51.893,57.124,51.893z"/>
                <path d="M57.124,33.062H16.92c-1.657,0-3-1.343-3-3s1.343-3,3-3h40.203c1.657,0,3,1.343,3,3
                  C60.124,31.719,58.781,33.062,57.124,33.062z"/>
                <path d="M57.124,14.231H16.92c-1.657,0-3-1.343-3-3s1.343-3,3-3h40.203c1.657,0,3,1.343,3,3S58.781,14.231,57.124,14.231z"/>
                <circle cx="4.029" cy="11.463" r="4.029"/>
                <circle cx="4.029" cy="30.062" r="4.029"/>
                <circle cx="4.029" cy="48.661" r="4.029"/>
              </svg>
              View All
            </a>
          </div>
        </div>
    <?php } }
    }
?>

<!-- footer ads -->
<!-- revcontent, content.ads, adsense container, appended to if triggered by FB cookie -->
<?php if ($page < ($numpages - 1) )  { ?>
    <div class="ad-box gallery-footer-ad"><!-- Ezoic - sliderFooter - bottom_of_page --><div id="ezoic-pub-ad-placeholder-120"><ins class="adsbygoogle lazyad" style="display:block" data-ad-client="ca-pub-4229549892174356" data-ad-slot="9186437847" data-ad-format="rectangle"></ins></div><!-- End Ezoic - sliderFooter - bottom_of_page --></div>
  <div class="content_ad_container" id="content_ad_container"></div>
<?php }
 if ($page != $numpages - 1) { ?>
   <div class="content_ad_container" id="content_ad_container"></div>
<?php } ?>
<!-- place in the body  -->
<div data-type="_mgwidget" data-widget-id="1607722"> </div>
<script>(function(w,q){w[q]=w[q]||[];w[q].push(["_mgc.load"])})(window,"_mgq");</script>
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
get_template_part('partials/micro-footer'); ?>
</div>
<!-- EZOIC_REMOVE_BEGIN -->
<script id="chroma-ezoic-strip">appendScript("", "(adsbygoogle = window.adsbygoogle || []).push({google_ad_client: 'ca-pub-4229549892174356',enable_page_level_ads: true});", '');</script><!-- EZOIC_REMOVE_END -->

