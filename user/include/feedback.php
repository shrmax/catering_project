<?php
session_start();
if (isset($_POST["submit"])){
$name=$_SESSION["username"];
$msg=$_POST["msg"];

// echo $name;
// echo $msg;
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
// if (pwdmatch($psw,$repeat_psw)!== false){
//     header("location: ../index.php?error=passwordontmatch"); 
//     exit();  
// }
feedback($con,$name,$msg);
}
else{
    header("location: ../index.php?error=emptyinput");
    // echo "<script>alert('empty inputs.')</script>";
    exit;
}