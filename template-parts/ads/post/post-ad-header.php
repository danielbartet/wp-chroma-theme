<?php
  global $post;
  $adsOn = get_post_meta( $post->ID, 'chromma-toggle-ads', true );
  if ( ($adsOn !== "off") && ($adsOn !== "auto_adsense") ) { ?>
<?php
}
