<?php
/**
 * Template part for displaying Wallpapers Footer
 */
?>

<footer class="wallpaper-footer">
  	<!-- <h3>iPhone Wallpapers Site Map</h3>
  	<nav>
  		<?php /*wp_nav_menu(array('theme_location' => 'wallpapersSM-menu')); */?>
  	</nav> -->
  <div>
      <h3>How to Set an iPhone Wallpaper:</h3>
          <ol class="wallpaper-footer-ul">
  							<li>Lightly hold over image with your thumb. Don't press in too hard, but apply subtle pressure to the screen.</li>
  							<li>Select <u>Save Image</u>, when prompt rises.</li>
  							<li>In Photos App, find and select your wallpaper.</li>
  							<li>Tap <img style='display: inline-block; vertical-align: baseline;' src='https://cdn.idropnews.com/wp-content/uploads/2017/03/31142824/share-file.png'/>
  	            (Bottom Left).</li>
  							<li>Slide bottom row and choose <u>Use as Wallpaper</u>.</li>
  						  <li>See also: <a href="https://www.idropnews.com/how-to/how-to-crop-and-resize-photos-on-iphone-and-mac/28060/" target="_blank">Crop and Resize on iOS/OS</a></li>
          </ol>
  </div>
  <br>
  <h3>iPhone Wallpaper Dimensions Guide:</h3>
  <div class="tbl-content">
  <table border="0" cellspacing="0" cellpadding="0">
  <tbody>
  <tr>
  <td>iPhone Model</td>
  <td>Pixel Size</td>
  <td>Aspect Ratio</td>
  </tr>
  <tr>
  <td>iPhone 12 Pro Max</td>
  <td>2778 x 1284</td>
  <td>19.5:9</td>
  </tr>
  <tr>
  <td>iPhone 12 Pro</td>
  <td>2532 x 1170</td>
  <td>19.5:9</td>
  </tr>
  <tr>
  <td>iPhone 12</td>
  <td>2532 x 1170</td>
  <td>19.5:9</td>
  </tr>
  <tr>
  <td>iPhone 12 Mini</td>
  <td>2340 x 1080</td>
  <td>19.5:9</td>
  </tr>
  <tr>
  <td>iPhone 11 Pro Max</td>
  <td>2688 x 1242</td>
  <td>19.5:9</td>
  </tr>
  <tr>
  <td>iPhone 11 Pro</td>
  <td>2436 x 1125</td>
  <td>19.5:9</td>
  </tr>
  <tr>
  <td>iPhone 11</td>
  <td>1792 x 828</td>
  <td>19.5:9</td>
  </tr>
  <tr>
  <td>iPhone XS Max</td>
  <td>2688 x 1242</td>
  <td>19.5:9</td>
  </tr>
  <tr>
  <td>iPhone XS</td>
  <td>2436 x 1125</td>
  <td>19.5:9</td>
  </tr>
  <tr>
  <td>iPhone X</td>
  <td>2436 x 1125</td>
  <td>13:6</td>
  </tr>
  <tr>
  <td>iPhone XR</td>
  <td>1792 x 828</td>
  <td>19.5:9</td>
  </tr>
  <tr>
  <td>iPhone 8</td>
  <td>2436 x 1125</td>
  <td>16:9</td>
  </tr>
  <tr>
  <td>iPhone 7 Plus</td>
  <td>1080 x 1920</td>
  <td>16:9</td>
  </tr>
  <tr>
  <td>iPhone 7 Plus</td>
  <td>1080 x 1920</td>
  <td>16:9</td>
  </tr>
  <tr>
  <td>iPhone 7</td>
  <td>750 x 1334</td>
  <td>16:9</td>
  </tr>
  <tr>
  <td>iPhone 6 Plus</td>
  <td>1080 x 1920</td>
  <td>16:9</td>
  </tr>
  <tr>
  <td>iPhone 6</td>
  <td>750 x 1334</td>
  <td>16:9</td>
  </tr>
  <tr>
  <td>iPhone 5</td>
  <td>640 x 1136</td>
  <td>16:9</td>
  </tr>
  </tbody>
  </table>
  </div>
  <?php get_template_part('template-parts/ads/wallpaper/wallpaper-footer'); ?>
  <p><?php echo wp_kses_post(get_option("footcopy")); ?></p>
  <br>
  </footer>
  <?php wp_footer(); ?>
  <div class='wallFooter'>
    <div class='ccpaFooter'>
      <a href='https://www.idropnews.com/ccpa-privacy-statement'>CCPA Privacy Agreement</a>
      <a href='https://www.idropnews.com/ccpa-privacy-statement#optOutLink'>Do Not Sell My Personal Information</a>
      <a href='https://www.idropnews.com/terms/'>Terms of Use</a>
      <a href='https://www.idropnews.com/privacy-policy/'>Privacy Policy</a>
    </div>
  </div>
  </body>
</html>
