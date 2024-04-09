<?php
function aabl_meta_box_override() {
  add_meta_box(
      'aabl_meta_box_override',
      'AALB Override',
      'aabl_meta_box_override_box',
      'post',
      'side',
      'default'
  );
}
function aabl_meta_box_override_box() {
  $aalb_admin = new Aalb_Admin();
  $aalb_admin->admin_display_callback();
}

add_action( 'add_meta_boxes', 'aabl_meta_box_override');
