<!-- <!DOCTYPE html>
<!--
 __     _____     ______     ______     ______
/\ \   /\  __-.  /\  == \   /\  __ \   /\  == \
\ \ \  \ \ \/\ \ \ \  __<   \ \ \/\ \  \ \  _-/
 \ \_\  \ \____-  \ \_\ \_\  \ \_____\  \ \_\
  \/_/   \/____/   \/_/ /_/   \/_____/   \/_/
Website Developed and Designed by iDropnews

-->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" >
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3.0, minimum-scale=1">
<meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">
<?php
if(is_front_page()) { ?>
<title>iDrop News | Apple News, iPhone Rumors, iOS Tips and Giveaways</title>
<?php }
else if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function theme_slug_render_title() {
?>
 <title><?php wp_title( '|', true, 'right' ); ?></title>
 <?php
 	}
 	add_action( 'wp_head', 'theme_slug_render_title' );
 }
?>
<!-- video ad provider -->
<script async src="https://cdn.stat-rock.com/player.js"></script>
<link rel="shortcut icon" href="https://cdn.idropnews.com/wp-content/uploads/2017/06/22105328/iDrop_Icon1-e1540325525828.jpg" />
<link rel="apple-touch-icon" href="https://cdn.idropnews.com/wp-content/uploads/2017/06/22105328/iDrop_Icon1-e1540325525828.jpg">
<link rel="alternate" type="application/rss+xml" title="iDrop News RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<meta name="apple-mobile-web-app-title" content="iDrop">
<meta name="pocket-site-verification" content="1b20a00efded3e541fba8517571d23" />
<meta name="google-site-verification" content="cnJng1Jj7amBUH3xzr0BQwux53IZGClYW7J0ooafpuk" />
<meta property="fb:pages" content="258546567630716" />
<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ); ?>
<?php } ?>
<?php if ( is_single() ) { ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<meta name="twitter:url" content="<?php the_permalink(); ?>">
<meta name="og:url" content="<?php the_permalink(); ?>">
<?php endwhile; endif; ?>
<?php } else { ?>
<?php } ?>
<!-- cookiebot -->
<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="81f4f8a0-956e-4cf5-8076-242530f29a5a" type="text/javascript" async></script>
<?php wp_head(); ?>
<script type="text/javascript">
    window._mNHandle = window._mNHandle || {};
    window._mNHandle.queue = window._mNHandle.queue || [];
    medianet_versionId = "3121199";
    medianet_chnm = "";//Used to specify the channel name
        </script>
<script src="https://contextual.media.net/dmedianet.js?cid=8CUA8EU6E" async="async"></script>
<!-- gtm data layer -->
<script>dataLayer = []</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KJRSX56');</script>
<!-- End Google Tag Manager -->

<!-- controls adsense ads -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<?php
	//toggle auto ads on/off
	$adsOn = get_post_meta( $post->ID, 'chromma-toggle-ads', true );
  get_schema_json();
?>

<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
<script>
  var googletag = googletag || {};
  googletag.cmd = googletag.cmd || [];
</script>

