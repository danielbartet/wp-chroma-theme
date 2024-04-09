<?php if ( get_field('gallery_title') ); ?>
<h2 class="gallery-title padding4"><?php the_field('gallery_title'); ?></h2>
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev"></a>
    <a class="next"></a>
    <a class="close"></a>
    <ol class="indicator"></ol>
</div>
  <div id="links" class="grid">
     <div class="grid-sizer"></div>
  <?php
$images = get_field('gallery');
if( $images ): ?>
<?php foreach( $images as $image ): ?>
<a class="grid-item thumbnail gallery-mason" href="<?php echo $image['url']; ?>">
<img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
<?php	if( $image['caption'] ) { ?>
<p class="gallery-caption"><?php echo $image['caption']; ?></p>
<?php } ?>
</a>
<?php endforeach; ?>
<?php endif; ?>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/2.22.0/css/blueimp-gallery.min.css" />
<style>
.blueimp-gallery {
  top: 45px;
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
.blueimp-gallery>.close, .blueimp-gallery>.next, .blueimp-gallery>.prev {
padding: .1em;
border: rgba(255, 255, 255, .2) solid 1px;
border-radius: 2px;
}
.blueimp-gallery>.close {
  top: 0;
  margin-top: 5px;
  right: 0;
  margin-right: 1px;
  width: 45px;
  height: 45px;
  left: auto;
  background: url(https://cdn.idropnews.com/wp-content/uploads/2017/02/14165205/cancel.png);
  background-position: center center;
  background-repeat: no-repeat;
  background-color: rgba(0,0,0,0.8);
  background-size: 20px;
  padding: .4em;
}
.blueimp-gallery>.next {
  background: url('https://cdn.idropnews.com/wp-content/uploads/2017/02/14170323/next.png');
  width: 31px;
  width: 31px;
  background-position: center center;
  background-size: contain;
  background-repeat: no-repeat;
  background-color: rgba(0,0,0,0.8);
  right: 0;
}
.blueimp-gallery>.prev {
  background: url('https://cdn.idropnews.com/wp-content/uploads/2017/02/14170321/back.png');
  width: 31px;
  background-position: center center;
  background-size: contain;
  background-repeat: no-repeat;
  background-color: rgba(0,0,0,0.8);
  left: 0;
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
  margin: 0 auto;
  padding: 0;
}
</style>
