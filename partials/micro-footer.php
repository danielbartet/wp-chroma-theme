<?php
//mobile nav here so that it's not render blocking
get_template_part('partials/mobile-nav'); ?>
<footer class="micro-footer">
<p style="text-align: center;">Copyright &copy; 2021 <a href="https://www.idropnews.com">iDrop News</a>. All rights reserved. By using iDrop News you agree to our <a href="https://www.idropnews.com/terms/">terms and conditions.</a> iDrop News and its contents are not affiliated or endorsed by Apple, Inc.</p>
<br>
	<div style="display: flex; justify-content: space-around; text-align: center;">
		<a href="https://www.idropnews.com/ccpa-privacy-statement">CCPA Privacy Agreement</a>
		<a href="https://www.idropnews.com/ccpa-privacy-statement#optOutLink">Do Not Sell My Personal Information</a>
		<a href="https://www.idropnews.com/terms/">Terms of Use</a>
		<a href="https://www.idropnews.com/privacy-policy/">Privacy Policy</a>
	</div>
</footer>
<?php wp_footer(); ?>
<!-- social share fix -->
<style>
a.fl_flip_button {
		margin: 0 auto !important;
		position: absolute !important;
		left: 0 !important;
		height: 100% !important;
		max-height: 40px;
		border-radius: 0px !important;
		width: 100% !important;
		background: transparent !important;
		color: transparent !important;
		border: none !important;
}
a.fl_flip_button b {
	display: none !important;
		background: url('') !important;
}
@media (max-width: 1000px) {
a.fl_flip_button {
text-align: center !important;
box-sizing: border-box !important;
margin-left: 0px !important;
padding: 0px !important;
line-height: 1 !important;
}
}
</style>
</body>
</html>
