<!DOCTYPE html>
<html>
<head>
	<title>Buzz Around MKE</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@1,600&family=Syne&display=swap" rel="stylesheet">
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
  <div class="topnav-right">
  <a href="account_details.php">Account</a>
  </div>
</div>



	<h1 align="center"> Where is the Buzz?</h1>
	<br>
	<br>
<?php
/*
$sql = "SELECT * FROM events WHERE popularity = High";

$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) {
    echo $row['name']; 
    echo $row['event_type'];
    echo $row['about'];
    echo $row['address'];
    echo $row['hours'];
    echo $row['popularity'];
}
*/
       //***********************************************
        //SORTING SETUP START
        //From Textbook Script 10.5 - #5
        //***********************************************

        // Determine the sort...
        // Default is by registration date.
        $sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'date';

        // Determine the sorting order:
        switch ($sort) {
            case 'alph':
            $order_by = 'name ASC';
            break;
            case 'revAlph':
            $order_by = 'name DESC';
            break;
            case 'old':
            $order_by = 'event_added ASC';
            break;
            case 'new':
            $order_by = 'event_added DESC';
            break;
            default:
            $order_by = 'event_id';
            $sort = 'new';
            break;
        }

        //Sort buttons
       echo '<div class="sort">';
	   echo '<strong> Sort By: </strong>';
	   echo '<select id="sort" onchange="this.options[this.selectedIndex].value && (window.location = \'?sort=\' + this.options[this.selectedIndex].value);">';
	   echo '<option value="alph"' . ($sort == 'alph' ? ' selected="selected"' : '') . '>A-Z</option>';
	   echo '<option value="revAlph"' . ($sort == 'revAlph' ? ' selected="selected"' : '') . '>Z-A</option>';
	   echo '<option value="old"' . ($sort == 'old' ? ' selected="selected"' : '') . '>Oldest</option>';
	   echo '<option value="new"' . ($sort == 'new' ? ' selected="selected"' : '') . '>Newest</option>';
	   echo '</select>';
	   echo '</div>';


        //***********************************************
        //SORTING SETUP END
        //***********************************************
include('mysqli_connect.php');
$query = "SELECT * FROM events WHERE popularity = 'High' ORDER BY $order_by";
$results = mysqli_query($dbc,$query);
?>

<div class="container">

<?php while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){?>
	<div class="event">
	    <h2><?php echo $row['name']; ?></h2>
        <p><?php echo $row['about']; ?></p>
        <p><?php echo $row['address']; ?></p>
        <p><?php echo $row['hours']; ?></p>
		<p><?php echo "Popularity: "?> <?php echo $row['popularity']; ?></p>
		<div class="event-img">
		<p> <?php echo '<img src="'.$row['image'].'">'; ?></p>
		</div>
		
    </div>
    <?php } ?>
</div>	

	<?php
	//echo $row['name'] . " " . $row['event_type'] . " " . $row['about'] . " " . $row['address'] . " " . $row['hours'] . " " . $row['popularity'] . " " . "<br>";
	//echo "<br>";
	
?>	

</div>
</body>

</html>
