<?php


include ('db.php');

			
			$id2 =$_GET['eid'];
			$newsql ="DELETE FROM `user` WHERE id ='$id2' ";
			if(mysqli_query($con,$newsql))
				{
				echo' <script language="javascript" type="text/javascript"> alert("User name and password Added") </script>';
							
						
				}
		//	header("Location: usersetting.php");
		
?>


