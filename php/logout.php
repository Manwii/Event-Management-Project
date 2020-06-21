<?php
session_start();
//destroys all session data
session_destroy(); 
setcookie('remember',0,time() - 1);
setcookie('user_id',0,time() - 1);

header('location:login.php');
 ?>