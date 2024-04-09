<?php /*
 Template Name: Giveaway Post
 Template Post Type: post
 */

header('Access-Control-Allow-Origin: *');
?>
<?php get_header(); ?>
<style>
  .ga-ad-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: linear-gradient(45deg, #4831ff, #ff2a92);
    opacity: 0.75;
    z-index: 8000;
  }

  .ga-ad {
    z-index: 10000;
  }

  .ga-ad-close {
    background: blue;
    color: white;
    padding: 2%;
    border-radius: 5px;
    display: none;
  }
</style>

<!-- <script>
function init (api) {
if (api) {
api.on('AdStarted', function()

{console.log('AdStarted')}
);


api.on('AdVideoComplete', function()

{console.log('AdVideoComplete')}
);
} else

{ console.log('blank'); }
}
</script>
<script data-playerPro="current">(function(){var s=document.querySelector('script[data-playerPro="current"]');s.removeAttribute("data-playerPro");(playerPro=window.playerPro||[]).push({id:"ZLrQDyk4Zd1o",after:s,init:init});})();</script> -->

<!-- <div class='ga-ad-overlay'>
  <button class='ga-ad-close'>Close Ad</button>
</div> -->
<div class="ga-wrapper">
<?php global $author; $userdata = get_userdata($author); ?>
  <div class="post-wrap-out1">
    <main id="the-post-content" class="the-post-content relative">
					<?php if (have_posts()) : while (have_posts()) : the_post();
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
				endwhile; endif;
				 ?>
			</main>
      <aside id="sidebar" class="sidebar relative fade-in fade-in-medium">
      	<div class="sticky">
						<?php get_template_part('sidebar'); ?>
				</div>
			</aside>
		</div>
  </div>
<?php get_footer(); ?>

<script>

  setTimeout(() => {
    document.querySelector('.ga-ad-close').style.display = 'block';
    document.querySelector('.ga-ad-close').addEventListener('click', () => {
      document.querySelector('.ga-ad-overlay').style.display = 'none';
    });
  }, 10000);
</script>