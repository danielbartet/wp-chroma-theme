<?php
//produce a canonical link
function get_canonical() {
  global $numpages, $multipage, $page;
  $slash = '/';
  $nextpage = $page + 1;
  $prevpage = $page - 1;
	if (is_category()) {
		echo '<link rel="canonical" href="'.get_category_link( get_query_var("cat") ).'" />';
  } else if($multipage){
    // echo '<link rel="canonical" href='.get_permalink().$numpages.$slash.' />';
  } 
    else {
	  echo '<link rel="canonical" href="'.get_permalink().'" />';
	}
}
add_action('wp_head', 'get_canonical');

// Prevents double posts on second page
add_filter('redirect_canonical','pif_disable_redirect_canonical');
function pif_disable_redirect_canonical($redirect_url) {
  if (is_singular()) $redirect_url = false;
  return $redirect_url;
}

//yoast breadcrumb validation fix
add_filter ('wpseo_breadcrumb_output','bybe_crumb_v_fix');
function bybe_crumb_v_fix ($link_output) {
  $link_output = preg_replace(array('#<span xmlns:v="http://rdf.data-vocabulary.org/\#">#','#<span typeof="v:Breadcrumb"><a href="(.*?)" .*?'.'>(.*?)</a></span>#','#<span typeof="v:Breadcrumb">(.*?)</span>#','# property=".*?"#','#</span>$#'), array('','<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="$1" itemprop="url"><span itemprop="title">$2</span></a></span>','<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">$1</span></span>','',''), $link_output);
  return $link_output;
}
add_filter('wpseo_enable_xml_sitemap_transient_caching', '__return_false');
//stop yoast from printing canonical link
add_filter( 'wpseo_canonical', '__return_false' );

function bybe_remove_yoast_json($data){
    $data = array();
    return $data;
  }
add_filter('wpseo_json_ld_output', 'bybe_remove_yoast_json', 10, 1);

//get schema json function
require get_template_directory() . '/inc/seo/schema-json.php';
