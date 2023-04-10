<?php
include('mysqli_connect.php');
?>

<style>
	/* I aligned the page to the center and used some css for submit button*/
.menu {
	text-align center;
}

</style>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST'){
	$event_id = $_POST['event_id'];
	
	
	$query = "DELETE FROM events WHERE event_id = '$event_id'";
	
	$results = mysqli_query($dbc,$query);
	
	if($results){
		echo "It worked the event was deleted!";
		} else {
		echo "There was an error!" . mysqli_error($dbc);
}

}



?>
<h1>Delete Event</h1>
<head>
<link rel="stylesheet" href="password.css">
</head>

<form action="delete_event.php" method="post">
	Event ID: <br></br> <input name="event_id" type="text"/><br></br>
	<input type="submit" name="submit" value="Submit" />
</form>




<!--
<div class = 'menu'> 
<form action="delete_event.php" method="post">

<h1 align="center">Delete an Event</h1>

Event ID:
<input name="event_id" type="text"/>
<br>
<br>
<input type="submit" name="submit" value="Submit" />

</form>
</div>
-->
