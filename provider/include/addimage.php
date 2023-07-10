<?php
session_start();
if (isset($_POST["submit"])){ 
$image = $_FILES['image']['name'];
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
move_uploaded_file($_FILES['image']['tmp_name'],'../providerprofile/'.$_FILES['image']['name']);
addprofile($con,$image);
}

else{
    header("location: ../updateprofile.php");    
}

