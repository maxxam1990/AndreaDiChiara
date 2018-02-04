<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';
include ('includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
		
	$serialnumber = $_POST['serial_number'];
	$image = basename( $_FILES["fileToUpload"]["name"]);
	$itemname = $_POST['item_name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	

	// UPLOAD SECTION
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if(isset($_POST["submit"])) {
			$uploadOk = 1;
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	
	
	
	
	
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
	
		// Register the book in the database...
		
		// Make the query:
		$q = "INSERT INTO items (serial_number, image_url, item_name, description, price) VALUES ('$serialnumber', '$image', '$itemname', '$description', '$price')";
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h1>Thank you!</h1>
		<p style="text-align:center">Your item is now added to the database!</p><p><br /></p>';	
		
		} else { // If it did not run OK.
			
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not add this book due to a system error. We apologize for any inconvenience.</p>'; 
			
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		include ('includes/footer.html'); 
		exit();
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.
	
	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>
<h1>Add an Item</h1>
<h3 style="text-align:center"><i>Add a new item to the database!</i></h3>
<form action="addbook.php" method="post" enctype="multipart/form-data">


	<p>Serial Number: <input type="text" name="serial_number" size="6" maxlength="6" value="<?php if (isset($_POST['serial_number'])) echo $_POST['serial_number']; ?>"  /> </p>
	<p>Image:    <i>Select image to upload:</i>
    <input type="file" name="fileToUpload" id="fileToUpload"> </p>
	<p>Item's Name: <input type="text" name="item_name" size="15" maxlength="20" value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>"  /></p>
	<p>Description: <input type="text" name="description" size="100" maxlength="100" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"  /></p>
	<p>Price: <input type="text" name="price" size="10" maxlength="20" value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>"  /></p>	
   
	<p><button type="submit" name="submit" class="btn btn-primary">Add Item</button></p>
</form>
<?php include ('includes/footer.html'); ?>