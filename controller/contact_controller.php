<?php 
	session_start(); #inicializo una session para pasar mensajes de formulario
	require_once '/var/www/html/formulario_contacto/models/contact_model.php';
	require_once '/var/www/html/formulario_contacto/views/contact_view.php';
	require_once 'server_verif.php';
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$date = date('Y-m-d H:i:s', time());
		print_r($_POST);
		if (verif_user($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['company']) #Esta condicion larga
			&& verif_inquirie($_POST['title'], $_POST['inq_type'], $_POST['message'])){				  # no me agrada

				$db = new ContactModel();

				//Submiting users
				$user_data = array(
							':first_name' => $_POST['first_name'],
							':last_name' => $_POST['last_name'],
							':email' => $_POST['email'],
							':company' => $_POST['company']
							);
				
				$db->set_user($user_data);
				
				//Submiting inquiries
				$users_db = $db->get_users();
				$last_user_id = $users_db[sizeof($users_db) - 1]['user_id']; //Obtengo el id del usuario que puse recien


				$inquiry_data = array(
								':user_id' => $last_user_id,
								':title' => $_POST['title'],
								':type' => $_POST['inq_type'],
								':message' => $_POST['message'],
								':inquirie_date' => $date,	
								);
				
				$db->set_inquiry($inquiry_data);

				$_SESSION['form_msg'] = 'Su mensaje fue enviado.';
				
		} else {
			$_SESSION['form_msg'] = 'Alguno de los datos introducidos no es valido.';
		}

	}

	header('Location: /formulario_contacto/views/contact_view.php');
	die();
?>