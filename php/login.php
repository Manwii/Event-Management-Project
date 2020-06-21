<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Landing Page</title>
<link rel="stylesheet" href="../css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

</head>

  <body>
    <h1>Welcome</h1>
    <h2>We're a start-up that helps you manage your events!</h2>
    
  </body>

  <h2>Log In to Continue!</h2>

  <?php 
  if(isset($_COOKIE['remember']) && $_COOKIE['remember'] == 1){
    session_start();
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    header('location:dashboard.php');
  }
   ?>

  <?php 
  if (isset($_GET['msg']) && $_GET['msg'] == 1) {
    echo 'Please login to access dashboard';
  }
   ?>
  <?php 

if (isset($_POST['btn_login'])) {
  $err = [];
  if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
    }else{
      $err['email'] = "Can't be empty";
  }

  if (isset($_POST['password']) && !empty($_POST['password'])) {
    $password = md5($_POST['password']);
    }else{
      $err['password'] = "Can't be empty";
  }

  if(count($err) == 0){
    $login = false;
    /*$users = [
      ['email' => 'admin@gmail.com','password' => 'root'],
      ['email' => 'user@gmail.com','password' => 'root'],
      ['email' => 'viewer@gmail.com','password' => 'root'],
      ['email' => 'customer@gmail.com','password' => 'root'],
      ['email' => 'visitor@gmail.com','password' => 'root'],
    ];
    $login = false;
    foreach ($users as $user ) {
      if ($email == $user['email'] && $password == $user['password']) {
        $login = true;
        break;
      }
    }*/
    $connect = new mysqli('localhost','root','','db_webproject');
    if($connect -> connect_errno != 0){
      die('Database Connection Failed');
    }
    $sql = "select * from tbl_users where email='$email' and password='$password' and status=1";

    $result = $connect->query($sql);


    if ($result->num_rows == 1) {
      $login = true;
    }

    print_r($result);

    if($login){
      $user = $result->fetch_assoc();
      sleep(1);
      session_start();
      $_SESSION['user_id'] = $user['id'];

      //check remember me
      if(isset($_POST['remember'])){
        setcookie('remember',1,time() + 7*24*60*60);
        setcookie('user_id',$_SESSION['user_id'],time() + 7*24*60*60);
      }

      header('Location: ../php/dashboard.php');    
    }else{
      echo "Login Failed! Please try again";
    }
  }

}

 ?>
 
  <form class="emailform" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

    <label for="email">Email</label><br>
    <input class="userinput" type="email"  name="email" placeholder="Enter Email">
    <?php
      if(isset($err['email'])){
        echo $err['email'];
      }
     ?>
     <br><br>
    <label for="last">Password</label><br>
    <input class="userinput" type="password" name="password" placeholder="Enter Password">
    <?php 
      if(isset($err['password'])){
        echo $err['password'];
      }
     ?>
    <br>
    <small id="emailHelp" class="form-text text-muted">Your email and password is safe with us.</small> <br>
    <small id="emailHelp">Don't have an admin account? <a href="../php/register.php">Register</a> here.</small><br><br>
    <input type="checkbox" name="remember" value="remember"> Remember Me 
    <br>
    <input type="submit" id="sub" name="btn_login" value="Login">


  </form>
</html>
