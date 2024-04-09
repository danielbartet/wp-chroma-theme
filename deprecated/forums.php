<?php
	/* Template Name: Forums */
?>
<?php get_header(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
<div class="navbar-forums">
	<nav class="main-menu-wrap no-hide">
<ul id="menu-menu-1" class="menu"><li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="https://www.idropnews.com/forums" class="apicon-home"> Forums</a></li>
	<li class="menu-item menu-item-type-taxonomy menu-item-object-category" id="cat-toggle"><span>Categories <i class="fa fa-caret-down" aria-hidden="true"></i></span>
	<ul class="sub-menu" id="cat-drop">
		<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-12383"><a href="https://www.idropnews.com/forums/category/news-discussion/">News</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-12384"><a href="https://www.idropnews.com/forums/category/apple-rumors/">Rumors</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-12385"><a href="https://www.idropnews.com/forums/category/iphone/">iPhone</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-12386"><a href="https://www.idropnews.com/forums/category/ipad-discussion/">iPad</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-12387"><a href="https://www.idropnews.com/forums/category/ios-apps/">iOS and Apps</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-12387"><a href="https://www.idropnews.com/forums/category/apple-watch-discussion/">Apple Watch</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-12387"><a href="https://www.idropnews.com/forums/category/apple-tv-discussion/">Apple TV</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-12387"><a href="https://www.idropnews.com/forums/category/macbook/">MacBook</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-12387"><a href="https://www.idropnews.com/forums/category/mac-os-discussion/">Mac OS</a></li>
		<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-12387"><a href="https://www.idropnews.com/forums/category/imac//">iMac</a></li>
	</ul>
	</li>
</ul>
</nav>
     <div class="forum-nav-login">Account <i class="fa fa-caret-down" aria-hidden="true"></i></div>
</div>
<div class="profile-down box-shadow-nohover">
<ul>
	<li><a href="https://www.idropnews.com/idrop-forums-login/">Login</a></li>
	<li><a href="https://www.idropnews.com/forums-register/">Sign Up</a></li>
	<li><a href="<?php echo wp_logout_url( get_permalink() ); ?>">Logout</a></li>
</ul>
</div>
<script
 async>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '168485220292476',
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<style>
#leader-wrap {
	display: none;
}
.winiphone {
	display: none;
}
.navbar-forums {
	display: none;
	background-color: #fff;
	 height: 50px;
	  width: 100%;
	  position: absolute;
	  z-index: 1000;
		-webkit-box-shadow: 0 0 24px rgba(0,0,0,.15);
		-moz-box-shadow: 0 0 24px rgba(0,0,0,.15);
		box-shadow: 0 0 24px rgba(0,0,0,.15);
	}
	.navbar-forums-ul {
		display: inline-block;
height: 100%;
line-height: 50px;
}
.navbar-forums-ul li {
	display: inline-block;
    margin-left: 20px;
}
.navbar-forums a {
	color: #111111;
}
	.forum-nav-login {
    margin-right: 15px;
    line-height: 50px;
		position: absolute;
		z-index: 1001;
		right: 0;
		top: 0;
		cursor: pointer;
	}
	.forum-nav-login:hover {
		color: #006cff;
	}
	.profile-down {
		width: 110px;
    position: absolute;
    top: 50px;
    right: 0;
    max-height: 0px;
    z-index: 500;
    background: #fff;
    text-align: left;
		overflow: hidden;
	}
	.profile-down ul li {
		width: 100%;
		margin-left: 10px;
		margin-top: 15px;
	}
	.profile-down ul li:last-of-type {
		margin-bottom: 15px;
	}
	.profile-down ul li:before {
		content: "•";
		display: inline-block;
		margin-left: 0;
		color: #006cff;
		font-size: 25px;
		position: relative;
		vertical-align: top;
		bottom: 1.5px;
		margin-right: 10px;
	}
	.forum-nav-login:hover .profile-down { display: block; }
	.forum-nav-login .fa {
		line-height: 50px;
	}
	@media (max-width: 500px) {
   .forum-in {
			display: none;
		}
	}
	.no-hide {
		display: inline-block !important;
	}
</style>
<div style="height: 60px; width: 100%;"></div>
<a href="https://www.idropnews.com/win-airpods/" class="win-airpods box-shadow-default" id="contest-ad-top" target="_blank">Win AirPods<br>Forum Contest<span>See Details.</span></a>
<div class="ad-box"><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4229549892174356"
     data-ad-slot="6715665020"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<?php the_content(); ?>
<div class="ad-box"><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4229549892174356"
     data-ad-slot="6715665020"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<?php get_footer(); ?>
<script async>
/* Forum Navigation */
(function($) {

	$('.navbar-forums').show();
	$('.forum-nav-login').on('click', function(){
	$(".profile-down").toggleClass('menu-expand');
	});
	$("#cat-toggle").on('click', function() {
	$("#cat-drop").toggle();
	});

})( jQuery );


</script>
