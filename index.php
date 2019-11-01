<?php
	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once './models/contact_model.php';
	require_once './controller/server_verif.php';
	$connect = new ContactModel();
	$arr = $connect->get_inquiries();
	$arr2 = $connect->get_users();
	echo $_SESSION['form_msg'];
	//print_r($arr2[sizeof($arr2) - 1]['user_id']);
	//if(verif_inquirie('asd', 'asd', 'asd')){
	//	echo "sirve";
	//}
	unset($_SESSION['form_msg']);
		
?>
