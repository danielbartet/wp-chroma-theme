<?php
	/* Template Name: Home */
?>

<?php get_header(); ?>
<div class="infinite-content infinite-post">
		
		<?php
		$excludeHomepage = get_option('excludeHomepage');
		$excludeArr = explode(',', $excludeHomepage);
		$excludeArr = array_map('intval', $excludeArr);
		if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
		elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
		else { $paged = 1; }
		$recent_args = array(
			'numberposts' => -1,
			'orderby' => 'post_date',
			'order' => 'DESC',
			'post_type' => array('post','cm-quiz'),
			'post_status' => 'publish',
			'posts_per_page' => '16',
			'paged' => $paged,
			'category__not_in' => array( 33565 ),
			'post__not_in' => $excludeArr,
			'suppress_filters' => true
		);

		$home_posts = new WP_Query( $recent_args );
		$i = ($paged > 1) ? 4 : 0;
		$box_cards = true;

		if ( $home_posts->have_posts() ) :
				while ( $home_posts->have_posts() ) { $home_posts->the_post();
          $categoryName = (count( get_the_category() ) > 0 && !(empty(get_the_category()[0]->cat_name))) ? get_the_category()[0]->cat_name : "Misc";
		?>
    	<?php if ($i == 0) { ?>
				<div id="feat-top-wrap">
			    <a href="<?php echo get_permalink(); ?>" class="featured featured-1">
			    <div class="featured-overlay"></div>
			    <?php echo get_the_post_thumbnail(); ?>
			        <div class="feat-meta-block">
			            <span class="feat-cat red-gradient2-t feat-cat-foldout"><?php echo $categoryName;?></span>
			            <h2 class="stand-title"><?php the_title(); ?></h2>
			        </div>
			      </a>
	  <?php } else if ($i == 1) { ?>
	      <a href="<?php echo get_permalink(); ?>" class="featured featured-2">
	    <div class="featured-overlay"></div>
	    <?php echo get_the_post_thumbnail(); ?>
	          <div class="feat-meta-block">
	              <span class="feat-cat blue-gradient-t feat-cat-foldout"><?php echo $categoryName;?></span>
	              <h2 class="stand-title"><?php the_title(); ?></h2>
	          </div>
	        </a>
    <?php } else if ($i == 2) { ?>
        <a href="<?php echo get_permalink(); ?>" class="featured featured-3">
    <div class="featured-overlay"></div>
    <?php echo get_the_post_thumbnail(); ?>
            <div class="feat-meta-block">
                <span class="feat-cat green-gradient-t feat-cat-foldout"><?php echo $categoryName;?></span>
                <h2 class="stand-title"><?php the_title(); ?></h2>
            </div>
          </a>
        <?php } else if ($i == 3) { ?>
          <a href="<?php echo get_permalink(); ?>" class="featured featured-4">
      <div class="featured-overlay"></div>
      <?php echo get_the_post_thumbnail(); ?>
              <div class="feat-meta-block">
                  <span class="feat-cat orange-gradient-t feat-cat-foldout"><?php echo $categoryName;?></span>
                  <h2 class="stand-title"><?php the_title(); ?></h2>
              </div>
            </a>
          </div><!--feat-top2-left-wrap-->
					<?php if ($paged == 1 || $paged % 4 == 0) { ?>
					<div class="box-shadow-nohover signup-container">
						<div id="mc_embed_signup"><h3>Newsletter</h3><p>Sign up for the iDrop newsletter to get the top Apple News, How Tos and more delivered to your inbox.</p>
							<form action="/subscribe-to-our-newsletter/" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$">
								<div id="mc_embed_signup_scroll">
									<div class="mc-field-group input-group">
										<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="example@idropnews.com">
										<button type="submit" value="submit" name="Subscribe" id="mc-embedded-subscribe" class="button">
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
          <div class="clearfix"></div>
          <?php
          //home ad top
          get_template_part('template-parts/ads/home/home-ad-top'); ?>
          <div class="home-wrap">
						<div class="latest-header-box">
							<h1 class="latest-header">Latest</h1>
					</div>

	            <?php } else if ($i > 3) {
								if ($box_cards == true) {
									echo '<section class="flex-cards" id="infinite-data">';
								}
								 //display cards
			           get_template_part('/partials/cards/post-card');

						  $box_cards = false; } $i++; }; ?>

						</section>
				 </div>

				 <?php
         //pagination and reset entry
     		$next_posts = get_next_posts_link( '', $home_posts->max_num_pages );

     		function next_posts_filter($next_posts) {

     			preg_match('/href=\"(?<href>.*)"\s/iU',$next_posts, $hrefMatch);
     			if (count($hrefMatch) > 0) {
     				$next_posts = str_replace('<a ', '<a id="prev-post" infinite-source="' . $hrefMatch['href'] . '" ', $next_posts);
     			}
     			return $next_posts;
     		}

     		echo next_posts_filter($next_posts);

     		wp_reset_postdata();
				endif;
				 ?>
</div>

</div><!--home-main-wrap-->
<div class="clearfix"></div>
<div class="load-more-wrap">
	 <div class="more-wrap more-wrap-cat box-shadow-default">
				<div class="more-white">
					 <a href="#" class="inf-more-but" style="display: inline-block;">Load More</a>
				</div>
	 </div>
</div>

<?php
//home ad bottom
  get_template_part('template-parts/ads/home/home-ad-bottom');
?>

<!-- End Ezoic - home_bottom - bottom_of_page -->
<?php get_footer();
