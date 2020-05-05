<?php
class Router{
	public function routeReq() //definir quel controller il va inclure selon l'action de l'utilisateur
     {
     	if (isset($_GET['log'])){
		//session_destroy();
		unset($_COOKIE['id']);
		setcookie('id','',time()-3600,'/');
    header("location:index.php");
}

          if(isset($_GET['view'])){
           require ('Controller/controller'.$_GET['view'].'.php');
     }else{
       require ('Controller/controller.php');
     }
}
}

?>
