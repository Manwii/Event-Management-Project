<?php
  $title = 'Dashboard Page';
  require_once "header.php";
 ?>
 <html>
 <head><title>DashBoard</title></head>
 <link rel="stylesheet" href="../css/dashboard.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <body><p>
<div class="container login-a">
  <div class="card">
    <div class="card-header">
      Dashboard
      <span style="float:right">
      <button class="btn btn-primary" type="button" onclick="parent.location='logout.php'">Logout</button>
      </span>
    </div>
    <div class="card-body">
     <div class="container">
    <button class="btn btn-primary" type="button" onclick="parent.location='addevents.php'">Add Event</button>
        <button class="btn btn-primary" type="button" onclick="parent.location='eventlist.php'">Event List</button>
        <button class="btn btn-primary" type="button" onclick="parent.location='message.php'">FeedBacks</button>
     </div> 
 </div>
</div>
</div></p>
</body>
</html>