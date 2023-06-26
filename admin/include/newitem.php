
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
        <p></p>
 </div>
<div class="wrapper new">

        <!-- register -->
        <div class="box_register">
            <h2>Add New Item</h2>
            <form action="additem.php" method="post" enctype="multipart/form-data" >
                <!-- name -->
                <div class="inputbox">
                    
                    <input type="text" name="name" id="name" minlength="3"  required >
                    <label for="">name</label>
                </div>
                <!-- owner name -->
                <div class="inputbox">
                   
                    <input type="text" name="discription" id="oname" minlength="3"  required >
                    <label for="">discription</label>
                </div>
                <!-- email -->
                <div class="inputbox file">
                   
                    <input type="file" name="image" id="image"    >
                    <label for="">image</label>
                </div>
                
               
                <button type="submit" class="btn insert" name="submit">insert</button>

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
