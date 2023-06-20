<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
 $query= 'select * from feedback';
 $result = mysqli_query($con, $query);
?>
   
  <main>
  <div class="list feedback">
        
        <?php
        while($row= mysqli_fetch_assoc($result)){
            ?> 
            <div class="line feedback">
            <div class="username">
                <p>-<?php echo $row['name']; ?></p>
            </div>
            <div class="message">
                <p><?php echo $row['msg']; ?> </p>
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