<?php
function iframes_aspect_wrapper($content) {
  $content = preg_replace('/<center>\s*(<iframe.*>*.<\/iframe>)\s*<\/center>/iU', '\1', $content);
  if(empty($content))
    return $content;
  //$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
  //$content = htmlentities($content, ENT_QUOTES, 'UTF-8');
  $dom = new DOMDocument();
  libxml_use_internal_errors(true); // Suprimir errores de libxml
  $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); // Cargar el contenido sin añadir doctype, html o body implícitamente
  libxml_clear_errors(); // Limpiar errores de libxml
  $iframes = $dom->getElementsByTagName('iframe');
  if ($iframes->length < 1)
    return $content;
  foreach($iframes as $ifr) {
    $videoWrap = $dom->createElement('div');
    $videoWrap->setAttribute('class','videowrapper');
    $ifr->parentNode->replaceChild($videoWrap, $ifr);
    $videoWrap->appendChild($ifr);
  }
  $content = $dom->saveHTML();
  return $content;
}
add_filter( 'the_content', 'iframes_aspect_wrapper' );

function lightbox_seeker($content) {
  if(empty($content))
    return $content;
  //$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
  //$content = htmlentities($content, ENT_QUOTES, 'UTF-8');
  $dom = new DOMDocument();
  libxml_use_internal_errors(true); // Suprimir errores de libxml
  $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); // Cargar el contenido sin añadir doctype, html o body implícitamente
  libxml_clear_errors(); // Limpiar errores de libxml
  $imgs = $dom->getElementsByTagName('img');
  if ($imgs->length < 1)
    return $content;
  foreach($imgs as $img) {
    $imgClasses = $img->getAttribute('class') . " lightbox_trigger";
    $img->setAttribute('class', $imgClasses);
  }
  $content = $dom->saveHTML();
  return $content;
}
add_filter( 'the_content', 'lightbox_seeker' );
