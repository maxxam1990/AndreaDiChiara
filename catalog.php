<?php 
include ('includes/mainheader.html');

// Page header:


require ('mysqli_connect.php'); // Connect to the db.
		
// Make the query:
$q = "SELECT * FROM items ORDER BY serial_number ASC";		
$r = @mysqli_query ($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);
echo '  <div class="jumbotron">
        <div class="container">
		<h1 class="h1_maintitle">Catalog</h1>';

if ($num > 0) { // If it ran OK, display the records.

	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		$serialnumber[] = $row['serial_number'];
		$imageurl[] = $row['image_url'];
		$itemname[] = $row['item_name'];
		$description[] = $row['description'];
		$price[] = $row['price'];
	}
	echo '</table>'; // Close the table.
	
	mysqli_free_result ($r); // Free up the resources.	

} else { // If no records were returned.

	echo '<p class="error">There are currently no registered users.</p>';

}



mysqli_close($dbc); // Close the database connection.
?>
<p>
	<?php for ($i = 0; $i < count($itemname); $i++) {
		echo 
		"<br>
			<div class='row'>
			<div class='col-md-6'>
				<img src='uploads/$imageurl[$i]'  class='img_about'>	
			</div>
			<div class='col-md-6'>
				<br><br>
				<h1 class='h1_maintitle' style='text-align:left'>$itemname[$i]</h1>
				<div class='row'>
					<div class='col-md-6'>
						<p>
							$description[$i]
						</p>
					</div>
					<div class='col-md-6'>
						<p>
							SKU: $serialnumber[$i]
						</p>
					</div>
				</div>
				<h4>Price:</h4>
					<h2>
						$$price[$i]
					</h2>
			</div>
			<div class='col-md-12' style='text-align:center'>
				<p>---------------------------------------------------------------------------------------------------------------------------</p>
			</div>
		</div>";
	} ?>
	
</p>


<?php
echo '</div></div>';
include ('includes/mainfooter.html');
?>


