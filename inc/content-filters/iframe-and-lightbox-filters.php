<?php
function iframes_aspect_wrapper($content) {
  $content = preg_replace('/<center>\s*(<iframe.*>*.<\/iframe>)\s*<\/center>/iU', '\1', $content);
  if(empty($content))
    return $content;
  $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
  $dom = new DOMDocument();
  $dom->loadHTML($content);
  $iframes = $dom->getElementsByTagName('iframe');
  if ($iframes->length < 1)
    return $content;
  foreach($iframes as $ifr) {
    $videoWrap = $dom->createElement('div');
    $videoWrap->setAttribute('class','videowrapper');
    $ifr->parentNode->replaceChild($videoWrap, $ifr);
    $videoWrap->appendChild($ifr);
    $dom->saveHTML($videoWrap);
  }
  $content = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));
  return $content;
}
add_filter( 'the_content', 'iframes_aspect_wrapper' );

function lightbox_seeker($content) {
  if(empty($content))
    return $content;
  $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
  $dom = new DOMDocument();
  $dom->loadHTML($content);
  $imgs = $dom->getElementsByTagName('img');
  if ($imgs->length < 1)
    return $content;
  foreach($imgs as $img) {
    $imgClasses = $img->getAttribute('class') . " lightbox_trigger";
    $img->setAttribute('class', $imgClasses);
    $dom->saveHTML($img);
  }
  $content = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));
  return $content;
}
add_filter( 'the_content', 'lightbox_seeker' );
