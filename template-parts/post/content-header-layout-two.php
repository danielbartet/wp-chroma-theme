<?php
/* Template part for displaying post header */
global $page, $pages, $numpages, $multipage;
$publishTime = get_the_time('U');
$modifiedTime = get_the_modified_time('U');
$block = parse_blocks($post->post_content);
// variables for read time
$wordsPerSecond = (265 / 60);
// first image in seconds
$firstImage = 12;
$content = get_post_field( 'post_content', $post->ID );
// total word count
$word_count = str_word_count( strip_tags( $content ) );
?>
<script>
// script to get total slider blocks + images to calculate image time (11 secs)
function getPostImages() {
  let postImages = document.querySelectorAll('.wp-block-chroma-blocks-media-upload');
  if(postImages.length > 0) {
    let postImagesLength = postImages.length;
    document.cookie = "postImagesLength = " + postImagesLength
    // set php variable to image array length
    <?php $totalSlides = $_COOKIE['postImagesLength']; ?>
  }
}

setTimeout(getPostImages, 1000);
</script>
<?php 
  $imageSeconds = 11;
  for($i = 1; $i <= $totalSlides; $i++) {
    // totalSeconds from Medium ascending time: '11 seconds for the second image, and minus an additional second for each subsequent image'
    $totalSlideSeconds += $imageSeconds;
    $imageSeconds--;
  }
  // total time calculation
  $totalTime = ($word_count / $wordsPerSecond);
  $totalTime += $firstImage;
  if($totalSlideSeconds > 0) {
    $totalTime += $totalSlideSeconds;
  }
  $totalTime = ($totalTime / 60);
  // rounds time up to nearest number
  $totalTime = ceil($totalTime);
?>
<article id="post-area">
    <header id="post-header">
      <?php
        //get head slider unit for multipage posts
        if ($multipage && is_page_template('page-imageRefresh.php'))
          //get_template_part('template-parts/ads/slider/slider-top');
      ?>
      <?php
        if (!$multipage) {
          $breadcrumb = new breadcrumb;
          echo $breadcrumb->get_the_breadcrumb();
        }
       ?>
      <h1 class="post-title"><?php the_title(); ?></h1>
      <div class="subtitleContainer">
        <?php 
          do_action( 'plugins/wp_subtitle/the_subtitle', array(
                      'before'        => '<i class="subtitle" style="color: #808080; font-size: 1.1em;">',
                      'after'         => '</i>',
                      'post_id'       => get_the_ID(),
                      'default_value' => ''
        ) ); ?>
        </div>
        <div id="post-info-wrap">
          <div class="post-info-right">
                <span class="author-name">By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span><?php the_author(); ?></span></a>
                  <?php $authtwitter = get_the_author_meta( 'twitter' ); if ( ! empty ( $authtwitter ) ) { ?>
                    <span class="author-twitter">
                      <a href="<?php echo esc_url(the_author_meta('twitter')); ?>" class="twitter-but">
                        <svg class="author-tweet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="11px" height="11px" viewBox="0 0 512.002 512.002" style="enable-background:new 0 0 512.002 512.002;" xml:space="preserve">
                            <g>
                              <path class="author-tweet" d="M512.002,97.211c-18.84,8.354-39.082,14.001-60.33,16.54c21.686-13,38.342-33.585,46.186-58.115   c-20.299,12.039-42.777,20.78-66.705,25.49c-19.16-20.415-46.461-33.17-76.674-33.17c-58.011,0-105.042,47.029-105.042,105.039   c0,8.233,0.929,16.25,2.72,23.939c-87.3-4.382-164.701-46.2-216.509-109.753c-9.042,15.514-14.223,33.558-14.223,52.809   c0,36.444,18.544,68.596,46.73,87.433c-17.219-0.546-33.416-5.271-47.577-13.139c-0.01,0.438-0.01,0.878-0.01,1.321   c0,50.894,36.209,93.348,84.261,103c-8.813,2.399-18.094,3.687-27.674,3.687c-6.769,0-13.349-0.66-19.764-1.888   c13.368,41.73,52.16,72.104,98.126,72.949c-35.95,28.176-81.243,44.967-130.458,44.967c-8.479,0-16.84-0.496-25.058-1.471   c46.486,29.807,101.701,47.197,161.021,47.197c193.211,0,298.868-160.062,298.868-298.872c0-4.554-0.104-9.084-0.305-13.59   C480.111,136.775,497.92,118.275,512.002,97.211z"></path>
                            </g>
                        </svg>
                      </a>
                    </span>
                    <?php } ?>
              </span>
              <div class='readAndPublish'>
                <span class='readTime'><?php echo $totalTime . ' Min Read' ?></span>
                <time class="post-info-time" datetime="<?php the_time('Y-m-d H:i:s'); ?>">
                  Published: <?php the_time('M jS, Y');?>
                </time>
              </div>
          </div>
              <?php
              if (!$multipage) {
                if ($modifiedTime >= $publishTime + 86400) { ?>
                  <div class="post-info-right post-info-date">
                    <time class="post-date" datetime="<?php?>">
                      Updated: <?php echo the_modified_time('M jS, Y'); ?>
                    </time>
                  </div>
                <?php
                }
              }
              ?>
        </div>
        <?php
        if (!$multipage) {
          get_template_part('template-parts/ads/post/post-ad-header');
        }
        ?>
    </header>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- under_image_rightfit -->
    <ins class="adsbygoogle"
    style="display:block"
    data-ad-client="ca-pub-4229549892174356"
    data-ad-slot="6568402572"
    data-ad-format="auto"
    data-full-width-responsive="true"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
<?php
get_template_part( 'template-parts/post/content-header/featured-image' ); ?>
<div>
<div id="ezoic-pub-ad-placeholder-104">
  <!-- Middle Ad 5 -->
  <ins class="adsbygoogle"
       style="display:block"
       data-ad-client="ca-pub-4229549892174356"
       data-ad-slot="3762198620"
       data-ad-format="auto"></ins>
  <script>
  (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
  </div>
</div>
<?php get_template_part( 'template-parts/post/engagementbar' );
?>

