<?php
/*
Template Name: Display Authors
*/
?>

<?php get_header(); ?>
<br>
<section class="flex-cards" role="main" style="max-width: 1200px; margin: 1% auto; justify-content: center;">
	  <?php $users = get_field('authors_list');
	 	if($users) {
			 echo 'hello';
		 } else {
			 echo 'no userss';
		 }
	    if( $users ): ?>
	     <?php foreach( $users as $user):
				 $userID = $user["ID"]; ?>
	      <a href="<?php echo get_author_posts_url( $userID ); ?>" class="ripple alt-cat-post authors-wrap ">
					<?php echo get_avatar( $userID, 320 ); ?>
					<div class="authorInfo">
						<h2><?php echo $user['display_name']; ?></h2>
							<h6><?php echo esc_attr( get_the_author_meta( 'roletitle', $userID ) ); ?></h6>
		       <div id="ga_button" class="box-shadow-nohover">Meet</div>
				 </div>
		     </a>

	 <?php endforeach; endif; ?>
</section>

<?php get_footer(); ?>
