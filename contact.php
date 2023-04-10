<?php
// Turn on output buffering
ob_start();

// Connect to the database
require('mysqli_connect.php');

$errors = array();
$error_msg = '';
$fname = '';
$lname = '';
$email = '';
$phone = '';
$msg = '';



if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get form data
  $fname = mysqli_real_escape_string($dbc, trim($_POST['fname']));
  $lname = mysqli_real_escape_string($dbc, trim($_POST['lname']));
  $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
  $phone = mysqli_real_escape_string($dbc, trim($_POST['phone']));
  $msg = mysqli_real_escape_string($dbc, trim($_POST['message']));



    // Insert form data into database
    $contact = "INSERT INTO contact_us (fname, lname, email, phone, message) VALUES ('$fname', '$lname', '$email', '$phone', '$msg')";
    $r = mysqli_query ($dbc, $contact);

    if ($r) {
      // Redirect to index page upon form submission
      header('Location: index.php');
      exit();
    } else {
      $error_msg = 'Error: ' . mysqli_error($dbc);
    }
  

  // Close database connection
  mysqli_close($dbc);

}

// Turn off output buffering
ob_end_flush();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@1,600&family=Syne&display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="contact.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</head>
<body>
<div class="wrapper">
    <!--nav bar-->
    <div class="topnav">
        <img src="buzz_logo.png" alt="Home" style="width:40px;height:40px;padding:7px 16px;float:left;">
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="signup.php">Sign Up</a>
      <a href="login.php">Log In</a>
      <a href="contact.php">Contact</a>
      <a href="account_details.php" class="topnav-right">Account</a>
    </div>
    
    <h1>Contact Us!</h1>
    
	<form action="contact.php" method="post">
	    <div class="input-container">

		<label for="fname">First Name:</label>
		<input type="text" id="fname" name="fname" value="<?php echo $fname; ?>"class="form-field">

		<label for="lname">Last Name:</label>
		<input type="text" id="lname" name="lname" value="<?php echo $lname; ?>"class="form-field">

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" class="form-field">
		
		<label for="phone">Phone Number:</label>
		<input type="text" id="phone" name="phone" class="form-field">
		
		<label for="msg">Message:</label>
		<textarea rows="5" cols="40" id="msg" name="msg" class="form-field"></textarea>
		

		<label></label>
		<label></label>
		<input type="submit" name="submit" value="Submit">
		</div>
	</form>
	
	<div id="error-popup" style="display: none;">
		<h2>Please fix the following errors:</h2>
		<ul id="error-list"></ul>
		<button id="close-button">Close</button>
	</div>
	
	<script>
      var errors = <?php echo json_encode($errors); ?>;
    
    	if (errors && errors.length > 0) {
    		Toastify({
    		position: 'center',
    		text: errors.reduce((allErrors, error, currentIndex) => ( allErrors += (currentIndex > 0 ? '. ' : '') + error ), ''),
    		duration: 10000
    
    	}).showToast();}
	</script>
    	
</div>
</body>
</html>