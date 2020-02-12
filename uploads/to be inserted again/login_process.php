
<?php
session_start();
?>

<?php
require_once("db.php");

if(!isset($_POST['admin_login'])){
    header("location:index.php");
}


?>

