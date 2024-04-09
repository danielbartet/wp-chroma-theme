<?php
get_header();
global $post;
global $ai_wp_data;
$format_options = get_post_meta($post->ID, 'chromma-format_options', true );
$noSideBar = (is_array($format_options)) ? (in_array('No Sidebar', $format_options)) : false;
global $page, $pages, $numpages, $multipage;

//trigger ads off
$adsOn = get_post_meta( $post->ID, 'chromma-toggle-ads', true );
if ( ($adsOn == "off") || ($adsOn == "auto_adsense") ) {
	global $ai_wp_data;
	$ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_NO_INSERTION;
}
global $author;
$userdata = get_userdata($author);
?>
<!-- Single Template (Centers content) -->
<?php 
	if (stripos( $_SERVER['REQUEST_URI'], "single" )): ?>
    <div class="post-wrap-out1 imageFormat">
    <main id="the-post-content" class="the-post-content relative <?php echo ($noSideBar) ? 'no-sidebar' : ''; ?>">
  	<?php
    if (have_posts()) : while (have_posts()) : the_post();
      get_template_part( 'template-parts/post/content-header' );
      get_template_part( 'template-parts/post/content' );
    	get_template_part( 'template-parts/post/content-footer' );
      $socialShare = new social_share_component(
        array(
          'setFacebook' => true,
          'setTwitter' => true,
					'setEmail' => true,
          'setFlipboard' => true,
					'setComment' => true,
          'setDots' => true,
          'id' => 'social-share',
          'moreBox' => true
        )
      );
    	//get_template_part('partials/socialsharing');
    endwhile; 
  endif;
?>
<!-- Single Template (Centers content) -->
<!-- CPC Template (Centers content) -->
<?php 
	elseif (stripos( $_SERVER['REQUEST_URI'], "cpcm" )): 
    $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_NO_INSERTION;
  ?>
    <div class="post-wrap-out1 imageFormat">
    <main id="the-post-content" class="the-post-content relative <?php echo ($noSideBar) ? 'no-sidebar' : ''; ?>">
  	<?php
    if($multipage && $page === $numpages): 
      get_template_part('template-parts/post/cpc-last-page'); 
    elseif($page < $numpages):
      if (have_posts()) : while (have_posts()) : the_post();
      get_template_part( 'template-parts/post/content-cpc-header' );
      get_template_part( 'template-parts/post/content-cpc' );
    	get_template_part( 'template-parts/post/content-cpc-footer' );
      $socialShare = new social_share_component(
        array(
          'setFacebook' => true,
          'setTwitter' => true,
					'setEmail' => true,
          'setFlipboard' => true,
					'setComment' => true,
          'setDots' => true,
          'id' => 'social-share',
          'moreBox' => true
        )
      );
    	//get_template_part('partials/socialsharing');
    endwhile; 
    endif; 
  endif;
?>
<!-- CPC Template (Centers content) -->
<!-- Layout Template -->
<?php elseif(stripos( $_SERVER['REQUEST_URI'], "layout" )): 
  $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_NO_INSERTION;
  ?>
  <div class="post-wrap-out1">
    <main id="the-post-content" class="the-post-content relative <?php echo ($noSideBar) ? 'no-sidebar' : ''; ?>">
  	<?php
    if (have_posts()) : while (have_posts()) : the_post();
      get_template_part( 'template-parts/post/content-header-layout' );
      get_template_part( 'template-parts/post/content-layout' );
    	get_template_part( 'template-parts/post/content-footer' );
      $socialShare = new social_share_component(
        array(
          'setFacebook' => true,
          'setTwitter' => true,
					'setEmail' => true,
          'setFlipboard' => true,
					'setComment' => true,
          'setDots' => true,
          'id' => 'social-share',
          'moreBox' => true
        )
      );
    endwhile; 
  endif;
  ?>
  </main>
  <aside id="sidebar" class="sidebar relative fade-in fade-in-medium">
  <div class="sticky">
    <?php
      get_template_part('sidebar');
    ?>
  </div>
  </aside>
  <!-- Layout Template -->
  <!-- Layout Two Template -->
