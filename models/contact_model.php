<?php 

	Class ContactModel {

		private $connectdb;
	
		public function __construct(){
			#TODO: Arreglar el tema este de los path, que calcule el path dinamicamente
			require_once '/var/www/html/formulario_contacto/general/connection_db.php';

			$connectInst = new ConnectionDB();
			$this->connectdb = $connectInst->connection(); #La variable con mi instancia de PDO
		}

		public function setInquiry($inquiryVector){
			$query = "INSERT INTO inquiries(user_id, title, type, message, inquirie_date) VALUES (:user_id, :title, :type, :message, :inquirie_date)";

			#Se usa prepare y placeholders para intentar prevenir SQL injection.		  
			$stmt = $this->connectdb->prepare($query);
			
			$stmt->execute($inquiryVector);		  
		}

		public function setUser($userVector){
			$query = "INSERT INTO users(first_name, last_name, email, company) VALUES (:first_name, :last_name, :email, :company)";

			$stmt = ($this->connectdb)->prepare($query);
			
			$stmt->execute($userVector);
		}

	}
?>