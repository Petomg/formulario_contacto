<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	date_default_timezone_set('America/Los_Angeles');
	$date = date('Y-m-d h:i:s', time());

	require_once './models/contact_model.php';
	$connect = new ContactModel();
	$arr = $connect->get_inquiries();
	$arr2 = $connect->get_users();

	print_r($arr2);
?>
