<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
 $query= 'select * from events limit 3';
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
        <span><ion-icon name="search-outline"></ion-icon></span>
        <input type="search" placeholder="Search for provider, events">
        <button type="submit"> search</button>
    </div>
    <!-- hello user <br> -->
    </div>
    <p>Trending Events</p>
    <div class="collection">
<?php
while($row= mysqli_fetch_assoc($result)){
?>
<div class="provider b">
<div class="img a">
     <img src="../admin/eventimages/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>">
     <div class="eventname">
     <?php echo $row['name']; ?>
     </div>
    </div>
</div>


<?php
}
?>
</div>
  </div>
  <?php
  include_once 'partial/footer.php';
  ?>
  
