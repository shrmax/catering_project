<?php
include_once 'partial/header.php';
include_once 'include/dbh.inc.php';
$query= 'select * from events';
$result = mysqli_query($con, $query);
?>
<div class="cat">
    <p>Select Your Event</p>
</div>
<form action="orderform.php" class="form"></form>
<div class="collection">
<?php
while($row= mysqli_fetch_assoc($result)){
?>
<a class="a" href="orderform.php?event_id=<?php echo $row['id']; ?>">
<div class="provider">

<div class="img a">
     <img src="../admin/eventimages/<?php echo $row['image']; ?>" alt="">
     <div class="eventname">
     <?php echo $row['name']; ?>
     </div>
    </div>
</div>
</a>


<?php
}
?>
</div>
<?php
include_once 'partial/footer.php';
?>