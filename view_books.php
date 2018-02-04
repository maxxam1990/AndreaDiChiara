<?php # Script 9.6 - view_users.php #2
// This script retrieves all the books from the books table.

$page_title = 'View the Current Books';
include ('includes/header.html');

// Page header:
echo '<h1>Items</h1>';

require ('mysqli_connect.php'); // Connect to the db.
		
// Make the query:
$q = "SELECT * FROM items ORDER BY serial_number ASC";		
$r = @mysqli_query ($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<h4 style='text-align:center'>There are currently $num registered items in our database.</h4>\n<br>";

	// Table header.
	echo '<table align="center" cellspacing="2" cellpadding="2" width="50%">
	<tr><td align="left"><b>Serial Number</b></td>
	</td><td align="left"><b>Image</b></td></td><td align="left"><b>Name of Item</b></td></td><td align="left"><b>Description</b></td></td><td align="left"><b>Price</b></td></tr>
';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['serial_number'] .  '</td><td align="center">' . '<img src="uploads/'. $row['image_url'] . '"  class="img_table" height="80" width="80"></td>' .
		'<td align="left">' . $row['item_name'] . '</td><td align="left">' . $row['description'] . '<td align="left"> $' . $row['price'] .'</td></tr>';
	}

	echo '</table>'; // Close the table.
	
	mysqli_free_result ($r); // Free up the resources.	

} else { // If no records were returned.

	echo '<p class="error">There are currently no registered users.</p>';

}

mysqli_close($dbc); // Close the database connection.



include ('includes/footer.html');
?>

