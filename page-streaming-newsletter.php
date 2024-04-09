<?php
/* Template Name: Streaming Newsletter
Template Post Type: post, page */
global $page, $pages, $numpages, $multipage;
get_header(); 
$nextPage = 1 + $page;
$thisPage = get_permalink() . $nextPage;
$pageNumber = $page - 1;
$modifiedNumpages = count($pages) - 1;
$lastPage = $numpages - 1;


include 'convert-view-all.php';
include 'streamingAd.php';
$ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_NO_INSERTION;
?>
<style>
  #hidden {
    visibility: hidden;
    position: absolute;
    top: 0;
    max-height: 100%;
    overflow: hidden;
  }

  #hidden .streaming-block {
    display: none;
  }

  .parallax-move {
    opacity: 0;
  }
</style>
<div class='streaming-container'>
    <!-- first page -->
    <?php if($page === 1) {
        get_template_part( 'template-parts/post/content-header' );
        add_filter( 'the_content', 'tbn_ads_inside_content' );
    } ?>
    <?php the_content(); ?>
    <?php //if the page is the last page do this -->
    if ( $page == $numpages ) {
      get_template_part('template-parts/slider/end-page');
    } ?>
    <?php if($page < $numpages): ?>
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4229549892174356"
      crossorigin="anonymous"></script>
      <!-- Streaming_2 -->
      <ins class="adsbygoogle"
          style="display:block"
          data-ad-client="ca-pub-4229549892174356"
          data-ad-slot="8654698374"
          data-ad-format="auto"
          data-full-width-responsive="true"></ins>
      <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    <?php endif; ?>
    <!-- Navigation -->
    <nav class="post-nav-links carousel-box-post-nav-links" id="slidernav">
    <?php
    wp_link_pages(array('before'=>' ', 'next_or_number'=>'next', 'previouspagelink' => '<div class="prev"></div>', 'nextpagelink'=>'<div class="next"></div>'));
    ?>
    </nav>
    <?php
  if ( $page <= $numpages - 1 ) {
    $nextPage = 1 + $page;
    $nextNumber =  $numpages - $page - 2;
    // last page of slider
    if ( $page == ($numpages - 1) ) { ?>
    	 <a href="<?php echo get_the_permalink() . $nextPage . '/'; ?>" class="slide-tip">
    		Next
    	</a>
    <?php
    // pages in between first and last page of slider
    } else {
        $nextNumber =  $numpages - $page - 2;
      ?>
      <div id='hidden'>
        <?php echo $post->post_content; ?>
      </div>
     <a href="<?php echo get_the_permalink() . $nextPage . '/'; ?>" class="slide-tip">
    	   Next Up:  <span class='nextService'></span>
       </a>
    <?php }
    echo '<span class="slide-tip2">Or use arrows to navigate</span>';

    $layout_value = get_post_meta( get_the_ID(), 'layout_options', true );
		if( $layout_value !== 'disablefullpage'  )
		{ ?>
    <?php }
    }
?>
<?php echo nativeAd(); ?>
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
?>

<?php get_template_part('partials/micro-footer'); ?>

<script>
    function insertAfter(newNode, existingNode) {
        existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
    }
    
    // Streaming Ad 1 //
    let adDiv = document.createElement('div');
    let streamAd1 = document.createElement('script');
    let ins = document.createElement('ins');
    let endScript = document.createElement('script');
    endScript.innerHTML = '(adsbygoogle = window.adsbygoogle || []).push({});';
    streamAd1.async = true;
    streamAd1.src = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4229549892174356';
    streamAd1.crossOrigin = "anonymous";
    ins.setAttribute('class', 'adsbygoogle');
    ins.setAttribute('style', 'display: block');
    ins.setAttribute('data-ad-client', 'ca-pub-4229549892174356');
    ins.setAttribute('data-ad-slot', '1399859033');
    ins.setAttribute('data-ad-format', 'auto');
    ins.setAttribute('data-full-width-responsive', "true");
    adDiv.append(streamAd1, ins, endScript);
    // Streaming Ad 1 //

    <?php if($page === 1): ?>
      let firstImage = document.querySelector('.post-feat-img');
      insertAfter(streamAd1, firstImage);
    <?php endif; ?>

    let streaming = {
        hulu: "https://assetshuluimcom-a.akamaihd.net/h3o/facebook_share_thumb_default_hulu.jpg",
        netflix: "https://cdn.shopify.com/s/files/1/1192/7620/articles/Netflix_steps_into_the_eCommerce_world_by_launching_its_own_online_store_1_1600x.png?v=1623426529",
        "prime video": "https://i.pcmag.com/imagery/reviews/02dIsBiVpmVTMeXkrKxWy0W-13..1582749138.png",
        "apple tv+": "https://www.apple.com/v/apple-tv-plus/t/images/meta/og__bgttn9piew1u.png?202107271204",
        "disney+": "https://cdn.vox-cdn.com/thumbor/nUQOhWe0sYt7OrWvf0vj8kj0YDw=/1400x788/filters:format(jpeg)/cdn.vox-cdn.com/uploads/chorus_asset/file/13412121/disneyplus.0.jpg",
        "hbo max": "https://allears.net/wp-content/uploads/2021/05/HBOMax-Logo.png",
        "paramount+": "https://wwwimage-us.pplusstatic.com/base/files/seo/paramount-plus.png",
        "peacock": "https://www.peacocktv.com/static/peacock-toolkit/0.25.2/logo/peacock-wob.png"
    }

    let service = document.querySelector('.stream_h2').textContent.trim().toLowerCase();
    if(service in streaming) {
        let image = document.createElement('img');
        image.src = streaming[service];
        insertAfter(image, document.querySelector('.stream_h2'));
        insertAfter(adDiv, image);
    }
    
    <?php if($page < $numpages - 1): ?>
    setTimeout(function() {
      let hiddenContent = Array.from(document.getElementById('hidden').children).filter((e) => e.className === 'streaming-block');
      let currentIndex = window.location.href.split('/')[6] !== "" ? parseInt(window.location.href.split('/')[6]) : 1;
      let nextService = hiddenContent[<?php echo $page; ?> - 1].querySelector('.stream_h2').textContent;
      document.querySelector('.nextService').textContent = nextService;
    }, 1000);
    <?php endif; ?>
</script>

<?php 
  if($page == $numpages) { ?>
    <script>
      let services = Array.from(document.querySelectorAll('.stream_h2'));
      for(let i = 1; i < services.length; i++) {
        let serviceName = services[i].textContent.toLowerCase();
        if(serviceName in streaming) {
          let image = document.createElement('img');
          image.src = streaming[serviceName];
          insertAfter(image, services[i]);
        }
      }
    </script>  
  <?php } ?>