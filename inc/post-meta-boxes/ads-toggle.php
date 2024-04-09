<?php
/////////////////////////////////////
// Add Custom Meta Box
/////////////////////////////////////

//Fire our meta box setup function on the post editor screen.
add_action( 'load-post.php', 'chromma_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'chromma_post_meta_boxes_setup' );

//Meta box setup function.
function chromma_post_meta_boxes_setup() {
	//Add meta boxes on the 'add_meta_boxes' hook.
	add_action( 'add_meta_boxes', 'chromma_add_post_meta_boxes' );
}

//searches for a match in post meta data to display checked
function chromma_is_checked($needle, $haystack) {
  echo ( in_array($needle, $haystack) ) ? 'checked' : '';
}

//Create one or more meta boxes to be displayed on the post editor screen.
if ( !function_exists( 'chromma_add_post_meta_boxes' ) ) {
  function chromma_add_post_meta_boxes() {

  	add_meta_box(
  		'chromma-featured-image',			// Unique ID
  		esc_html__( 'Featured Image Show/Hide', 'chroma-text' ),		// Title
  		'chromma_featured_image_meta_box',		// Callback function
  		'post',					// Admin page (or post type)
  		'side',					// Context
  		'core'					// Priority
  	);
    add_meta_box(
      'toggle-ads',			// Unique ID
      'Toggle Ads',		// Title
      'chromma_toggle_ads_meta_box',		// Callback function
      'post',					// Admin page (or post type)
      'side',					// Context
      'core'					// Priority
    );
  }
}
// Display the post meta box for ads toggling
function chromma_toggle_ads_meta_box( $post ) {
	//conditional logic for this functionality exists within  single.php, header.php, content-header.php and content-footer.php
  wp_nonce_field( basename( __FILE__ ), 'chromma_toggle_ads_nonce' );
  $selected = get_post_meta( $post->ID, 'chromma-toggle-ads', true );
  ?>
  <p>
    <label for="chromma-toggle-ads">
      Toggle all ads on or off
    </label>
    <br />
    <br />
    <select class="widefat" name="chromma-toggle-ads" id="chromma-toggle-ads">
        <option value="on" <?php selected( $selected, 'on' ); ?>>On</option>
        <option value="off" <?php selected( $selected, 'off' ); ?>>Off</option>
				<option value="auto_adsense" <?php selected( $selected, 'auto_adsense' ); ?>>Auto Adsense</option>
    </select>
  </p>
<?php  }

// Save the ad toggle meta box's post metadata.
function chromma_toggle_ads_save_meta( $post_id, $post ) {
  global $post;
  // verify meta box nonce
  if ( !isset( $_POST['chromma_toggle_ads_nonce'] ) || !wp_verify_nonce( $_POST['chromma_toggle_ads_nonce'], basename( __FILE__ ) ) ) {
  	return;
  }

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
  		return;
  }

  if ( !current_user_can( 'edit_post', $post->ID ) ) {
   	return;
  }

  if ( isset( $_POST['chromma-toggle-ads'] ) ) {
  	update_post_meta( $post->ID, 'chromma-toggle-ads', $_POST['chromma-toggle-ads']  );
  }
}
add_action( 'save_post', 'chromma_toggle_ads_save_meta', 10, 2 );

// Display the post meta box for featured image hide/show.
function chromma_featured_image_meta_box( $post ) { ?>
	<?php
  wp_nonce_field( basename( __FILE__ ), 'chromma_featured_image_nonce' );
  $selected = get_post_meta( $post->ID, 'chromma-featured-image', true ); ?>
	<p>
		<label for="chromma-featured-image">
      <?php esc_html_e( "Select to show or hide the featured image from automatically displaying in this post.", 'chroma-text' ); ?>
    </label>
		<br />
    <br />
		<select class="widefat" name="chromma-featured-image" id="chromma-featured-image">
        <option value="show" <?php selected( $selected, 'show' ); ?>>Show</option>
        <option value="hide" <?php selected( $selected, 'hide' ); ?>>Hide</option>
    </select>
	</p>
<?php }

// Save the featured image meta box's post metadata.
function chromma_save_featured_image_meta( $post ) {
  global $post;
  // verify meta box nonce
  if ( !isset( $_POST['chromma_featured_image_nonce'] ) || !wp_verify_nonce( $_POST['chromma_featured_image_nonce'], basename( __FILE__ ) ) ) {
  	return;
  }

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
  		return;
  }

  if ( !current_user_can( 'edit_post', $post->ID ) ) {
   	return;
  }

  if ( isset( $_POST['chromma-featured-image'] ) ) {
  	update_post_meta( $post->ID, 'chromma-featured-image', $_POST['chromma-featured-image']  );
  }

}

add_action( 'save_post', 'chromma_save_featured_image_meta', 10, 2 );
