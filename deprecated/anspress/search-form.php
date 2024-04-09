<?php
/**
 * Template for search form.
 * Different from WP default searchfrom.php. This only search for question and answer.
 *
 * @package AnsPress
 * @author  Rahul Aryan <support@anspress.io>
 * @since   3.0.0
 */
?>

<form id="ap-search-form" class="ap-search-form" action="<?php echo esc_url( ap_get_link_to( '/' ) ); ?>">
	<div class="ap-search-inner no-overflow">
	<div class="ap-search-box">
	    <input name="ap_s" type="text" class="ap-search-input ap-form-input" placeholder="<?php _e('Search...', 'anspress-question-answer' ); ?>" value="<?php echo sanitize_text_field( get_query_var('ap_s' ) ); ?>" />
			<button class="ap-btn ap-search-btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
		</div>
    </div>

</form>