<script>
  googletag.cmd.push(function() {
    googletag.defineSlot('/7346874/Hellobar-adunits/HB_IDN', [1,1], 'div-gpt-ad-1558718884466-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script>
<!-- media.net -->
<script type="text/javascript">
    window._mNHandle = window._mNHandle || {};
    window._mNHandle.queue = window._mNHandle.queue || [];
    medianet_versionId = "3121199";
            </script>
<script src="https://contextual.media.net/dmedianet.js?cid=8CUA8EU6E" async="async"></script>
</head>
<body <?php body_class(''); ?>  data-attribution="iDropNews.com">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KJRSX56"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php (get_page_template_slug() == 'page-imageRefresh.php') ? $allow_sticky = 'allowsticky' : $allow_sticky = ''; ?>
<div class="relative">
    <div id="main-nav-cont">
    <div class="main_nav_box">
    <button aria-label="open menu" id="hamburger" class="hamburger hamburger--spin" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
    	<div class="nav-logo">
    		<?php if(get_option('mvp_logo')) { ?>
    			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_option('mvp_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
    		<?php } else { ?>
    			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
    		<?php } ?>
    	</div><!--nav-logo-->
    	<div class="nav-menu-in">
    		<nav class="main-menu-wrap">
    			<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
    		</nav>
    	</div><!--nav-menu-in-->
    	<div class="nav-right-wrap">
    			<a class="nav-social ripple" href="https://www.facebook.com/idropnews" target="_blank" rel="noopener">
    					<svg class="nav-svg" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="svg" d="M1343 12v264h-157q-86 0-116 36t-30 108v189h293l-39 296h-254v759h-306v-759h-255v-296h255v-218q0-186 104-288.5t277-102.5q147 0 228 12z"></path></svg>
    			</a>
    			<a class="nav-social ripple" href="https://twitter.com/idropnews" target="_blank" rel="noopener">
    					<svg class="nav-svg" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="svg" d="M1684 408q-67 98-162 167 1 14 1 42 0 130-38 259.5t-115.5 248.5-184.5 210.5-258 146-323 54.5q-271 0-496-145 35 4 78 4 225 0 401-138-105-2-188-64.5t-114-159.5q33 5 61 5 43 0 85-11-112-23-185.5-111.5t-73.5-205.5v-4q68 38 146 41-66-44-105-115t-39-154q0-88 44-163 121 149 294.5 238.5t371.5 99.5q-8-38-8-74 0-134 94.5-228.5t228.5-94.5q140 0 236 102 109-21 205-78-37 115-142 178 93-10 186-50z"></path></svg>
    			</a>
          <a class="nav-social ripple" href="https://www.instagram.com/idropnews/" target="_blank" rel="noopener">
            <svg class="nav-svg" viewBox="0 0 425 425" xmlns="http://www.w3.org/2000/svg">
              <path d="M352,0H160C71.648,0,0,71.648,0,160v192c0,88.352,71.648,160,160,160h192c88.352,0,160-71.648,160-160V160    C512,71.648,440.352,0,352,0z M464,352c0,61.76-50.24,112-112,112H160c-61.76,0-112-50.24-112-112V160C48,98.24,98.24,48,160,48    h192c61.76,0,112,50.24,112,112V352z"/>
              <path d="M256,128c-70.688,0-128,57.312-128,128s57.312,128,128,128s128-57.312,128-128S326.688,128,256,128z M256,336    c-44.096,0-80-35.904-80-80c0-44.128,35.904-80,80-80s80,35.872,80,80C336,300.096,300.096,336,256,336z"/>
              <circle cx="393.6" cy="118.4" r="17.056"/>
            </svg>
          </a>
    			<div id="search-button" class="search-button">
    				<svg class="nav-svg" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1216 832q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 52-38 90t-90 38q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z" /></svg>
    	    </div>
    	</div><!--nav-right-wrap-->
    	<div class="search-bar">
    		<?php get_search_form(); ?>
    	</div>
    </div>
    <?php

	function getCurrentDate() {
		date_default_timezone_set('America/Los_Angeles');
		$current = date('m/d/Y h:i:s a', time());
		return strtotime($current);
	}
    if(!is_page_template('page-imageRefresh.php') && !is_category('Giveaways') && !has_category(array('Gallery', 'Giveaways'))) {
		// wp query object 
		$args = array(
			'numberposts' => -1,
			'orderby' => 'post_date',
			'order' => 'DESC',
			'category__in' => array( 17047 ),
		);
		// query giveaways
		$giveaways = new WP_Query($args);

		// create arrays to push titles/links to
		// link and title index should correspond
		$giveaway_titles = array();
		$giveaway_links = array();

		// if giveaways has posts push titles to the array
		// only push if giveaway end date is valid
		$current = getCurrentDate();
		$giveawayOption = get_option('giveawayOption');
		$excludeHomepage = get_option('excludeHomepage');

		$giveaway_post = get_field('giveaway_header_picker');
		if($giveaways->have_posts()) {
			$i = 0;
			while($giveaways->have_posts()) {
				$giveaways->the_post();
				$time = strtotime(get_field('giveaway_end_date'));
				if($current < $time) {
					array_push($giveaway_titles, $giveaways->posts[$i]->post_title);
					array_push($giveaway_links, get_permalink());
				}
				$i++;
			}
			wp_reset_postdata();
			// generate random index
				if($giveawayOption !== 'Default: Randomize Giveaways') {
					$index = array_search($giveawayOption, $giveaway_titles);
				} else {
					$index = rand(0, (count($giveaway_titles) - 1));
				}
				$selected_title = '';
				$selected_link = '';
				if(count($giveaway_titles) > 0){
					$selected_title = $giveaway_titles[$index];
				}
				if(count($giveaway_links) > 0){
					$selected_link = $giveaway_links[$index];
				}
			?>
			<a href="<?php echo $selected_link; ?>?utm_source=giveaways-navigation-banner" class="ga-banner">
                Enter for a Chance to Win: <?php echo $selected_title; ?>
            </a>
		<?php } else { ?>
			<a href="<?php echo site_url(); ?>/giveaways/?utm_source=giveaways-navigation-banner" class="ga-banner">
			Enter Here to Win a MacBook Pro, iPad Pro and More.
			</a>
		<?php }
	?>
    <?php } ?>
    </div><!--main-nav-cont-->

    <div id="body-main-wrap" class="relative">
