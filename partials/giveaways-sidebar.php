<div class="side-title-wrap left relative">
	<h3 class="side-list-title">Giveaways</h3>
</div>

<ol class="side-pop-wrap left relative">
<?php global $do_not_duplicate; ?>
		<?php $pop_ad = get_option('mvp_pop_ad');
		$count = 0; $pop_days = esc_html(get_option('mvp_pop_days'));
		$pop_num = esc_html(get_option('mvp_pop_num'));
		$recent = new WP_Query(
			array(
				'numberposts' => -1,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'post_type' => array('post','cm-quiz'),
				'post_status' => 'publish',
				'posts_per_page' => '5',
				'paged' => $paged,
				'category__in' => array( 17047 ),
				'suppress_filters' => true
		));
			while($recent->have_posts()) : $recent->the_post(); $count++; ?>
				<li>
				<a class="feat-widget-wrap left relative box-shadow-default ripple" href="<?php the_permalink(); ?>">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<div class="feat-widget-img left relative">
							<div class="img-overlay-hover"></div>
						<?php the_post_thumbnail('chroma-small-thumb'); ?>
						<?php if ( has_post_format( 'video' )) { ?>
							<div class="feat-vid-but">
								<svg class="svg-shadow svg-pad" width="20px" height="20px" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1576 927l-1328 738q-23 13-39.5 3t-16.5-36v-1472q0-26 16.5-36t39.5 3l1328 738q23 13 23 31t-23 31z"></path></svg>
							</div><!--feat-vid-but-->
						<?php } ?>
					</div><!--feat-widget-img-->
				<?php } ?>
				<div class="feat-widget-text">
					<h2><?php the_title(); ?></h2>
            <p id="countdown-2<?php the_ID(); ?>"></p>

				</div><!--feat-widget-text-->
				</a>
			</li>
		<?php endwhile; ?>
	<script>

		<?php while($recent->have_posts()) : $recent->the_post(); $count++;?>

		var countDownDate2<?php the_ID(); ?> = new Date("<?php the_field('giveaway_end_date') ?>").getTime();
		var x2<?php the_ID(); ?> = setInterval(function() {

			var now2<?php the_ID(); ?> = new Date().getTime();

			var distance2<?php the_ID(); ?> = countDownDate2<?php the_ID(); ?> - now2<?php the_ID(); ?>;

			var days2<?php the_ID(); ?> = Math.floor(distance2<?php the_ID(); ?> / (1000 * 60 * 60 * 24));
			var hours2<?php the_ID(); ?> = Math.floor((distance2<?php the_ID(); ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes2<?php the_ID(); ?> = Math.floor((distance2<?php the_ID(); ?> % (1000 * 60 * 60)) / (1000 * 60));

			if (distance2<?php the_ID(); ?> < 0) {
				clearInterval(x<?php the_ID(); ?>);
				document.getElementById("countdown-2<?php the_ID(); ?>").innerHTML = "Concluded";
			} else {
				document.getElementById("countdown-2<?php the_ID(); ?>").innerHTML = days2<?php the_ID(); ?> + "d " + hours2<?php the_ID(); ?> + "h "
				+ minutes2<?php the_ID(); ?> + "m";
			}

		}, 1000);

		<?php endwhile; wp_reset_postdata(); ?>
	</script>
</ol>
