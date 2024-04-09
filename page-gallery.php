<?php
	/* Template Name: Gallery Page */
?>
<?php get_header(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/2.22.0/css/blueimp-gallery.min.css" />
<style>
#leader-wrap {
	display: none;
}
#body-main-cont {
	max-width: 100%;
}
#body-main-wrap {
	background: #060606;
}
.body-main-in {
	    margin-left: auto;
			background: #060606;
}
.body-main-out {
		margin-left: auto;
    right: 0;
}
.gallery-page h1 {
	text-align: center;
	font-size: 2.2em;
	color: #fff;
	padding-top: 20px;
  margin-bottom: 20px;
}
.blueimp-gallery>.close, .blueimp-gallery>.next, .blueimp-gallery>.play-pause, .blueimp-gallery>.prev, .blueimp-gallery>.slides>.slide>.slide-content {
border-radius: 0px;
border: none;
text-shadow: 0 0 10px #000;
background-color: rgba(0,0,0,0.8);
-webkit-box-shadow: 0px 1px 2px 0.2px rgba(0,0,0,0.27);
-moz-box-shadow: 0px 1px 2px 0.2px rgba(0,0,0,0.27);
box-shadow: 0px 1px 2px 0.2px rgba(0,0,0,0.27);
}
.blueimp-gallery>.close, .blueimp-gallery>.next, .blueimp-gallery>.play-pause, .blueimp-gallery>.prev {
padding: .2em;
width: 31px;
}
.blueimp-gallery>.close {
	top: 11.5%;
	right: 30px;
	width: 25px;
	height: 25px;
	background-color: rgba(0,0,0,0.8);
	background: url('https://cdn.idropnews.com/wp-content/uploads/2017/02/14165205/cancel.png');
	background-position: center center;
	background-size: contain;
	background-repeat: no-repeat;
}
.blueimp-gallery>.next {
	background: url('https://cdn.idropnews.com/wp-content/uploads/2017/02/14170323/next.png');
	background-color: rgba(0,0,0,0.8);
	background-position: center center;
	background-size: contain;
	background-repeat: no-repeat;
}
.blueimp-gallery>.prev {
	background: url('https://cdn.idropnews.com/wp-content/uploads/2017/02/14170321/back.png');
	background-color: rgba(0,0,0,0.8);
	background-position: center center;
	background-size: contain;
	background-repeat: no-repeat;
}

.blueimp-gallery-controls>.indicator {
max-height: 94px;
overflow: hidden;
line-height: 2.3em;
}
.blueimp-gallery-controls>.indicator li {
margin-left: 2%;
margin-bottom: 10px;
padding: 0;
height: 40px;
width: 46px;
border-radius: 0px;
background-size: cover;
opacity: .9;
}
.blueimp-gallery > .description, .blueimp-gallery > .example {
position: absolute;
top: 30px;
left: 15px;
color: #fff;
display: none;
}
.blueimp-gallery-controls > .description, .blueimp-gallery-controls > .example {
display: block;
}
@media (max-width: 1000px) {
.blueimp-gallery-controls>.indicator li {
height: 24px;
width: 28px;
}
}
.blueimp-gallery-controls>.indicator li:before {
display: none !important;
}
body:last-child .blueimp-gallery>.play-pause {
    width: 50px;
    height: 50px;
    z-index: 5000;
    bottom: 2%;
    left: 10px;
    font-size: 60px;
    background-position: center center;
}
</style>
<div class="gallery-page row">
	<h1><?php single_post_title(); ?></h1>
	<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
			<div class="slides"></div>
			<h3 class="title"></h3>
			<a class="prev"></a>
			<a class="next"></a>
			<a class="close"></a>
			<a class="play-pause"></a>
			<ol class="indicator"></ol>
	</div>
	<div id="links" class="grid">
		 <div class="grid-sizer"></div>
				 <?php
$images = get_field('gallery');
if( $images ): ?>
<?php foreach( $images as $image ): ?>
<div class="grid-item thumb">
	 <a class="thumbnail" href="<?php echo $image['url']; ?>">
<img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
</a>
</div>
<?php endforeach; ?>
<?php endif; ?>
	</div>
	<style>
	/* clear fix */
	.grid:after {
	  content: '';
	  display: block;
	  clear: both;
	}
	/* ---- .grid-item ---- */
	.grid-sizer,
	.grid-item {
	  width: 33.33333%;
	}
@media (max-width: 768px) {
	.grid-sizer,
	.grid-item {
		width: 50%;
	}
}
	.grid-item {
	  float: left;
		overflow: hidden;
	}
	.grid-item img {
	  display: block;
	  max-width: 100%;
	}
	</style>
	<script async src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
	<script async>
	// external js: masonry.pkgd.js, imagesloaded.pkgd.js
	jQuery(document).ready(function( $ ) {
		var $grid = $('.grid').imagesLoaded( function() {
		  $grid.masonry({
		    itemSelector: '.grid-item',
		    percentPosition: true,
		    columnWidth: '.grid-sizer'
		  });
		});
	});
	</script>
	<script async src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/2.22.0/js/blueimp-gallery.min.js"></script>
	<script async> document.getElementById('links').onclick = function (event) { event = event || window.event; var target = event.target || event.srcElement, link = target.src ? target.parentNode : target, options = {index: link, event: event}, links = this.getElementsByTagName('a'); blueimp.Gallery(links, options); }; </script>
<?php get_footer(); ?>
