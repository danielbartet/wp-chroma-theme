<?php
function chroma_mobile_nav() {
  //mobile nav here so that it's not render blocking
  get_template_part('partials/mobile-nav');
}
add_action( 'wp_footer', 'chroma_mobile_nav', 1);
?>
