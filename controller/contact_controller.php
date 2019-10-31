<?php 
	require_once('/var/www/html/formulario_contacto/models/contact_model.php')
	require_once('/var/www/html/formulario_contacto/views/contact_view.php')
	date_default_timezone_set('America/Los_Angeles');
	
	$db = new ContactModel();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
		$date = date('Y-m-d h:i:s', time());

		

	}

	header('/www/var/html/formulario_contacto/views/contact_view.php');
	die();
?>