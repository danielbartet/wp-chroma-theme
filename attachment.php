<?php get_header(); ?>
<div class="entry-attachment">
       <?php
           echo wp_get_attachment_image( get_the_ID() );
           if ( has_excerpt() ) : ?>
           <div class="entry-caption">
                 <?php the_excerpt(); ?>
           </div><!-- .entry-caption -->
       <?php endif; ?>
</div><!-- .entry-attachment -->
<?php get_footer(); ?>
