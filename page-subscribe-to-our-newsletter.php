<?php 
get_header();

if(isset($_POST['EMAIL'])) {
    $input_val = $_POST['EMAIL'];
}
?>
<style>
	.heightContainer {
		height: 100%;
	}

	@media (min-width: 320px) and (max-width: 480px) {
		.heightContainer {
			height: 160%;
		}
	
	}
	@media (min-width: 768px) and (max-width: 1024px) {
		.heightContainer {
			height: 75%;
		}
	}

	.formContainer {
		display: flex;
		flex-direction: column;
		height: 200px;
		justify-content: space-around;
	}
</style>
<div class="box-shadow-nohover signup-container heightContainer">
						<div id="mc_embed_signup" style="display: flex; flex-direction: column; justify-content: space-around; height: 50%;">
							<h3>Newsletter</h3>
							<p>Sign up for the iDrop newsletter to get the top Apple News, How Tos and more delivered to your inbox.</p>
							<form action="//idropnews.us7.list-manage.com/subscribe/post?u=719157069d19f8814044dbf17&amp;id=da2681be72" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" onsubmit="return checkBoxHandler(this)" target="_blank" novalidate="">
								<div id="mc_embed_signup_scroll" style="display: flex; flex-direction: column; height: 200px; justify-content: space-around;">
								<label style="display: flex; color: white;">
									<input class="idropCheck" type="checkbox" name="idropCheck" required/>
										<span class="subscribe_validation--label" style="margin-left: 10px; display: inline; font-size: 1.1rem;">By checking this box, I consent to being contacted by iDropNews. I confirm I have read and agree to the <a href="https://www.idropnews.com/privacy-policy/" target="_blank" style="color: white; text-decoration: underline;">Privacy Policy</a>, <a href="https://www.idropnews.com/ccpa-privacy-statement/" target="_blank" style="color: white; text-decoration: underline;">CCPA Privacy Statement</a>, and <a href="https://www.idropnews.com/terms/" target="_blank" style="color: white; text-decoration: underline;">Terms of Use</a>. I understand I can withdraw my consent at any time by following the instructions included therein.</span></label>
										<script src="https://www.google.com/recaptcha/api.js" async defer></script>
										<div class="g-recaptcha" data-sitekey="6LdKYg8UAAAAANY2hrZ3B5SrP_kENLutVAUDQ4EB" data-callback="recaptchaCallback"></div>
									<div class="mc-field-group input-group" style="margin-bottom: 12%;">
										<input type="email" value="<?php echo $input_val ?>" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="example@idropnews.com">
										<button type="submit" value="submit" name="Subscribe" id="mc-embedded-subscribe" class="button" style="opacity: 0.5;" disabled>
										Sign Up
										</button>
										</div>
									 <div id="mce-responses">
										 <div class="response" id="mce-error-response" style="display:none"></div>
										 <div class="response" id="mce-success-response" style="display:none"></div>
									 </div>
								</div>
							</form>
						</div>

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
<script>
    function checkBoxHandler(form) {
        if(!form.idropCheck.checked) {
            alert('Please indicate that you accept the Terms and Conditions');
            form.idropCheck.focus();
            return false;
        } else {
            return true;
        }
    }

	function recaptchaCallback() {
		document.getElementById('mc-embedded-subscribe').removeAttribute('disabled');
		document.getElementById('mc-embedded-subscribe').style.opacity = '1';
	}

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
        if(!checkboxes.selectAll.checked && !checkboxes.giveaways.checked && !checkboxes.stuffWeLove.checked && !checkboxes.mainNewsletter.checked) {
            checkboxes.error.textContent = 'Please select a newsletter preference';
        } else {
            checkboxes.error.textContent = '';
        }
    })

    checkboxes.stuffWeLove.addEventListener('click', () => {
        if(!checkboxes.selectAll.checked && !checkboxes.giveaways.checked && !checkboxes.stuffWeLove.checked && !checkboxes.mainNewsletter.checked) {
            checkboxes.error.textContent = 'Please select a newsletter preference';
        } else {
            checkboxes.error.textContent = '';
        }
    })
</script>
<?php
get_footer();