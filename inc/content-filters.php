<?php
//filter content images and insert wrapping <figure> tags, which will be used by javascript to prefill image areas
function remove_some_ptags( $content ) {
  $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  $content = preg_replace('/text-align: center;/iU', '', $content);
  $content = preg_replace('/<p>\s*(<script.*>*.<\/script>)\s*<\/p>/iU', '\1', $content);
  $content = preg_replace('/<p>\s*(<iframe.*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
  $content = preg_replace('/<p>\s*(<blockquote.*>*.<\/blockquote>)\s*<\/p>/iU', '\1', $content);
  $content = preg_replace('/<p>\s*(<a.*>*.<\/a>)\s*<\/p>/iU', '\1', $content);

		//find all name attributes and store
		preg_match_all('/name=\".*\"/iU', $content, $names );

		foreach ($names as $name) {
			$rename = str_replace(' ', '', $name);
			$content = str_replace($name, $rename, $content);
		}

		preg_match_all('/<img .*>/iU', $content, $imgMatches);

		foreach ($imgMatches[0] as $imgMatch)
		{
				if ( isset($imgMatch) )
				{
					//if image has the inline class, skip and move on
					$hasInline = stripos($imgMatch, 'chrommainline');
					if($hasInline > 0)
					{
						continue;
					}
					preg_match('/srcset=\"(?<src>htt.*\s)/iU', $imgMatch, $src);
					$src = (string)$src['src'];
					list($width, $height) = getimagesize($src);
					$aspectRatio = ($height / $width) * 100;
					($aspectRatio > 100) ? $aspectThresholdfix = 'height: auto; padding: 0; max-height: '.$height.'; max-width: '.$width.'' : $aspectThresholdfix = '';
					$content = str_replace($imgMatch, "<figure style='padding-bottom: ". $aspectRatio ."%'". $aspectThresholdfix .">{$imgMatch}</figure>", $content);
				}
		}

		return $content;
}


//override filter that accepts the_content and processes the caption shortcode for a custom layout
add_filter( 'img_caption_shortcode', 'chroma_img_caption_shortcode', 10, 25 );
function chroma_img_caption_shortcode( $empty, $attr, $content ) {

  extract(shortcode_atts(array(
      'id'	=> '',
      'align'	=> '',
      'width'	=> '',
      'caption' => ''
    ), $attr));

  $content = do_shortcode( $content );

  //parse out the desired dimensions and apply the dimensions as an aspect ratio to the figure
  $aspect_ratio = get_option('chromma-load-ar');
  $aspect_ratio = str_replace('-', '', $aspect_ratio);
  $aspect_ratio = str_replace('x', ',', $aspect_ratio);
  $aspect_ratio_array = explode(',', $aspect_ratio);
  $width = $aspect_ratio_array[0];
  $height = $aspect_ratio_array[1];

  $aspectRatio = ($height > 0 && $width > 0) ? ($height / $width) * 100 : 101;

  $aspectThresholdfix = 'height: auto; padding: 0px; max-height: '.$height.'px; max-width: '.$width.'px;';

  $content = (string)$content;
  $caption = (string)'<figcaption class="figcaption">'.trim($caption).'</figcaption>';
  $content = (string)$content  . $caption;
  $content = '<figure class="entry-content_figure fig-wcaption">' . $content . '</figure>';
  $content = preg_replace('/<\/figure>/', '', $content, 1);

	return $content;
}
