
<?php
$connect = new mysqli('localhost','root','','db_webproject');
    if($connect -> connect_errno != 0){
      die('Database Connection Failed');
    }
    ?>