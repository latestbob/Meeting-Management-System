<?php

require_once("db.php");




$sql="SELECT full_name FROM members";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)):?>

<?php
$name=$row['full_name'];
endwhile;

?>
<?php

$sqli="CREATE TABLE msg AS SELECT $name FROM members";
if(mysqli_query($conn,$sqli)){
    echo('record inserted');
}
?>