<?php elseif(stripos( $_SERVER['REQUEST_URI'], "templatetwo" )): 
  $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_NO_INSERTION;
  ?>
  <div class="post-wrap-out1">
    <main id="the-post-content" class="the-post-content relative <?php echo ($noSideBar) ? 'no-sidebar' : ''; ?>">
  	<?php
    if (have_posts()) : while (have_posts()) : the_post();
      get_template_part( 'template-parts/post/content-header-layout-two' );
      get_template_part( 'template-parts/post/content-layout-two' );
    	get_template_part( 'template-parts/post/content-footer' );
      $socialShare = new social_share_component(
        array(
          'setFacebook' => true,
          'setTwitter' => true,
					'setEmail' => true,
          'setFlipboard' => true,
					'setComment' => true,
          'setDots' => true,
          'id' => 'social-share',
          'moreBox' => true
        )
      );
    endwhile; 
  endif;
  ?>
  <!-- Teads Layout -->
  <?php elseif(stripos( $_SERVER['REQUEST_URI'], "teads" )): 
  $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_NO_INSERTION;
  ?>
  <div class="post-wrap-out1">
    <main id="the-post-content" class="the-post-content relative <?php echo ($noSideBar) ? 'no-sidebar' : ''; ?>">
  	<?php
    if (have_posts()) : while (have_posts()) : the_post();
      get_template_part( 'template-parts/post/content-header-layout-two' );
      get_template_part( 'template-parts/post/content-teads' );
    	get_template_part( 'template-parts/post/content-footer' );
      $socialShare = new social_share_component(
        array(
          'setFacebook' => true,
          'setTwitter' => true,
					'setEmail' => true,
          'setFlipboard' => true,
					'setComment' => true,
          'setDots' => true,
          'id' => 'social-share',
          'moreBox' => true
        )
      );
    endwhile; 
  endif;
  ?>
  <!-- Adsense Layout -->
  <?php elseif(stripos( $_SERVER['REQUEST_URI'], "adsense" )): 
  $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_NO_INSERTION;
  ?>
  <div class="post-wrap-out1">
    <main id="the-post-content" class="the-post-content relative <?php echo ($noSideBar) ? 'no-sidebar' : ''; ?>">
  	<?php
    if (have_posts()) : while (have_posts()) : the_post();
      get_template_part( 'template-parts/post/content-header-layout-two' );
      get_template_part( 'template-parts/post/content-adsense' );
    	get_template_part( 'template-parts/post/content-footer' );
      $socialShare = new social_share_component(
        array(
          'setFacebook' => true,
          'setTwitter' => true,
					'setEmail' => true,
          'setFlipboard' => true,
					'setComment' => true,
          'setDots' => true,
          'id' => 'social-share',
          'moreBox' => true
        )
      );
    endwhile; 
  endif;
  ?>
    <!-- Saambaa Layout -->
  <?php elseif(stripos( $_SERVER['REQUEST_URI'], "saambaa" )): 
  $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_NO_INSERTION;
  ?>
  <div class="post-wrap-out1">
    <main id="the-post-content" class="the-post-content relative <?php echo ($noSideBar) ? 'no-sidebar' : ''; ?>">
  	<?php
    if (have_posts()) : while (have_posts()) : the_post();
      get_template_part( 'template-parts/post/content-header' );
      get_template_part( 'template-parts/post/content-saambaa' );
    	get_template_part( 'template-parts/post/content-footer' );
      $socialShare = new social_share_component(
        array(
          'setFacebook' => true,
          'setTwitter' => true,
					'setEmail' => true,
          'setFlipboard' => true,
					'setComment' => true,
          'setDots' => true,
          'id' => 'social-share',
          'moreBox' => true
        )
      );
    endwhile; 
  endif;
  ?>
  </main>
  <aside id="sidebar" class="sidebar relative fade-in fade-in-medium">
  <div class="sticky">
    <?php
      get_template_part('sidebar');
    ?>
  </div>
  </aside>
  <!-- Adsense 2 Layout -->
  <?php elseif(stripos( $_SERVER['REQUEST_URI'], "adstwo" )): 
  $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_NO_INSERTION;
  ?>
  <div class="post-wrap-out1">
    <main id="the-post-content" class="the-post-content relative <?php echo ($noSideBar) ? 'no-sidebar' : ''; ?>">
  	<?php
    if (have_posts()) : while (have_posts()) : the_post();
      get_template_part( 'template-parts/post/content-header' );
      get_template_part( 'template-parts/post/content-ads-two' );
    	get_template_part( 'template-parts/post/content-footer' );
      $socialShare = new social_share_component(
        array(
          'setFacebook' => true,
          'setTwitter' => true,
					'setEmail' => true,
          'setFlipboard' => true,
					'setComment' => true,
          'setDots' => true,
          'id' => 'social-share',
          'moreBox' => true
        )
      );
    endwhile; 
  endif;
  ?>
  </main>
  <aside id="sidebar" class="sidebar relative fade-in fade-in-medium">
  <div class="sticky">
    <?php
      get_template_part('sidebar');
    ?>
  </div>
  </aside>
  <!-- Layout Two Template -->
  <?php else: ?>
  <div class="post-wrap-out1">
  <main id="the-post-content" class="the-post-content relative <?php echo ($noSideBar) ? 'no-sidebar' : ''; ?>">
  	<?php
    if (have_posts()) : while (have_posts()) : the_post();
      get_template_part( 'template-parts/post/content-header' );
    	get_template_part( 'template-parts/post/content' );
    	get_template_part( 'template-parts/post/content-footer' );
      $socialShare = new social_share_component(
        array(
          'setFacebook' => true,
          'setTwitter' => true,
					'setEmail' => true,
          'setFlipboard' => true,
					'setComment' => true,
          'setDots' => true,
          'id' => 'social-share',
          'moreBox' => true
        )
      );
    	//get_template_part('partials/socialsharing');
    endwhile; endif;
    ?>
  </main>
  <?php
    if (!$noSideBar) { ?>
      <aside id="sidebar" class="sidebar relative fade-in fade-in-medium">
        <div class="sticky">
          <?php
            get_template_part('sidebar');
          ?>
        </div>
      </aside>
    <?php } endif; ?>
</div>
<?php
get_footer();
//acf scripts and styles appender
if(get_field('script_and_style_appender'))
     the_field('script_and_style_appender');
?>


