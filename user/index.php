<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
 $query= 'select * from providers limit 6';
$result = mysqli_query($con, $query);
?>
   
   <div class="main">
    
    <div class="hello">
        <p>We make your event <span>delicious.</span></p>
    <?php
    // if (isset($_SESSION["userid"])){
    //     echo 'hello ' .$_SESSION["username"];
    // }
    // else{
    //     echo '';
    // }
    ?>
    <div class="search">
        <span><ion-icon name="search-outline" ></ion-icon></span>
        <form id="form" action="include/backend-script.php" method="post" style="width: 1000px;">
        <input type="text" id="search" name="search" placeholder="Search for your fovorite catering provider..">
        <button form="form" type="submit" name="submit"> search</button>
    </form>
    </div>
    <!-- hello user <br> -->
    </div>
    <p>favorites</p>
    <div class="collection">
<?php
while($row= mysqli_fetch_assoc($result)){
?>
<div class="provider">
<a class="a" href="provider_info.php?entry_id=<?php echo $row['id']; ?>">
    <div class="img">
     <img src="../provider/providerprofile/<?php echo $row['image']; ?>" alt="" >
    </div>
    <div class="ptext">
        <p class="pname pa" style="color:purple;"><?php echo $row['name']; ?></p>
       
    </div>

</a>
</div>


<?php
}

?>
</div>
<div class="about">
    <h1>about</h1>
<pre>
we host information about a combination of wedding vendors who can bring your dream of an extravagant wedding come alive! Whether you are looking for exotic, international cuisines or wish to organize a combination of feasts for your guest, you will find a variety of wedding catering vendors on the portal.

You can look at the profiles close to 100 wedding caterers from all over mangalore, read reviews about them and look at the pictures of their previous bookings to get some clarity. You can also avail an enhanced experience by using specific filters like city of your wedding, and price per plate, amongst other things. At Delight Bookings, you will find  caterers that provide an elaborate service- from exotic cuisines to Jain delicacies and exclusive street food and much more - Delight bookings is a one stop solution to all our food bookings!

And the best part - you can directly get in touch with your shortlisted vendors by the contact details available on their profiles, without any third-party intervention! At Delight bookings, we strive to make sure you choose a highly rated caterer by looking at their portfolio and reading reviews by their previous clients.
</pre>
</div>
  </div>
  <?php
  include_once 'partial/footer.php';
  ?>
  
