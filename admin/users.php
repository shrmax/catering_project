<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
 error_reporting(E_ERROR | E_PARSE);
  $query= 'select * from signup';
  // echo $query;
  $result = mysqli_query($con, $query);
?>

  
   <main>
   <div class="list">
   
        <div class="fields name">
          <table>
            <thead>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>phone-number</th>
                <th></th>
            </thead>
          </table>
        </div>
        <!-- datas -->
        <?php
        while($row= mysqli_fetch_assoc($result)){
          ?> 
            <div class="line name">
              <table>
              <tr>
            <td class="name">
                <p><?php echo $row['usr_id']; ?></p>
        </td>
           
            <td >
            <p><?php echo $row['name']; ?></p>
        </td>
            <td class="text">
               <p><?php echo $row['email']; ?></p>
        </td>
            <td class="text">
               <p><?php echo $row['phone_no']; ?></p>
        </td>
        <td>
          <form action="include/blockuser.php" method="post">
            <?php
            if($row['status']!='blocked'){
                
            ?>
            <button type="submit" name="submit" class="button_delete uu" value="<?php echo $row['usr_id']; ?>">BLOCK</button>
            <?php
        }
        if($row['status']=='blocked'){
            ?>
            <button type="submit" name="unblock" class="button_delete uu" value="<?php echo $row['usr_id']; ?>">UNBLOCK</button>
            <?php
        }
            ?>
          </form>
        </td>
              </tr>  
            </table>
        </div> 
        <?php
        }
        ?>
        </div>
      </main>

      
  <?php
  if (isset($_GET["error"])){
    if ($_GET["error"]== "blocked"){
        echo "<script>alert('user blocked successfully.')</script>";
    }
    if ($_GET["error"]== "unblocked"){
        echo "<script>alert('user unblocked succesfully.')</script>";
    }
}
  include_once 'partial/footer.php';
  // tablename($_SESSION['table']);
  ?>