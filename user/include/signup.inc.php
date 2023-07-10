<?php
if (isset($_POST["submit"])){
$name=$_POST["name"];
$phone_no=$_POST["phone_no"];
$email=$_POST["email"];
$pwd=$_POST['psw'];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';
// if (pwdmatch($psw,$repeat_psw)!== false){
//     header("location: ../index.php?error=passwordontmatch"); 
//     exit();  
// }
if (nameexist($con,$name,$email)!== false){
     header("location: ../index.php?error=namehastaken"); 
    exit;
}
createUser($con,$name,$phone_no,$email,$pwd);
// echo "it works";
} 
else{
    header("location: ../index.php?error=emptyinput");
    // echo "<script>alert('empty inputs.')</script>";
    exit;
}