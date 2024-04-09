<?php
// Adding Custom Post Meta Boxes
global $post;
setup_postdata( $post );
function chroma_add_meta_boxes( $post ) {
	add_meta_box( 'chroma_meta_box', 'Layout Options', 'chroma_build_meta_box', 'post', 'side', 'core' );
}
add_action( 'add_meta_boxes', 'chroma_add_meta_boxes' );

function chroma_build_meta_box( $post ) {

	wp_nonce_field( basename( __FILE__ ), 'chroma_meta_box_nonce' );

	$layout_opions = get_post_meta( $post->ID, 'layout_options', true );
	?>
	<p>
		<input type="radio" name="layout" value="default" <?php checked( $layout_opions, 'default' ); ?> /> Default<br />
		<input type="radio" name="layout" value="howto" <?php checked( $layout_opions, 'howto' ); ?> /> How To
	</p>
	<?php
}

function chroma_save_meta_boxes_data( $post_id ) {

		// verify meta box nonce
	if ( !isset( $_POST['chroma_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['chroma_meta_box_nonce'], basename( __FILE__ ) ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
	 	return;
	}

	// && in_array($POST['layout'])
	if ( isset( $_POST['layout'] ) ) {
		update_post_meta( $post_id, 'layout_options', $_POST['layout']  );
	}

}
add_action( 'save_post', 'chroma_save_meta_boxes_data', 10, 2 );
