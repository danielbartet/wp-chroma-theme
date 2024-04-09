<?php if(!is_user_logged_in() && !ap_opt('allow_anonymous')): ?>
	<div class="forum-sign-logo">
		<img style="max-width: 265px; vertical-align: bottom;" src="https://cdn.idropnews.com/wp-content/uploads/2016/12/05151000/idroplogo.png"/>
		<span class="forum-sign-title">Forums</span>
	</div>
	<div class="form-container box-shadow-nohover">
 	<div class="forum-sign-logo">
 		<img style="max-width: 265px; vertical-align: bottom;" src="https://cdn.idropnews.com/wp-content/uploads/2016/12/05151000/idroplogo.png"/>
 		<span class="forum-sign-title">Log In</span>
 	</div>
 	<div class="shortcode-box">
 		<p>If you have just signed up or a returning member, you may log into your account here.</p>
 		<?php
 			$url = home_url( '/forums/' );
 			$args = array(
 			    'redirect' => $url,
 			    'id_username' => 'user',
 			    'id_password' => 'pass',
 			   )
 			;?>
 		<?php wp_login_form( $args ); ?>
 			<?php $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
 			if ( $login === "failed" ) {
 				  echo '<p class="login-msg"><strong>ERROR:</strong> Invalid username and/or password.</p>';
 				} elseif ( $login === "empty" ) {
 				  echo '<p class="login-msg"><strong>ERROR:</strong> Username and/or Password is empty.</p>';
 				} elseif ( $login === "false" ) {
 				  echo '<p class="login-msg"><strong>ERROR:</strong> You are logged out.</p>';
 				}
 			?>
 		<?php do_action('oa_social_login'); ?>
 	<p>Need an account? <a href="https://www.idropnews.com/forums-register">Register Here</a> | <a href="https://www.idropnews.com/forums-password-reset/">Forgot Password</a> | <a href="https://www.idropnews.com/forums">Forum Home</a></p>
 </div>
 </div>
<?php endif; ?>
