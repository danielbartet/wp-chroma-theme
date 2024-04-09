<?php
global $post;
if( get_post_format() != 'video' ) {
  $title = (get_field('product_name')) ? get_field('product_name') : 'Product Name';
  $price = (get_field('price')) ? "$" . get_field('price') : "";
  $stars = "<span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>";
  $url = (get_field('website_to_purchase')) ? get_field('website_to_purchase') : '';
  $custom_review_text = (get_field('custom_review_text') ? get_field('custom_review_text') : 'Purchase');
  $img = (!empty(get_the_post_thumbnail_url($post))) ? get_the_post_thumbnail_url($post,'chroma-small-thumb') : '';
  switch(get_field('rating')) {
    case '1 Stars':
      $stars = "<span>★</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>";
      break;
    case '2 Stars':
      $stars = "<span>★</span><span>★</span><span>☆</span><span>☆</span><span>☆</span>";
      break;
    case '3 Stars':
      $stars = "<span>★</span><span>★</span><span>★</span><span>☆</span><span>☆</span>";
      break;
    case '4 Stars':
      $stars = "<span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>";
      break;
    case '5 Stars':
      $stars = "<span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>";
      break;
    default:
      $stars = "<span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>";
      break;
  }
  echo "<aside class='review_cta'><div class='review_cta-con'><img src='$img' class='review_cta-img'/><div class='review_cta-data'><div class='review_cta-box'><div class='review_cta-title'>$title</div><div class='review_cta-stars'>$stars</div></div><div class='review_cta-box'><div class='review_cta-price'>$price</div><a href='$url' class='review_cta-button'>$custom_review_text</a></div><a href='$url' class='review_cta-link'></a></div></div></aside>";
}
