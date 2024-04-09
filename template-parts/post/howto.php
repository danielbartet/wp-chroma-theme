<?php
/**
 * Template part for How Tos */
?>
  <style>
      @media (max-width: 812px) {
      .post-wrap-out1 {
          margin-top: 96px;
        }
        .ga-banner {
          display: none;
        }
      }
    </style>
          <div>
          <?php
            if (get_field('intro')) {
            	echo '<p>' . get_field('intro') . '</p>';
            } ?>
            </div>
            <?php
            //get how to ad for intro
            get_template_part('template-parts/ads/post/how-to/how-to-ad-intro');
            ?>
          <?php if( have_rows('phase') ) { ?>
              <?php
                  // loop through rows (parent repeater)
                  while( have_rows('phase') ) { the_row(); ?>
                    <div>
                      <?php
                      $contentlink = get_sub_field('phase_title');
                      $contentlink = str_replace(' ', '', $contentlink);
                      ?>
                      <a name="<?php echo $contentlink; ?>"></a>
                      <h2><?php the_sub_field('phase_title'); ?></h2>
                      <?php
                      // check for rows (sub repeater)
                      if( have_rows('step') ) { ?>
                        <ol class="how-to-block">
                        <?php

                        // loop through rows (sub repeater)
                        while( have_rows('step') ) { the_row();
                          // display each item as a list - with a class of completed ( if completed )
                            if( get_sub_field('step_content')) { ?>
                              <li>
                              <?php the_sub_field('step_content'); ?>
                              </li>
                          <?php  } ?>
                        <?php } ?>
                      </ol>
                      <?php } ?>
                    </div>
                    <?php
                      //get how to ad for intro
                      get_template_part('template-parts/ads/post/how-to/how-to-ad-iterate');
                    ?>
                  <?php } ?>

                <?php }  ?>

        <?php  if(get_field('conclusion')) {
              echo '<p>' . get_field('conclusion') . '</p>';
            }
            ?>
