<?php 
/* Template Name: Manage Preferences */

get_header();

$servername = "sendymaster.cskde2edex7x.us-east-1.rds.amazonaws.com";
$username = "sendy_root";
$password = "idrop*news";
$db_name = "sendy";

// establish db connection to idrop TAPP 
$conn = new mysqli($servername, $username, $password, $db_name);

// error handle if connection is established
if($conn === false) {
    die("ERROR: Could not connect." . mysql_connect_error());
}

// checks if value is present, changes value to 1 if selected, 0 if not selected
function checkSelected($category) {
    if($category) {
        $category = 1;
    } else {
        $category = 0;
    }

    return $category;
}

// get variables from manage preferences
$email = $_POST['email'];
$select_all = checkSelected($_POST['select-all']);
$giveaways = checkSelected($_POST['giveaways']);
$stuffWeLove = checkSelected($_POST['stuff-we-love']);
$mainNewsLetter = checkSelected($_POST['main-newsletter']);

// checks to see if email has already been created in database, otherwise insert into sendy.idrop_emails table
$select = mysqli_query($conn, "SELECT * FROM sendy.idrop_emails WHERE email = '$email'");
if(mysqli_num_rows($select)) {
    echo "<div style='width: 100%; display: flex; flex-direction: column;'><h1 class='insert-newsletter' style='text-align: center;'>This email is already being used: $email. Please try again.</h1>
        <br> <a style='color: blue; text-align: center;' href='/manage-preferences'>Manage Preferences</a></div>";
} else {    
    $sql = "INSERT INTO sendy.idrop_emails (email, select_all, giveaways, main_newsletter, stuff_we_love) VALUES ('$email', $select_all, $giveaways, $mainNewsLetter, $stuffWeLove)";

    if(mysqli_query($conn, $sql)) {
        echo "<h1 class='insert-newsletter' style='text-align: center;'>Thank you, we have recorded your preferences.</h1>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}



 // Close connection
 mysqli_close($conn);
?>

<!-- <h1 class='insert-newsletter' style='text-align: center;'>Thank you, we have recorded your preferences.</h1> -->

<?php get_footer(); ?>