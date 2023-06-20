<?php
if (isset($_POST["submit"])){
$name=$_POST["name"];
$owner=$_POST["oname"];
$email=$_POST["email"];
$phone_no=$_POST["phone_no"];
$address=$_POST["address"];
$pwd=$_POST['psw'];
// echo $name;
// echo $owner;
// echo $email;
// echo $phone_no;
// echo $address;
// echo $pwd;
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
if (providerexist($con,$owner,$email)!== false){
     header("location: insert.php?error=namehastaken"); 
    exit;
}
createProvider($con,$name,$owner,$phone_no,$email,$address,$pwd);
}
else{
    header("location: insert.php?error=emptyinput");
    // echo "<script>alert('empty inputs.')</script>";
    exit;
}