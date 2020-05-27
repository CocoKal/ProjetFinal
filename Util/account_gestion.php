<?php

if(isset($_POST['confirmation_button'])) {
    if (!empty($_POST['lastname']) and  !empty($_POST['firstname']) and  !empty($_POST['email'])){
            $ajout = $model->modify_user($_SESSION['id'], $_POST['lastname'], $_POST['firstname'], $_POST['email']);
            header("Location:index.php");
    }
}
?>
