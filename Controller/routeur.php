<?php
class Router{
	public function routeReq() //definir quel controller il va inclure selon l'action de l'utilisateur
     {
     if (isset($_GET['log'])){
			 session_destroy();
			 setcookie('id', "", time() - 1, null, null, false, true);
			 setcookie('username', "", time() - 1, null, null, false, true);
			 setcookie('userlevel', "", time() - 1, null, null, false, true);
    	 header("location:index.php");
		 }

    if(isset($_GET['view'])){
      require ('Controller/controller'.$_GET['view'].'.php');
     }
		 else{
       require ('Controller/controller.php');
     }
}
}

?>
