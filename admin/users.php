<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
 $query= 'select * from signup';
 $result = mysqli_query($con, $query);
?>
   <main>
    <div class="list">
        <div class="fields">
            <div class="id">
                <p>Id</p>
            </div>
            <div class="name">
                <p>Name</p>
            </div>
            <div class="email">
                <p>Email</p>
            </div>
            <div class="phone">
                <p>Phone Number</p>
            </div>
        </div>
        <!-- datas -->
        <?php
        while($row= mysqli_fetch_assoc($result)){
            ?> 
             <div class="line">
            <div class="id">
                <p><?php echo $row['usr_id']; ?></p>
            </div>
            <div class="name">
            <p><?php echo $row['name']; ?></p>
            </div>
            <div class="email">
            <p><?php echo $row['email']; ?></p>
            </div>
            <div class="phone">
            <p><?php echo $row['phone_no']; ?></p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
   </main>
  <?php
  include_once 'partial/footer.php';
  ?>
  