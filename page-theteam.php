<?php 
/* Template Name: The Team */
get_header(); 
include('./wp-load.php');
?>
<?php
?>
<style>
    body {
        background: linear-gradient(135deg, rgba(72,49,255,0.88), rgba(255,80,166,0.88));
    }
    .author-cards {
        background: white;
        border-radius: 15px;
        box-shadow: 6px 6px 10px rgba(255,255,255,0.25);
    }
    .author-name, .author-role {
        text-align: center;
    }

    #ga_button {
        margin: 0 23%;
        text-align: center;
        padding: 2% 0;
        border-radius: 10px;
        transition: all linear 100ms;
    }

    #ga_button:hover {
        transform: translateY(-15%);
    }
</style>
<br>
<section class="flex-cards" role="main" style="max-width: 1200px; margin: 1% auto; justify-content: space-around;">
<?php 
        // get field from UI selection in idropnews.com/theteam --> edit page
        $the_authors = get_field("the_team_authors");

        for($i = 0; $i < count($the_authors); $i++) { 
            $author = $the_authors[$i];
        ?>
            <a href="<?php echo get_author_posts_url($author["ID"]); ?>" class='ripple alt-cat-posts authors-wrap author-cards'>
            <?php echo get_avatar($author["ID"], 320); ?>
            <div class='authorInfo'>
                <h2 class='author-name'><?php echo $author["display_name"]; ?></h2>
                <h6 class='author-role'><?php echo get_the_author_meta('roletitle', $author["ID"]); ?></h6>
                <div id='ga_button' class='box-shadow-nohover'>Meet</div>
            </div>
            </a>
        <?php }
?>
</section>
<?php get_footer(); ?>

