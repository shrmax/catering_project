<?php
include_once 'partial/header.php';
?>

<div class="contact">
    <h2>Contact Us</h2>
    <div class="contactinfo">
       <div class="box">
            <span class="icon">
                    <ion-icon name="call-outline"></ion-icon>
            </span>
                <div class="text">
                    <h3>Phone</h3>
                    <p>867-665-6381</p>
                </div>
       </div> 
        <div class="box">
                 <span class="icon">
                    <ion-icon name="mail-outline"></ion-icon>
                 </span>
                <div class="text">
                    <h3>Email</h3>
                    <p>sha@gmail.com</p>
                </div>
        </div> 
        <?php
                if (isset($_SESSION["userid"])){
                    echo '<form action="include/feedback.php" method="post">';
                }
                else {
                    echo '<form action="javascript:void(0);" method="post">';
                    // echo "<script>alert('Message send succesfully')</script>";
                }
                ?>
            <p>Type Your Message Here</p>
            <textarea class="longInput" cols="50" rows="50" class="msg" placeholder="your message" name="msg"></textarea>
            
            <input type="submit" id="submited" value="submit" name="submit">
            
            <?php
            if (isset($_GET["error"])){
                if ($_GET["error"]== "nothing"){
                    echo "<script>alert('Message send succesfully')</script>";
                }
            }
            ?>
        </form>
    </div>
     
</div>
<?php
include_once 'partial/footer.php';
?>