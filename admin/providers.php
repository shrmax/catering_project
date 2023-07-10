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
               <!-- <div class="address">
                   <p>Address</p>
               </div> -->
            <div class="phone">
                <p>Contact Number</p>
            </div>
            <div class="phone">
                
            </div>
        </div>
        <!-- datas -->
        <?php
        while($row= mysqli_fetch_assoc($result)){
            ?> 
             <div class="line name">
              <table>
              <tr>
            <td class="name">
                <p><?php echo $row['name']; ?></p>
        </td>
           
            <td >
            <p><?php echo $row['owner_name']; ?></p>
        </td>
            <td class="text">
               <p><?php echo $row['email']; ?></p>
        </td>
            <td class="text">
               <p><?php echo $row['phone_no']; ?></p>
        </td>
        <td>
           <form action="include/removeprovider.php" method="post">
            <div class="buttons">
     <button type="submit" class="button_d" name="submit" value="<?php echo $row['id']; ?>" style="width: 5rem;">Remove</button>
            </div>
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

      <div class="buttons ">
          <a href="include/insert.php"><button class="button_i">Add provider</button></a>
         

       </div>
      
  <?php
  if (isset($_GET["error"])){
    if ($_GET["error"]== "none"){
        echo "<script>alert('provider added succesfully.')</script>";
    }
    if ($_GET["error"]== "delete"){
        echo "<script>alert('provider removed succesfully.')</script>";
    }
}
  include_once 'partial/footer.php';
  ?>