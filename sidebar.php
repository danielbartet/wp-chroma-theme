<?php
  function getSB1() { ?>
  <div class="side-title-wrap sb1">
    <?php
    $ga_args = array(
      'category_name' => 'giveaways',
      'posts_per_page' => -1,
      'orderby'  => 'rand'
    );
    $giveaways = new WP_Query( $ga_args );
    $ga_titles = array();
    $ga_posts = array();
    foreach($giveaways->posts as $ga_post) {
      if (get_field('giveaway_end_date', $ga_post->ID) && (date_create(get_field('giveaway_end_date', $ga_post->ID)) > new DateTime(date_create()->format('Y-m-d H:i:s'))) ) {
        array_push($ga_posts, $ga_post);
        array_push($ga_titles, trim(str_replace('Giveaway', '',$ga_post->post_title)));
      }
    }

    ?>
  	<a href="https://www.idropnews.com/giveaways/?utm_source=giveaways-sidebar-banner" class="win box-shadow-rise ripple">
    <?php
      $alt = get_post_meta($ga_posts[0]->ID, '_wp_attachment_image_alt', true);
      echo get_the_post_thumbnail($ga_posts[0]->ID, 'inside-post', ['class' => 'lazyload-img llreplace wallpapes_img', 'alt' => $alt, 'title' => $alt ]);
  	?>
  		<span class="win-slide">Win a Free</span>
  		<span class="win-slide">
  		<span><?php echo $ga_titles[0]; ?></span><span><?php echo $ga_titles[1]; ?></span><span><?php echo $ga_titles[2]; ?></span><span><?php echo$ga_titles[3]; ?></span></span>
  			<div class="box-shadow-nohover">
  				Enter
  			</div>
  			<span class="win-disc">* Guaranteed by iDrop News.</span>
  		</a>
  </div>
  <?php } ?>

  <?php function getSB2() {
    global $post; ?>
    <div class="sb2">
    		<h3 class="side-list-title"><?php $sideTitle = (has_category('giveaways')) ? 'Giveaways' : 'Trending'; echo $sideTitle;?></h3>
    <ol class="side-pop-wrap">
    		<?php
        $count = 0;
        $popular_days_ago = (has_category('giveaways')) ? '600 days ago' : '7 days ago';
        $category =  (has_category('giveaways')) ? 'giveaways' : null;
		$post_id = get_the_ID();
		$recent = (!has_category('giveaways') ? 
		new WP_Query(
			array(
				'category_name' => $category,
				'category__not_in' => array( 33565 ),
				'post__not_in' => array( $post->ID ),
				'posts_per_page' => 5,
				'orderby' => 'meta_value_num',
				'order' => 'DESC',
				'meta_key' => 'post_views',
				'date_query' => array( array( 'after' => $popular_days_ago )) )
		) : 
		new WP_Query(
			array(
				'numberposts' => -1,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'post_type' => array('post','cm-quiz'),
				'post_status' => 'publish',
				'posts_per_page' => '5',
				'paged' => $paged,
				'category__in' => array( 17047 ),
				'post__not_in' => array($post_id),
				'suppress_filters' => true
	)));      
   while($recent->have_posts()) : $recent->the_post(); $count++; if ($count == 1) { ?>
    			<li>
    				<a class="feat-widget-wrap ripple" href="<?php the_permalink(); ?>">
    				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
    					<div class="feat-widget-img">
    							<div class="img-overlay-hover"></div>
    							<?php
    							$thumbnail_id = get_post_thumbnail_id( $post->ID );
    							$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    							?>
    								<img src="<?php the_post_thumbnail_url( 'chroma-tiny-thumb' ); ?>" alt="<?php echo $alt; ?>" title="<?php echo $alt; ?>" data-src="<?php the_post_thumbnail_url( 'chroma-small-thumb' ); ?>" class="lazyload-img llreplace"/>

    						<?php if ( has_post_format( 'video' )) { ?>
    							<div class="feat-vid-but">
    								<svg class="svg-shadow svg-pad" width="20px" height="20px" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1576 927l-1328 738q-23 13-39.5 3t-16.5-36v-1472q0-26 16.5-36t39.5 3l1328 738q23 13 23 31t-23 31z"></path></svg>
    							</div><!--feat-vid-but-->
    						<?php } ?>
    					</div><!--feat-widget-img-->
    				<?php } ?>
    				<div class="feat-widget-text">
    					<h2><?php the_title(); ?></h2>
    					<span class="side-list-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span>
    				</div><!--feat-widget-text-->
    				</a>
    			</li>
    		<?php } else { ?>
    			<li>
    				<a class="feat-widget-wrap ripple" href="<?php the_permalink(); ?>">
    				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
    					<div class="feat-widget-img">
    							<div class="img-overlay-hover"></div>
    							<?php
    							//retrieve alt tag for the current thumbnail
    							$thumbnail_id = get_post_thumbnail_id( $post->ID );
    							$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    							?>
    							<img src="<?php the_post_thumbnail_url( 'chroma-tiny-thumb' ); ?>" alt="<?php echo $alt; ?>" title="<?php echo $alt; ?>" data-src="<?php the_post_thumbnail_url( 'chroma-small-thumb' ); ?>" class="lazyload-img llreplace"/>
    						<?php if ( has_post_format( 'video' )) { ?>
    							<div class="feat-vid-but">
    								<svg class="svg-shadow svg-pad" width="20px" height="20px" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1576 927l-1328 738q-23 13-39.5 3t-16.5-36v-1472q0-26 16.5-36t39.5 3l1328 738q23 13 23 31t-23 31z"></path></svg>
    							</div><!--feat-vid-but-->
    						<?php } ?>
    					</div><!--feat-widget-img-->
    				<?php } ?>
    				<div class="feat-widget-text">
    					<h2><?php the_title(); ?></h2>
    					<span class="side-list-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span>
    				</div><!--feat-widget-text-->
    				</a>
    			</li>
    		<?php } endwhile; wp_reset_postdata(); ?>
    </ol>
    <div class="clearfix"></div>
    <p class="newsletter-title">Newsletter</p>
    	<div id="mc_embed_signup" class="newsletter-rail">
    		<form action="/subscribe-to-our-newsletter/" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
    		<div id="mc_embed_signup_scroll">
    		<div class="mc-field-group input-group">
    		<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
    			<button type="submit" value="submit" name="Subscribe" id="mc-embedded-subscribe" class="ripple">
    				Sign Up
    			</button>
    		</div>
    		<div id="mce-responses">
    		<div class="response" id="mce-error-response" style="display:none"></div>
    		<div class="response" id="mce-success-response" style="display:none"></div>
    		</div>
    		</div>
    		</form>
    	</div>
    </div>
  <?php } ?>

  <?php function getSB3() { ?>
  <a href="<?php echo get_site_url(); ?>/latest-iphone-wallpapers/?utm_source=wallpapers-sidebar-banner" class="box-shadow-rise ripple wallpapes sb3">
    <?php
        $args = array(
          'meta_key' => 'trending_multiplier',
          'orderby' => 'meta_value_num',
          'pagination' => true,
          'posts_per_page' => '30',
          'order' => 'DESC',
          'post_type' => 'wallpapers'
        );
        $walls = new WP_Query( $args );
        $walls = $walls->posts;
        shuffle($walls);
        $alt = get_post_meta($walls[0]->ID, '_wp_attachment_image_alt', true);
        echo get_the_post_thumbnail($walls[0]->ID, 'inside-post', ['class' => 'lazyload-img llreplace wallpapes_img', 'alt' => $alt, 'title' => $alt ]); ?>

  		<span>iPhone Wallpapers</span><span>Express Yourself</span>
  		<div class="box-shadow-nohover">
  						Browse
  		</div>
  </a>
  <?php }

  //contr
  if (has_category('giveaways')) {
    getSB2();
  } else {
    getSB1();
    getSB2();
    getSB3();
  }
