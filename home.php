
<?php

	//require ('includes/config.inc.php'); 

	// Set the page title and include the HTML header:
	
	$page_title = 'Welcome to this Site!';
	include ('includes/header.html');

	// Welcome the user (by name if they are logged in):

	echo '<h1 class="h1_maintitle">Welcome';
	if (isset($_SESSION['first_name'])) {
		echo ", {$_SESSION['first_name']}";
	}
	echo '!</h1>';
?>




<body>
	<h2 style="text-align:center">You have successfully logged in to Andrea Dichiara's Content Management System!</h2>
	<br>
	<h3>Find the instructions on how to operate it below:</h3>
	<p>
		This content management system has been created to allow you, the administrator, to manipulate the information displayed on the main website andreadichiara.com. <br/>
		You will find a list of tools in the navigation list menu on the top left. <i>Below, we will give a quick overview of each of the functions</i>
	</p>
	<p>
		<ul>
			<li><b>Add an Item:</b> This function will give you the opportunity to add an item to the database. You will need to fill up a simple form and upload an image which will be stored in the database and displayed on the main site.</li>
			<br><li><b>View Items:</b> This function will display all of the items currently in the database with an overview of information.</li>
			<br><li><b>Update an Item:</b> This function allows you to modify existing items in the database. You need to know the item serial number in order to use this function.</li>
			<br><li><b>Delete an Item:</b> This function lets you delete an item from the database. All you need to know is just the serial number, fill up a small form, and that's it! Record of that item will be gone!</li>
		</ul>
	</p>
	<br><br>
	<p> <b><i>This content management system is still in its Beta stages, which means that more features will be added in the future.</i></b></p>
	



	
<!--	
	<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="A4CUM77HV84KS">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>

	<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
		">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_viewcart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
-->
<?php include ('includes/footer.html'); ?>