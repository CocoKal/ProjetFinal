<?php

if (!isset($_SESSION["username"])) {
	$bool=false;
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

 		if($_POST['password']!== $_POST['confirm_password']){
 			echo "<script>alert('Veuillez confirmer le mot de passe.');</script>";
 		}
		else{
 			$users = $model->get_all_user();
			$id=0;

  		foreach ($users as $u){
        if($u['email'] == $_POST['email'] ){
        	echo  "<script>alert('Email déjà utilisé.');</script>";
        	$bool = true;
        }
      }

      if(!$bool){
				$username = $_POST["lastname"]." ".$_POST["firstname"];
				$userlevel = !empty($model->get_admin_id_by_user($id));
				$_SESSION["username"] = $username;
				$_SESSION["userlevel"] = $userlevel;
      $ajout = $model->add_user($_POST['lastname'],$_POST['firstname'],$_POST['email'],password_hash($_POST['password'], PASSWORD_DEFAULT));
      header("location:index.php");
    	}
			else{
     	echo  "<script>alert('Des champs sont incomplet.');</script>";
    	}

  	}
	}
}
else {
	echo"<script>alert('Vous êtes déjà connecté.')</script>";
	header('Refresh: 1; url=index.php');
}
?>
