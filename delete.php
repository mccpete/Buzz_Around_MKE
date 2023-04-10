<?php
include('mysqli_connect.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
	$email = $_POST['email'];
	
	$query = "DELETE FROM users WHERE email = '$email'";
	
	$results = mysqli_query($dbc,$query);
	
	if($results){
		echo "Your account has been deleted.";
		} else {
		echo "Your account has not been deleted please contact support" . mysqli_error($dbc);
}

}
?>
<h1>Delete Account:</h1>
<head> 
<link rel="stylesheet" href="password.css">
</head>

<form action="delete.php" method="post">
	Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> 
	<br></br>
	<input type="submit" name="submit" value="Submit" />
</form>



<!--<div class = 'menu'> 
<form action="delete.php" method="post">

Email Address of Account you want to Delete:
<input name="email" type="text"/>
<br>
<br>
<input type="submit" name="submit" value="Submit" />

</form>
</div>
-->
