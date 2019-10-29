<?php 
	class ConnectionDB{

		private $server, $username, $password, $dbname;

		public function __construct(){
			$dbconfig = require_once 'config_db.php';

			$this->server = $dbconfig["server"];
			$this->username = $dbconfig["username"];
			$this->password = $dbconfig["password"];
			$this->dbname = $dbconfig["dbname"];
		}

		public function connection(){

			try {
			
				$pdo = new PDO("mysql:host=$this->server;dbname=$this->dbname", $this->username, $this->password);

				#PDO va a tirar un PDOException ademas del codigo de error
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				
				$pdo->exec("SET CHARACTER SET UTF8");

				echo("conexion ok");
				
			} catch (PDOException $e) {
				#Redirigir a pagina de error
				header('Location: /formulario_contacto/general/error_page.html');
				die("Error" . $e->getMessage());
			}

			return $pdo;

		}
	}
?>