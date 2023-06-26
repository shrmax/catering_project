<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="CSS.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="title">
        <img src="image/catering.png" alt="">
        <p>Delight Bookings</p>
 </div>
<div class="wrapper">

        <!-- user login page -->
        <div class="box_login">
            <h2>Admin Login</h2>
            <form action="include/login.inc.php" method="post">
               <!-- name -->
               <div class="inputbox">
                 <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                        </span>
                    <input type="text" name="name" id="name"  required  >
                    <label for="">name</label>
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
</div>
<script src="js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>