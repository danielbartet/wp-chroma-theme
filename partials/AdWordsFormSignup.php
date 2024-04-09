<style type="text/css">
	.error{
		padding: 5px 9px;
	   border: 1px solid red;
	     color: red;
	     border-radius: 3px;
	     display: block;
	     width: 160px;
	}

	.success{
		padding: 5px 9px;
		border: 1px solid green;
		color: green;
		border-radius: 3px;
		display: block;
		width: 160px;
	}
	#content-main input {
		display: block;
    margin: 10px 0;
    font-size: 1.25rem;
    height: 35px;
	}
  #content-main input[type=submit] {
    height: 40px;
  }
	.sign-col {
		vertical-align: top;
		display: inline-block;
	}
</style>
<?php
// define variables and set to empty values
$email = "";
$emailErr ="";


  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$to = 'idropnetworks@gmail.com';
$subject = "Subscriber via Google Adwords Campaign";
$headers = 'From: '. $email . "\r\n" .
  'Reply-To: ' . $email . "\r\n";
if (!empty($_POST["email"]) && empty($emailErr)) {
  $sent = wp_mail($to, $subject, $headers);
  if($sent) {
    echo 'You have entered!';
    header("Location: https://www.idropnews.com/thanks-for-signing-up.html");
    global $wpdb;
    $table = 'adwords_campaign_subscribers';
    $data = array(
        'email'  => $_POST['email'],
    );
    $format = array(
        '%s',
    );
    $wpdb->insert( $table, $data, $format );
  }
  else { echo '<span class="error">* <?php echo $emailErr;?></span><br>'; }
}
?>

<form method="post" action="<?php echo htmlspecialchars(the_permalink());?>" style="width: 74%" class="sign-col">
Enter Email: <input type="email" pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$" name="email" required minlength="6" value="<?php echo $email;?>"><br>
<input type="submit" value="Enter to Win">
</form>
<div style="background-position: left center; background: url('https://cdn.idropnews.com/wp-content/uploads/2017/06/06141718/iPhone-7-WinIt.jpg'); background-repeat: no-repeat; background-size: contain; width: 24%; height: 220px;" class="sign-col"></div>
