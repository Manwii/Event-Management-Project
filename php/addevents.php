<?php
$title='Add Event';
session_start();
if (!isset($_SESSION['user_id'])) {
  ?>
<script type="text/javascript">
  alert("LogIn is Required !");
  window.location = '../php/dashboard.php?msg=1';
</script>
<?php
} ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <title>AddEvent</title>
</head>
<h2 style="font-family:'Special Elite', cursive;text-align:center">Welcome Aboard! <br> <?php 
require 'connection.php';
$user_id = $_SESSION['user_id'];
$newSql = "select email from tbl_users where id = $user_id";
$result = $connect ->query($newSql);
$given_data = $result->fetch_assoc();
echo $given_data['email']; ?></h2>

<body>
  <script>
    $(document).ready(function() {
      $('#date').datepicker({ dateFormat: 'yy-mm-dd' });
    });
  </script>

<?php  
if (isset($_POST['submit'])) {
$err = [];
if (isset($_POST['eventname']) && !empty($_POST['eventname'])) {
  $eventname = $_POST['eventname'];
  }else{
    $err['eventname'] = "Can't be empty";
}

if (isset($_POST['eventdate']) && !empty($_POST['eventdate'])) {
  $eventdate = $_POST['eventdate'];
  }else{
    $err['eventdate'] = "Can't be empty";
}

if (isset($_POST['starttime']) && !empty($_POST['starttime'])) {
  $starttime = $_POST['starttime'];
  }else{
    $err['starttime'] = "Can't be empty";
}

if (isset($_POST['endtime']) && !empty($_POST['endtime'])) {
  $endtime = $_POST['endtime'];
  }else{
    $err['endtime'] = "Can't be empty";
}

if (isset($_POST['eventdesc']) && !empty($_POST['eventdesc'])) {
  $eventdesc = $_POST['eventdesc'];
  }else{
    $err['eventdesc'] = "Can't be empty";
    }

if (isset($_FILES['photo']['error']) && $_FILES['photo']['error'] == 0) {
    //file size validation
    if ($_FILES['photo']['size'] < 1048576) {
      $types = ['image/jpeg','image/gif','image/png','image/jpg'];
      $image_name = uniqid() . '_' . $_FILES['photo']['name'];
      if (in_array($_FILES['photo']['type'], $types)) {
        //move file to your folder
        if(move_uploaded_file($_FILES['photo']['tmp_name'],
          'images/' . $image_name)){
        }else {
          $err['photo'] = 'File Upload Failed!!';
        }
      } else {
        $err['photo'] = 'File type not allowed';
      }
    } else {
      $err['photo'] = 'File size exceed, 1 MB allowed';
    }
  }else {
    $err['photo'] = 'File Upload Error';
  }
 
$created_at = date('Y-m-d H:i:s');
$created_by = $_SESSION['user_id'];
if(isset($_POST['isfeatured']) ){
   echo $isfeatured = 1;
}else{
  $isfeatured = 0;
}
if(count($err) == 0){		
 require "connection.php";
 $sql = "insert into tbl_events(name,eventdate,starttime,endtime,description,isfeatured,image,created_at,created_by) values('$eventname','$eventdate','$starttime','$endtime','$eventdesc','$isfeatured','$image_name','$created_at','$created_by')";
 $connect->query($sql);

 if($connect->affected_rows == 1 && $connect->insert_id > 0){
     $success =  "Insert Success";
 }else{
     $failed =  "Insert Failed";
 }
}
}
?>
  <br>
   <div class="container">
    <div class="card mt-5">
      <div class="card-header">
        <?php echo $title ?>
          <span style="float:right">
      <button class="btn btn-primary" type="button" onclick="parent.location='dashboard.php'">DashBoard</button>
        <button class="btn btn-primary" type="button" onclick="parent.location='eventlist.php'">View Events</button>
      </span>
      </div>
      <div class="card-body">
        <?php require_once "alert_message.php"; ?>

        <div class="row">
          <div class="col-md-12">
          
  <form class="eventform" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <label for='eventname'> Event Name:</label><br>
    <input class="eventname" type="text" name="eventname" placeholder="Enter Event Name"><br><br>

    <label> Event Date:</label><br>
    <input type="text" name="eventdate" id = "date">

    <br><br>

    <label> Start time:</label><br>
    <input type="time" id='time' name='starttime'><br><br>

    <label for="endtime">End time:</label><br>
    <input type="time" name="endtime" placeholder="End Time"><br><br>

    
    <label for="description">Description:</label><br>
    <textarea name="eventdesc" rows="8" cols="80"></textarea><br><br>


   <div class="form-group">
       <label for="image">Image</label>
       <input type="file" name="photo" class="form-control" id="image" placeholder="Enter image" >
       <?php
       if (isset($err['photo'])) {
           echo $err['photo'];
       }
       ?>
       <br><br>
       <input type="checkbox" name = "isfeatured" value="true"> Feature this Event 
       <br><br>
    <input type="submit" name="submit" value="Submit">
    <br>
    </div>
    </div>
</body>
</html>