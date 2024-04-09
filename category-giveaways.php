<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id; ?>
<?php
    // Get the ID of a given category
    $category = get_the_category();
    $category_id = $category[0]->cat_ID;

    // Get the URL of this category
    $category_link = get_category_link( $category_id );
?>
<?php get_header();  ?>
<style>
.social-sharing-controller {
  display: none;
}
</style>
<script type="application/ld+json">
  {
  "@context": "http://schema.org",
  "@type": "<?php if (has_category('News')){ echo'NewsArticle'; } else { echo'Article';} ?> ",
  "mainEntityOfPage": "<?php echo esc_url( $category_link ); ?>",
  "headline": "<?php single_cat_title(); ?>",
  "description": "<?php echo strip_tags( get_the_excerpt() ); ?>",
    "datePublished": " <?php the_date(); ?>  ",
    "dateModified": "<?php the_modified_date(); ?>",
    "image": { "@type": "ImageObject", "url": "<?php the_field('cat_image', $queried_object); ?>", "width": 1000, "height": 600 },
  "author": {
  "@type": "Person",
  "name": "<?php the_field('category_author', $queried_object); ?>"
  },
  "publisher": {
  "@type": "Organization",
    "logo": { "@type": "ImageObject", "url": "https://cdn.idropnews.com/wp-content/uploads/2017/06/13133217/idroplogo.png", "width": 200, "height": 36 },
  "name": "iDrop News"
  }
  }
</script>
<div>
</div>
<div class="ga_gradient">
  <ul class="ga-bubbles">
    <?php
    for($i = 0; $i < 60; $i++) {
      echo '<li></li>';
    }
    ?>
	</ul>
</div>
<article class="giveaway-container box-shadow-nohover gac-hide">
<div class='giveaway_flex_header'>
  <h1 class="ga-h1"><?php single_cat_title(); ?></h1>
  <div class='giveaway_sorter'>
    <p>Sort Giveaways</p>
    <!-- form uses post method and submits onchange when an option is selected -->
    <form method='post' role='form'>
      <select name='sortOption' onchange="this.form.submit()">
        <option>Select</option>
        <option id='endingSoon' value='endingSoon'>Ending Soon</option>
        <option id='lowToHigh' value='lowToHigh'>Lowest to Highest Value</option>
        <option id='highToLow'value='highToLow'>Highest to Lowest Value</option>
        <option id='concluded' value='concluded'>Concluded Giveaways</option>
      </select>
  </form>
  </div>
