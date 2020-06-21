<html><head><title>Register Page</title>
<link rel="stylesheet" href="../css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"></head>
   <br> <h1>Register Page</h1>
   <h3 align="center">Register your admin account here</h3>

<?php
if(isset($_POST['register'])){
$err = [];
if(isset($_POST['email']) && !empty($_POST['email'])){
  $email = $_POST['email'];
}else{

  $err['email'] = 'Enter Email';
}

if(isset($_POST['password']) && !empty($_POST['password'])){
  $password = md5($_POST['password']);
}else{

  $err['password'] = 'Enter password';
}

$status = 1;

if(count($err) == 0){
  require "connection.php";
  $sql = "insert into tbl_users(email,password,status) values('$email','$password','$status')";
  $connect->query($sql);

  if($connect->affected_rows == 1 && $connect->insert_id > 0){
    $success = "User Created Sucessfully. Login to continue ";
  }else{
    $failed = "Can't create User";
  }
}

}

 ?>

<div class="container login-a">
  <div class="card">
    <div class="card-header">
     
    </div>
    <div class="card-body">
      <?php require_once "alert_message.php"; ?>
      <div class="container">

        <form class="emailform" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
         <div class="form-group">
          
           <label for="email">Email:</label><br><?php if (isset($err['email'])) {
             echo $err['email'];
           } ?>
           <input type="text" class="userinput" name="email" id="" aria-describedby="helpId" placeholder="">
         </div><br>
         <div class="form-group">
           <label for="my-textarea">Password:</label><br>
           <?php if (isset($err['password'])) {
             echo $err['password'];
           } ?>
           <input type="password" name="password" id="input" class="userinput" title="">
         </div><br>
         <div class="form-group">
          <input type="submit" id="sub" class="btn btn-primary" value="Register" name="register"><br><br>
          Go back to <a href="../php/login.php"> Login Page </a>

       </div>
       <small class="text-muted">
         <?php if(isset($err['msssage'])) echo $err['message']; ?>
       </small>
      </form>
     </div>
   </div>
 </div>
</div>
</html>
