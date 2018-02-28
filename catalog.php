<?php 
include ('includes/mainheader.html');

// Page header:


require ('mysqli_connect.php'); // Connect to the db.
		
// Make the query:
$q = "SELECT * FROM items ORDER BY serial_number ASC";		
$r = @mysqli_query ($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);
echo '	<div class="container gallery-container">
			<h1 class="h1_maintitle">Catalog</h1>
			<p class="page-description text-center">Thumbnails With Title And Description</p>
			
			<div class="tz-gallery">
			<div class="row">';
					
		
			
		
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
		"			<div class='col-sm-6 col-md-4'>
						<div class='thumbnail text-center'>
							<a class='lightbox' href='uploads/$imageurl[$i]'>
								<img src='uploads/$imageurl[$i]' class='img_catalog' id='bootstrap-override' alt='Trial'>
							</a>
							<div class='caption'>
								<h3>$itemname[$i]</h3>
								<p>$description[$i]</p>
							</div>
							<div>
								<button type='button' class='btn btn-success'>Add to Cart</button>
							</div>
						</div>
					</div>
				";
    }
	
	echo "	</div>
			</div>
			</div>";
	?>
	





<?php
echo '</div></div>';
include ('includes/mainfooter.html');
?>


