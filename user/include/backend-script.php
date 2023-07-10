<?php
include_once 'dbh.inc.php';
if(isset($_POST['submit'])){
$searchTerm = $_POST['search'];
$sql = "SELECT * FROM providers;"; 
$a=false;
$result = $con->query($sql); 
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if(strtolower($row['name'])==strtolower($searchTerm)){
        $a=true;
        header("location: ../provider_info.php?entry_id=".$row['id']."");
    } 


} 
if($a==false){
    header("location: ../index.php?notfound");
}
}
} 
?>