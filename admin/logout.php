<?php
session_start();
unset($_SESSION["user"]); //LOGOUT AND REDIRECT TO INDEX PAGE
header("location: ../index.php");
exit;
?>