<?php
get_header();
$current_query = $_SERVER['REQUEST_URI'];
$query_args = explode('&', $current_query);
$desc = '&orderby=post_date&order=desc';
$asc = '&orderby=post_date&order=asc';
$desc_sort = "{$query_args[0]}{$desc}";
$asc_sort = "{$query_args[0]}{$asc}";

?>

<style>
.search-date {
	font-style: italic;
	font-size: 0.8em;
	margin: 2% 0;
}
</style>

<div class="search-container">
<h1><?php _e( 'Search results for:'); ?> "<?php the_search_query() ?>"</h1>
		<?php if(strpos($current_query, 'desc')): ?>
		<a href='<?php echo $asc_sort; ?>'>Sort by Oldest to Newest</a>
		<?php else: ?>
		<a href='<?php echo $desc_sort; ?>'>Sort by Newest to Oldest</a>
		<?php endif; ?>
		<ul id="infinite-data">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<li class="postcard">
					<a class="search-item" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							<img src = "<?php the_post_thumbnail_url(); ?>" />
							<div class="search-item-info">
								<h2><?php the_title(); ?></h2>
								<time class='search-date'><?php the_time('M jS, Y');?></time>
								<p><?php echo wp_trim_words( get_the_excerpt(), 16, '...' ); ?></p>
						 	</div>
					</a>
				</li>
		<?php endwhile; endif; ?>
	</ul>
	<div class="clearfix"></div>
  <?php
    get_template_part('template-parts/archive/more-posts-button');
  ?>
	 <div class="clearfix"></div>
   <div class="nav-links">
     <?php  $archiveNav = get_the_posts_navigation( array(
             'prev_text' => '',
             'next_text' => '',
             'screen_reader_text' => ""
           ));
           echo filter_archive_nav($archiveNav); ?>
 	</div><!--nav-links-->
</div>
<?php get_footer(); ?>