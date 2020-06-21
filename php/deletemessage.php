<?php
$id = $_GET['id'];
require_once "connection.php";
$sql = "delete from tbl_message where id='$id'";
$connect->query($sql);
header ('location:message.php');
?>
