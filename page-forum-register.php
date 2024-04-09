<?php
	/* Template Name: Forum Register */
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
	<title><?php the_title(); ?></title>
	<?php wp_head(); ?>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body style="background: #fcfcfc;">
 <div class="form-container box-shadow-nohover">
	<div class="forum-sign-logo">
		<img style="max-width: 265px; vertical-align: bottom;" src="https://cdn.idropnews.com/wp-content/uploads/2016/12/05151000/idroplogo.png"/>
		<span class="forum-sign-title">Sign Up</span>
	</div>
	<div class="shortcode-box">
	<?php echo do_shortcode ('[cr]') ?>
		<?php do_action('oa_social_login'); ?>
	<p></br><a href="https://www.idropnews.com/idrop-forums-login">< Back to Login</a> | <a href="https://www.idropnews.com/forums-password-reset/">Forgot Password</a></br></br></p>
	<p>To register with a social media account, please visit the login page, login into socal media there and an account will be created for you.</p>
	<p>See <a href="https://www.idropnews.com/terms/">Terms and Conditions</a>.</p>
	<br>
</div>
</div>

</body>
</html>
