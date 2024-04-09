<?php
// Ad Placement Settings.

// create custom plugin settings menu
add_action('admin_menu', 'ad_placement_settings_menu');

function ad_placement_settings_menu() {
 //create new top-level menu
	add_menu_page('Ad Placement Settings', 'Ad Placement Settings', 'administrator', __FILE__, 'ad_placement_settings' , '' );
}

function ad_placement_settings()  {
  //must check that the user has the required capability
  if (!current_user_can('manage_options'))
    wp_die( __('You do not have sufficient permissions to access this page.') );

  //post values if set
  if( isset($_POST[ 'post_ad_top' ]))
    update_option( 'post_ad_top', $_POST[ 'post_ad_top' ]);
  if( isset($_POST[ 'post_ad_top' ]))
    update_option( 'post_ad_top', $_POST[ 'post_ad_top' ]);
  if( isset($_POST[ 'post_ad_top' ]))
    update_option( 'post_ad_top', $_POST[ 'post_ad_top' ]);
  if( isset($_POST[ 'post_ad_top' ]))
    update_option( 'post_ad_top', $_POST[ 'post_ad_top' ]);
  if( isset($_POST[ 'post_ad_top' ]))
    update_option( 'post_ad_top', $_POST[ 'post_ad_top' ]);

  //Read in existing option value from database
  $post_ad_top = get_option( 'post_ad_top' );

  ?>
<div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
<style>
  .ad_placement_box {
    display: flex;
    justify-content: flex-start;
    align-content: center;
    align-items: center;
    margin: 12px auto;
  }
  .ad_placement_box span {
    width: 25%;
    font-size: 1.2rem;
    font-weight: 700;
    line-height: 1.35;
  }
  .ad_placement_box textarea, .ad_placement_box input {
    width: 75%;
  }
</style>
<div class="wrap tab">
<h1>Ad Placement Settings</h1>
  <form name="form1" method="post" action="">
    <div class="ad_placement_box">
      <span>Post Header</span>
      <textarea type="textarea" class="widefat" cols="50" rows="5" wrap="hard" name="post_ad_top" value="<?php echo htmlentities(stripslashes($post_ad_top)); ?>"/><?php echo htmlentities(stripslashes($post_ad_top)); ?></textarea>
    </div>
    <hr>
      <div class="submit">
        <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
      </div>
    </table>
  </form>
</div>
<?php
}
