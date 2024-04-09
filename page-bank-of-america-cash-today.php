<?php 

/* Template Name: Best Cash Back Bonus Card of 2021 */
get_header();
?>
<style>
    .bank-container {
        margin: 5% 0;
        height: 175%;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .border-blue {
        border: 2px solid blue;
    }

    .border-green {
        border: 2px solid green;
    }

    .bank-container_content {
        flex: 0.5;
        width: 100%;
        margin: 0 5% 0 0;
        flex-direction: column;
    }

    .bank-container_author {
        display: flex;
        justify-content: space-between;
        width: 95%;
    }

    .list-parent {
        text-align: center;
    }

    #cats_list_mobile {
        list-style: inside;
    }

    li {
        margin: 1% 0;
        font-size: 1.1em;
        font-family: sans-serif;
    }

    .text {
        font-size: 1.1em;
        font-family: sans-serif;
        margin: 2% 0;
        line-height: 1.5em;
    }

    .greg-info {
        margin: 0 2%;
    }

    .greg-info-flex {
        display: flex;
        justify-content: space-between;
        width: 50%;
    }

    .card-categories p {
        font-size: 1.1em;
        font-family: sans-serif;
    }

    .card-categories {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
    }

    .card-categories div {
        display: flex;
        width: 100%;
        justify-content: space-around;
    }

    /* tr, td {
        background: none;
        border: none;
        text-align: left;
        font-weight: normal !important;
        font-family: sans-serif;
    }

    .tr:first-of-type td {
        font-weight: normal !important;
    }

    table {
        border-collapse: collapse;
        margin: 0 auto;
    }

    tbody {
        margin: 0 auto;
        text-align: left;
    }

    td, th {
        border: none;
    }
    
    tr:nth-of-type(2n) {
        background: none !important;
    } */

    h4 a {
        color: #006cff !important;
    }

    h4 {
        font-size: 1.1em;
    }

    .bank-container_card {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        height: 70%;
        flex: 0.25;
        position: sticky;
        top: 15%;
    }

    .bank-container_box {
        border: 2px solid lightgrey;
        width: 80%;
        height: 70%;
        margin: 4% 0;
        border-radius: 8px;
    }

    .sidebar-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 20%;
        position: relative;
    }

    .apply-now-bank {
        background: linear-gradient(180deg,#5fbf4f,#3bb44a);
        width: 90%;
        height: 15%;
        padding: 10% 0;
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin: 0 5%;
        border-radius: 5px;
    }

    .apply-now-bank p {
        color: white;
        font-size: 1.2em;
        font-family: sans-serif;
    }

    .apply-now-bank svg {
        margin: 0;
        color: white;
    }

    .boa-text {
        margin: 10% 0 0 0;
        color: lightgrey;
        text-align: center;
        font-size: 0.9em;
        font-family: sans-serif;
    }

    ul {
        list-style: none;
    }

    .boa-card-list li {
        margin: 5% 2% 0 2%;
        display: flex;
        justify-content: space-between;
    }

    .boa-card-list li p {
        width: 80%;
    }

    .boa-card-list svg {
        width: 35px;
    }

    .boa-mobile, .boa-mobile-second {
        display: none;
    }

    .special-list {
        font-family: sans-serif;
        display: flex;
        font-size: 1.1em;
        margin-left: 2.5%;
    }

    .dot {
        margin-left: -2.5%;
    }
/* 
  ##Device = Desktops
  ##Screen = 1281px to higher resolution desktops
*/
@media (min-width: 1440px) {
    
    .bank-container {
        height: 250%;
    }
}

@media (min-width: 2560px) {

    .bank-container {
        height: 100%;
    }

    .bank-container_box {
        height: 80%;
    }
  
  /* CSS */
  .sidebar-header {
      height: 20%;
  }

  .boa-text {
      margin: 30% 0 5% 0;
  }
  
}

/* 
  ##Device = Laptops, Desktops
  ##Screen = B/w 1025px to 1280px
*/

@media (min-width: 1025px) and (max-width: 1280px) {
  
  /* CSS */
  
}

/* 
  ##Device = Tablets, Ipads (portrait)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) {

    h1 {
        margin: 10% 0 0 0;
    }
  
    .bank-container {
        display: block;
        height: 225vh;
        padding: 0 2%;
    }
    
    .list-parent {
        margin-left: auto;
        margin-right: auto;
        display: table;
    }

    .bank-container_card {
        display: none;
    }

    .bank-container_author img {
        display: none;
    }

    .greg-info {
        margin: 0;
    }

    .greg-text {
        display: none;
    }

    .greg-info-flex {
        width: 100%;
    }

    .dot {
        margin: 0;
    } 
    .boa-mobile {
        display: flex;
    }
    
    .sidebar-header {
        height: 13%;
    }

    .apply-now-bank {
        padding: 5% 0;
        width: 40%;
    }
    
    .special-list {
        margin-left: 0;
    }
  
}

/* 
  ##Device = Tablets, Ipads (landscape)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
  h1 {
      margin: 10% 0 0 0;
  }
  /* CSS */
  .bank-container {
        display: block;
        height: 250vh;
        margin: 5% 0 0 0;
        padding: 0 2%;
    }
    
    .list-parent {
        margin-left: auto;
        margin-right: auto;
        display: table;
    }
    .bank-container_card {
        display: none;
    }

    .bank-container_author img {
        display: none;
    }

    .greg-info {
        margin: 0;
    }

    .greg-text {
        display: none;
    }

    .greg-info-flex {
        width: 100%;
    }

    .dot {
        margin: 0;
    } 
    .boa-mobile {
        display: flex;
    }
    
    .sidebar-header {
        height: 13%;
    }

    .apply-now-bank {
        padding: 3% 0;
        width: 40%;
    }

    .special-list {
        margin-left: 0;
    }
  
  
}

