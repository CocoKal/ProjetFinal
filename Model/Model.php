<?php
	class Model{
		private $bd;
		public function __construct(){
			//Pour récupérer les valeurs $login et $password
			$login="root";
			$password="";
			try{
				$this->bd = new PDO('mysql:host=localhost;dbname=site',$login,$password);
				$this->bd->query('set NAMES utf8');
				$this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e){
				die("Erreur numéro " . $e->getCode() . " : " . $e->getMessage());
			}
		}

}

?>
