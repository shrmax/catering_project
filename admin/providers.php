<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
 $query= 'select * from providers';
 $result = mysqli_query($con, $query);
?>
   

   <main>
   <div class="list">
        <div class="fields">
           <div class="name">
              <p>Name</p>
            </div>
            <div class="owner">
                <p>Owner</p>
            </div>
            <div class="email">
                <p>Email</p>
               </div>
               <div class="address">
                   <p>Address</p>
               </div>
            <div class="phone">
                <p>Contact Number</p>
            </div>
        </div>
        <!-- datas -->
        <?php
        while($row= mysqli_fetch_assoc($result)){
            ?> 
             <div class="line">
            <div class="name">
                <p><?php echo $row['name']; ?></p>
            </div>
            <div class="owner">
            <p><?php echo $row['owner_name']; ?></p>
            </div>
            <div class="email">
            <p><?php echo $row['email']; ?></p>
            </div>
            <div class="address">
               <p><?php echo $row['address']; ?></p>
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

      <div class="buttons">
          <a href="include/insert.php"><button class="button_i">Insert</button></a>
          <a href="#"><button class="button_d">Delete</button></a>

       </div>
      
  <?php
  include_once 'partial/footer.php';
  ?>