<?php 
	session_start();
	$form_msg = $_SESSION['form_msg'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario de contacto</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../styles/contact_view.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

</head>
<body>
	<form action="/formulario_contacto/controller/contact_controller.php" method="post" autocomplete="off">
		<div id="form_header">
			<h1 id='form_title'>Send Us an Email</h1>
			
			<?php if(isset($form_msg)){ ?> <!-- Perdon por este bloque de codigo -->		
				<div id='form_msg'>
					<p><?php echo($form_msg) ?></p>
				</div>
			<?php } 
				unset($_SESSION['form_msg']);
			 ?>

			<p>Please specify the nature of your request in the comment section</p>
			<p>All fields are required</p>
		</div>
		<div>
			<label for="first_name" class="contact_label">First Name</label>
			<input type="text" id="first_name" name='first_name' required>
		</div>
		<div>
			<label for="last_name" class="contact_label">Last Name</label>
			<input type="text" id="last_name" name='last_name' required>
		</div>
		<div>
			<label for="company" class="contact_label">Company</label>
			<input type="text" id="company" name='company' >
		</div>
		<div>
			<label for="title" class="contact_label">Title</label>
			<input type="text" id="title" name='title' required>
		</div>
		<div>
			<label for="email" class="contact_label">Email Address</label>
			<input type="text" id="email" name='email' required>
		</div>
		<div>
			<label for="inq_type" class="contact_label caja">Inquiry Type</label>
			<select id="inq_type" name='inq_type' required>
  				<option value="example1">example1</option> <!-- El atributo value me indica lo que se le envia al servidor -->
  				<option value="example2">example2</option> 
  				<option value="example3">example3</option>
  				<option value="example4">example4</option>
			</select>
		</div>
		<div>
			<label for="message" class="contact_label">Message</label>
			<textarea id="message" name="message" required></textarea>
		</div>
		<div>
			<button type="submit" id='send_button'>Send Message</button>
		</div>
	</form>
	<!-- TODO: AGREGAR RECAPCHA -->
</body>
</html>