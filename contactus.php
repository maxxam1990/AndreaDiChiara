<?php include ('includes/mainheader.html');

?>



<?php
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $template = "From: $name \nMessage: $message";
    $to = "informationsystemsproject2017@gmail.com";
    $subject = $_POST['subject'];;
    $header = "From: $email \r\n";
    mail($to, $subject, $template, $header) or die("Error!");
    echo "We Will Respond To Your Request Within 1-2 Business Days";
}
?>


      
<!--header-->
<header>
    <br/>
        <div class="jumbotron">
        <div class="container">
        <div class="row">
				<div class="col-md-6">
					<form action="contactus.php" method="post">
					<p>Name: <input type="text" name="name" size="20" maxlength="20" required value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"/> </p>
					<p>E-mail: <input type="email" name="email" size="30" maxlength="30" required value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/> </p>
					<p>Subject: <input type="text" name="subject" size="50" maxlength="50" required value="<?php if (isset($_POST['subject'])) echo $_POST['subject']; ?>"/> </p>
					<p>Message: <input type="textarea" name="message" size="500" maxlength="500" required value="<?php if (isset($_POST['message'])) echo $_POST['message']; ?>"  /></p>
					
					<p><button type="submit" name="submit" class="btn btn-primary">Send Message</button></p>
					</form>
				</div>

				<div class="col-md-6">
					<h1 class="h1_maintitle"> Send Me a Message! </h1>
				</div> 
            </div>
            
        </div>
		</div>
    </header>

<?php include ('includes/mainfooter.html');?>