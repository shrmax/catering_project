<?php
session_start();
 if(isset($_SESSION['id'])==false){
    header('location:../user/index.php');
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS.css">
    <!-- <script src="js/script.js"></script> -->
    
    <title>Food_in_Motion</title>
</head>
<body >
    <!-- header of the page -->
<header>
    <div class="container">
        <!--navigation -->
        <nav >
           <a href="adminindex.php"><img src="image/catering.png" class="logo"></a>
            <ul>
                <li><a href='adminindex.php'>Home</a></li>
                <li><a href='items.php'>Manage Items</a></li>
                <li><a href="providers.php">Manage Provider</a></li>
                <li><a href="users.php">Manage Users</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="feedback.php">User Feedbacks</a></li>
                <li><a href="include/logout.inc.php">Logout</a></li>
        
                <!-- <li><button class="login-button" >Login</button></li> -->
            </ul>
        </nav> 
    </div>
</header>
