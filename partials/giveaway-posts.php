<?php 
    $post_id = get_the_ID();
		$recent_args = array(
			'numberposts' => -1,
			'orderby' => 'post_date',
			'order' => 'DESC',
			'post_type' => array('post','cm-quiz'),
			'post_status' => 'publish',
			'posts_per_page' => '7',
			'paged' => $paged,
			'category__in' => array( 17047 ),
      'post__not_in'=> array($post_id),
			'suppress_filters' => true
    );
    $i = 0;
    $home_posts = new WP_Query( $recent_args ); ?>
    <h3 class="ga-h3" style='margin: 0 1%;'>Giveaways</h3>
    <div class="ga_selection ga_selection_posts">
    <?php 
    if($home_posts->have_posts()):
      $current = getCurrentDate();
      while($home_posts->have_posts()) {
        $home_posts->the_post(); 
        $time = strtotime(get_field('giveaway_end_date'));
        if($current < $time && $i <= 3) {
        ?>
        <a href="<?php the_permalink(); ?>" class="box-shadow-default ripple giveaway-box">

        <section class="lazyload-container">
        <img src="<?php the_post_thumbnail_url( 'chroma-tiny-thumb' ); ?>" data-src="<?php the_post_thumbnail_url( 'medium' ); ?>" class="lazyload-img llreplace"/>
        </section>

        <h2><?php the_title(); ?></h2>

        <div>
        <p id="countdown-<?php the_ID(); ?>"><?php the_field('giveaway_end_date') ?></p>
        <p>$<?php the_field('giveaway_product_value') ?> Value</p>
        </div>

        <div class='buttonContainer'>
        <span id="ga_button" class="box-shadow-nohover">Enter</span>
        </div>
        </a>
        <script>
        var countDownDate<?php the_ID(); ?> = new Date("<?php the_field('giveaway_end_date') ?>").getTime();

        var x<?php the_ID(); ?> = setInterval(function() {

          var now<?php the_ID(); ?> = new Date().getTime();

          var distance<?php the_ID(); ?> = countDownDate<?php the_ID(); ?> - now<?php the_ID(); ?>;

          var days<?php the_ID(); ?> = Math.floor(distance<?php the_ID(); ?> / (1000 * 60 * 60 * 24));
          var hours<?php the_ID(); ?> = Math.floor((distance<?php the_ID(); ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes<?php the_ID(); ?> = Math.floor((distance<?php the_ID(); ?> % (1000 * 60 * 60)) / (1000 * 60));

          if (distance<?php the_ID(); ?> < 0) {
            clearInterval(x<?php the_ID(); ?>);
            document.getElementById("countdown-<?php the_ID(); ?>").innerHTML = "Concluded";
          } else {
            document.getElementById("countdown-<?php the_ID(); ?>").innerHTML = days<?php the_ID(); ?> + "d " + hours<?php the_ID(); ?> + "h "
            + minutes<?php the_ID(); ?> + "m";
          }
        }, 1000);
        </script>
    <?php $i++; }
    } ?>
  </div>
<script>
<?php ?>
</script>
  <?php wp_reset_postdata(); ?>
  <?php endif; ?>
