<?php

    if (isset($_POST['lastname'])
    and !empty($_POST['lastname'])
    and isset($_POST['firstname'])
    and !empty($_POST['firstname'])
    and isset($_POST['email'])
    and !empty($_POST['email'])){

            $ajout = $model->modify_user($_COOKIE['id'], $_POST['lastname'], $_POST['firstname'], $_POST['email']);
            header("Location:index.php");

    }
    else {
      echo"<script>alert('Une erreur est survenue.')</script>";
      header('Refresh: 1; url=index.php?view=account');
    }
?>
