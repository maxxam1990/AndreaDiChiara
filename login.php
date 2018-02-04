<?php
	require ('mysqli_connect.php'); // Statement used to connect to database.
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$e = null;
		$p = null;
		
		// Check for Username
		if (empty($_POST['username'])) {
			echo '<br/>
					  <p class="error" style="text-align:center">SYSTEM ERROR!</p>
					  <p class="error" style="text-align:center"><i>Login Failed.</i></p>
					  <br/>
					  <p class="error" style="text-align:center">You forgot your username. TRY AGAIN.</p>';			
		} else {
			$e = mysqli_real_escape_string($dbc, trim($username));
		}
		
		// Check for Password:
		if (empty($password)) {
			echo '<br/>
					<p class="error" style="text-align:center">SYSTEM ERROR!</p>
					<p class="error" style="text-align:center"><i>Login Failed.</i></p>
				  <br/>
					<p class="error" style="text-align:center">You forgot your password. TRY AGAIN.</p>';		
			} else {
			$p = mysqli_real_escape_string($dbc, trim($password));
		}
		
		if ($e != null && $p != null) {
			
		// Query the database:
		$q = "SELECT * FROM users WHERE username='$e' AND pass = '$p'";		
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

		if (@mysqli_num_rows($r) == 1) {
				// Register the values:
				session_start();
				$_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC); 
				$_SESSION['control'] = 1;
				mysqli_free_result($r);
				mysqli_close($dbc);
									
				// Redirect the user:
				$url = 'home.php'; // Define the URL.
				header("Location: $url");
				exit(); // Quit the script.
					
				} else { // No match was made.
					  echo '<br/>
					  <p class="error" style="text-align:center">SYSTEM ERROR!</p>
					  <p class="error" style="text-align:center"><i>Login Failed.</i></p>
					  <br/>
					  <p class="error" style="text-align:center">The username and password do not match our records. TRY AGAIN.</p>';			
				}
			} else { // If everything wasn't OK.
				
			}
		} else {	
		}
	mysqli_close($dbc);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Andrea DiChiara</title>	
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	</head>

	<body>	
		<div id="content"> <!-- Start of the page-specific content. -->
			<h1>Andrea DiChiara CMS</h1>
			<div class="primary-content t-border">
				<form action="login.php" method="POST">
					<h1 class="h1_form">Administrator Login</h1>
					<fieldset>
						<label for="username">Username:</label>
						<input type="text" id="username" name="username">  
						<label for="password">Password:</label>
						<input type="password" id="password" name="password">   
					</fieldset>
					<button type="submit" class="btn btn-primary">LOG IN</button>
				</form>    
			</div>
			<p style="text-align:center"><a href="index.php">Return to Main Website.</a></p>
		</div><!-- End .primary-content -->  	
		
		<footer class="main-footer"> 
			<p>&copy; 2017 Max Acosta &amp; Rahul Potluri</p> 
		</footer>	
	</body>
</html>