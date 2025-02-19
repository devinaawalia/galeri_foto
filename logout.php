<?php
session_start();
$_SESSION['Username']='';
unset($_SESSION['Username']);
session_unset();
session_destroy();
header('location:index.php');
?>