.amp-wp-enforced-sizes {
	max-width: 100%;
	margin: 0 auto;
}

.amp-wp-unknown-size img {
	object-fit: contain;
}

* {
  box-sizing: border-box;
}
.amp-wp-content,
.amp-wp-title-bar div {
	margin: 0 auto;
	max-width: 728px;
}

html {
	background: #fff;
}

body {
  color: #444;
  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
	font-weight: 300;
	line-height: 1.75em;
}

p,
ol,
ul,
figure {
	margin: 0 0 1em;
	padding: 0;
}
ol, ul {
	padding-left: 20px;
}

a,
a:visited {
	color: #007aff;
  text-decoration: none;
}

a:hover,
a:active,
a:focus {
	color: #007aff;
}

h1, h2, h3, h4, h5, h6 {
	color: #000000;
	font-weight: 700;
	 margin: 24px auto 4px;
	width: 100%;
}
h1 {
	margin: 10px auto;
}

.pad {
	padding: 0 4%;
}
/* Quotes */

blockquote {
	background: #f5f5f5;
	margin: 8px 0 24px 0;
	padding: 16px;
	text-align: left;
	color: #000000;
	border-left: solid 6px #000000;
	font-weight: 500;
}

blockquote p:last-child {
	margin-bottom: 0;
}

