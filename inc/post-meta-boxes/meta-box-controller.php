<?php
//remove unneccessary metaboxes from being queued up
function chroma_remove_metaboxs() {
  remove_meta_box( 'postexcerpt','post','normal' );
  remove_meta_box( 'slugdiv','post','normal' );
  remove_meta_box( 'trackbacksdiv','post','normal' );
  remove_meta_box( 'commentsdiv','post','normal' );
  remove_meta_box( 'commentstatusdiv','post','normal' );
  remove_meta_box( 'postcustom’','post','normal' );
  remove_meta_box( 'rocket_post_exclude','post','normal' );

  //removing menus
  remove_menu_page('link-manager.php');
}
add_action('admin_menu','chroma_remove_metaboxs');

//add "Plagiarism" warning checkbox
//Register Meta Box
function plag_register_meta_box() {
  add_meta_box( 'plag-meta-box-id', esc_html__( 'Plagiarism Warning', 'text-domain' ), 'plag_meta_box', 'post', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'plag_register_meta_box');

//Add field
function plag_meta_box() {
  global $post;
  $wordConcat = $post->post_content;
  $wordConcat = preg_replace("/(?![.=$'€%-])\p{P}/u", "",$wordConcat);
  $wordConcat = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $wordConcat);
  //replace spaces with +
  $wordConcat = preg_replace("/\s+/", "+", $wordConcat);
  //replace ' apostraphes with %27
  $wordConcat = preg_replace("/'/", "%27", $wordConcat);
  $wordConcat = trim($wordConcat);
  $wordConcat = html_entity_decode($wordConcat);
  $wordConcat = strip_tags($wordConcat);
  ?>
  <p style="color: #e80056; font-weight: 600;">Do not plagiarize. You will not be payed for plagiarized contributions.</p>
  <p>
    <a target="_blank" href=\"https://visual.ly/blog/plagiarism-what-it-is-what-it-isnt-and-how-to-avoid-it-in-content-marketing/\">Find out what is and what isn't plagiarism.</a>
  </p>
  <p>
    <div class="button-primary" id="check-plag" data-content="<?php echo $wordConcat; ?>">
      Check Plagiarization
    </div>
  </p>
  <p>
    To fully enable the above tool, open browser "popup" settings and whitelist <?php echo get_bloginfo('name'); ?>.
  </p>
  <p>
  <strong>Learn How:</strong> <a target="_blank" href="https://toolset.com/documentation/user-guides/enable-pop-ups-browser/">All Browsers</a> | <a target="_blank" href="https://toolset.com/documentation/user-guides/enable-pop-ups-browser/">Chrome</a>
</p>
<?php
}
