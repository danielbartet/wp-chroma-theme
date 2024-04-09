<?php
/**
 * Template part for displaying post content
*/

$recent_args = array(
  'numberposts' => -1,
  'orderby' => 'post_date',
  'order' => 'DESC',
  'post_type' => array('post','cm-quiz'),
  'post_status' => 'publish',
  'posts_per_page' => '1',
  'paged' => $paged,
  'category__and' => 207,
  'suppress_filters' => true
);
$home_posts = new WP_Query( $recent_args );
$i = 0;
$adsOn = get_post_meta( $post->ID, 'chromma-toggle-ads', true );
if($adsOn === 'off') {
  global $ai_wp_data;
	$ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_NO_INSERTION;
}
?>
<style>
  .post-title {
    margin: 0 !important;
    padding: 0 !important;
  }

  .breadcrumbs {
    margin: 0 !important;
    padding: 0 !important;
  }

  .read-more-div {
    display: flex;
    justify-content: center;
  }

  .read-more-div a {
    margin: 2% 0;
    padding: 2% 15%;
    background: linear-gradient(
135deg, rgba(72,49,255,0.88), rgba(255,80,166,0.88));
    color: white;
    border-radius: 10px;
    transition: all linear 100ms;
    box-shadow: 0 2px 20px 0 rgb(0 0 0 / 15%);
  }

  .read-more-div a:hover {
    transform: translateY(-10%);
  }

  .additional_posts {
    visibility: hidden;
    height: 0;
    opacity: 0;
    transition: opacity linear 800ms;
  }

</style>
<!-- load FB SDK --> 
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1991298094438021";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <div id="content-main" class="content-main">
      <div class='first_content'>
      <div class='switch-container'>
        <label class="switch">
          <input type="checkbox" class='switch-checkbox'>
          <span class="slider round"></span>
        </label>
        <p class='toggle-dark-mode'>Toggle Dark Mode</p>
      </div>
        <?php
        //declare layout options
        $layout_value = get_post_meta( get_the_ID(), 'layout_options', true );

        if (get_post_meta( $post->ID, 'stoc-simple_toc', true ) == "enabletoc")
        {
          add_filter("the_content","simple_table_of_contents_render");
          get_template_part( 'template-parts/table-of-contents');
        }
        else
        {
          get_template_part( 'template-parts/table-of-contents');
        }
        ?>
        <?php if (has_category('reviews')) {
          get_template_part( 'template-parts/post/review' );
        }

        if( ($layout_value === 'howto' ) ) {
            get_template_part( 'template-parts/post/howto' );
       } else {
         add_filter( 'the_content', 'chroma_custom_content_filter', 99 );
         if (class_exists('Chromma_Lazy_Load_Module'))
         {
           add_filter( 'the_content', 'Chromma_Lazy_Load_Module::content_lazyload_filter', 99 );
         }
         // add sponsorship here
         $sponsorship_active = get_field("sponsorship_active");
         if($sponsorship_active) {
          get_template_part("template-parts/post/sponsorship");
         }
        the_content();
       } ?>
      <?php if(has_category('Rumors')): ?>
        <p style="font-weight: bold; color: grey; font-size: 0.9em; text-align: center;">[The information provided in this article has NOT been confirmed by Apple and may be speculation. Provided details may not be factual. Take all rumors, tech or otherwise, with a grain of salt.]</p>
      <?php endif; ?>
       </div>
       <!-- multipost -->
       <?php get_template_part("template-parts/post/multipost-content"); ?>
       <!-- multipost -->
       <div id="fb-box"></div>
<?php 
  $adsOn = get_post_meta( $post->ID, 'chromma-toggle-ads', true );
  if($adsOn == "off"):
?>
<p style='text-align: center; font-size: 0.8em; color: lightgrey;'>We may earn a commission from affiliate links. Continue Below.</p>
<?php endif; ?>
       <?php if (has_category('giveaways')) {
         get_template_part( 'template-parts/post/review' );
       } ?>
      <div id="read_next"><strong>Read Next:</strong>
      <?php 
        if ( $home_posts->have_posts()) :
        while ( $home_posts->have_posts()) { $home_posts->the_post(); ?>
        <a href='<?php echo get_permalink(); ?>'><?php echo the_title(); ?></a>
        <?php    $i++; 
        }; ?>

        <?php
        if( ($layout_value === 'howto' ) && have_rows('phase') ) { ?>
        <nav class="anchor-nav" id="contentmap">
        <ol>
          <?php
              while( have_rows('phase') ) { the_row(); ?>
              <li>
                <?php
                $contentlink = get_sub_field('phase_title');
                $contentlink = str_replace(' ', '', $contentlink);
                ?>
                  <a href="#<?php echo $contentlink; ?>"><?php the_sub_field('phase_title'); ?></a>
              </li>
          <?php } ?>
          <li><span id="comments-anchor">Comments</span></li>
        </ol>
        </nav>
        <?php } ?>
        <?php
        wp_reset_postdata();
        endif;
      ?>
      </div>
  </div>
</article>


<script>
const s = document.querySelector('.switch-checkbox');
const mainContainer = document.getElementById('body-main-wrap');
console.log(window.matchMedia('(prefers-color-scheme: dark)').matches);
if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
  mainContainer.classList.add('dark-mode');
  document.body.style.background = '#000';
  s.checked = true;
}

s.addEventListener('click', () => {
  if(s.checked) {
    mainContainer.classList.add('dark-mode');
    document.body.style.background = '#000';
  } else {
    mainContainer.classList.remove('dark-mode');
    document.body.style.background = '#fff';
  }
})
// if (first.offsetHeight + first.scrollTop >= first.scrollHeight) {
//     console.log('scrolled to end');
// }
const first = document.querySelector('.first_content');
const height = first.scrollHeight;
// 4655
let additionals = Array.from(document.querySelectorAll('.additional_posts'));

window.addEventListener('scroll', () => {
 if(window.scrollY >= height) {
   for(let addition of additionals) {
     addition.style.visibility = 'visible';
     addition.style.opacity = 1;
     addition.style.height = 'auto';
   }
 }
})
</script>