/* 
  ##Device = Low Resolution Tablets, Mobiles (Landscape)
  ##Screen = B/w 481px to 767px
*/

@media (min-width: 481px) and (max-width: 767px) {
  
  /* CSS */
  
}

/* 
  ##Device = Most of the Smartphones Mobiles (Portrait)
  ##Screen = B/w 320px to 479px
*/

@media (min-width: 320px) and (max-width: 480px) {
    h1 {
        margin: 15% 0 0 0;
    }
    .bank-container {
        display: block;
        height: 375vh;
        padding: 0 2%;
    }
    
    .list-parent {
        margin-left: auto;
        margin-right: auto;
        display: table;
    }

    .bank-container_card {
        display: none;
    }

    .bank-container_author img {
        display: none;
    }

    .greg-info {
        margin: 0;
    }

    .greg-text {
        display: none;
    }

    .greg-info-flex {
        width: 100%;
    }

    .dot {
        margin: 0;
    } 

    .sl-text {
        font-size: 1.1em !important;
    }

    .boa-mobile {
        display: flex;
    }
    
    .sidebar-header {
        height: 9%;
    }

    .special-list {
        margin-left: 0;
    }
}

</style>



<div class='bank-container'>
    <!-- content container -->
    <div class='bank-container_content'>
        <h1>Best Cash Back Bonus Card of 2021</h1>
        <div class='bank-container_author'>
            <img src='https://wisebread-killeracesmedia.netdna-ssl.com/files/fruganomics/greg_0.jpg' alt='greg' />
            <div class='greg-info'>
                <div class='greg-info-flex'>
                <p style='margin: 0 0 2% 0;'>by Greg Go - April 16, 2021</p>
                <div class="fb-like fb_iframe_widget" data-href="https://www.wisebread.com/bank-of-america-cash" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=684465658393525&amp;container_width=585&amp;href=https%3A%2F%2Fwww.wisebread.com%2Fbank-of-america-cash&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=false&amp;show_faces=false&amp;size=small"><span style="vertical-align: bottom; width: 90px; height: 28px;"><iframe name="f285d874f5c7fc" width="1000px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v3.1/plugins/like.php?action=like&amp;app_id=684465658393525&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df1e8afeef0b14d%26domain%3Dwww.wisebread.com%26origin%3Dhttps%253A%252F%252Fwww.wisebread.com%252Ff36f506bf116a94%26relation%3Dparent.parent&amp;container_width=585&amp;href=https%3A%2F%2Fwww.wisebread.com%2Fbank-of-america-cash&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=false&amp;show_faces=false&amp;size=small" style="border: none; visibility: visible; width: 90px; height: 28px;" class=""></iframe></span></div>
                </div>
                <i class='greg-text'>Greg Go is a credit card expert whose expertise has been featured on US News & World Report, Business.com, and Yahoo! Finance.</i>
                <a href='https://www.wisebread.com/bank-of-america-cash#advertising-disclosure-featherlight' class='boa-mobile'>Advertiser Disclosure</a>
            </div>
        </div>
        <div class='sidebar-header boa-mobile'>
                <a href='https://ct.wisebread.com/click.php?pid=17&pg=392&uv=0_inline'><img src='https://i.imgur.com/h7yZTxE.png' alt='boa' /></a>
                <a href='https://ct.wisebread.com/click.php?pid=17&pg=392&uv=0_inline' class='apply-now-bank'>
                    <p>Apply Now</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="5" y="11" width="14" height="10" rx="2" />
                    <circle cx="12" cy="16" r="1" />
                    <path d="M8 11v-4a4 4 0 0 1 8 0v4" />
                    </svg>
                </a>
        </div>
        <h4>Bottom Line:</h4>
        <div class='list-parent'>
            <ul class='boa-bottom-line' style='text-align: left;'>
                <div class='special-list'><span style='margin-right: 2%;' class='dot'>•</span><div>$200 online sign-up bonus offer.</div></div>
                <div class='special-list' style='font-family: sans-serif;'><span style='margin-right: 2%;' class='dot'>•</span><div class='sl-text'><span style='color: green; font-weight: bold;'>NEW</span> <b>3% cash back</b> on online shopping, drug stores, travel, dining, home improvement and furniture, or gas. Up to 5.25% for Preferred Rewards clients.</div></div>
                <div class='special-list'><span style='margin-right: 2%;' class='dot'>•</span><div class='sl-text'>Best Intro APR - Stop thinking about interest for over a year.</div></div>
                <div class='special-list'><span style='margin-right: 2%;' class='dot'>•</span><div>No annual fee.</div></div>
            </ul>
        </div>
        <p class='text'>The Bank of America® Cash Rewards credit card’s <b>$200 bonus</b> offer and <b>3% cash back</b> is one of the best deals I’ve seen in my years of writing about credit cards for Yahoo, US News, and Wise Bread.</p>
        <p class='text'>If you <a href='https://ct.wisebread.com/click.php?pid=17&pg=392&uv=0_inline'>sign up online</a> today you can receive a $200 online cash bonus after spending only $1,000 in the first 90 days of opening the account — that’s like earning <b>20% back</b> on the first $1,000!</p>
        <p class='text'>Looking to make a big purchase? This card's long intro period will save you a bundle. It's like taking a 15 month vacation from paying interest.</p>
        <p class='text'>The card offers an <b>insane 3% cash back</b> on your choice of six categories and 2% at grocery stores and wholesale clubs (up to $2,500 in combined choice category/grocery store/wholesale club quarterly purchases), and unlimited 1% on all other purchases. These are the categories that you can choose to earn 3%:</p>
        <ul id="cats_list_mobile">
            <div class='special-list'><span style='margin-right: 2%;' class='dot'>•</span><div>Online Shopping</div></div>
            <div class='special-list'><span style='margin-right: 2%;' class='dot'>•</span><div>Drug Stores</div></div>
            <div class='special-list'><span style='margin-right: 2%;' class='dot'>•</span><div>Dining</div></div>
            <div class='special-list'><span style='margin-right: 2%;' class='dot'>•</span><div>Travel</div></div>
            <div class='special-list'><span style='margin-right: 2%;' class='dot'>•</span><div>Gas</div></div>
            <div class='special-list'><span style='margin-right: 2%;' class='dot'>•</span><div>Home Improvement</div></div>
	    </ul>
        <!-- <table class='card-categories'>
            <tbody>
                <tr>
                    <td>Online Shopping</td>
                    <td>Drug Stores</td>
                    <td>Dining</td>
                </tr>
                <tr>
                    <td>Travel</td>
                    <td>Gas</td>
                    <td>Home Improvement</td>
                </tr>
            </tbody>
        </table>  -->
        <p class='text'><b>You choose</b> the category you want to get 3% cash back for, and it stays on that category until you change it. Unlike other
        high cash back cards, there is <b>no monthly activation</b> required, and the categories <b>don’t rotate</b>. You can change the category once per calendar
         month.</p>
        <p class='text'>The <b>3% for online shopping</b> is the best in the industry. I already have this credit card and I love getting 3% back each time I shop online.</p>
        <p class='text'>I also like the <b>3% back for drugstores</b>, which is perfect for families that buy a lot of household goods and medication. Around
         summer time I’ll be taking advantage of the 3% gas for road trips and travel bookings.</p>
        <h4>Up to 5.25% Cash Back</h4>
        <p class='text'>Bank of America’s Preferred Rewards clients earn an <b>extra 25%-75% bonus rewards.</b> As a long time Bank of America and Merrill Lynch customer,
         I’m excited about getting up to <b>5.25%</b> cash back on an online purchase, and at least 1.75% on other purchases.</p>
        <h4>Who Should Get This Card</h4>
        <p class='text'>Bank of America Cash Rewards is a great fit for most people — who doesn’t love a $200 bonus, intro interest for over a year, and no annual fee?</p>
        <p class='text'>The high 3% cash back on online shopping, drug stores, dining, travel, furniture, or gas is <b>unheard</b> of for a no annual fee credit card. Bank of 
        America Cash Rewards pretty much blows its leading competitors out of the water.</p>
        <p class='text'>This is why I’ve personally been using this card for years and recommend it to all my friends. This combination of features is too good to pass up.</p>
        <h4><a style='color: blue; font-family: sans-serif;' href='https://ct.wisebread.com/click.php?pid=17&pg=392&uv=0_pend'>» Click here to learn more about the $200 bonus offer and getting 3% cash back on online shopping</a> or call Bank of America at 866-349-6262.</h4>

    </div>
    <!-- card container -->
    <div class='bank-container_card'>
        <a href='https://www.wisebread.com/bank-of-america-cash#advertising-disclosure-featherlight' style='font-size: 1.2em;'>Advertiser Disclosure</a>
        <div class='bank-container_box'>
            <div class='sidebar-header'>
                <a href='https://ct.wisebread.com/click.php?pid=17&pg=392&uv=0_inline'><img src='https://i.imgur.com/h7yZTxE.png' alt='boa' /></a>
                <a href='https://ct.wisebread.com/click.php?pid=17&pg=392&uv=0_inline' class='apply-now-bank'>
                    <p>Apply Now</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="5" y="11" width="14" height="10" rx="2" />
                    <circle cx="12" cy="16" r="1" />
                    <path d="M8 11v-4a4 4 0 0 1 8 0v4" />
                    </svg>
                </a>
            </div>
            <p class='boa-text'>at Bank of America's secure site</p>
            <ul class='boa-card-list'>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l5 5l10 -10" />
                    </svg>
                    <p><b>$200</b> bonus after $1,000 spend within 90 days.</p>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l5 5l10 -10" />
                    </svg>
                    <p><b>No annual fees.</b></p>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l5 5l10 -10" />
                    </svg>
                    <p><b>3% cash back </b>on category of your choice, up to $2,500 in combined choice & 2% category purchases per quarter.</p>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l5 5l10 -10" />
                    </svg>
                    <p>6 awesome categories like <b>online shopping</b>, dining, travel, gas, drug stores, etc.</p>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l5 5l10 -10" />
                    </svg>
                    <p>0% APR for 15 billing cycles on purchases. 13.99% - 23.99% variable APR after.</p>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l5 5l10 -10" />
                    </svg>
                    <p>Up to <b>5.25% cash back</b> for Preferred Rewards customers.</p>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>


<script>
let content = document.querySelector('.bank-container_content');
let card = document.querySelector('.bank-container_card');
document.addEventListener('keypress', (e) => {
    if(e.key === "[") {
        content.classList.toggle('border-blue');
    }
})

document.addEventListener('keypress', (e) => {
    if(e.key === "]") {
        card.classList.toggle('border-green');
    }
})
</script>