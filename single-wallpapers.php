<?php /*
 Template Post Type: wallpapers
 */
?>

<?php get_template_part( 'template-parts/wallpapers/wallpapers-c-menu'); ?>

<div class="c-wp-container-dark">

  <?php
    //get wallpapers bottom top
    get_template_part( 'template-parts/ads/wallpaper/wallpaper-top');
  ?>

<?php global $author; $userdata = get_userdata($author); ?>

<nav class="wp-navbar">
	<h1 class="wallpaper-title"><?php the_title(); ?></h1>
	<div>
		<?php next_post_link( '%link', '<button type="button" class="wp-single-prev box-shadow-nohover" aria-disabled="false"></button>', TRUE, ' ', 'wallpaper-categories' ); ?>
		<?php previous_post_link( '%link', '<button type="button" class="wp-single-next box-shadow-nohover" aria-disabled="false"></button>', TRUE, ' ', 'wallpaper-categories' ); ?>
	</div>
</nav>
<section class="wp-image-section">
			<?php if ( has_post_thumbnail() ) {
				$title = get_the_title();
				$attr = array(
				'class' => 'wp-image fade-in lightbox_trigger',
				'alt'   => $title,
				'title' => $title,
					);
				the_post_thumbnail('iphone-7-thumb', $attr );
					}
				?>
</section>
</div>

<div class="wallpaper-meta">
		<div class="wp-navbar-options">
					<?php
							//Detect special conditions devices
							$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
							$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");

							//do something with this information
							if( $iPhone || $iPad ) { ?>
							    <a href="#" tabindex="0" class="wallpaper-download blue-gradient box-shadow-default wp-tip" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-html="true" title="Set as Wallpaper" data-content="Step 1) Lightly hold over image with thumb.<br>Step 2) Save Image.<br>Step 3) In Photos App, select your wallpaper.<br>4) Tap <img style='display: inline-block; vertical-align: baseline;' src='https://cdn.idropnews.com/wp-content/uploads/2017/03/31142824/share-file.png'/> (Bottom Left).<br>5) Slide bottom row and choose <u>Use as Wallpaller</u>.">Set As Wallpaper</a>
						<?php	} else { ?>
								<a href="<?php the_post_thumbnail_url('iphone-7-thumb'); ?>" download class="wallpaper-download blue-gradient box-shadow-default" role="button">Download</a>
						<?php	} ?>
							 <?php
               //set number of views and trending multiplier
                trending_multiplier::set(get_the_ID());
               $socialShare = new social_share_component(
                 array(
                  'setFacebook' => true,
                  'setFBMessenger' => true,
                  'setCopyLink' => true,
                  'classList' => 'wallpapers-share'
                 )
               );
               echo '<script>var postVar='.get_the_ID().'</script>'; ?>
				 </div>
				<div class="wp-navbar-options">
				<?php if(get_field('image_credit'))
				{ ?> <span>Image Credit: <?php the_field('image_credit'); ?></span> <?php  } ?>

						<span class="post-date"><time class="post-date updated" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time></span>
				</div>
				<div class="wp-navbar-options">
					<div class="wallpaper-content">
						<?php the_content(); ?>
					</div>
				</div>

		<h3 class="explore-wallpapers">Recommended:</h3>
						<?php
						$custom_taxterms = wp_get_object_terms( $post->ID, 'wallpaper-categories', array('fields' => 'ids') );
						$args = array(
					  'post_type' => 'Wallpapers',
						'posts_per_page' => 10,
						'orderby' => 'rand',
						'tax_query' => array(
						    array(
						        'taxonomy' => 'wallpaper-categories',
						        'field' => 'id',
						        'terms' => $custom_taxterms
							    )
							),
							'post__not_in' => array ($post->ID),
							);

							// The Query
							$the_query = new WP_Query($args);
							// The Loop
							if ( $the_query->have_posts() ) {
								echo '<ul id="image_slider" class="wallpaper-slider">';
								while ( $the_query->have_posts() ) {
									$the_query->the_post();
									echo '<li class="wallpaper-slide box-shadow-default"><a class="post-block-link" href=" ' . get_the_permalink() . ' ">'; ?>
										<img src="<?php the_post_thumbnail_url( 'chroma-tiny-thumb' ); ?>" data-src="<?php the_post_thumbnail_url( 'inside-post' ); ?>" class="lazyload-img llreplace wallpaper-card"/>
								</a></li>
								<?php }
								echo '</ul>';
								/* Restore original Post Data */
								wp_reset_postdata();
							} else {
								// no posts found
							} ?>
    <?php
    //get wallpapers bottom ad
      get_template_part( 'template-parts/ads/wallpaper/wallpaper-bottom');
    ?>
</section>

<?php echo '<script async> var postVar = '.get_the_ID().'</script>'; ?>
<?php get_template_part( 'template-parts/wallpapers/wallpapers-footer'); ?>
