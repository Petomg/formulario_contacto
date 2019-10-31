<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once './models/contact_model.php';
	require_once './controller/server_verif.php';
	$connect = new ContactModel();
	$arr = $connect->get_inquiries();
	$arr2 = $connect->get_users();

	#print_r($arr2);
	if(verif_user('asd', 'asd', 'peto@gmail.com','asd')){
		echo "sirve";
	}
		
?>
