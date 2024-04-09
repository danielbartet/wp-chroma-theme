<?php

$data = array();

class AppData {
    public $name;
    public function __construct($name, $bestType, $url, $image, $description, $mobile, $iosUrl, $androidUrl) {
        $this->name = $name;
        $this->bestType = $bestType;
        $this->url = $url;
        $this->image = $image;
        $this->description = $description;
        $this->mobile = $mobile;
        $this->iosUrl = $iosUrl;
        $this->androidUrl = $androidUrl;
    }
}


 $swagbucks = new AppData(
            'Swagbucks',
             'Best shopping rewards app',
             'https://traktum.com/?a=70025&c=848469&s2=moneyapps',
             'https://www.womansworld.com/wp-content/uploads/2021/04/Swagbucks.jpeg?resize=1024,576',
             "<p><a href='https://traktum.com/?a=70025&c=848469&s2=moneyapps' class='apps-link'>Swagbucks</a> 
             will pay you to shop online and watch videos right from your phone or computer, which is super convenient and easy to get sucked into for a few hours or more. In exchange for your valuable time, Swagbucks offers rewards like 10% discounts at popular retailers like Amazon, Target, and Walmart. You'll also be able to scan your receipts from brick-and-mortar shopping sprees to earn SB points. There are many more opportunities to earn on Swagbucks too, like watching videos and answering short survey questions.
             </p>",
                 false,
                 '',
                 ''
            );
    
    $inboxDollars = new AppData(
        "InboxDollars",
        "Best Paid Viewing App",
        "https://traktum.com/?a=70025&c=849751&s2=moneyapps",
        "https://www.womansworld.com/wp-content/uploads/2021/04/inbox-dollars-1.jpeg?resize=1024,576",
        "<p>Similar to Swagbucks, <a href='https://traktum.com/?a=70025&c=849751&s2=moneyapps' class='apps-link'>InboxDollars</a> 
        pays cash for doing online activities like watching videos, reading emails, taking surveys, and more. Complete these simple tasks and watch the money roll in! 
        InboxDollars connects you with the brands you're already interested in and then rewards you for spending time on the app.
        It's not going to make you rich, but many people earn an extra $50 to $100 per month. It just depends on how often you log in and what activities you complete!
        </p>",
        false,
        '',
        ''
    );

    $myPoints = new AppData(
        'My Points',
        'Best Redeemable Points App',
        'https://traktum.com/?a=70025&c=848503&s2=moneyapps',
        'https://www.womansworld.com/wp-content/uploads/2021/04/MyPoints.png?resize=1024,576',
        "<p>Want more options to earn side money? Download <a href='https://traktum.com/?a=70025&c=848503&s2=moneyapps' class='apps-link'>My Points.</a> Similar to the previous apps, you'll earn points by shopping online, 
        doing surveys, watching videos, and even playing games. You'll complete tasks and earn points – when you've accumulated enough points, 
        you'll redeem them for travel miles, prepaid gift cards, or even cash into your PayPal account. My Points might definitely come in handy
        next time you're ready to plan that family vacation everyone has been dreaming of.</p>",
         false,
         '',
         ''
    );

    $surveyJunkie = new AppData(
        "Survey Junkie",
        "Best Paid Survey App",
        "https://traktum.com/?a=70025&c=852888&s2=moneyapps",
        "https://www.womansworld.com/wp-content/uploads/2021/04/Survey-Junkie.jpeg?resize=1024,576",
        "<p>Who doesn't love to share their opinion? If you're vocal about your beliefs, values, likes, and dislikes,
           you'll want to share yours on <a href='https://traktum.com/?a=70025&c=852888&s2=moneyapps' class='apps-link'>Survey Junkie.</a> Some surveys can earn you $20 or more. You'll sign up and create a quick profile
           that'll match you up with surveys that you'll like. Again, you won't get rich with this app, but it's a fun and easy way to earn money
           just for sharing your opinion!</p>",
        false,
        '',
        ''
    );

    $drop = new AppData(
        "Drop",
        "Best Reward Scanning App",
        "https://traktum.com/?a=70025&c=849011&s2=moneyapps",
        "https://www.womansworld.com/wp-content/uploads/2021/04/Drop-logo.png?resize=1024,576",
        "<p>Want to easily find the best offers and rewards programs available on the internet? <a href='https://traktum.com/?a=70025&c=849011&s2=moneyapps' class='apps-link'>Drop</a> will help you tremendously.
         Download the app and then link your card with the app - Drop will allow you to input your five favorite brands to earn points
         while shopping at those stores! It's effortless. You'll earn different points for different stores, but it's free to use and puts
         cash back in your pocket. Even better yet, linking a credit card will allow you to earn cash back from the app, plus your standard credit card rewards!</p>",
        true,
        "https://traktum.com/?a=70025&c=849011&s2=moneyapps",
        "https://traktum.com/?a=70025&c=848983&s2=moneyapps"
    );

    $quadpay = new AppData(
        "Quadpay",
        "Best Installment Payment App",
        "https://traktum.com/?a=70025&c=850958&s2=moneyapps",
        "https://www.womansworld.com/wp-content/uploads/2021/04/Quadpay-logo.png?resize=1024,576",
        "<p>Sometimes we want something, but we really don’t want to pay for it all right now. Instead of whipping out the credit card and opting to pay for it a bit later, there are other options available. <a href='https://traktum.com/?a=70025&c=850958&s2=moneyapps' class='apps-link'>Quadpay</a> lets you break any purchase up into four equal installments! It’s quite easy to use, too. All you need to do is install the Quadpay app and link your debit or credit card. You’ll need to provide a valid mobile phone number and then you’re good to start using Quadpay in store or through your phone! You’ll still be responsible for the total dollar amount, though, so don’t go too crazy with your newfound financial flexibility!</p>",
        false,
        '',
        ''
        );

    $cashyy = new AppData(
        "Cashyy",
        "Best Paid Games App",
        "https://traktum.com/?a=70025&c=850939&s2=moneyapps",
        "https://www.womansworld.com/wp-content/uploads/2021/04/Cashyy-logo.png?resize=1024,576",
        "<p><a href='https://traktum.com/?a=70025&c=850939&s2=moneyapps' class='apps-link'>Cashyy</a> is a quickly growing app that offers users the ability to earn coins by tracking their time playing suggested games that the app gives. If you have an Android, all you need to do is download the app, sign up, and start earning by playing games. There are typically lists of games that you can choose to earn from, so if you’re into certain types of games, Cashyy typically has something for everyone. Once you’ve earned enough coins, you can exchange them for gift cards or have the money sent to your PayPal account.</p>",
        false,
        '',
        ''
    );

    $rewardedPlay = new AppData(
        "Rewarded Play",
        "Best Gift Card Rewards App",
        "https://traktum.com/?a=70025&c=853319&s2=moneyapps",
        "https://www.womansworld.com/wp-content/uploads/2021/04/Rewarded-Play-logo.png?resize=1024,576",
        "<p>Simlar to Cashyy, <a href='https://traktum.com/?a=70025&c=853319&s2=moneyapps' class='apps-link'>Rewarded Play</a> rewards you for playing games on your Android device. Simply download the app, choose games from their list, and earn points, which can translate to gift cards. The games offered differ from Cashyy to ensure you’ll always have variety in what you play, and you can even compete against others, which can make playing an even more rewarding opportunity. When you decide to cash out your points for gift cards, you can count on them arriving within two days right to your door. Easy as that!</p>",
        false,
        '',
        ''
    );

    $boodle = new AppData(
        "Boodle",
        "Best Brand Rewards App",
        "https://traktum.com/?a=70025&c=851037&s2=moneyapps",
        "https://www.womansworld.com/wp-content/uploads/2021/04/Boodle-logo.jpeg?resize=1024,576",
        "<p><a href='https://traktum.com/?a=70025&c=851037&s2=moneyapps' class='apps-link'>Boodle</a> is a bit of a combo between apps like Cashyy and Swagbucks. Android users can download the app from the Google Play store and start earning rewards. You can either play the fun mobile games that Boodle offers, answer questions about various brands and products, or even earn points for referring friends and family members to the app, too. One of the best parts about Boodle is that they offer rewards and deals to some of the best lifestyle brands that you’ll actually want to shop with!</p>",
        false,
        '',
        ''
    );

    $NCP = new AppData(
        "NCP",
        "Best Receipt Scanning App",
        "https://traktum.com/?a=70025&c=849341&s2=moneyapps",
        "https://www.womansworld.com/wp-content/uploads/2021/04/NCP-logo.png?resize=1024,576",
        "<p>Sometimes gaining rewards should be as easy as scanning the code on your receipts. Well, <a href='https://traktum.com/?a=70025&c=849341&s2=moneyapps' class='apps-link'>NCP</a> heard us and has made an app that does just that! All you need to do is scan the barcodes of groceries you have bought or input some basic information about nonbarcoded items. In exchange, NCP will grant you rewards points and gift cards. Other features of the app allow you to earn for completing surveys, playing games, and telling the app about other purchases you have made. Geared towards the inner shopper in us all, NCP makes turning your everyday shopping into rewards points as easy as scanning a barcode. Holding on to all those receipts may just come in handy!</p>",
        false,
        '',
        ''
    );


    array_push($data, $surveyJunkie, $inboxDollars, $swagbucks, $drop, $myPoints);