/* Header */
.amp-wp-header {
	display: block;
	height: 45px;
	width: 100%;
	margin: 0 auto;
	display: flex;
	align-items: center;
	justify-content: flex-start;
	border-bottom: 2px solid #eee;
}
.amp-wp-header a {
	background: url(https://cdn.idropnews.com/wp-content/uploads/2017/06/13133217/idroplogo.png);
	background-repeat: no-repeat;
	background-size: contain;
	background-position: center center;
	min-width: 160px;
	min-height: 30px;
	display: block;
	margin: 0 auto;
	z-index: 100;
}

/* Article */
.ampad {
	width: 336px;
	min-height: 280px;
	margin: 14px auto;
	position: relative;
	display: block;
}
.ampad:before {
    content: 'Article continues after this message';
    text-align: center;
    color: #a9a9a9;
    font-size: .7rem;
    width: 100%;
    display: block;
    position: relative;
    top: -5px;
}
.ampad:nth-of-type(2) {
	margin-top: 4px;
}
.ampad:last-of-type:before {
	content: '';
}

.amp-wp-article {
	font-weight: 400;
	margin: 10px auto 10px;
	max-width: 628px;
	overflow-wrap: break-word;
	word-wrap: break-word;
	color: #333;
	font-size: 1.2rem;
}
.amp-wp-article p {
	line-height: 1.60594;
}

.amp-wp-article a {
	color: #444;
	    border-bottom: 2px solid #9bcaff;
}
.amp-wp-article a:hover, .amp-wp-article a:active, .amp-wp-article a:focus {
	color: #007aff;
	border-color: #007aff;
}

.amp-wp-article img {
	left: -30px;
	position: relative;
	margin: 0 auto;
	display: block;
	height: auto;
	max-width: 100%;
}

.dropcap {
	float: left;
  font-weight: 700;
  margin-right: 7px;
  letter-spacing: -.03em;
  margin-bottom: -.08em;
  font-size: 3.7rem;
  margin-top: 3px;
  line-height: .875;
  color: #000;
}
/* Article Header */

.amp-wp-article-header {
	align-items: center;
	align-content: stretch;
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
	margin: 10px auto 0px;
}

.amp-wp-title {
	display: block;
	flex: 1 0 100%;
	font-weight: 900;
	margin: 0 0 10px;
	width: 100%;
  color: #000;
  font-size: 2rem;
	line-height: 1.21;
}
.amp-wp-article h2 {
  color: #000;
  line-height: 1.38;
  font-size: 1.5rem;
}

/* Article Meta */

.amp-wp-meta {
	color: #777;
	display: inline-block;
	font-size: .79rem;
	line-height: 3em;
	margin: 0;
	padding: 0;
}

.amp-wp-article-header .amp-wp-meta:last-of-type {
	text-align: right;
}

.amp-wp-article-header .amp-wp-meta:first-of-type {
	text-align: left;
}

.amp-wp-byline amp-img,
.amp-wp-byline .amp-wp-author {
	display: inline-block;
	vertical-align: middle;
}

.amp-wp-byline amp-img {
	border-radius: 50%;
	position: relative;
	margin-right: 6px;
}

.amp-wp-posted-on {
	text-align: right;
}

/* Featured image */

.amp-wp-article-featured-image {
	margin: 0 0 1em;
}
.amp-wp-article-featured-image amp-img {
	margin: 0 auto;
}
.amp-wp-article-featured-image.wp-caption .wp-caption-text {
	margin: 0 18px;
}

/* Article Content */


.amp-wp-article-content amp-img {
	margin: 0 auto;
}

/* Captions */

.wp-caption {
	padding: 0;
}

.wp-caption.alignleft {
	margin-right: 16px;
}

.wp-caption.alignright {
	margin-left: 16px;
}

.wp-caption .wp-caption-text {
	font-size: .875em;
	line-height: 1.5em;
	margin: 0;
	padding: .66em 10px .75em;
}

/* AMP Media */

amp-carousel {
	margin: 0 -16px 1.5em;
}
amp-iframe,
amp-youtube,
amp-instagram {
	margin: 0 -16px 1.5em;
}

.amp-wp-article-content amp-carousel amp-img {
	border: none;
}

amp-carousel > amp-img > img {
	object-fit: contain;
}

.amp-wp-iframe-placeholder {
	background: url( <?php echo esc_url( $this->get( 'placeholder_image_url' ) ); ?> ) no-repeat center 40%;
	background-size: 48px 48px;
	min-height: 48px;
}

.video-container {
	margin-bottom: 10px;
}

/* Article Footer Meta */

.amp-wp-article-footer .amp-wp-meta {
	display: block;
}

.amp-wp-tax-category,
.amp-wp-tax-tag {
	font-size: .875em;
	line-height: 1.5em;
	margin: 1.5em 16px;
}

.amp-wp-comments-link {
	font-size: .875em;
	line-height: 1.5em;
	text-align: center;
	margin: 2.25em 0 1.5em;
}

.amp-wp-comments-link a {
	border-style: solid;
	border-width: 1px 1px 2px;
	border-radius: 4px;
	background-color: transparent;
	cursor: pointer;
	display: block;
	font-size: 14px;
	font-weight: 600;
	line-height: 18px;
	margin: 0 auto;
	max-width: 200px;
	padding: 11px 16px;
	text-decoration: none;
	width: 50%;
	-webkit-transition: background-color 0.2s ease;
			transition: background-color 0.2s ease;
}

.color-bar {
	height: 8px;
	background: #000;
	background: -webkit-linear-gradient(45deg, #4831ff 0%, rgba(255,119,0,0) 100%),-webkit-linear-gradient(225deg, #ff721f 0%, rgba(255,114,31,0) 100%),-webkit-linear-gradient(135deg, rgba(176,39,230,0) 0%, rgba(176,39,230,0) 100%),-webkit-linear-gradient(135deg, #ff00f5 0%, rgba(255,0,245,0) 100%),-webkit-linear-gradient(red, red);
	max-width: 100%;
}
.policy-links {

}
.policy-link {
	line-height: 1.4;
	min-width: 120px;
}

/* AMP Footer */
.social-share-box {
	padding: 0 4%;
	margin: 0 auto 8px;
}
.social-share {
	border-radius: 4px;
}
amp-social-share[type="twitter"] {
 background-color: #4831ff;
 background-position: 10px center;
 background-size: 24px auto;
 position: relative;
}
amp-social-share[type="facebook"] {
  background-color: #007aff;
	background-position: 10px center;
	background-size: 28px auto;
	position: relative;
}
amp-social-share[type="facebook"]:before {
	content: 'Share';
	position: absolute;
	font-size: 1rem;
	color: #fff;
	top: 0;
	bottom: 0;
	left: 40px;
	line-height: 32px;
	width: 44px;
	z-index: 10;
}
amp-social-share[type="twitter"]:before {
	content: 'Tweet';
	position: absolute;
  font-size: 1rem;
  color: #fff;
  top: 0;
  bottom: 0;
  left: 40px;
	line-height: 32px;
  width: 44px;
  z-index: 10;
}
.amp-wp-footer {
	position: relative;
	z-index: 10;
	margin: 0 auto;
	background: #000;
}
.amp-wp-footer a {
	color: #fff;
}
.amp-wp-footer-div {
	width: 100%;
	margin: 0 auto;
	display: flex;
	justify-content: center;
}
.amp-wp-footer-a {
	color: #fff;
	font-weight: 300;
	padding: 12px 2%;
	text-decoration: none;
	font-size: .92rem;
	text-align: center;
	min-width: 100px;
	display: inline-block;
}
.back-top {
	margin: 24px auto;
	display: block;
	text-align: center;
	font-size: 1.2rem;
	font-weight: 500;
	color: #4831ff;
}
.arrow {
	width: 28px;
	height: 24px;
	display: inline-block;
	border: 20px solid #000;
	vertical-align: top;
	border-left: 14px solid transparent;
	border-right: 14px solid transparent;
	border-top: 0px solid transparent;
	margin: 0px 4px;
}
.disclaimer {
	color: #fff;
  font-size: .72rem;
  line-height: 1.72;
  padding: 12px 4%;
  max-width: 375px;
  text-align: center;
}

/* related content */
.related-title {
	color: #000;
	font-size: 2rem;
	font-weight: 700;
	margin: 0 auto;
	padding: 0 4%;
	margin-top: 10px;
}
#amp-related {
	padding: 0 4%;
	max-width: 720px;
	margin: 8px auto 20px;
	list-style-position: inside;
	font-weight: 500;
	color: #000;
}
.related-li {
	margin: 0 auto 10px;
	line-height: 1.5;
	font-weight: 500;
	color: #000;
}
#related-link {
	color: #000;
}
.toctitle {
	font-weight: 700;
}
.anchor__li {
	margin-bottom: 6px;
}
#table {
	display: block;
	overflow: scroll;
	height: 320px;
	white-space: nowrap;
}

@media (max-width: 860px) {
	#table {
			display: block;
	    height: 320px;
	    width: auto;
	    margin: 0 4%;
	    white-space: nowrap;
	    overflow: scroll;
	}
}
