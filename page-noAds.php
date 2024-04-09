<?php

/* Template Name: No Ads
Template Post Type: post, page */

get_header();
global $post;
global $ai_wp_data;
$format_options = get_post_meta($post->ID, 'chromma-format_options', true );
$noSideBar = (is_array($format_options)) ? (in_array('No Sidebar', $format_options)) : false;

	global $ai_wp_data;
	$ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_NO_INSERTION;
    global $author;
$userdata = get_userdata($author);
?>
<!-- Single Template (Centers content) -->
<?php 
	if (stripos( $_SERVER['REQUEST_URI'], "single" )): ?>
    <div class="post-wrap-out1 imageFormat">
    <main id="the-post-content" class="the-post-content noAdsMain relative <?php echo ($noSideBar) ? 'no-sidebar' : ''; ?>">
  	<?php
    if (have_posts()) : while (have_posts()) : the_post();
      get_template_part( 'template-parts/post/content-header' );
      get_template_part( 'template-parts/post/content' );
    	get_template_part( 'template-parts/post/content-footer-noads' );
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
<?php else: ?>
  <div class="post-wrap-out1">
  <main id="the-post-content" class="the-post-content noAdsMain relative <?php echo ($noSideBar) ? 'no-sidebar' : ''; ?>">
  	<?php
    if (have_posts()) : while (have_posts()) : the_post();
      get_template_part( 'template-parts/post/content-header' );
    	get_template_part( 'template-parts/post/content' );
    	get_template_part( 'template-parts/post/content-footer-noads' );
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
