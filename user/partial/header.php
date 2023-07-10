<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS.css">    
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
                <li><a href="online_booking.php"> Catering booking</a></li>
                <?php
                 if (isset($_SESSION["userid"]))
                 echo ' <li><a href="mybookings.php">My Bookings</a></li>';
                 else
                 echo ' <li><a href="#">My Bookings</a></li>';
                ?>
               
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="#"></a></li>
                <?php
                if (isset($_SESSION["userid"])){
                    
include_once 'include/dbh.inc.php';
$sql='select * from signup where usr_id='.$_SESSION['userid'].';';
$result= mysqli_query($con,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        $image=$row['image'];
                    echo "<li><a href='profile.php'><img src='profileimages/".$image."' alt=''></a></li>";
                    }
                }
                else {
                    echo "<li><button class='login-button'>Login</button></li>";
                }
                ?>  
                <!-- <li><button class="login-button" >Login</button></li> -->
            </ul>
        </nav> 
    </div>
</header>
<div class="wrapper">
        <span id="icon-close" class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
        <!-- user login page -->
        <div class="box_login">
                <div class="clients">
                <span ><a href="#" >user</a></span>
                <span class=vendorlink><a href="#" >provider</a></span>
            </div>
            <h2>user Login</h2>
            <form action="include/login.inc.php" method="post">
               <!-- name -->
               <div class="inputbox">
                 <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                        </span>
                    <input type="text" name="name" id="name"  required  >
                    <label for="">name or email</label>
                </div>
                <!-- password -->
                <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" name="psw" id="psw" required>
                    <label for="">password</label>
                </div>
                <!-- login button -->
                <button type="submit" class="btn" name="submit">Login</button>
                <!-- msg -->
                <div class="register">
                    <p>Don't have an account? &nbsp;<a href="#" class="register-link">Register</a></p>
                    <p>Are you admin? &nbsp;<a href="../admin/index.php" class="register-link">Admin</a></p>
                </div>
                <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"]== "namedontexist"){
                        echo "<script>alert('name dont exist.')</script>";
                    }
                    if ($_GET["error"]== "pwddontmatch"){
                        echo "<script>alert('password dont match.')</script>";
                    }
                }
                ?>
            </form>
        </div>
        <!-- register -->
        <div class="box_register">
            <h2>Register</h2>
            <form action="include/signup.inc.php" method="post" id="register_form">
                <!-- name -->
                <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input type="text" name="name" id="rname" minlength="3" pattern="^[A-Za-z]{3}.*$" required>  
                    <label for="">name</label>
                </div>
                <!-- Phone no -->
                <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="call-outline"></ion-icon>
                    </span>
                    <input type="tel" name="phone_no" id="rphone_no"  required pattern="[6789][0-9]{9}" >
                    <label for="">phone number</label>
                </div>
                <!-- email -->
                <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <input type="email" name="email" id="remail"  required  >
                    <label for="">email</label>
                </div>
                <!-- password -->
                <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="text" name="psw" id="psw"  minlength="8" required>
                    <label for="">password</label>
                </div>
                <!-- repeat password -->
                <!-- <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="text" name="repeat_psw" id="rpsw" minlength="8" required>
                    <label for="">repeat password</label>
                </div> -->
                <button type="submit" class="btn" name="submit">Register</button>
                <div class="register">
                    <p>Already have an account? &nbsp;<a href="#" class="login-link">Login</a></p>
                </div>
                <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"]== "emptyinput"){
                        echo "<script>alert('fill all the fields.')</script>";
                    }
                    else if ($_GET["error"]== "namehastaken"){
                        echo "<script>alert('name is already taken or user with given email already exist.')</script>";
                    }
                    else if ($_GET["error"]== "none"){
                            echo "<script>alert('You registered successfully.')</script>";
                    }
                   
                
                }
                ?>
            </form>
        </div>
         <!-- provider login page -->
         <div class="vendor_login">
                <div class="clients">
                <span class=userlink><a href="#" >user</a></span>
                <span ><a href="#" >provider</a></span>
            </div>
            <h2>Provider Login</h2>
            <form action="../provider/include/login.inc.php" method="post">
               <!-- name -->
               <div class="inputbox">
               <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input type="text" name="vname" id="vname"  required  >
                    <label for="">name or email</label>
                </div>
                <!-- password -->
                <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" name="vpsw" id="vpsw" required>
                    <label for="">password</label>
                </div>
                <!-- login button -->
                <button type="submit" class="btn" name="submit">Login</button>
                <!-- msg -->
                <!-- <div class="register">
                    <p>Don't have an account? &nbsp;<a href="#" class="register-link">Register</a></p>
                </div> -->
            </form>
        </div>
        <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"]== "blocked"){
                        echo "<script>alert('You have been blocked by the admin.')</script>";
                    }
                }
                ?>
   </div>