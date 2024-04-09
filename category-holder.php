<?php get_header();
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
  // vars
  $queried_object = get_queried_object();
  $taxonomy = $queried_object->taxonomy;
  $term_id = $queried_object->term_id;
?>

<?php if ( get_field('is_cornerstone', $queried_object) == 'Cornerstone' || is_category ( array('iPhone X', 'iPhone 8', 'iPhone 7 vs. Google Pixel', 'AirDrop', 'Mail Drop', 'iOS 11', 'iPhone 7s', 'Apple Keynote Fall 2017' ) ) ) { ?>

<section>
    <article>
  <!--  Alternative Layout Cornerstone -->
      <?php
          // Get the ID of a given category
          $category = get_the_category();
          $category_id = $category[0]->cat_ID;

          // Get the URL of this category
          $category_link = get_category_link( $category_id );
      ?>
      <div class="alt-cat-body">
      <div class="alt-cat-bar">
      </div>
      <?php
      $term =  single_cat_title("", false);
      ?>

      <div class="alt-cat-header" style="background-image: url('<?php the_field('cat_image', $queried_object); ?>'); }">
        <?php if(is_category ('Apple Keynote Fall 2018')) { ?>
          <iframe src="https://twitter.com/i/videos/tweet/1039159459816394757?embed_source=clientlib&amp;player_id=0&amp;rpc_init=1&amp;autoplay=1&amp;language_code=en&amp;use_syndication_guest_id=true" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;" allowfullscreen allow="autoplay; fullscreen"></iframe>
        <?php } ?>
      <div class="alt-cat-header-overlay" style="z-index: 500; position: absolute; top: 0px;">
      <h1><?php single_cat_title(); ?></h1>
      <div style="height: 0;opacity: 0;">
        <p style="display: inline-block;">By:&nbsp;</p>
        <p style="display: inline-block;">
        <?php the_field('category_author', $queried_object); ?>
        </p>
      </div>
      <div style="height: 0;opacity: 0; z-index: 500;"><p style="display: inline-block; ">Published:&nbsp;</p><p style="display: inline-block;"><?php posted_time_stamp(); ?></p></div>
      <div style="z-index: 500;"><p style="display: inline-block;">Updated:&nbsp;</p><p style="display: inline-block;"><?php modified_time_stamp(); ?></p></div>
      </div>
      </div>
      <br>
      <div class="alt-cat-container">
        <div class="flex-cards" id="infinite-data">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php static $count = 0;
          if ($count == "25") { break; }
          else { ?>
            <?php get_template_part('/partials/cards/post-card') ?>
            <?php $count++; } ?>
            <?php endwhile; ?>
            <?php endif;	wp_reset_postdata(); ?>
          </div>
          <div class="clearfix"></div>
          <?php
              get_template_part('template-parts/archive/more-posts-button');
          ?>
        <div id="content-main" class="content-main">
          <?php get_template_part( 'template-parts/table-of-contents'); ?>
          <?php echo category_description(); ?>
        </div>
      <?php $socialShare = new social_share_component(
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

  <div class="nav-links">
    <?php  $archiveNav = get_the_posts_navigation( array(
            'prev_text' => '',
            'next_text' => '',
            'screen_reader_text' => ""
          ));
          echo filter_archive_nav($archiveNav); ?>
	</div><!--nav-links-->
</div><!--home-main-wrap-->
<div class="clearfix"></div>

<br>
</div>
<!--<div class="alt-cat-questions">
	Want to find out more about <?php single_cat_title(); ?>? Ask a question below.
</div> -->

</div> <!-- alt-cat-body end -->
</div>
</article>
<?php
  //get category ad cornerstone
  get_template_part( 'template-parts/ads/category/category-ad-cornerstone')
?>
</section>
<?php } else { ?>
  <!-- Default category layout -->
<div>

	<div id="feat-top-wrap" >
    <?php if ( have_posts() ) : $i = ($paged > 1) ? 4 : 0; $box_cards = true; while ( have_posts() ) : the_post();  ?>
      <?php if ($i == 0) { ?>
    <a href="<?php echo get_permalink(); ?>" class="featured featured-1">
    <div class="featured-overlay"></div>
    <?php echo get_the_post_thumbnail(); ?>
        <div class="feat-meta-block">
            <span class="feat-cat"><?php $category = get_the_category(); echo $category[0]->cat_name;?></span>
            <h2><?php the_title(); ?></h2>
        </div>
      </a>
  <?php } else if ($i == 1) { ?>
      <a href="<?php echo get_permalink(); ?>" class="featured featured-2">
    <div class="featured-overlay"></div>
    <?php echo get_the_post_thumbnail(); ?>
          <div class="feat-meta-block">
              <span class="feat-cat"><?php $category = get_the_category(); echo $category[0]->cat_name;?></span>
              <h2><?php the_title(); ?></h2>
          </div>
        </a>
    <?php } else if ($i == 2) { ?>
        <a href="<?php echo get_permalink(); ?>" class="featured featured-3">
    <div class="featured-overlay"></div>
    <?php echo get_the_post_thumbnail(); ?>
            <div class="feat-meta-block">
                <span class="feat-cat"><?php $category = get_the_category(); echo $category[0]->cat_name;?></span>
                <h2><?php the_title(); ?></h2>
            </div>
          </a>
        <?php } else if ($i == 3) { ?>
          <a href="<?php echo get_permalink(); ?>" class="featured featured-4">
      <div class="featured-overlay"></div>
      <?php echo get_the_post_thumbnail(); ?>
              <div class="feat-meta-block">
                  <span class="feat-cat"><?php $category = get_the_category(); echo $category[0]->cat_name;?></span>
                  <h2><?php the_title(); ?></h2>
              </div>
            </a>
          </div><!--feat-top2-left-wrap-->
          <div class="clearfix"></div>
          <?php
            //get category ad default 1
            get_template_part( 'template-parts/ads/category/category-ad-default')
          ?>
          <br>
            <?php } else if ($i > 3) {
            if ($box_cards == true) {
              if ($paged !== 0) { ?>
                <?php
                  //get category ad default 2
                  get_template_part( 'template-parts/ads/category/category-ad-default-2')
                ?>
                <br>
          <?php }
              echo '<section class="flex-cards" id="infinite-data">';
            }
            get_template_part('/partials/cards/post-card');
            $box_cards = false;
            }
            $i++;
            endwhile;
            echo '</section>';
            endif;
            wp_reset_postdata();
            ?>


          <div class="clearfix"></div>
          <div class="nav-links">
        	<?php  $archiveNav = get_the_posts_navigation( array(
          				'prev_text' => '',
          				'next_text' => '',
          				'screen_reader_text' => ""
          			));
          			echo filter_archive_nav($archiveNav); ?>
        	</div><!--nav-links-->


</div>

</div><!--home-main-wrap-->
<div class="clearfix"></div>
<?php
  get_template_part('template-parts/archive/more-posts-button');
?>
<div class="category-description">
	<h1 class="description-header"><?php single_cat_title(); ?></h1>
	<p><?php echo category_description(); ?></p>
</div>
<?php
  //get category ad bottom
  get_template_part( 'template-parts/ads/category/category-ad-default-bottom')
?>
<?php } ?>
<?php get_footer(); ?>
