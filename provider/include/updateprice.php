<?php
session_start();    
if (isset($_POST["submit"])){ 
$veg = $_POST['vegp'];
$nonv = $_POST['nonvegp'];
$min = $_POST['min'];
$max = $_POST['max'];
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
edit($con,$veg,$nonv,$min,$max);
}

else{
    header("location: ../edit.php");    
}