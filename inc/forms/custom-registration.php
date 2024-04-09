<?php
/*Custom User Fields
Confirms user is above the age 13 */
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Extra profile information</h3>

	<table class="form-table">

		<tr>
			<th><label for="above13">Above 13?</label></th>

			<td>
				<input type="text" name="above13" id="above13" value="<?php echo esc_attr( get_the_author_meta( 'above13', $user->ID ) ); ?>" class="regular-text" /> <br/>
				<span class="description">Please check if you are 13 or older.</span>
			</td>
		</tr>
		<tr>
			<td><label for="roletile">Role/Title</label></th>
				<td><input type="text" name="roletitle" id="roletitle" value="<?php echo esc_attr( get_the_author_meta( 'roletitle', $user->ID ) ); ?>" class="regular-text" /> <br/>
					<span class="description">Write in the title or role of author. This will be displayed on the authors and author pages.</span>
				</td>
		</tr>

	</table>
<?php }
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_usermeta( $user_id, 'above13', $_POST['above13'] );
	update_usermeta( $user_id, 'roletitle', $_POST['roletitle'] );

}


/* Custom Registration Form */
function cr(&$fields, &$errors, $age) {

  // Check args and replace if necessary
  if (!is_array($fields))     $fields = array();
  if (!is_wp_error($errors))  $errors = new WP_Error;

  // Check for form submit
  if (isset($_POST['submit'])) {

    // Get fields from submitted form
    $fields = cr_get_fields();

    // Validate fields and produce errors
    if (cr_validate($fields, $errors, $age)) {

      // If successful, register user
      wp_insert_user($fields);

      // And display a message
			$url = 'https://www.idropnews.com/idrop-forums-login/';
			wp_redirect($url);

      // Clear field data
      $fields = array();
    }
  }

  // Santitize fields
  cr_sanitize($fields);
  // Generate form
  cr_display_form($fields, $errors, $age);
}

function cr_sanitize(&$fields) {
  $fields['user_login']   =  isset($fields['user_login'])  ? sanitize_user($fields['user_login']) : '';
  $fields['user_pass']    =  isset($fields['user_pass'])   ? esc_attr($fields['user_pass']) : '';
  $fields['user_email']   =  isset($fields['user_email'])  ? sanitize_email($fields['user_email']) : '';
}

function cr_display_form($fields = array(), $errors = null, $age) {

  // Check for wp error obj and see if it has any errors
  if (is_wp_error($errors) && count($errors->get_error_messages()) > 0) {

    // Display errors
    ?><ul><?php
    foreach ($errors->get_error_messages() as $key => $val) {
      ?><li>
        <?php echo $val; ?>
      </li><?php
    }
    ?></ul><?php
  }

  // Display form
  ?>
	<form class="chromaform" action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
    <div>
      <label for="user_login">Username <strong>*</strong></label>
      <input type="text" name="user_login" value="<?php echo (isset($fields['user_login']) ? $fields['user_login'] : '') ?>">
    </div>

    <div>
      <label for="user_pass">Password <strong>*</strong></label>
      <input type="password" name="user_pass">
    </div>

    <div>
      <label for="email">Email <strong>*</strong></label>
      <input type="text" name="user_email" value="<?php echo (isset($fields['user_email']) ? $fields['user_email'] : '') ?>">
    </div>

		<div>
      <label for="age">Are you 13 or older? <strong>*</strong></label>
      <input type="checkbox" id="age" name="age" value="itsChecked" />
    </div>
		<div class="g-recaptcha" data-sitekey="6LdKYg8UAAAAANY2hrZ3B5SrP_kENLutVAUDQ4EB"></div>
    <input type="submit" name="submit" value="Register">
  </form>
<?php
}
function cr_get_fields() {
  return array(
    'user_login'   =>  isset($_POST['user_login'])   ?  $_POST['user_login']   :  '',
    'user_pass'    =>  isset($_POST['user_pass'])    ?  $_POST['user_pass']    :  '',
    'user_email'   =>  isset($_POST['user_email'])   ?  $_POST['user_email']        :  '',
  );
}
function cr_validate(&$fields, &$errors, $age) {
  // Make sure there is a proper wp error obj
  // If not, make one

  if (!is_wp_error($errors))  $errors = new WP_Error;

  // Validate form data
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
			 //your site secret key
			 $secret = '6LdKYg8UAAAAAEymMW1HkUcAs2Q9acLMSICFMeIo';
			 //get verify response data
			 $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			 $responseData = json_decode($verifyResponse);
			 if($responseData->success) {
			 } else {
				 $errors->add('field', 'No Robots Allowed! Please Try Again.');
			 }
	 } else {
		 $errors->add('field', 'Please check the ReCaptcha Box.');
	 }
	if($_POST['age'] != 'itsChecked') {
		$errors->add('field', 'You must be 13 or older to register.');
	}

  if (empty($fields['user_login']) || empty($fields['user_pass']) || empty($fields['user_email'])) {
    $errors->add('field', 'Required form field is missing');
  }
  if (strlen($fields['user_login']) < 4) {
    $errors->add('username_length', 'Username too short. At least 4 characters is required');
  }
  if (username_exists($fields['user_login']))
    $errors->add('user_name', 'Sorry, that username already exists!');
  if (!validate_username($fields['user_login'])) {
    $errors->add('username_invalid', 'Sorry, the username you entered is not valid');
  }
  if (strlen($fields['user_pass']) < 5) {
    $errors->add('user_pass', 'Password length must be greater than 5');
  }
  if (!is_email($fields['user_email'])) {
    $errors->add('email_invalid', 'Email is not valid');
  }
  if (email_exists($fields['user_email'])) {
    $errors->add('email', 'Email Already in use');
  }

  // If errors were produced, fail
  if (count($errors->get_error_messages()) > 0) {
    return false;
  }

  // Else, success!
  return true;
}
///////////////
// SHORTCODE //
///////////////
// The callback function for the [cr] shortcode
function cr_cb() {
  $fields = array();
  $errors = new WP_Error();

  // Buffer output
  ob_start();

  // Custom registration, go!
  cr($fields, $errors);

  // Return buffer
  return ob_get_clean();
}
add_shortcode('cr', 'cr_cb');
