<?php
session_start();
if (isset($_POST["submit"])){ 
$image = $_FILES['image']['name'];
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
foreach($_FILES['image']['name'] as $key=>$value){
$fileName = basename($_FILES['image']['name'][$key]);
move_uploaded_file($_FILES['image']['tmp_name'][$key],'../workimage/'.$fileName);
// echo $fileName;
workimage($con,strval($fileName));
}
header("location: ../profile.php?error=img");
}

else{
    header("location: ../workimage.php");    
}

