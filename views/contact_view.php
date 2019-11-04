<?php 
	session_start();
	$form_msg = $_SESSION['form_msg'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario de contacto</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" type="text/css" href="../styles/contact_view.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>
		<div id='header'>
			<img src="../imgs/eire_logo.jpg">
			<nav role = "navigation">
				<div id="menuToggle">

					<input type="checkbox">

					<span></span>
					<span></span>
					<span></span>

					<ul id = "menu">
						<li><a href="">About</a></li>
						<li><a href="">News</a></li>
						<li><a href="">Careers</a></li>
						<li><a href="">Contact</a></li>
					</ul>
				</div>	
			</nav>
		</div>
		<div id='main_image'>
			<img src="../imgs/banner-ireland.jpg">
		</div>
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
				<p>All fields are required:</p>
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
					<option value="---" selected> --- </option>
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
			<div id="captcha">
				<p>Please tick the box to continue:</p>
				<div class="g-recaptcha" data-callback="verifyCaptcha" data-sitekey="6LeD2MAUAAAAALcwOj4nnroqNf3BjBYBCkgObZJa">
				</div>
			</div>
			<div>
				<button type="submit" id='send_button' disabled>Send Message</button>
			</div>
		</form>
	<!-- TODO: AGREGAR RECAPCHA -->
</body>

<script type="text/javascript" src="../scripts/verif_contact.js"></script>

</html>