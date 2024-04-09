<?php
//Theme Option Settings.

 // create custom plugin settings menu
 add_action('admin_menu', 'iDrop_create_menu');

 function iDrop_create_menu() {
   //create new top-level menu
  	add_menu_page('iDrop Theme Settings', 'iDrop Settings', 'administrator', __FILE__, 'iDrop_options' , '' );
 }

function iDrop_options()  {
  //must check that the user has the required capability
   if (!current_user_can('manage_options'))
    wp_die( __('You do not have sufficient permissions to access this page.') );

   //variables for the field
   $option_header = 'header';
	 $option_footer = 'footer';
   $option_logo = 'logo';
   $option_altLogo = 'altLogo';
   $option_footcopy = 'footcopy';

		//option names
   $hidden_field_name = 'mt_submit_hidden';

   // Read in existing option value from database
    $option_logo_val = get_option( $option_logo );
    $option_altLogo_val = get_option( $option_altLogo );
		$option_header_val = get_option( $option_header );
		$option_footer_val = get_option( $option_footer );
    $option_footcopy_val = get_option( $option_footcopy );

   // See if the user has posted us some information
   // If they did, this hidden field will be set to 'Y'
   if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
       // Read their posted value
      $option_logo_val =  $_POST[ 'logo' ];
      $option_altLogo_val =  $_POST[ 'altlogo' ];
      $option_header_val =  $_POST[ 'header' ];
      $option_footer_val = $_POST[ 'footer' ];
      $option_footcopy_val = $_POST[ 'footcopy' ];
		}

    // Save the posted value in the database
    update_option( $option_logo, $option_logo_val );
    update_option( $option_altLogo, $option_altLogo_val );
    update_option( $option_header, $option_header_val );
    update_option( $option_footer, $option_footer_val );
    update_option( $option_footcopy, $option_footcopy_val );

     // Put a "settings saved" message on the screen

?>
<div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>

<div class="wrap">
<h1><?php bloginfo( 'name' ); ?> Settings</h1>
 <form name="form1" method="post" action="" id="options-form">
   <table class="form-table">
	  <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y"/>
    <tr valign="top">
     <th scope="row">Logo</th>
      <td>
        <div class='image-preview-wrapper'>
      		<img id='image-preview' src='' width='100' height='100' style='max-height: 100px; width: 100px;'>
      	</div>
      	<input id="upload_image_button" type="button" class="button" value="<?php _e( 'Upload image' ); ?>" />
      	<input type='hidden' name='image_attachment_id' id='image_attachment_id' value=''>
        <textarea type="textarea" class="widefat" cols="50" rows="5" wrap="hard" name="logo" value="<?php echo htmlentities ( stripslashes($option_logo_val) ); ?>"><?php echo htmlentities ( stripslashes($option_logo_val) ); ?></textarea>
      </td>
    </tr>
    <tr valign="top">
     <th scope="row">Alt Logo</th>
      <td>
        <textarea type="textarea" class="widefat" cols="50" rows="5" wrap="hard" name="altlogo" value="<?php echo htmlentities ( stripslashes($option_altLogo_val) ); ?>"><?php echo htmlentities ( stripslashes($option_altLogo_val) ); ?></textarea>
      </td>
    </tr>
     <tr valign="top">
       <th scope="row">Header Scripts</th>
         <td>
			     <textarea type="textarea" class="widefat" cols="50" rows="5" wrap="hard" name="header" value="<?php echo htmlentities (stripslashes($option_header_val)); ?>"/><?php echo htmlentities ( stripslashes($option_header_val)); ?></textarea>
        </td>
      </tr>
      <tr valign="top">
       <th scope="row">Footer Scripts</th>
        <td>
          <textarea type="textarea" class="widefat" cols="50" rows="5" wrap="hard" name="footer" value="<?php echo htmlentities (stripslashes($option_footer_val)); ?>"><?php echo htmlentities (stripslashes($option_footer_val)); ?></textarea>
        </td>
      </tr>
      <tr valign="top">
       <th scope="row">Footer Copy</th>
        <td>
          <textarea type="textarea" class="widefat" cols="50" rows="5" wrap="hard" name="footcopy" value="<?php echo htmlentities ( stripslashes($option_footcopy_val) ); ?>"><?php echo htmlentities ( stripslashes($option_footcopy_val) ); ?></textarea>
        </td>
      </tr>
   </table>

		<div class="submit">
			<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
		</div>

	</form>
</div>
<script>
(function($) {
  $('#options-form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
      if (keyCode === 13) {
        e.preventDefault();
        $(':focus').val($(':focus').val() + "\n");
        console.log($(':focus').val());
        return false;
      }
    });
})( jQuery );
</script>

<?php
}

$footer_copyright = 'Copyright © 2017 <a href="https://www.idropnews.com">iDrop News</a>. All rights reserved. By using iDrop News you agree to our <a href="/terms/">terms and conditions</a>.  iDrop News and its contents are not affiliated or endorsed by Apple, Inc.';
