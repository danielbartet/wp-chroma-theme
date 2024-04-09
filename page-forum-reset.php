<?php
	/* Template Name: Forum Password Reset */
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
	<title><?php the_title(); ?></title>
	<?php wp_head(); ?>
</head>

<body>
	<div class="forum-sign-logo">
		<img style="max-width: 265px; vertical-align: bottom;" src="https://cdn.idropnews.com/wp-content/uploads/2016/12/05151000/idroplogo.png"/>
		<span class="forum-sign-title">Password Reset</span>
	</div>
	<div style="max-width: 600px; margin: 0 auto;">
	<?php the_content(); ?>
	<a href="https://www.idropnews.com/idrop-forums-login">< Back to Login</a>
	</div>
</body>
</html>
