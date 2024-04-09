<?php 
    /* Template Name: 10 Apps That Earn Money Fast */
    get_header();
    include 'apps-data.php';
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&display=swap" rel="stylesheet">
<?php $hotpink = '#da016f'; ?>
<style>
    .apps-container {
        margin: 5% 25%;
    }
    .apps-author {
        color: black;
        font-weight: bold;
        text-decoration: underline;
        text-decoration-color: red;
    }

    .apps-tags {
        color: black;
        font-style: italic;
        text-decoration: underline;
    }
    .apps-header-image {
        margin: 2% 0;
    }
    .apps-image-credit {
        font-style: italic;
        text-align: right;
    }
    
    p, li {
        line-height: 2.11111;
        font-size: 1.125rem;
        font-family: "Poppins", sans-serif;
        font-weight: 400;
    }

    h1 {
        font-family: 'DM Serif Text', serif;
        font-size: 2.375rem;
    }

    ol {
        list-style-type: decimal;
        list-style-position: inside;
        margin-bottom: 5%;
    }

    .apps-link {
        font-weight: 700;
        color: <?php echo $hotpink; ?> !important;
    }

    .apps-link:hover {
        text-decoration: underline;
        text-decoration-color: #da016f;
    }

    .spacing {
        margin-bottom: 5%;
    }

    .apps-card-header {
        font-size: 1rem;
        color: black;
        font-weight: 700;
        text-transform: uppercase;
    }
    .app-cards-title {
        color: <?php echo $hotpink; ?> !important;
        font-family: 'DM Serif Text', serif;
        font-size: 2.625rem;
        text-decoration: underline;
        text-decoration-color: <?php echo $hotpink; ?> !important;
    }

    .apps-floating-img {
        float: left;
        margin: 5px;
        width: 55%;
        padding-right: 2%;
        position: relative;
    }
    .apps-floating-img img {
        box-shadow: 4px 4px 10px rgba(0,0,0,0.15);
    }

    .apps-floating-img span {
        position: absolute;
        bottom: 5%;
        right: 7%;
        font-style: italic;
        font-size: .8rem;
    }

    .square p {
        text-align: justify;
    }

    .apps-download-here-btn {
        display: flex;
        justify-content: center;
        margin: 5% 0;
    }

    .apps-download-here-btn a {
        background: <?php echo $hotpink; ?>;
        color: white;
        padding: 3% 10%;
        font-family: "Poppins", sans-serif;
        font-weight: 700;
        text-transform: uppercase;
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 450px;
    }

    @media only screen and (min-width: 992px) {
        .apps-download-here-btn a {
            width: 475px;
        }
    }

    
    .apps-arrow {
        font-size: 2em;
    }

    /* mobile and tablet */
    @media(min-width: 280px) and (max-width: 1024px) {
        .apps-container {
            margin: 5% 2%;
        }

        .apps-floating-img {
            float: none;
            width: 100%;
            margin: 2% 0;
        }

        .apps-download-here-btn {
            margin: 10% 0;
        }

        .apps-subtitle {
            display: none;
        }

        .apps-floating-img span {
            left: 5%;   
        }

        .apps-download-here-btn a {
            width: 100%;
        }
    }
</style>

