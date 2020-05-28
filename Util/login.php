<?php

//Si l'utilisateur n'est pas connecté
if (!isset($_COOKIE["username"])) {
	//Valeur de bon déroulement du script
	$bool=false;
		 //Vérifiquation des valeurs en POST
     if(isset($_POST['email'])
		 and !empty($_POST['email'])
		 and isset($_POST['password'])
		 and !empty($_POST['password'])) {

		//Récupération des informations des users
 		$users = $model->get_all_user();

			//Pour chaque utilisateur
  		foreach ($users as $u){
				//Si les informations de connexion correspondent
        if($u['email'] == $_POST['email'] and password_verify($_POST['password'], $u['password'])){
					//Récupération de l'id de l'utilisateur
       		$id = $u["id"];
					//Préparation de l'usernam
					$username = $u["lastname"]." ".$u["firstname"];
					//Si la requete model n'est pas vide alors l'utilisateur est un admin
					$userlevel = !empty($model->get_admin_id_by_user($id));
					//Initialisation des 3 cookies
					setcookie('id', $id, time() + 365*24*3600, null, null, false, true);
					setcookie('username', $username, time() + 365*24*3600, null, null, false, true);
					setcookie('userlevel', $userlevel, time() + 365*24*3600, null, null, false, true);
					//Le script s'est bien déroulé
        	$bool = true;
					//Affichage d'une alert de connexion
          echo"<script>alert('Bienvenue ".$u['lastname']." ".$u['firstname']." !')</script>";
        }

      }

		//Si le script s'est bien déroule
    if($bool){
			//Redirection vers l'acceuil
    	header('Refresh: 1; url=index.php');
    }
		else {
			//Afficher une alert
			echo"<script>alert('Erreur d'email ou de mot de passe.')</script>";
		}
	}
}
//Si l'utilisateur est connecté
else {
	//Afficher une alert
	echo"<script>alert('Vous êtes déjà connecté.')</script>";
	//Redirection vers l'acceuil
	header('Refresh: 1; url=index.php');
}

?>
