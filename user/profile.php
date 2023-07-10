<?php 
include_once 'partial/header.php';
include_once 'include/dbh.inc.php';
$sql='select * from signup where usr_id='.$_SESSION['userid'].';';
$result= mysqli_query($con,$sql);
?>
 <!-- order form -->
 <div class="box_register order">
            <h2 style="font-size: 3em; color:#FB2576">Profile</h2>
            <?php
            while($row=mysqli_fetch_assoc($result)){
            ?>
            <section>
                <div class="profileimage">
                    <img src="profileimages/<?php echo $row['image']; ?>" alt="">
                </div>
                <div class="bb">
                    <!-- <input type="file" name="" id=""> -->
                   <a href="updateprofile.php"><button>add new image</button></a>
                    </div>
                <!-- name -->
                <div class="formdata">
                    <label for="">Name</label>
                    :   <p><?php echo $row['name']; ?></p>
                </div>
                <!-- Phone no -->
                <div class="formdata">
                    
                    <label for="">Phone Number</label>
                    : <p><?php echo $row['phone_no']; ?></p>
                </div>
                <!-- email -->
                <div class="formdata">
                   
                    <label for="">Email</label>
                    : <p><?php echo $row['email']; ?></p>
                </div>
                <div class="bb">
                <a href="changepsw.php"><button>change password</button></a>
                    </div>
                <div class="bb">
                    <a href='include/logout.inc.php'><button>logout</button></a>
                    </div>
                <!-- password -->
                <!-- repeat password -->
                <!-- <div class="inputbox">
                    <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="text" name="repeat_psw" id="rpsw" minlength="8" required>
                    <label for="">repeat password</label>
                </div> -->
                <!-- <button type="submit" class="btn" name="submit">Register</button> -->
                
                <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"]== "emptyinput"){
                        echo "<script>alert('fill all the fields.')</script>";
                    }
                    else if ($_GET["error"]== "newpsw"){
                        echo "<script>alert('new password is set successfully.')</script>";
                    }
                    else if ($_GET["error"]== "added"){
                            echo "<script>alert('image changed succesfully.')</script>";
                    }
                
                }
                ?>
            </section>
            <?php
            }
            ?>
        </div>
<?php 
include_once 'partial/footer.php';
?>