<?php
$file = WP_PLUGIN_DIR . '/cm-components/components/social-sharing-buttons-analytics/views/default.php';
if (file_exists($file)) {
    require_once $file;
} else {
    error_log("El archivo $file no existe.");
}

global $multipage;
?>
<div class="engagebar">
   <?php
     $socialShareStatic = new social_share_component(
       array(
         'setFacebook' => true,
         'setTwitter' => true,
         'setDots' => true,
         'classList' => 's-static'
       )
     );
   ?>
<?php if (!$multipage) { ?>
 <div class="text-resizer">
   <span>Text Size</span>
   <div class="resizertriggers">
       <span class="minus" id="resize-minus">-</span>
       <span class="plus" id="resize-plus">+</span>
   </div>
 </div>
<?php } ?>
</div>
