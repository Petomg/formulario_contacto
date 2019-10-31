<?php 
	require_once '/var/www/html/formulario_contacto/models/contact_model.php';
	require_once '/var/www/html/formulario_contacto/views/contact_view.php';
	require_once 'server_verif.php';
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$date = date('Y-m-d h:i:s', time());
		print_r($_POST);
		if (verif_user($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['company'])
			&& verif_inquirie($_POST['title'], $_POST['inq_type'], $_POST['message'])){

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

				echo "COMPLETADO";
				//TODO: Mandar con mensaje de completado
		} else {

			//TODO: Mandar error por $_SESSION a view
			echo "NO DATOS VALIDOS";
		}

	} else {
		echo "NO ENTRA POR POST";
	}
	//header('/www/var/html/formulario_contacto/views/contact_view.php');
	//die();
?>