<?php
	/* Template Name: Simply Centered */
?>
<?php

?>
<?php if( is_page( 'unsubscribe', 'write for us', 'report a bug') ) {
    if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
        wpcf7_enqueue_scripts();
    }
		if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
		wpcf7_enqueue_styles();
	}
	}
?>
<?php get_header(); ?>
</br>
<div id="content-main" class="content-main simply-centered">
	<h1 class="post-title"><?php single_post_title(); ?></h1>
	<?php
	 if ( is_page('Sign Up to Win an iPhone 7') ) {
	get_template_part('partials/AdWordsFormSignup');
	} ?>
	<?php the_content(); ?>
	<br>
</div>
<?php
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
); ?>

<?php get_footer(); ?>
