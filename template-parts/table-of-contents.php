<?php
      $queried_object = get_queried_object();
      $layout_value = get_post_meta( get_the_ID(), 'layout_options', true );
      if (get_field('table_of_contents', $queried_object) ) {

      if (have_rows('table_of_contents', $queried_object) ) { ?>

          <nav class="anchor-nav">
            <div class="toctitle"></div>
            <ol class="anchor-nav__ol">


                <?php while(have_rows('table_of_contents', $queried_object) ) { the_row(); ?>
                    <li class="anchor-nav__li">
                      <?php if(get_sub_field('allow_link_out', $queried_object)[0] == 'Allow') {
                              $contentlink = get_sub_field('content_link_out', $queried_object );
                              $contentlink = str_replace(' ', '', $contentlink);
                            ?>
                            <a class="anchor-nav__a" href="<?php echo $contentlink; ?>">
                              <?php the_sub_field('content_anchor', $queried_object); ?>
                            </a>
                          <?php } else {
                              $contentlink = get_sub_field('content_anchor', $queried_object );
                              $contentlink = str_replace(' ', '%20', $contentlink);
                            ?>
                          <a class="anchor-nav__a" href="#<?php echo $contentlink; ?>">
                            <?php the_sub_field('content_anchor', $queried_object); ?>
                          </a>
                        <?php } ?>
                    </li>
                <?php } ?>

           </ol>
          </nav>

<?php } } else if ( ($layout_value === 'howto' ) ) { ?>
          <nav class="anchor-nav">
          <div class="toctitle"></div>
            <ol class="anchor-nav__ol">
            <?php if( have_rows('phase') ) { ?>
                <?php
                      // loop through rows (parent repeater)
                    while( have_rows('phase') ) { the_row();
                      $contentlink = get_sub_field('phase_title');
                      $contentlink = str_replace(' ', '', $contentlink);
                      ?>
                          <li class="anchor-nav__li">
                            <a class="anchor-nav__a" href="#<?php echo $contentlink; ?>"><?php the_sub_field('phase_title'); ?></a>
                          </li>
                <?php } } ?>
            </ol>
          </nav>

<?php } ?>
