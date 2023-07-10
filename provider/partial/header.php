<?php
session_start();
 if(isset($_SESSION['providerid'])==false){
    header('location: ../../user/index.php');
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS.css">
    <script src="js/script.js"></script>
    
    <title>Food_in_Motion</title>
</head>
<body >
    <!-- header of the page -->
<header>
    <div class="container">
        <!--navigation -->
        <nav >
           <a href="index.php"><img src="image/catering.png" class="logo"></a>
            <ul>
                <li><a href='index.php'>Home</a></li>
                <li><a href="manage_items.php">Manage Items</a></li>
                <li><a href="manage_orders.php">Manage Orders</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="include/logout.inc.php">Logout</a></li>
        
                <!-- <li><button class="login-button" >Login</button></li> -->
            </ul>
        </nav> 
    </div>
</header>
