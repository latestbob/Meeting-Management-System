<?php
require_once("db.php");




$sql="SELECT * FROM events ORDER BY id DESC LIMIT 3";
$result=mysqli_query($conn,$sql);


while($row=mysqli_fetch_assoc($result)):




?>
<p><?php echo($row['event']);?></p>

<?php endwhile;?>