</div>
<?php the_field('cat_image', $queried_object); ?>
<div class="ga_selection">
  <?php $post_objects = get_field('category_posts_selection', $queried_object);
    // $post_objects contains the array of the giveaway posts to be sorted
    if( $post_objects ):
        // change $post_objects array to be sorted based on least amount of time to most amount of time
       if($_POST['sortOption'] === 'endingSoon') {
         // if option value is === 'endingSoon'
         // gets the default timezone and current time to filter concluded posts
         date_default_timezone_set('America/Los_Angeles');
         $current = strtotime(date('m/d/Y h:i:s a', time()));
        // concludedIndex lets us know how many concluded objects to be filtered out
         $concludedIndex = 0;
         // run foreach loop to go through all posts
         foreach($post_objects as $post) {
           // if the giveaway UNIX end date is less than the current date / present then add a 1 to concludedIndex for each post  
           if(strtotime($post->__get('giveaway_end_date')) < $current) {
             $concludedIndex++;
           }
        }
        // compare function to sort $post_objects with usort
        function compare($a, $b) {
          $a_get_fields = $a->__get('giveaway_end_date');
          $b_get_fields = $b->__get('giveaway_end_date');
          if($a_get_fields == $b_get_fields) {
            return 0;
          }
          return ($a_get_fields < $b_get_fields) ? -1 : 1;
        }
        usort($post_objects, "compare");
        // use unset and for loop to remove concluded objects from endingSoon $post_objects array
        for($i = 0; $i < $concludedIndex; $i++) {
          unset($post_objects[$i]);
        }
        ?>
        <!-- script to set the option value to endingSoon when selected -->
        <script>
          let endingSoon = document.getElementById('endingSoon');
          endingSoon.selected = true;
        </script>
       <?php }
       
       elseif($_POST['sortOption'] === 'lowToHigh') {
        // change $post_objects array to be sorted based on least valuable to most valuable
        // sort compare function
        function compareLowToHigh($a, $b) {
          $a_get_fields = $a->__get('giveaway_product_value');
          $b_get_fields = $b->__get('giveaway_product_value');
          if($a_get_fields == $b_get_fields) {
            return 0;
          }
          return ($a_get_fields < $b_get_fields) ? -1 : 1;
        }
        // usort to sort array with compare function as callback
        usort($post_objects, "compareLowToHigh");
      ?>
       <!-- script to set the option value to lowToHigh when selected -->
        <script>
          let lowToHigh = document.getElementById('lowToHigh');
          lowToHigh.selected = true;
      </script> <?php }
        // change $post_objects array to be sorted based on most valuable to least valuable 
       elseif($_POST['sortOption'] === 'highToLow'){
         // compare callback function from high to low
        function compareLowToHigh($a, $b) {
          $a_get_fields = $a->__get('giveaway_product_value');
          $b_get_fields = $b->__get('giveaway_product_value');
          if($a_get_fields == $b_get_fields) {
            return 0;
          }
          return ($a_get_fields > $b_get_fields) ? -1 : 1;
        }
        // sort $post_objects array by usort
        usort($post_objects, "compareLowToHigh");
      ?>
      <!-- script to set the option value to highToLow when selected -->
        <script>
          let highToLow = document.getElementById('highToLow');
          highToLow.selected = true;
      </script>
        <?php }
        // sort concluded posts when concluded option is selected
        elseif($_POST['sortOption'] === 'concluded') {
          // set indexes of total giveaway and current concluded posts
          $concludedGiveawayIndex = 100;
          $concludedGiveaways = 0;
          // get the current date to filter posts
          date_default_timezone_set('America/Los_Angeles');
         $currentTime = strtotime(date('m/d/Y h:i:s a', time()));
         // if posts are UNIX time is less than $currentTime add 1 to concludedGiveaways for each post
          foreach($post_objects as $post) {
            if(strtotime($post->__get('giveaway_end_date')) < $currentTime) {
              $concludedGiveaways++;
            }
          }
          // compare function to sort based on remaining time so concluded is at the beginning of the array
          function compareGiveaway($a, $b) {
            $a_get_fields = $a->__get('giveaway_end_date');
            $b_get_fields = $b->__get('giveaway_end_date');
            if($a_get_fields == $b_get_fields) {
              return 0;
            }
            return ($a_get_fields < $b_get_fields) ? -1 : 1;
          }
          // sort $post_objects array
          usort($post_objects, "compareGiveaway");
          // remove / unset posts that come after $concludedGiveaways / concluded posts
          for($j = $concludedGiveaways; $j <= $concludedGiveawayIndex; $j++) {
            unset($post_objects[$j]);
          } ?> 
            <script>
                let concluded = document.getElementById('concluded');
                concluded.selected = true;
            </script>
            <?php }
      // rendering of posts below based on criteria above
      //get appropriate giveaway ad unit
      $gaCounter = 1;
      foreach( $post_objects as $post):
       if ($gaCounter == 4)
         get_template_part('template-parts/ads/giveaways/giveaways-1');
       if ($gaCounter == 7)
         get_template_part('template-parts/ads/giveaways/giveaways-2');
       if ($gaCounter == 10)
        get_template_part('template-parts/ads/giveaways/giveaways-3');

      setup_postdata($post); ?>
      <a href="<?php the_permalink(); ?>" class="box-shadow-default ripple">
          <img src="<?php the_post_thumbnail_url( 'medium' ); ?>" />
        <h2><?php the_title(); ?></h2>
        <div>
        <p id="countdown-<?php the_ID(); ?>"></p>

        <p>$<?php the_field('giveaway_product_value') ?> Value</p>
      </div>
      <div class='buttonContainer'>
        <span id="ga_button" class="box-shadow-nohover">Enter</span>
      </div>
      </a>
      <?php $gaCounter++; ?>
<?php endforeach; ?>
<script>
  <?php foreach( $post_objects as $post):  ?>

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
  <?php endforeach; ?>
</script>
  <?php wp_reset_postdata(); ?>
  <?php endif; ?>
</div>


<!-- 
<a href="<?php the_permalink(); ?>" class="box-shadow-default ripple">
          <img src="<?php the_post_thumbnail_url( 'medium' ); ?>" />
        <h2><?php the_title(); ?></h2>
        <div>
        <p id="countdown-<?php the_ID(); ?>"></p>

        <p>$<?php the_field('giveaway_product_value') ?> Value</p>
      </div>
        <span id="ga_button" class="box-shadow-nohover">Enter</span>

      </a> -->

</article>

<?php get_template_part( 'partials/giveaway-winners') ?>

<div class="giveaway-container ga-descript">
  <?php echo category_description(); ?>
</div>
<br>
<?php get_template_part('template-parts/ads/giveaways/giveaways-bottom'); ?>
<br>
<?php
$socialShare = new social_share_component(
  array(
    'setFacebook' => true,
    'setTwitter' => true,
    'setEmail' => true,
    'setFlipboard' => true,
    'setComment' => true,
    'setDots' => true,
    'classList' => 's-cat',
    'id' => 'social-share',
    'moreBox' => true
  )
);
?>
<?php get_footer();  ?>