<?php
?>
<div class='apps-container'>
    <!-- header --> 
    <div class='apps-header'>
    <h1>How To Make Money Online for Beginners: 10 Apps That Earn Money Fast</h1>
    <p class='apps-subtitle'>Earning extra cash has never been so easy (or fun!)</p>
    <p style="margin: 2% 0;">By <a class='apps-author' href='https://www.womansworld.com/posts/author/bross'>Brittany Ross</a> | May 4, 2021</p>
    <p>Tags: <a class='apps-tags'>commerce</a>, <a class='apps-tags'>money</a></p>
    </div>
    <!-- header image -->
    <div class='apps-header-image'>
        <img src='https://www.womansworld.com/wp-content/uploads/2021/05/Untitled-design.jpg?resize=953,536' />
        <p class='apps-image-credit'>Canva</p>
    </div>
    <!-- intro paragraph -->
    <p class='spacing'>Whether you normally spend a good amount of time at home or the pandemic has you working remotely, 
       finding ways to make some extra cash on the side is always a great idea. While working for Uber Eats
       or DoorDash is certainly popular among college kids, there have to be other options out there that are
       a bit more realistic for our often on-the-go and constantly changing lifestyles. Enter: apps that will
       actually pay cash and save you money! The best apps to make money online for beginners are free to download,
       fun to operate, and can be used anytime, anywhere. Win-win!
    </p>
    <!-- list of apps -->
    <div class='list-of-apps'>
        <h1>Best apps to make extra money at home:</h1>
        <ol>
            <li>Best shopping rewards app : <a href='https://traktum.com/?a=69985&c=848469&s2=moneyapps' class='apps-link'>Swagbucks</a></li>
            <li>Best paid viewing app : <a href='https://traktum.com/?a=69985&c=849751&s2=moneyapps' class='apps-link'>InboxDollars</a></li>
            <li>Best redeemable points app : <a href='https://traktum.com/?a=69985&c=848503&s2=moneyapps' class='apps-link'>My Points</a></li>
            <li>Best paid survey app : <a href='https://traktum.com/?a=69985&c=852888&s2=moneyapps' class='apps-link'>Survey Junkie</a></li>
            <li>Best reward scanning app : <a href='https://traktum.com/?a=69985&c=849011&s2=moneyapps' class='apps-link'>Drop</a></li>
            <li>Best installment payment app : <a href='https://traktum.com/?a=69985&c=850958&s2=moneyapps' class='apps-link'>Quadpay</a></li>
            <li>Best paid games app : <a href='https://traktum.com/?a=69985&c=850939&s2=moneyapps' class='apps-link'>Cashyy</a></li></li>
            <li>Best gift card rewards app : <a href='https://traktum.com/?a=69985&c=853319&s2=moneyapps' class='apps-link'>Rewarded Play</a></li></li>
            <li>Best brand rewards app : <a href='https://traktum.com/?a=69985&c=851037&s2=moneyapps' class='apps-link'>Boodle</a></li></li>
            <li>Best receipt scanning app : <a href='https://traktum.com/?a=69985&c=849341&s2=moneyapps' class='apps-link'>NCP</a></li></li>
        </ol>
    </div>
    <!-- second intro paragraphs --> 
    <div class='second-intro-paragraphs'>
        <h1>How can a beginner make money online?</h1>
        <p class='spacing'>When you’re never really sure when you’ll have a free hour or two, it can be tough to pick up a 
            <a href="https://www.womansworld.com/posts/work/best-side-hustles-for-women-over-50-169890" class='apps-link'>side hustle</a>
           to earn a few extra dollars. Well, ladies, there are so many options to not only keep us entertained, but to
           also get a little bit of money back into our pockets while doing the things we are already doing in our (often rare)
           spare time! While it’s wise to make sure we’re not spending too much time on our phones and computers, sometimes, 
           it actually pays to do so! With apps that will reward you for <a href='https://www.womansworld.com/posts/money/save-online-shopping' class='apps-link'>shopping online</a>,
           <a href='https://www.womansworld.com/posts/entertainment/virtual-games-with-friends' class='apps-link'>playing games</a>, watching videos, 
           and answering surveys, it’s never been more fun to make some extra income and 
           <a href='https://www.womansworld.com/posts/money/tips-for-sticking-to-your-budget' class='apps-link'>save money</a> on your favorite brands.</p>
        <h1>What is the best way to make money online for free?</h1>
        <p class='spacing'>You might be thinking, “These apps must cost money, right?” Actually, they’re free to use! Some will give you the option of redeeming points earned by
           completing online surveys, games, and videos for cash and gift cards, while others offer discounts on popular brands and groceries. Either way, these apps
           are designed to help you earn and save money, not the other way around. If you’re looking to make some extra money without having to leave home, adhere to
           a set schedule, or enroll in a training program, there’s no better way than being paid to have fun online. The best part? Many of these apps are easily 
           installed onto your smartphone or desktop browser and are simple to use and set up.</p>
    </div>
    <p class='spacing'>Let’s take a look at some of the best apps to make money online!</p>
    
    <?php
        for($i = 0; $i < count($data); $i++) {
            $row = get_object_vars($data[$i]); ?>
            <div class='apps-card'>
                    <p class='apps-card-header'><?php echo $row['bestType']; ?></p>
                    <h2><a href='<?php echo $row['url']; ?>' class='app-cards-title'><?php echo $row['name']; ?></a></h2>
                    <div class='square'>
                        <div class='apps-floating-img'>
                            <a href='<?php echo $row['url']; ?>'><img src="<?php echo $row['image'];?>" alt="<?php echo $row['name']; ?>"></a>
                            <span><?php echo $row['name']; ?></span>
                        </div>
                        
                        <?php if(!$row['mobile']): ?>
                            <p class='spacing'>
                            <a href='<?php echo $row['url']; ?>' class='apps-link'>Download Here</a></p>
                        <?php else: ?>
                            <p class='spacing'>
                            <a href='<?php echo $row['iosUrl']; ?>' class='apps-link'>Download Here for iOS</a></p>
                            <p class='spacing'>
                            <a href='<?php echo $row['androidUrl']; ?>' class='apps-link'>Download Here for Android</a></p>
                        <?php endif; ?>
                        <?php echo $row['description']; ?>
                    </div>
                    <div class='apps-download-here-btn'>
                        <a href='<?php echo $row['url']; ?>'><span>Download Here</span> 
                            <span class='apps-arrow'>
                                <svg xmlns="http://www.w3.org/2000/svg" height="18" width="22"><path d="M0 10h16.4l-5.6 5.467 1.867 1.867 8.667-8.667L12.667 0 10.8 1.867l5.6 5.467H0z" fill="#FFF"/></svg>
                            </span></a>
                    </div>
            </div>
        
        <?php } 
    ?>
    <!-- the bottom line -->
    <div>
        <h1>The Bottom Line</h1>
        <p>Between all of the demands life is constantly throwing at us, having a rigid work schedule just doesn’t sound very
           appealing or practical when it comes to earning some side cash. But when you’ve got some peace and quiet and some
           time to yourself, why not make some money while enjoying yourself? While none of the above apps and web services
           will make you an overnight millionaire, you’re still getting rewarded for the things you’re most likely doing already.
           When so many of us are spending time on our phones playing games and reading web articles anyway, it only makes sense
           to get paid in exchange for our incredibly valuable time!</p>
    </div>
</div>

<?php get_footer(); ?>