<?php
  /* Template Name: Giveaway Widget Gen */
  echo '<head>';
  echo '<style>code{
    max-width: 800px;
    padding: 4%;
    background: #222;
    color: #00ff96;
    line-height: 1.35;
    display: block;
    margin: 0 auto;
  }</style>';
  $html_as_string = "";
  $ga_style_file = file_get_contents("/var/www/html/wp-content/themes/chroma/src/css/gawidget.css");
  echo '<style>'.$ga_style_file.'</style>';
  echo '</head><body>';
?>
  <div class="idn_note_container">
    <a href="https://www.idropnews.com/giveaways/" class="idn_note">Giveaways by iDrop News</a>
  </div>
  <div class="idn">
      <?php
        //query args
        $ga_args = array(
          'post_type' => 'post',
          'post__in' => array(45774, 47447, 46868, 46164),
          'posts_per_page' => 4,
          'category_name' => 'giveaways',
          'order' => 'desc',
          'orderby' => 'meta_value_num',
          'meta_key' => 'post_views',
        );

        $ga_query = new WP_Query($ga_args);
        // The Loop
        if ( $ga_query->have_posts() ) {
          $i = 1;
          while ( $ga_query->have_posts() ) {
            $ga_query->the_post();
            $data_title = get_the_title();
            $data_title = str_replace( " ", "_", $data_title);
      ?>
    <!--copyright idropnews, use only with permission -->
    <a href="<?php the_permalink(); ?>" class="idn_giveaway" id="idn_giveaway-<?php echo $i; ?>" data-product="<?php echo $data_title; ?>">
      <img src="<?php the_post_thumbnail_url('medium'); ?>" class="idn_giveaway_img"/>
      <h3 class="idn_giveaway_h3">
        <?php the_title(); ?>
      </h3>
      <p class="idn_giveaway_price">
        $<?php ( (get_field('price')) ? the_field('price') : ''); ?> Value
      </p>
      <div class="idn_giveaway_enter">Enter</div>
    </a>
    <?php
    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium');
    $html_as_string .= '<a href="'.get_the_permalink().'" class="idn_giveaway" id="idn_giveaway-'.$i.'" data-product="'.$data_title.'">
        <img src="'.$thumbnail.'" class="idn_giveaway_img"/>
        <h3 class="idn_giveaway_h3">
          '.get_the_title().'
        </h3>
        <p class="idn_giveaway_price">
          $'. ( (get_field('price')) ? get_field('price') : '') .'
        </p>
        <div class="idn_giveaway_enter">Enter</div>
      </a>';
      /* Restore original Post Data */
    	wp_reset_postdata();
      $i++;
    } //endhwile
  } //endif
  ?>
  </div>
  <?php
  $giveaway_script = '<script>var idnCurrentDomainPath = "?utm_source=" + window.location.hostname,idnUtmPrefix = idnCurrentDomainPath + "&utm_medium=referral&utm_campaign=giveaways_widget_external";for(var i = 1; i <= 4; i++){var currentIdnNode = document.getElementById("idn_giveaway-"+i),currentIdnTerm = "&utm_term=" + currentIdnNode.getAttribute("data-product"),idnNewHref = currentIdnNode.getAttribute("href") + idnUtmPrefix + currentIdnTerm;currentIdnNode.setAttribute("href", idnNewHref);}
var idnContainerWidth = document.getElementsByClassName("idn")[0].offsetWidth,allIdn = document.getElementsByClassName("idn_giveaway");if(idnContainerWidth < 780 && idnContainerWidth > 470){for(var i = 0; i < 4; i++){document.getElementsByClassName("idn_giveaway")[i].style.width = "calc(50% - 20px)";}}else if (idnContainerWidth < 470){for(var i = 0; i < 4; i++){document.getElementsByClassName("idn_giveaway")[i].style.width = "96%";}}</script>';
  echo $giveaway_script;
  $html_as_string = '<!--copyright idropnews, use only with permission -->'.'<style>'.$ga_style_file.'</style>' . '<div class="idn_note_container"><a href="https://www.idropnews.com/giveaways/" class="idn_note">Giveaways by iDrop News</a></div><div class="idn">' . $html_as_string . '</div>' . $giveaway_script;
  echo '<code>' . htmlspecialchars($html_as_string) . '</code>';
  ?>
</body>
<?php
