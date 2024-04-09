<?php
	/* Template Name: Instagram */
?>

<?php get_header(); ?>
<!-- floating bar -->
<div class='floatingContainer'>
<div class='igInstructions'><h1>Select an Image to Read the Full Article</h1></div>
<div class="igContainer">
		<?php
		$excludeHomepage = get_option('excludeHomepage');
		$excludeArr = explode(',', $excludeHomepage);
		$excludeArr = array_map('intval', $excludeArr);
		// set up query to select the latest 30 articles 
		if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
		elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
		else { $paged = 1; }
		$recent_args = array(
			'numberposts' => -1,
			'orderby' => 'post_date',
			'order' => 'DESC',
			'post_type' => array('post','cm-quiz'),
			'post_status' => 'publish',
			'posts_per_page' => '30',
			'paged' => $paged,
			'category__not_in' => array( 33565 ),
			'post__not_in' => $excludeArr,
			'suppress_filters' => true
		);

		$home_posts = new WP_Query( $recent_args );
		$i = 0;
			// $home_posts returns an array that we can loop through and display the posts on the page using $i to iterate through the while loop
            if ( $home_posts->have_posts()) :
            while ( $home_posts->have_posts() ) { $home_posts->the_post(); ?>
                <a class='igBox' href='<?php echo get_permalink(); ?>'>
					<div class='igOverlay'></div>
					<h3 class='igTitle'><?php echo the_title(); ?></h3>
                     <?php echo get_the_post_thumbnail(); ?> 
                </a>
            <?php    $i++; 
            }; ?>

            <?php

            wp_reset_postdata();
            endif;
            ?>
</div>
</div>

<script>
	// if device is mobile, remove floating bar at 780px (height)
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		window.addEventListener('scroll', () => {
			if(window.scrollY > 780) {
			document.querySelector('.igInstructions').style.opacity = 0;
		} else {
			document.querySelector('.igInstructions').style.opacity = 0.8;
		}
		})
	} else if(window.matchMedia("min-width: 1024px")) {
		window.addEventListener('scroll', (e) => {
		if(window.scrollY > 2390) {
			document.querySelector('.igInstructions').style.opacity = 0;
		} else {
			document.querySelector('.igInstructions').style.opacity = 0.8;
		}
	})
}
</script>

<!-- End Ezoic - home_bottom - bottom_of_page -->
<?php get_footer();
