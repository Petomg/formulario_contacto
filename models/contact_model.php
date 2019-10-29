<?php 

	Class ContactModel {

		private $connectdb;
		private $users;
		private $inquiries;
	
		public function __construct(){
			#TODO: Arreglar el tema este de los path, que calcule el path dinamicamente
			require_once '/var/www/html/formulario_contacto/general/connection_db.php';

			$connect_inst = new ConnectionDB();
			$this->connectdb = $connect_inst->connection(); #La variable con mi instancia de PDO

			$this->users = array();
			$this->inquiries = array();
		}

		#Setters
		public function set_inquiry($inquiryVector){
			$query = "INSERT INTO inquiries(user_id, title, type, message, inquirie_date) VALUES (:user_id, :title, :type, :message, :inquirie_date)";

			#Se usa prepare y placeholders para intentar prevenir SQL injection.		  
			$stmt = $this->connectdb->prepare($query);
			
			$stmt->execute($inquiryVector);		  
		}

		public function set_user($userVector){
			$query = "INSERT INTO users(first_name, last_name, email, company) VALUES (:first_name, :last_name, :email, :company)";

			$stmt = $this->connectdb->prepare($query);
			
			$stmt->execute($userVector);
		}

		#Getters
		public function get_inquiries(){
			$query = "SELECT * FROM inquiries";
			$this->inquiries = $this->connectdb->query($query)->fetchAll(); #fetchAll() me va a dar un array con las filas;
			return $this->inquiries;	
		}

		public function get_users(){
			$query = "SELECT * FROM users";
			$this->users = $this->connectdb->query($query)->fetchAll();
			return $this->users;	
		}


	}
?>