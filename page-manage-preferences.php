<?php 
    /* Template Name: Manage Preferences */

    get_header();
?>


<div class='newsletter-container'>
    <h1>Manage Email Preferences</h1>

    <form action="/insert" method="post" id="manage-preference-form">
        <div class='email-name'>
        <h3>Enter Your Information</h3>
            <div class='input-fields'>
                <input type='email' placeholder='example@idropnews.com' name='email' pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$"/>
            </div>
        </div>
        <div class='select-newsletter'>
            <h3>Select Newsletters*</h3>
            <div class='newsletter-choices'>
                <div class='newsletter-choice'>
                    <div class='newsletter-choices_header'>
                        <input type='checkbox' name='select-all' value='select-all' id='select-all' checked />
                        <h4>Select All</h4>
                    </div>
                    <p>Sign up for the complete package of all of our Apple related news!</p>
                </div>
                <div class='newsletter-choice'>
                    <div class='newsletter-choices_header'>
                        <input type='checkbox' name='main-newsletter' value='main-newsletter' id='main-newsletter' checked />
                        <h4>Main Newsletter</h4>
                    </div>
                    <p>Stay in the know about all things Apple. We feature news, updates, how-to's, and more.</p>
                </div>
                <div class='newsletter-choice'>
                    <div class='newsletter-choices_header'>
                        <input type='checkbox' name='giveaways' value='giveaways' id='giveaways' checked />
                        <h4>Giveaways</h4>
                    </div>
                    <p>Sign up for the latest giveaways from MacBooks, AirPods, and more!</p>
                </div>
                <div class='newsletter-choice'> 
                    <div class='newsletter-choices_header'>
                    <input type='checkbox' name='stuff-we-love' value='stuff-we-love' id='stuff-we-love' checked />
                    <h4>Stuff We Love</h4>
                    </div>
                    <p>Editor selected product selections, deals, and articles that interest the Apple enthusiast!</p>
                </div>
            </div>
        </div>
        <p class='privacy-policy'>By providing your email you are agreeing to our <a href='https://www.idropnews.com/terms/'>terms of use</a> and our <a href='https://www.idropnews.com/privacy-policy/'>privacy policy.</a></p>
        <p id='error'></p>
        <button class="newsletter-submit" type='submit'>Sign Up</button>
    </form>
</div>



<script>
    let checkboxes = {
        selectAll: getElem('select-all'),
        giveaways: getElem('giveaways'),
        stuffWeLove: getElem('stuff-we-love'),
        mainNewsletter: getElem('main-newsletter'),
        error: getElem('error'),
    }
    function getElem(node) {
        return document.getElementById(node);
    }

    checkboxes.selectAll.addEventListener('click', () => {
        // if selectAll is not checked, we click and set it to checked set others to true as well
        // otherwise, set all to false
        if(checkboxes.selectAll.checked) {
            checkboxes.giveaways.checked = true;
            checkboxes.stuffWeLove.checked = true;
            checkboxes.mainNewsletter.checked = true;
        } else {
            checkboxes.giveaways.checked = false;
            checkboxes.stuffWeLove.checked = false;
            checkboxes.mainNewsletter.checked = false;
        }

        if(!checkboxes.selectAll.checked && !checkboxes.giveaways.checked && !checkboxes.stuffWeLove.checked && checkboxes.mainNewsletter.checked) {
            checkboxes.error.textContent = 'Please select a newsletter preference';
        } else {
            checkboxes.error.textContent = '';
        }
    })

    checkboxes.giveaways.addEventListener('click', () => {
        if(!checkboxes.giveaways.checked) {
            checkboxes.selectAll.checked = false;
        } else if(checkboxes.mainNewsletter.checked && checkboxes.stuffWeLove.checked && checkboxes.giveaways.checked) {
            checkboxes.selectAll.checked = true;
        }
    })

    checkboxes.stuffWeLove.addEventListener('click', () => {
        if(!checkboxes.stuffWeLove.checked) {
            checkboxes.selectAll.checked = false;
        } else if(checkboxes.mainNewsletter.checked && checkboxes.stuffWeLove.checked && checkboxes.giveaways.checked) {
            checkboxes.selectAll.checked = true;
        }
    })

    checkboxes.mainNewsletter.addEventListener('click', () => {
        if(!checkboxes.mainNewsletter.checked) {
            checkboxes.selectAll.checked = false;
        } else if(checkboxes.mainNewsletter.checked && checkboxes.stuffWeLove.checked && checkboxes.giveaways.checked) {
            checkboxes.selectAll.checked = true;
        }
    })
</script>













<?php get_footer(); ?>