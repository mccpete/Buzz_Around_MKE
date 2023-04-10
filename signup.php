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
$pass = '';
$confirm_pass = '';
$dob = '';
$account_type = '';
$email_check_passed = false;
$password_check_passed = false;

function validate_password($password) {
	if(strlen($password) < 8) {
		return false;
	}
	if(!preg_match('/[A-Z]/', $password)) {
		return false;
	}
	if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) {
		return false;
	}
	return true;
}

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get form data
  $fname = mysqli_real_escape_string($dbc, trim($_POST['fname']));
  $lname = mysqli_real_escape_string($dbc, trim($_POST['lname']));
  $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
  $pass = mysqli_real_escape_string($dbc, trim($_POST['pass']));
  $confirm_pass = mysqli_real_escape_string($dbc, trim($_POST['confirm_pass']));
  $dob = mysqli_real_escape_string($dbc, trim($_POST['dob']));
  $account_type = mysqli_real_escape_string($dbc, trim($_POST['account_type']));
  
  if (validate_password($pass)) {
    $password_check_passed = true;
  } else {
    $errors[] = 'Password must be at least 8 characters long, contain at least 1 captial letter, and at least one special character';
  }

  // Check if passwords match
  if($pass !== $confirm_pass) {
    $errors[] = 'Passwords do not match';
  }

  // Check if email already exists
  $check_email = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($dbc, $check_email);
  if(mysqli_num_rows($result) > 0) {
    $errors[] = 'Email already exists, please use a different email';
  } else {
    $email_check_passed = true;
  }

  if($email_check_passed && $password_check_passed) {
    // Insert form data into database
    $signup = "INSERT INTO users (fname, lname, email, pass, dob, account_type) VALUES ('$fname', '$lname', '$email', '$pass', '$dob', '$account_type')";
    $r = mysqli_query ($dbc, $signup);

    if ($r) {
      // Redirect to login page
      header('Location: login.php');
      exit();
    } else {
      $error_msg = 'Error: ' . mysqli_error($dbc);
    }
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
	<title>Buzz Around Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="signup.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@1,600&family=Syne&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">

<div class="topnav">
    <img src="buzz_logo.png" alt="Home" style="width:40px;height:40px;padding:7px 16px;float:left;">
   <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="signup.php">Sign Up</a>
  <a href="login.php">Log In</a>
  <a href="contact.php">Contact</a>
</div>
	<form action="signup.php" method="post">
		<label for="fname">First Name:</label>
		<input type="text" id="fname" name="fname" value="<?php echo $fname; ?>"class="form-field"><br>

		<label for="lname">Last Name:</label>
		<input type="text" id="lname" name="lname" value="<?php echo $lname; ?>"class="form-field"><br>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" class="form-field"><br>
		
		<label for="pass">Password:   <i class="far fa-eye" id="togglePassword""></i></label>
		<input type="password" id="pass" name="pass" class="form-field">
		<br>

		<label for="confirm_pass">Confirm Password:</label>
		<input type="password" id="confirm_pass" name="confirm_pass" class="form-field"><br>

		<label for="account_type">Account Type:</label>
		<select id="account_type" name="account_type" class="form-field">
			<option value="user" <?php if($account_type == 'user') echo 'selected'; ?>>User</option>
			<option value="business" <?php if($account_type == 'business') echo 'selected'; ?>>Business</option>
			<option value="admin" <?php if($account_type == 'admin') echo 'selected'; ?>>Admin</option>
		</select><br>

		<label for="dob">Date of Birth:</label>
		<input type="date" id="dob" name="dob" value="<?php if(isset($_POST['dob'])) {echo $_POST['dob']; } ?>"class="form-field"><br>

		<input type="submit" name="submit" value="Register">
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
	<script>
	const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#pass');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
</div>
</body>
</html>