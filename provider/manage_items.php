<?php
 include_once 'partial/header.php';
 include_once 'include/dbh.inc.php';
 $_SESSION['table'] = $_POST["color"];
 if ($_SESSION['table'] == ""){
   $_SESSION['table'] = "veg_items";
  }
  $provider='providers_'.$_SESSION['table'];
  echo $provider.'<br>';
?>

   <form action="manage_items.php" method="post" id=form> 
   </form>
    <div class="items">
        <p>Select the item category</p>
        <button form="form" type="submit" name="color" value="veg_items">veg</button>
        <button form="form" type="submit" name="color" value="non_veg_items">non-veg</button>
        <button form="form" type="submit" name="color" value="juice_items">drinks</button>
        <button form="form" type="submit" name="color" value="deserts_items">desert</button>
    </div>
  
   

   <div class="list">
   
        <div class="fields">
          <table>
            <thead>
              <th>image</th>
              <th>name</th>
              <th>description</th>
                <th>price/plate</th>
                <th>delete</th>
            </thead>
          </table>
        </div>
        <!-- datas -->
        <form action="include/remove.php" method="post" id="form1">
          <?php
         
           // SELECT a.image, a.name, a.description, p.price FROM `veg_items` a 
           // JOIN `providers_veg_items` p
           // ON a.id=p.veg_id
           // WHERE p.providers_id=1;
           $query= 'select a.image, a.name, a.description, p.price, p.id from '.$_SESSION['table'].' a join '.$provider.' p on p.item_id=a.id where p.providers_id='.$_SESSION['providerid'].';';
          //  echo $query;
           $result = mysqli_query($con, $query);
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
                  <p><?php echo $row['price']; ?></p>
                </td>
                <td>
                  <button type="submit" class="close" name="close" form="form1" value="<?php echo $row['id']; ?>">
                  <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
                  </button>
                </td>
              </tr>  
            </table>
          </div>
          <?php
            }
            ?> 
          </form>
          
        </div>
      <div class="buttons">
          <a href="item_list.php"><button class="button_add" >Add Item</button></a>
       </div>
      
  <?php
  if (isset($_GET["error"])){
    if ($_GET["error"]== "none"){
        echo "<script>alert('itmes added succesfully.')</script>";
    }
    if ($_GET["error"]== "delete"){
        echo "<script>alert('itmes deleted succesfully.')</script>";
    }
}
  include_once 'partial/footer.php';
  // tablename($_SESSION['table']);
  ?>