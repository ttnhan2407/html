<?php
if(isset($_GET['maph'])){
	$maph = $_GET['maph'];
	//echo "<script type='text/javascript'>alert('$maph');</script>";
	
	include_once("controller/users_controller.php");
	$c_admin =  new users_controller();
	$msg = $c_admin->check_read($maph);
}
?>