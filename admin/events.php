<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
 $query= 'select * from events';
 $result = mysqli_query($con, $query);
?>
   <main>
    <div class="list">
        <div class="fields">
            <div class="a">
                <p>Id</p>
            </div>
            <div class="a">
                <p>Image</p>
            </div>
            <div class="a">
                <p>Name</p>
            </div>
            <!-- <div class="phone">
                <p>Phone Number</p>
            </div> -->
        </div>
        <!-- datas -->
        <?php
        while($row= mysqli_fetch_assoc($result)){
            ?> 
             <div class="line">
            <div class="id">
                <p><?php echo $row['id']; ?></p>
            </div>
            <div class="image">
            <img src=<?php echo "../admin/eventimages/".$row['image']; ?> alt="" height="70px">
            </div>
            <div class="name">
            <p><?php echo $row['name']; ?></p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</main>
<div class="buttons">
      <a href="include/newevent.php"><button class="button_add" >add new event</button></a>
    </div>
  <?php
  include_once 'partial/footer.php';
  ?>
  