<?php

class conectar{
	protected $dbh;
	protected function conexion(){
		try{
			$conectar = $this -> dbh = new PDO("mariadb:local=localhost;dbname=proyecto_usuario","root","");
			return $conectar;
		}
		catch(exception $e){
			print("conexion fallida" . $e -> getMessage()."<br>");
			die();
		}
	}
	public function set_names(){
		return $this->dbh->query("SET NAMES 'utf8'");
	}

	/*TODO: Ruta principal del proyecto */
	public static function ruta(){
		//QA
		return "http://localhost/Proyecto";
	}
}
session_start();

?>