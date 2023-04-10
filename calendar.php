<!DOCTYPE html>
<html>
<head>
	<title>Calendar</title>
	<style type="text/css">
		table {
			border-collapse: collapse;
		}

		td {
			border: 1px solid black;
			padding: 5px;
			text-align: center;
		}

		th {
			padding: 10px;
		}
	</style>
</head>
<body>
	<?php
		// get current month and year
		$month = date('m');
		$year = date('Y');

		// calculate the number of days in the month
		$numDays = date('t', strtotime($year . '-' . $month . '-01'));

		// determine the day of the week that the first day of the month falls on
		$firstDay = date('N', strtotime($year . '-' . $month . '-01'));

		// generate empty cells for days before the first day of the month
		echo "<table>\n";
		echo "<tr>\n";
		for ($i = 1; $i < $firstDay; $i++) {
			echo "<td></td>\n";
		}

		// generate table cells for each day of the month
		$day = 1;
		while ($day <= $numDays) {
			// start a new row on the first day of the week
			if ($firstDay == 1) {
				echo "<tr>\n";
			}

			// generate table cell for the current day
			echo "<td>$day</td>\n";

			// move to the next day
			$day++;
			$firstDay++;

			// end the row on the last day of the week
			if ($firstDay == 8) {
				echo "</tr>\n";
				$firstDay = 1;
			}
		}

		// generate empty cells for days after the last day of the month
		while ($firstDay != 1) {
			echo "<td></td>\n";
			$firstDay++;
			if ($firstDay == 8) {
				echo "</tr>\n";
				$firstDay = 1;
			}
		}

		echo "</table>\n";
	?>
</body>
</html>
