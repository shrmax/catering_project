<?php
 include_once 'partial/header.php';

?>
   
   <div class="main">
    <div class="hello">
    <?php
    if (isset($_SESSION["id"])){
        echo 'hello ' .$_SESSION["admin"];
    }
    else{
        echo 'welcome to our website.';
    }
    ?>
    <!-- hello user <br> -->
    </div>
   
  </div>
  <?php
  include_once 'partial/footer.php';
  ?>
  