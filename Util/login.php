<?php

if (!isset($_SESSION["username"])) {
	$bool=false;
     if(isset($_POST['email'])
		 and !empty($_POST['email'])
		 and isset($_POST['password'])
		 and !empty($_POST['password'])) {

 		$users = $model->get_all_user();

  		foreach ($users as $u){
        if($u['email'] == $_POST['email'] and password_verify($_POST['password'], $u['password'])){
       		$id = $u["id"];
					$username = $u["lastname"]." ".$u["firstname"];
					$userlevel = !empty($model->get_admin_id_by_user($id));
					$_SESSION["username"] = $username;
					$_SESSION["userlevel"] = $userlevel;
        	$bool = true;
          echo"<script>alert('Bienvenue ".$u['lastname']." ".$u['firstname']." !')</script>";
        }

      }

    if($bool){
    	header('Refresh: 1; url=index.php');
    }
		else {
			echo"<script>alert('Erreur d'email ou de mot de passe.')</script>";
		}
	}
}
else {
	echo"<script>alert('Vous êtes déjà connecté.')</script>";
	header('Refresh: 1; url=index.php');
}

?>
