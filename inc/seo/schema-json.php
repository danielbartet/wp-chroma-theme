<?php
function get_schema_json() {
  if (is_single()) { ?>
    <script type="application/ld+json">
  	<?php
    if (has_category(array('reviews', 'giveaways')) && get_field('product_name')) { ?>
  		  {
          "@context":    "http://schema.org",
          "@type":       "Product",
          "name":        "<?php the_field('product_name'); ?>",
          "description": "<?php if (get_field('bottom_line')) {
  					the_field('bottom_line');
  				} else {
  				 echo strip_tags( get_the_excerpt() );
  				} ?>",
          "image":       "<?php the_post_thumbnail_url(); ?>",
          "brand": {
                         "@type": "Thing",
                         "name": "<?php the_field('brand'); ?>"
          		 			},
              "sku":     "<?php the_title(); ?>",
              "review": {
                         "reviewRating": {
                              "@type": "rating",
                              "ratingValue": "<?php the_field('rating'); ?>",
                              "worstRating": "0",
                              "bestRating": "5"
                         },
                         "author": {
                            "@type": "Person",
                            "name": "<?php the_author(); ?>"
                         }
  										 },
                  "offers": {
                             "@type": "AggregateOffer",
                             "highPrice": "<?php the_field('price'); ?>",
                             "lowPrice":  "<?php the_field('price'); ?>",
                             "offerCount": "1",
                             "priceCurrency": "USD",
                             "offers": [ {
                                      "@type": "Offer",
                                      "price": "<?php the_field('price'); ?>",
                                      "seller": "<?php the_field('website_to_purchase'); ?>",
                                      "availability": "InStock",
                                      "priceCurrency": "USD"
                                    } ]
                  }
          }
  <?php	} else { ?>
    {
      "@context": "http://schema.org",
      "@type": "<?php if (has_category('News')){ echo'NewsArticle'; } else { echo'Article';} ?> ",
      "mainEntityOfPage": "<?php the_permalink(); ?>",
      "headline": "<?php the_title(); ?>",
      "description": "<?php echo strip_tags( get_the_excerpt() ); ?>",
        "datePublished": "<?php the_time('Y-m-d'); ?>",
        "dateModified": "<?php the_modified_date('Y-m-d'); ?>",
        "image": { "@type": "ImageObject", "url": "<?php the_post_thumbnail_url(); ?>", "width": 1000, "height": 600 },
      "author": {
      "@type": "Person",
      "name": "<?php the_author(); ?>"
      },
      "publisher": {
      "@type": "Organization",
        "logo": { "@type": "ImageObject", "url": "https://cdn.idropnews.com/wp-content/uploads/2017/06/13133217/idroplogo.png", "width": 200, "height": 36 },
      "name": "iDrop News"
      }
    },
    <?php
      $breadcrumb = new breadcrumb;
      echo $breadcrumb->insert_breadcrumb_schema();
    ?>
  <?php } ?>
  </script>
  <?php
  }
}
