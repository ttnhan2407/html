<?php
if(isset($_GET['maph'])){
	include_once("controller/users_controller.php");
	$c_admin =  new users_controller();
	$maph = $_GET['maph'];
	$delete = $c_admin->xoaPhanHoi($maph);
}	
?>