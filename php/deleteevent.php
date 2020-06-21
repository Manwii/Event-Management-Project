
<?php
$id = $_GET['id'];
require_once "connection.php";
$sql = "delete from tbl_events where id='$id'";
$connect->query($sql);
header ('location:eventlist.php');
?>
