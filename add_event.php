<?php
//used to include menu for top of the page
include('mysqli_connect.php');
?>

<style>
	
.menu {
	text-align center;
}

</style>


<?php
//this code allows us to insert a new guestbook entry using SQL
if ($_SERVER['REQUEST_METHOD']=='POST'){
	$name = $_POST['name'];
	$event_type = $_POST['event_type'];
	$about = $_POST['about'];
	$address = $_POST['address'];
	$hours = $_POST['hours'];
	$popularity = $_POST['popularity'];
	//query that inserts new data into guesbook database
	$query = "INSERT INTO events(event_id, name, event_type, about, address, hours, popularity, event_added)
	VALUES ('','$name','$event_type','$about', '$address', '$hours', '$popularity', NOW())";
	
	$results = mysqli_query($dbc,$query);
	//tells us if our query ran
	if($results){
		echo "It worked your event was added!";
		} else {
		echo "There was an error!" . mysqli_error($dbc);
}

}

?>


<h1>Add Event:</h1>
<head>
<link rel="stylesheet" href="password.css">
</head>

<form action="add_event.php" method="post">
	Event Name:<input name="event_type" type="text"/><br></br>
	Event Type:<input name="event_type" type="text"/><br></br>
	Event Details:<textarea name="about" cols="40" rows="5"></textarea><br></br>
	Event Address:<input name="address" type="text"/><br></br>
	Event Hours:<input name="hours" type="text"/><br></br>
	Popularity(Low,Med,High):<input name="popularity" type="text"/><br></br>
	Upload Event Image: <input type="file" id="myFile" name="filename"><br></br>
	<input type="submit" name="submit" value="Submit" />
</form>
	
	








<!--
<div class = 'menu'>
<form action="add_event.php" method="post">



<h1 align="center">Add an Event</h1>

Enter Event Name:
<input name="name" type="text"/>
<br>
Enter Event Type:
<input name="event_type" type="text"/>
<br>
Enter an about section for the event
<br>
<textarea name="about" cols="40" rows="5"></textarea>
<br>
Enter Event Address
<input name="address" type="text"/>
<br>
Enter Event Hours
<input name="hours" type="text"/>
<br>
Enter Event Popularity
<input name="popularity" type="text"/>
<br>
<input type="submit" name="submit" value="Submit" />
</form>
</div>
-->
