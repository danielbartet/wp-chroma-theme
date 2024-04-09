<?php
// replace the default posts feed with FeedBurner
function custom_rss_feed( $output, $feed ) {
    if ( strpos( $output, 'comments' ) )
        return $output;

    return esc_url( 'http://feeds.feedburner.com/idropnews/feed' );
}
add_action( 'feed_link', 'custom_rss_feed', 10, 2 );

function featuredtoRSS($content) {
  global $post;
  if ( has_post_thumbnail( $post->ID ) ) {
    $content = '<img src="'. get_the_post_thumbnail_url( $post->ID, 'inside-post') .'" />' . $content . '<br><a href="' . get_the_permalink() . '">Read More...</a>';
  }
  return $content;
}

add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');


//disable rss feeds
function chroma_disable_feed() {
	wp_die(__('<h1>Feed not available, please visit our <a href="'.get_bloginfo('url').'">Home Page</a>!</h1>'));
}
add_action('do_feed', 'chroma_disable_feed', 1);
add_action('do_feed_rdf', 'chroma_disable_feed', 1);
add_action('do_feed_rss', 'chroma_disable_feed', 1);
//add_action('do_feed_rss2', 'chroma_disable_feed', 1);
add_action('do_feed_atom', 'chroma_disable_feed', 1);


//custom content for feedly
add_filter( 'rss2_ns', 'feedly_prehead' );
function feedly_prehead() {
  echo 'xmlns:webfeeds="http://webfeeds.org/rss/1.0"';
}

// add icon and logo to RSS feeds
add_action('rss2_head','chroma_rss_feed_head_add');
function chroma_rss_feed_head_add() { ?>

  <webfeeds:cover image="https://cdn.idropnews.com/wp-content/uploads/2018/02/14142737/Apple-Glass-AR-Glasses-iDrop-News-x-Martin-Hajek-8.jpg" />
  <webfeeds:accentColor>007aff</webfeeds:accentColor>
  <webfeeds:related layout="card" target="browser"/>

<?php }

//Apple News Category Hider!
//publish to apple news extension - category exceptions
if(function_exists('apple_news_before_push')) {
	add_action('apple_news_before_push', 'hide_categroy_publish_to_apple_news');
	function hide_categroy_publish_to_apple_news() {
		//Social Category on iDrop Site has tag_id = 33565
		$appleSkip = ( has_category( 33565, get_the_ID() ) ) ? true : false;
		apply_filters( 'apple_news_skip_push', false, get_the_ID() );
	}
}
