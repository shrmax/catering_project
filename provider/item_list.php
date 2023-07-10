<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
//  error_reporting(E_ERROR | E_PARSE);
  // echo $_SESSION['table'];
  $query= 'select * from '.$_SESSION['table'];

  $result = mysqli_query($con, $query);
?>
  
    <div class="items rows">
        <p>Select All</p>
        <input type="checkbox" class="large" name="" id="foo" onclick="selectall(this)" >
        
    </div>
   

   <div class="list">
   
        <div class="fields">
          <table>
            <thead>
                <!-- <th>id</th> -->
                <th>image</th>
                <th>name</th>
                <th>discription</th>
                <th>price</th>
                <th>select</th>
            </thead>
          </table>
        </div>
        <!-- datas -->
        <form action="include/add_items.php" method="post" id="form">
            <?php
            while($row= mysqli_fetch_assoc($result)){
              ?> 
                <div class="line">
                  <table>
                  <tr>
                <td >
                 <img src=<?php echo "../admin/itemimages/".$row['image']; ?> alt="" height="70px">        
            </td>
                <td >
                <p><?php echo strtoupper($row['name']); ?></p>
            </td>
                <td >
                  <p><?php echo $row['description']; ?></p>
            </td>
            <td>
              <input type="text" name="price[]" id="" class="price" value="50" >
            </td>
              <td>
                <input type="checkbox" class="large" name="foo[]" value="<?php echo $row['id']; ?>">
              </td>
            </tr>  
          </table>
        </div>
        <?php
            }
            ?>
            </div>
          </form>

           
          <div class="buttons">
          <a href="manage_items.php"><button class="back">Back</button></a>
              <button type="sumbit" name="submit" class="button_add" form="form" value="hello">ADD</button>
          </div>
            
       
      
  <?php
  if (isset($_GET["error"])){
    if ($_GET["error"]== "none"){
        echo "<script>alert('itmes added succesfully.')</script>";
    }
    else
    echo "<script>alert('Sql Error.')</script>";
    
}
  include_once 'partial/footer.php';
  ?>
 