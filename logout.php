<?php 

session_start();
$_SESSION['control'] = 0;
unset($_SESSION);
session_destroy();
header("Location: login.php");

?>