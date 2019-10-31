<?php 

function is_valid_name($value){
	$valid = true;

	if(!(strlen($value) > 0 && strlen($value) < 60)){
		$valid = false;
	}elseif (preg_match('~[0-9]~', $value) || !ctype_alnum($value)) { // Verifica que no tenga valores numericos
		$valid = false;
	}

	return $valid;

}

function aux_verif_email($value){
	$valid = true;
	$username = substr($value, 0, strpos($value, '@'));
	$domain = substr($value, strpos($value, '@') + 1);
	if(strlen($username) < 1 || strlen($domain) < 3){
		$valid = false;
	}elseif (!strpos($domain, '.')){ // si no encuentra '.' en domain tira false
		$valid = false;
	}elseif (strpos($domain, '@.') || strpos($domain, '..')) {
		$valid = false;
	}

	return $valid;
}


function is_valid_email($value){
	$valid = true;
	if(!(strlen($value) > 3 && strlen($value) < 255)){
		$valid = false;
	} else if (substr_count($value, '@') != 1 || substr_count($value, '.') == 0) {
		$valid = false;
	} else if (!aux_verif_email($value)){
		$valid = false;
	}

	return $valid;

}

function verif_user($fname, $lname, $email, $company){
	$valid = true;
	if(!(isset($fname) && isset($lname) && isset($email))){
		$valid = false;
	} else {
		if(!(is_valid_name($fname) && is_valid_name($lname))){
			$valid = false;
		} else if(isset($company) && !is_valid_name($company)){
			$valid = false;
		} else if(!is_valid_email($email)){
			$valid = false;
		}

	}
	return $valid;	
}

function verif_inquirie($title, $type, $message){ # Creo que no quiero muchas mas restricciones.
	$valid = true;
	if(!(isset($title) && isset($type) && isset($message))){
		$valid = false;
	} elseif (strlen($title) < 1 || strlen($title) > 120){
		$valid = false;
	} elseif (strlen($message) < 1 || strlen($message) > 120){
		$valid = false;
	} elseif (strlen($type) < 1 || strlen($type) > 120) {
		$valid = false;
	}
	return $valid;
}
?>