<?php include ('includes/mainheader.html');
?>

      
<!--header-->
<header>
    <br/>
        <div class="jumbotron">
        <div class="container">
        <div class="row">
				<div class="col-md-6">
					<form action="contactus.php" method="post">
					<p>Name: <input type="text" name="name" size="20" maxlength="20" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"/> </p>
					<p>E-mail: <input type="email" name="email" size="30" maxlength="30" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/> </p>
					<p>Subject: <input type="text" name="subject" size="50" maxlength="50" value="<?php if (isset($_POST['subject'])) echo $_POST['subject']; ?>"/> </p> 
					<p>Message: <input type="textarea" name="message" size="500" maxlength="500" value="<?php if (isset($_POST['message'])) echo $_POST['message']; ?>"  /></p>
					
					<p><button type="submit" name="submit" class="btn btn-primary">Send Message</button></p>
					</form>
				</div>

				<div class="col-md-6">
					<h1 class="h1_maintitle"> Send Me a Message! </h1>
					<h3>I will be happy to get back to you soon.</h3>
					<p>
						Thank you for visiting my site and showing interest in my products. Please feel free to message me with any questions you might have. Don't forget you can also
						find me on all social media. Have a great day!
					</p>
					
					<p>
						<b>IMPORTANT NOTICE: </b> The contact us form doesn't work at this moment. We are working with our team to make sure we get this feature in our next update. 
					</p>
				</div> 
            </div>
            
        </div>
		</div>
    </header>

<?php include ('includes/mainfooter.html');?>