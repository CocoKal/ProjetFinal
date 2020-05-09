<?php
	$bool=false;
     if(isset($_POST['email'])
		 and !empty($_POST['eamil'])
		 and isset($_POST['password'])
		 and !empty($_POST['password'])) {

 		$users = $model->get_all_user();

  		foreach ($users as $u){
        if($u['email'] == $_POST['email'] and password_verify($_POST['password'], $u['password'])){
       		$id = $u["id"];
        	$bool = true;
          echo"<script>alert('Bienvenue ".$u['lastname']+$u['firstname']." !')</script>";
        }
      }

      if($bool){
      $expire = time()+3600;
      setcookie('id',$id,$expire, '/');
      header('Refresh: 1; url=index.php');
    }
}
?>
