<?php 
    /* Template Name: 14 Ways To Make Money From Your Home this Month */
    get_header();
    include 'apps-data.php';
?>

<style>
    .ga-banner {
        display: none !important;
    }
    
    .apps-container {
        margin: 5% 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .apps-title {
        text-align: center;
    }

    .apps-card {
        margin: 0 25% 5% 25%;
        position: relative;
        border-radius: 10px;
        box-shadow: 0px 11px 36px rgb(189 177 177 / 10%);
        border: solid 1px #EBE8E8;
    }

    .apps-card p {
        margin: 2%;
        line-height: 1.8;
        font-size: 16px;
    }

    .apps-card p a {
        color: #006cff;
        font-weight: bold;
        text-decoration: underline;
    }

    .apps-card:first-of-type {
        margin-top: 5%;
    }

    .apps-header {
        background: #EBE8E8;
        height: 25%;
        width: 100%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .apps-header a:hover {
        text-decoration: underline;
        text-decoration-color: black;
    }

    .apps-header h2 {
        padding: 2% 10% 2% 10%;
        margin: 0;
    }

    .apps-link {
        margin: 5% 2%;
    }

    .apps-link a {
        background: #299b1a;
        color: white;
        padding: 2%;
        border-radius: 5px;
    }

    .apps-header-number {
        position: absolute;
        top: 0;
        left: 0;
        background: #795548;
        border-top-left-radius: 10px;
        border-bottom-right-radius: 10px;
        padding: 9px;
        color: white;
        font-weight: bold;
    }
   

    @media only screen and (min-width: 992px) {

    }


    /* mobile and tablet */
    @media(min-width: 280px) and (max-width: 1024px) {
        .apps-card {
            margin: 0 2%;
            margin-bottom: 5%;
        }

        .apps-header h2 {
            padding-left: 13%;
        }

        .apps-link a {
            font-size: 0.8em;
        }
    }
</style>

<?php
?>
<div class='apps-container'>
   <h2 class='apps-title'>13 Ways to Make Money From Your Home this Month</h2>
   <p><span style='color: #888888;'>August 20, 2021</span> - iDrop News Editor</p>
   <?php for($i = 0; $i < count($daily_stash); $i++) {
       $row = get_object_vars($daily_stash[$i]);
    ?>
        <div class='apps-card'>
            <div class='apps-header'>
                <div class='apps-header-number'><span>#<?php echo $i + 1; ?></span></div>
                <a href='<?php echo $row["url"]; ?>'><h2><?php echo $row['title']; ?></h2></a>
            </div>
            <?php echo $row["body"]; ?>
            <div class='apps-link'>
                <a href='<?php echo $row["url"]; ?>'><?php echo $row["button_text"]; ?></a>
            </div>
        </div>
   <?php } ?>
</div>

<?php get_footer(); ?>