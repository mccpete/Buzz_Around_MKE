<?php # Script 12.1 - login_page.inc.php
// This page prints any errors associated with logging in
// and it creates the entire login page, including the form.

// Include the header:
$page_title = 'Login';

// Print any error messages, if they exist:
if (isset($errors) && !empty($errors)) {
	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</p><p>Please try again.</p>';
}

// Display the form:
?>
<!DOCTYPE html>
<html>
	<head>
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@1,600&family=Syne&display=swap" rel="stylesheet">
	</head>
<link rel="stylesheet" type="text/css" href="login.css"></head>
<body>
<div class="wrapper">
  <div class="container">
    <div class="topnav">
        <img src="buzz_logo.png" alt="Home" style="width:40px;height:40px;padding:7px 16px;float:left;">
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="signup.php">Sign Up</a>
      <a href="login.php">Log In</a>
      <a href="contact.php">Contact</a>
    </div>
  </div>
  <h1>Log In!</h1>
  <form action="login.php" method="post">
  <div class="input-container">
    <p>Email Address: <input type="text" name="email" size="20" maxlength="60" /> </p>
    <p>Password: <input type="password" name="pass" size="20" maxlength="20" /></p>
    <p><input type="submit" name="submit" value="Login" /></p>
  </form>
</div>
</body>

