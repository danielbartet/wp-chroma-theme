<?php
	/* Template Name: Forums Login */
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<title><?php the_title(); ?></title>
	<?php wp_head(); ?>
  <style>
    body, a {
      color: #fff;
    }
  </style>
</head>
<body id="body-main-wrap" class="relative">
  <div class="ga_gradient">
    <ul class="ga-bubbles">
  		<li></li>
  		<li></li>
  		<li></li>
  		<li></li>
  		<li></li>
  		<li></li>
  		<li></li>
  		<li></li>
  		<li></li>
  		<li></li>
  	</ul>
</div>
 <div class="form-container box-shadow-nohover">
  <div class="forum-sign-logo">
    <img style="display: block; margin: 12px auto;" src="https://cdn.idropnews.com/wp-content/uploads/2017/09/08180755/iDrop-News-Logo-21.png"/>
    <span style="display: block; margin: 0px auto 12px; color: #fff; font-size: 1.4rem; text-align: center;">Log In</span>
    </div>
    <?php
    	$url = (isset($_SERVER['HTTP_REFERER']) && (strpos($_SERVER['HTTP_REFERER'], (parse_url(home_url())['host'])) > 0) ) ? $_SERVER['HTTP_REFERER'] : home_url();
    	$args = array(
    	    'redirect' => $url,
    	    'id_username' => 'user',
    	    'id_password' => 'pass',
          'id_remember'    => 'rememberme',
          'id_submit'      => 'wp-submit',
          'label_username' => __( 'Username or Email Address' ),
          'label_password' => __( 'Password' ),
          'label_remember' => __( 'Remember Me' ),
          'label_log_in'   => __( 'Log In' ),
          'value_username' => '',
          'value_remember' => true
    	   );
        ?>
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
    <p>Need an account? <a href="https://www.idropnews.com/forums-register">Register Here</a> | <a href="https://www.idropnews.com/forums-password-reset/">Forgot Password</a> | <a href="https://www.idropnews.com/forums">Forum Home</a></p>
  </div>
</body>
</html>
