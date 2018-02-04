<?php 

// This page lets the user update a book.

$page_title = 'Update a Book';
include ('includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$serialnumber = $_POST['serial_number'];
	$itemname = $_POST['item_name'];
	$description = $_POST['description'];
	$price = $_POST['price'];

	require ('mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
		// Check for Serial number:
	if (empty($_POST['serial_number'])) {
		$errors[] = 'You forgot to enter your serial number.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($serialnumber));
	}

	// Check for the Author:
	if (empty($_POST['item_name'])) {
		 $errors[] = 'You forgot to enter the item name.';
	 } else {
		 $p = mysqli_real_escape_string($dbc, trim($itemname));
	}

	// Check for the Title:
	if (empty($_POST['description'])) {
		$errors[] = 'You forgot to enter a description.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($description));
	}
	
	// Check for the year:
	if (empty($_POST['price'])) {
		$errors[] = 'You forgot to enter a price.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($price));
	}

	if (empty($errors)) { // If everything's OK.

		$q = "SELECT serial_number FROM items WHERE serial_number='$e'";
		$r = @mysqli_query($dbc, $q);
		$num = @mysqli_num_rows($r);
		if ($num == 1) { // Match was made.
	
			// Get the book_id:
			$row = mysqli_fetch_array($r, MYSQLI_NUM);

			// Make the UPDATE query:
			$q = "UPDATE items SET item_name='$itemname', description='$description', price='$price' WHERE serial_number= '$serialnumber';";		
			$r = @mysqli_query($dbc, $q);
			
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				// Print a message.
				echo '<h1>Thank you!</h1>
				<p style="text-align:center">Your item has been updated.</p><p><br /></p>';	

			} else { // If it did not run OK.

				// Public message:
				echo '<h1>System Error</h1>
				<p class="error" style="text-align:center">Your item could not be changed due to a system error. We apologize for any inconvenience.</p>'; 
	
				// Debugging message:
				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
	
			}

			mysqli_close($dbc); // Close the database connection.

			// Include the footer and quit the script (to not show the form).
			include ('includes/footer.html'); 
			exit();
				
		} else { // No ISBN
			echo '<h1>Error!</h1>
			<p class="error" style="text-align:center">The ISBN number does not match those on file.</p>';
		}
		
	} else { // Report the errors.

		echo '<h1>Error!</h1>
		<p class="error" style="text-align:center">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p style="text-align:center">Please try again.</p><p><br /></p>';
	
	} // End of if (empty($errors)) IF.

	mysqli_close($dbc); // Close the database connection.
		
} // End of the main Submit conditional.
?>
<h1>Update an Item</h1><br>
<h4 style="text-align:center"><i>Enter the serial number of the book you want to update and then fill up the other fields with the new information</i></h4>
 <p style="text-align:center"><i>If you don't know your serial number, you can find it <a href="view_books.php">here</a> </i></p>

<form action="update.php" method="post">

	<p>Serial Number: <input type="text" name="serial_number" size="6" maxlength="6" value="<?php if (isset($_POST['serial_number'])) echo $_POST['serial_number']; ?>"  /> </p>
	<h4>New info:</h4>
	<p>Item's Name: <input type="text" name="item_name" size="15" maxlength="20" value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>"  /></p>
	<p>Description: <input type="text" name="description" size="100" maxlength="100" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"  /></p>
	<p>Price: <input type="text" name="price" size="10" maxlength="20" value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>"  /></p>	
   
	<p><button type="submit" name="submit" class="btn btn-primary">Update Item</button></p>
</form>
<?php include ('includes/footer.html'); ?>