<?php
    $daily_stash = array();

    class DailyStashCard {
        
        public function __construct($title, $body, $button_text, $url) {
            $this->title = $title;
            $this->body = $body;
            $this->button_text = $button_text;
            $this->url = $url;
        } 
    }

    /** DAILY STASH DATA */
    $brandedSurvey = new DailyStashCard(
        "With Branded Surveys – Share your Opinion and Make $5 Instantly!", 
        "<p><a href='https://datatpure.com/?s6=/17?&a=70025&c=855379&s2=&s3=&s4=&s1=&s5=5778'>Branded Surveys</a> is a great, easy money-making opportunity that is open to everyone. It is a free service that pays you for your opinion. The website is easy to navigate, easy to use, and free to join- over 2 million people are already in and they have already paid out 17 million dollars to everyday people. Mindless, clicking for your opinion, in return for cash? All you need is a computer and an email address and you are ready to start making money. You earn points for taking surveys and with those points you redeem for cash, gift cards or donate to charities of your choice!</p>
        <p>You must complete the free registration process that will take you through a few demographic questions and then you’re profile is completed. There is no application to complete or a waiting period to see if you’re accepted.</p>
        <p>Whether you are a student trying to make some extra cash, or a stay at home parent trying to bring in some extra income, Branded Surveys is a great way to earn some side cash and you can start by <a href='https://datatpure.com/?s6=/17?&a=70025&c=855379&s2=&s3=&s4=&s1=&s5=5778'>signing up</a> to claim your free $6</p>",
        "Join and Make $5 Today!",
        "https://datatpure.com/?s6=/17?&a=70025&c=855379&s2=&s3=&s4=&s1=&s5=5778"
    );

    $inboxDollars = new DailyStashCard(
        "Over $80 million in Cash Rewards Paid from the Comfort of Your Couch",
        "<p><a href='https://datatpure.com/?s6=/5?&a=70025&c=849751&s2=&s3=&s4=&s1=&s5=5778'>InboxDollars</a> is the easiest way to earn money for your daily habits- you literally get paid for things that you probably are already doing, like watching YouTube videos, reading emails, or shopping online. Stick to these daily habits and you can earn up to an extra $200/month without even trying or thinking about it!  It’s so simple that you’ll wish you already had an account.  Each time you do the activity, the app will pay you CASH that you can access through PayPal.  It really doesn’t get much easier to make money than that. We know this might sound too good to be true, but Inbox Dollars has already paid out more than $80 million to their users, <a href='https://datatpure.com/?s6=/5?&a=70025&c=849751&s2=&s3=&s4=&s1=&s5=5778'>sign up</a> and get your piece of the pie</p>",
        "Earn Real Cash, Not Points",
        "https://datatpure.com/?s6=/5?&a=70025&c=849751&s2=&s3=&s4=&s1=&s5=5778"
    );

    $pinchMe = new DailyStashCard(
        "Receive Free Samples with PINCHme and Give Feedback for Cash Rewards",
        "<p>Even though we totally know that we should have some money put away, spending it on a much-needed night out or on that new piece of tech we just had to have is way more enticing. But what if you could save money without doing anything differently? <a href='https://datatpure.com/?s6=/22?&a=70025&c=847968&s2=&s3=&s4=&s1=&s5=5778'>PINCHme</a> is your answer.</p><p>Getting free stuff delivered to your door has never been easier!</p><p>You know when a brand comes out with a new product? Whether it’s a new chip or coffee flavor or a new shampoo formula, these companies need to figure out if it’s actually worth producing. The tried and true method of doing this is by surveying regular people like you and I and seeing what works and what doesn’t. So, how do you get onto this seemingly super exclusive list to test out new products? Look no further than PINCHme, a service that makes it easy to get a hold of all sorts of free samples from brands across the globe. In exchange for sending you products, you’ll just have to provide honest feedback to help the company figure out where they should go with their product. After submitting your feedback, you can earn PINCHme coins, which you can cash in for some pretty cool rewards, too! The best part is, you can <a href='https://datatpure.com/?s6=/22?&a=70025&c=847968&s2=&s3=&s4=&s1=&s5=5778'>choose what products you’d like to be sent</a> to make sure you’re not just receiving things you’ll have no desire to test out at all.</p>",
        "Register to Start Receiving Free Samples",
        "https://datatpure.com/?s6=/22?&a=70025&c=847968&s2=&s3=&s4=&s1=&s5=5778"
    );

    $toluna = new DailyStashCard(
        "Toluna Says Your Opinions Could Be Worth $100 or More",
        "<p>With <a href='https://datatpure.com/?a=70025&c=855129&s2=&s3=&s1=&s4=&s5=5778'>Toluna</a> Influencers, you not only earn money for your opinions, but become part of an entire community of influencers.</p><p>While the idea between online surveys isn’t anything new, Toluna goes far and beyond most online survey providers. Toluna is one of the most established survey providers, and there’s no questioning their commitment to users from the very first click on their website to make a profile. Earning money is probably your primary interest when thinking about survey taking. We get it. Well, not only is earning $100 every month or two possible, most users seriously enjoy spending time on the website and app and talk about their opinions and viewpoints about certain products and companies with other Toluna Influencers. Even if all you’d like to do is be a part of the online community, you can still easily earn in the double-digits after a few weeks. <a href='https://datatpure.com/?a=70025&c=855129&s2=&s3=&s1=&s4=&s5=5778'>Users can create polls, post your opinions,</a> and respond to other users’ polls and questionnaires, too. There’s no shortage of online communities vying for attention, but Toluna is one of the few that actually rewards you for becoming a part of all that it has to offer.</p>",
        "Start Earning $100's for Your Opinion",
        "https://datatpure.com/?a=70025&c=855129&s2=&s3=&s1=&s4=&s5=5778"
    );

    $stash = new DailyStashCard(
        "Start Investing and Claim a Portion of Your Free Amazon, Netflix, or Tesla Stock with Your Stash Sign Up Bonus",
        "<p><a href='https://datatpure.com/?s6=/16?&a=70025&c=850414&s2=&s3=&s4=&s1=&s5=5778'>Stash</a> is the personal finance app designed to help you achieve more financial freedom. Investing can be complicated, you may feel like it’s too late to get with the big players, but it is not. You still can claim some of the big sharks like Amazon, Netflix, Tesla and what better way to do it with a free bonus?  Invest what you can afford. It’s super simple and you don’t have to have any experience with investing. Stash offers personalized investing guidance & financial education. Tap into well known brands in the stock market and get a piece of the pie! <a href='https://datatpure.com/?s6=/16?&a=70025&c=850414&s2=&s3=&s4=&s1=&s5=5778'>Claim your free stocks with your $5 bonus today.</a> With fractional shares, you can choose how much to invest. Choose from thousands of stocks and you can start with as low as $1.</p>",
        "Sign Up for Stash and Get $5",
        "https://datatpure.com/?s6=/16?&a=70025&c=850414&s2=&s3=&s4=&s1=&s5=5778"
    );
    
    $surveyJunkie = new DailyStashCard(
        "Get Paid up to $75/Month — Just for Answering Questions",
        "<p>With <a href='https://datatpure.com/?s6=/6?&a=70025&c=852888&s2=&s3=&s4=&s1=&s5=5778'>Survey Junkie</a>, making cash by telling brands and companies how you feel, never seemed easier. Give your honest opinion and help shape the brands that you love and care about. They prompt you with simple questions and are dedicated to hearing your voice.  Your voice helps make a difference, so you <a href='https://datatpure.com/?s6=/6?&a=70025&c=852888&s2=&s3=&s4=&s1=&s5=5778'>get paid to do it.</a> Over 10 million people are doing it. Surveys are fun and interesting. You can earn points that can be easily redeemed for gift cards or cash.</p>",
        "Take Surveys. Get Paid. Be an Influencer",
        "https://datatpure.com/?s6=/6?&a=70025&c=852888&s2=&s3=&s4=&s1=&s5=5778"
    );

    $sofi = new DailyStashCard(
        "Kickstart Your Portfolio with $1000!",
        "<p>Investing should be easy. It seems like just about everyone is involved in the stock market these days and with good reason. <a href='https://datatpure.com/?s6=/25?&a=70025&c=855754&s2=&s3=&s4=&s1=&s5=5778'>The Sofi investing and trading app</a> is making the portfolio business easier than ever and saving users money by offering $0 trade fees.</p><p>IPOs, ETFs, WTF. Investing is a crazy world at times and the lingo is hard enough to figure out at first. That’s why <a href='https://datatpure.com/?s6=/25?&a=70025&c=855754&s2=&s3=&s4=&s1=&s5=5778'>Sofi</a> (yes, the loan company) came up with one of the best investing apps on the market. Not only have they made investing so incredibly easy, but they’re even offering new users a chance to add $1000 to their accounts when they sign up? Can you think of a better, and more obvious reason to sign up? Preparing for the future and looking to dive headfirst into the world of dividends and compound interest is awesome, but any time you’re going to be offered a chance to grab free money, that’s a no-brainer. Traditional stockbrokers charge you every time they do something, even if it was actually extremely easy. Sofi knows that, and now you know that. Stockbrokers don’t want you to know that. With such an easy interface and plenty of guidance on how to invest and use the app, there’s no reason to keep reading and not head towards Sofi’s website and app to stake your claim to $1000 and get started investing.</p>",
        "Receive Up to $1,000 When You Open a SoFi Account",
        "https://datatpure.com/?s6=/25?&a=70025&c=855754&s2=&s3=&s4=&s1=&s5=5778"
    );

    $quickRewards = new DailyStashCard(
        "This Rewards Company Has Paid Out Over $7 Million!",
        "<p>There are so many things out there that are competing for our valuable time, we should get paid when we have time to ourselves!</p><p>With all the time you spend on the internet, don’t you think you should be making some cash for your troubles? The team over at <a href='https://datatpure.com/?s6=/38?&a=70025&c=857691&s2=&s3=&s4=&s1=&s5=5778'>QuickRewards</a> definitely thinks so. In fact, QuickRewards has been helping millions of people earn extra cash by doing extremely easy and fun things on their phones and computers every day. Whether surveys, playing games, or shopping online is more your thing it really doesn’t matter; QuickRewards caters to every type of person and does not discriminate with who it offers its cash to. One of the best parts about using QuickRewards is that if you ever just want to take your cash out for any reason, you can! Whether it’s $1 or $100, you can always withdraw through PayPal in a quick and efficient manner. With millions of people enjoying their free time doing the things they love and making some cash at the same time, <a href='https://datatpure.com/?s6=/38?&a=70025&c=857691&s2=&s3=&s4=&s1=&s5=5778'>signing up</a> today is a must if you don’t want to be missing out!</p>",
        "Join QuickRewards Today!",
        "https://datatpure.com/?s6=/38?&a=70025&c=857691&s2=&s3=&s4=&s1=&s5=5778"
        );

    $neighbor = new DailyStashCard(
        "Get Neighbor and Make THOUSANDS a Year for Your Extra Space",
        "<p>Do you have an extra room, closet, or basement?  You could be making thousands a year on that old space that’s just collecting dust!</p><p>Meet your new <a href='https://datatpure.com/?s6=?&a=70025&c=857358&s2=&s3=&s4=&s1=&s5=5778'>Neighbor.</a> Neighbor pays you to store things. Just tell them about your space and how much you would like to earn and they will do all of the work! You get to choose when and how renters use your space, so you are always in control. Schedule a move-in and begin collecting your cash! Plus, Neighbor guarantees money in your pockets. If they don’t pay, no worry- Neighbor will cover the cost.</p><p>No matter how big or small the space is, Neighbor will rent it out for you. It feels good to make money and have someone else do all of the work – am I right?! <a href='https://datatpure.com/?s6=?&a=70025&c=857358&s2=&s3=&s4=&s1=&s5=5778'>Sign up</a> and become a host today!</p>",
        "Earn Thousands on The Space You Don't Use",
        "https://datatpure.com/?s6=?&a=70025&c=857358&s2=&s3=&s4=&s1=&s5=5778"
        );
    
    $fiverr = new DailyStashCard(
        "Hire Freelancers and Save Money with Fiverr!",
        "<p><a href='https://datatpure.com/?s6=/31?&a=70025&c=856523&s2=&s3=&s4=&s1=&s5=5778'>Fiverr</a> has quickly grown in the freelancing world as one of the most trusted and called upon sites for those who are searching for freelancers. You can actually save yourself some time and money by hiring out to freelancers to help you get jobs or tasks done. For example, if you need a logo made or a paper written, Fiverr makes it easy to find a freelancer who can get you exactly what you want for the price you’d like to pay instead of having to pay set prices that may be much more than you can actually afford. Fiverr is one of the most trusted and well-respected sites among hiring agencies and companies that need the services of a freelancer, it’s great it’s open for everyone as well. If you’re looking to hire out, Fiverr should absolutely be among the first places you go as they are much more affordable than other platforms. If you’re looking to hire someone to get the job done right, while saving money, <a href='https://datatpure.com/?s6=/31?&a=70025&c=856523&s2=&s3=&s4=&s1=&s5=5778'>sign up here.</a></p>",
        "Sign Up and Hire a Freelancer",
        "https://datatpure.com/?s6=/31?&a=70025&c=856523&s2=&s3=&s4=&s1=&s5=5778"
        );

    $aspiration = new DailyStashCard(
        "This Company is Revolutionizing Banking with No Fees and Up to 10% Cash Back",
        "<p>Getting cash back on your everyday purchases is awesome. It’s almost like you get money for spending money. You literally get paid extra to do things you already do, like buy groceries, gas, food, etc. Sometimes qualifying for these types of cards that offer such amazing perks can be difficult. However, <a href='https://datatpure.com/?s6=/30?&a=70025&c=856587&s2=&s3=&s4=&s1=&s5=5778'>Aspiration</a> makes it purely simple. Aspiration is a debit card that lets you earn up to 10% cash back on your spending!</p><p>Not only does Aspiration offer you cash back, the debit card does not have any monthly fees and requires very low minimums. Getting cash back on everyday purchases and saving on monthly fees – it’s a no brainer. <a href='https://datatpure.com/?s6=/30?&a=70025&c=856587&s2=&s3=&s4=&s1=&s5=5778'>Sign up</a> with your email, link your bank account and start earning while saving (on any fees) with your Free Aspiration account.  Your account is FDIC insured so it’s totally safe.</p>",
        "Sign up with Aspiration Today!",
        "https://datatpure.com/?s6=/30?&a=70025&c=856587&s2=&s3=&s4=&s1=&s5=5778"
    );

    $getUpside = new DailyStashCard(
        "Make Money On Things You Were Already Buying with GetUpside",
        "<p>Making money back on the things you’re already purchasing might feel too good to be true, but when you <a href='https://datatpure.com/?s6=/26?&a=70025&c=855708&s2=&s3=&s4=&s1=&s5=5778'>GetUpside</a>, you’re able to turn your errands into earnings..</p><p>Long gone are the days of spending and not making a single cent back for your purchases. Earning cash back on your gasoline purchases or eating out is unbelievably simple with the free GetUpside app. All it takes is a quick download, signing up, and then you’re ready to start earning cash back fast! GetUpside shows you where all of their participating stores are (more than 30,000!) — whether they be restaurants, grocery stores, or gas stations, the app tells you what type of discounts and cash back offers they are currently offering.</p><p>All you have to do is pick the store that you want to earn cash back from, tap Check In when you get there or upload your receipt later, and you earn cash back! A little bit here and there really adds up. Afterall, cents turn into dollars! Plus, now you can cash out right to your bank account in addition to PayPal and gift card options..</p><p>People are earning over $200 in only a few months through the app by picking and choosing the deals that work best for them. If you’re going to spend the cash anyway, why wouldn’t you get some of it back? <a href='https://datatpure.com/?s6=/26?&a=70025&c=855708&s2=&s3=&s4=&s1=&s5=5778'>Download GetUpside</a> and see your cash back earnings climb fast.</p>",
        "Download Now and Get Cash Back on Your Next Purchase",
        "https://datatpure.com/?s6=?&a=70025&c=855708&s2=&s3=&s4=&s1=&s5=5778"
    );

    $savvy = new DailyStashCard(
        "Don’t Overpay in Car Insurance – Save Almost $1000 with Savvy",
        "<p><a href='https://datatpure.com/?s6=/27?&a=70025&c=854768&s2=&s3=&s4=&s1=&s5=5778'>Savvy</a> is a 100% free car insurance comparison tool to help you stop overpaying in monthly premiums. This comparison marketplace is smart as you do not need to provide your driving history or vehicle number. You don’t have to fill out any forms either.</p><p>Simply log in with your current insurance provider’s credentials, and Savvy will use that information to get competitive car insurance quotes from other insurance providers, saving you potentially thousands of dollars.</p><p><a href='https://datatpure.com/?s6=/27?&a=70025&c=854768&s2=&s3=&s4=&s1=&s5=5778'>Get Your Personalized Car Insurance Quote within 2 Minutes</a></p><p>Savvy offers a hassle-free and personalized car insurance quote so you can save hundreds of dollars on annual premiums. No extensive paperwork or answering long questionnaires. Simply enter your existing insurance credentials and get the quotes for comparison.</p>",
        "Say No To Expensive Car Insurance and Try Savvy",
        "https://datatpure.com/?s6=?&a=70025&c=854768&s2=&s3=&s4=&s1=&s5=5778"
        );

    $motleyFool = new DailyStashCard(
        "Stock Picks Made Easy with Motley Fool",
        "<p>With so many people offering their unsolicited stock tips on the internet and on television, having a trusted place that helps make sense of all the stock information out there is one of the greatest sources of peace of mind there can be.  Thanks to the stock advisers over at the <a href='https://datatpure.com/?s6=/28?&a=70025&c=856515&s2=&s3=&s4=&s1=&s5=5778'>Motley Fool</a>, all of the guess work has been done for you and you can simply focus on watching your portfolio grow.</p><p>Trying to find the next big stock is difficult and it’s essential to have trusted stock advisers lend their expertise when you’re choosing your investments. The folks over at The Motley Fool have actually been able to make some extremely great predictions about the market and have often tipped their subscribers off about stocks that have skyrocketed shortly after they’ve given their recommendation. In fact, the stock advisers over at The Motley Fool have helped make their subscribers make over 4x more than the expected return. That means that by considering the information that their advisers provide, you’d have made over 4x the amount of money that most other investors are making! It’s really as simple as <a href='https://datatpure.com/?s6=/28?&a=70025&c=856515&s2=&s3=&s4=&s1=&s5=5778'>signing up</a> and taking a look at their extremely to read investing materials which help point you and your portfolio in the best possible direction. The best part is that you don’t need to know much of anything about investing to get started. Taking just anyone’s word for it when it comes to making investments isn’t a recipe for success, but if you’re looking to make smart investments, The Motley Fool is <i>the</i> place to go.</p>",
        "Let the Pros Help You Invest",
        "https://datatpure.com/?s6=/28?&a=70025&c=856515&s2=&s3=&s4=&s1=&s5=5778"
        );

    array_push($daily_stash, $brandedSurvey, $inboxDollars, $pinchMe, $toluna, $surveyJunkie, $sofi, $quickRewards, $neighbor, $fiverr, $aspiration, $getUpside, $savvy, $motleyFool);
?>