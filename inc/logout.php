<?php 
session_start();
unset($_SESSION['userweb']);
unset($_SESSION["userlevel"]);
session_unset();
session_destroy();
header('location:../');
?>
