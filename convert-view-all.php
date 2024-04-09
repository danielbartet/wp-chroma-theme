<?php

function convert_view_all( $content ) {
  $content = str_replace('<!--nextpage-->', '<hr>', $content);
  if(empty($content))
    return $content;
  $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
  $dom = new DOMDocument();
  $dom->loadHTML($content);
  //determine presence of slider blocks
  $slideBlocks = $dom->getElementsByTagName('div');
  $haveSlideBlocks = false;
  foreach($slideBlocks as $e) {
    if (strpos($e->getAttribute('class'), 'slider-block sb') !== false || strpos($e->getAttribute('class'), 'sb') !== false) {
      $haveSlideBlocks = true;
      break;
    }
  }
  //if we have slider blocks, execute insert logic outside of blocks,
  //else continue into insert logic outside of h2 nodes
  if ($haveSlideBlocks) {
    $i = 0;
    foreach($slideBlocks as $e) {
      //if (strpos($e->getAttribute('class'), 'slider-block sb') !== false) {
	  if ($e->getAttribute('class') == 'sb') {
	  //insertion logic
        if ($i > 25)
          break;
        // $slot = ($i == 0) ? '3762198620' : '6336901827';
        // $geometry = 'horizontal';
        // $style = ($i != 0) ? 'display:block; overflow: hidden; height: 100px;' : 'display:block;';
        
        // $adInner = $dom->createElement('ins');
        // $adInner->setAttribute('class', 'adsbygoogle lazyad');
        // $adInner->setAttribute('style', $style);
        // $adInner->setAttribute('data-ad-client', 'ca-pub-4229549892174356');
        // $adInner->setAttribute('data-ad-slot', $slot);
        // $adInner->setAttribute('data-ad-format', $geometry);
        // $adUnit->appendChild($adScript);
        // $adUnit->appendChild($adInner);
        $hr = $dom->createElement('hr');
        $br = $dom->createElement('section');
        $br->setAttribute('style', 'height: 8px;');
        // $e->parentNode->insertBefore($adUnit, $e);
        $e->parentNode->insertBefore($hr, $e);
        $e->parentNode->insertBefore($br, $e);
        $dom->saveHTML($e->parentNode);
        $i++;
      }
    }
  } else {
    $h2s = $dom->getElementsByTagName('h2');
    $i = 0;
    $spread = count($h2s) / 6;
    foreach ($h2s as $h2) {
      if ($i > 6)
        break;
      $adUnit = $dom->createElement('div');
      $adUnit->setAttribute('class','floatfixAd ad-box');
      $slot = ($i == 0) ? '3762198620' : '6336901827';
      $geometry = 'horizontal';
      // $parentStyle = ($i != 0) ? 'max-height: 100px;' : 'max-height: 280px;';
      // $adUnit->setAttribute('style', $parentStyle);
      $style = ($i != 0) ? 'display:block; overflow: hidden; height: 100px;' : 'display:block;';
      $adInner = $dom->createElement('ins');
      $adInner->setAttribute('class', 'adsbygoogle lazyad');
      $adInner->setAttribute('style', $style);
      $adInner->setAttribute('data-ad-client', 'ca-pub-4229549892174356');
      $adInner->setAttribute('data-ad-slot', $slot);
      $adInner->setAttribute('data-ad-format', $geometry);
      $adUnit->appendChild($adInner);
      // $hr = $dom->createElement('hr');
      // $h2->parentNode->insertBefore($adUnit, $h2);
      // $h2->parentNode->insertBefore($hr, $h2);
      $dom->saveHTML($h2->parentNode);
      $i++;
    }
  }
  $content = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));
  return $content;
}

?>