
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../CSS.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="titles">
        <p>Add New  Provider</p>
 </div>
<div class="wrapper active">

        <!-- register -->
        <div class="box_register">
            <h2>Add Provider</h2>
            <form action="signup.inc.php" method="post" id="register_form">
                <!-- name -->
                <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="business-outline"></ion-icon>
                    </span>
                    <input type="text" name="name" id="name" minlength="3"  required >
                    <label for="">name</label>
                </div>
                <!-- owner name -->
                <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input type="text" name="oname" id="oname" minlength="3"  required >
                    <label for="">owner name</label>
                </div>
                <!-- email -->
                <div class="inputbox">
                    <span class="icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <input type="email" name="email" id="email"  required  >
                    <label for="">email</label>
                </div>
                <!-- Phone no -->
                <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="call-outline"></ion-icon>
                    </span>
                    <input type="tel" name="phone_no" id="phone_no"  required pattern="[6789][0-9]{9}" >
                    <label for="">phone number</label>
                </div>
                <!-- address-->
                <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="location-outline"></ion-icon>
                    </span>
                    <input type="text" name="address" id="address"  required minlength="10">
                    <label for="">address</label>
                </div>
                <!-- password -->
                <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="text" name="psw" id="psw" required>
                    <label for="">password</label>
                </div>
               
                <button type="submit" class="btn" name="submit">ADD</button>

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
                        // header("location: ../providers.php");    
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