<?php
session_start();
if (isset($_POST["submit"])){
  $name = $_POST["name"];  
  $description = $_POST['discription'];  
  $image = $_FILES['image']['name']; 
  $id=$_POST['submit']; 
  // echo $name;
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
move_uploaded_file($_FILES['image']['tmp_name'],'../image/'.$_FILES['image']['name']);
// if($a)
// echo 'file uploaded'; 
// $img='foods_iamge/'.$image;
// echo '<img src= "$img" alt="">';
  additem($con,$name,$description,$image);
  // echo $name;
  // echo $image;
}

else{
    header("location: ../items.php");
}