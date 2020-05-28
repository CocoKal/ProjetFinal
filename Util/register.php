<?php

//Si l'utilisateur n'est pas connecté
if (!isset($_COOKIE["username"])) {
	//Valeur de bon déroulement du script
	$bool=false;
	//Vérifiquation des valeurs en POST
     if(isset($_POST['firstname'])
		 and !empty($_POST['firstname'])
		 and isset($_POST['lastname'])
		 and !empty($_POST['lastname'])
		 and isset($_POST['email'])
		 and !empty($_POST['email'])
		 and isset($_POST['password'])
		 and !empty($_POST['password'])
		 and isset($_POST['confirm_password'])
		 and !empty($_POST['confirm_password'])  ) {

		//Si les mot de passe ne concordent pas
 		if($_POST['password']!== $_POST['confirm_password']){
			//Afficher une alert
 			echo "<script>alert('Veuillez confirmer le mot de passe.');</script>";
 		}
		//Si les mots de passes concordent
		else{
			//Récupérer tous les utilisateurs
 			$users = $model->get_all_user();

			//Boucle sur tous les utilisateurs
  		foreach ($users as $u){
				//Vérifiquation du mail
        if($u['email'] == $_POST['email'] ){
        	echo  "<script>alert('Email déjà utilisé.');</script>";
        	$bool = true;
        }
      }

			//Si le script s'est bien déroulé
      if(!$bool){
				//Ajout de l'utilisateur dans la base de données
      	$ajout = $model->add_user($_POST['lastname'],$_POST['firstname'],$_POST['email'],password_hash($_POST['password'], PASSWORD_DEFAULT));
				//Redirection vers l'acceuil
				header("location:index.php");
    	}
			//Si le script ne s'est pas bien déroulé
			else{
				//Afficher une alert comme quoi un champ est incomplet
     		echo  "<script>alert('Des champs sont incomplet.');</script>";
    	}

  	}
	}
}
//Si l'utilisateur est deja connecté
else {
	//Afficher une alert
	echo"<script>alert('Vous êtes déjà connecté.')</script>";
	//Redirection vers l'acceuil
	header('Refresh: 1; url=index.php');
}
?>
