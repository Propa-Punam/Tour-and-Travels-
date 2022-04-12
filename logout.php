<?php session_start();?>

<?php
$_SESSION["username"]="";
$_SESSION["usertype"]="";
$_SESSION["loginstatus"]="";

header("location:loginCookie.php");
?>