<html><head><title>Edit Event</title>
<link rel="stylesheet" href="../css/dashboard.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></head>
<?php


$id = $_GET['id'];
require_once  "connection.php";

$sql = "select * from tbl_events where id = $id";

$result = $connect->query($sql);

$news = $result->fetch_assoc();

 ?>

 <?php
$title = 'Edit Event';

  ?>
  <?php
if (isset($_POST['btnUpdate'])) {
      $err = [];
      //category_id check
      //event name check
      if (isset($_POST['eventname']) && !empty($_POST['eventname'])) {
          $eventname =  $_POST['eventname'];
      } else {
          $err['eventname'] = 'Enter event';
      }

      //eventdate check
      if (isset($_POST['eventdate']) && !empty($_POST['eventdate'])) {
          $eventdate =  $_POST['eventdate'];
      } else {
          $err['eventdate'] = 'Enter eventdate';
      }

      //starttime check
      if (isset($_POST['starttime']) && !empty($_POST['starttime'])) {
          $starttime =  $_POST['starttime'];
      } else {
          $err['starttime'] = 'Enter starttime';
      }

      //endtime check
      if (isset($_POST['endtime']) && !empty($_POST['endtime'])) {
          $endtime =  $_POST['endtime'];
      } else {
          $err['endtime'] = 'Enter endtime';
      }

      //description check
      if (isset($_POST['description']) && !empty($_POST['description'])) {
          $description =  $_POST['description'];
      } else {
          $err['description'] = 'Enter description';
      }

      //image upload

      //check featured
      $isfeatured = $_POST['isfeatured'];
      //current datetime of server
      $updated_at = date('Y-m-d H:i:s');
      //loggedin user id : take from session
      session_start();

      $updated_by = $_SESSION['user_id'] ;
      if (count($err) == 0) {
          require "connection.php";
          //make query to insert data
          echo $sql = "update tbl_events set name='$eventname',eventdate='$eventdate',starttime='$starttime',endtime='$endtime',description='$description',isfeatured='$isfeatured',updated_by='$updated_by',updated_at='$updated_at' where id=$id ";
          //execute query
          $connect->query($sql);

          //check data insert status
          if ($connect->affected_rows == 1) {
              $success =  "Update Success";
          } else {
              $failed  =  "Update Failed";
          }
      }
  }

   ?>

   <div class="container">
    <div class="card mt-5">
      <div class="card-header">
        <?php echo $title ?>
        <span style="float:right">
      <button class="btn btn-primary" type="button" onclick="parent.location='eventlist.php'">Show Updated List</button>
      </span>
      </div>
      <div class="card-body">
        <?php require_once "alert_message.php"; ?>

        <div class="row">
          <div class="col-md-12">
   				
   				<form action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id ?>"
   					method="post" enctype="multipart/form-data">
   					<div class="form-group">
   						<label for="eventname">Event Name</label>
   						<input type="text" name="eventname" class="form-control" id="eventname" placeholder="Enter name" value="<?php echo $news['name'] ?>" >
   						<?php
                        if (isset($err['eventname'])) {
                            echo $err['eventname'];
                        }
                        ?>
   					</div>
              <div class="form-group">
              <label for="eventdate">Event Date</label>
              <input type="text" name="eventdate" class="form-control" id="eventdate" placeholder="Enter eventdate" value="<?php echo $news['eventdate'] ?>">
              <?php
                        if (isset($err['eventdate'])) {
                            echo $err['eventdate'];
                        }
                        ?>
   					<div class="form-group">
   						<label for="starttime">Start Time</label>
   						<input type="time" name="starttime" class="form-control" id="starttime" placeholder="Enter starttime" value="<?php echo $news['starttime'] ?>">
   						<?php
                        if (isset($err['starttime'])) {
                            echo $err['starttime'];
                        }
                        ?>
   					</div>
            <div class="form-group">
              <label for="endtime">End Time</label>
              <input type="time" name="endtime" class="form-control" id="endtime" placeholder="Enter endtime" value="<?php echo $news['endtime'] ?>">
              <?php
                        if (isset($err['endtime'])) {
                            echo $err['endtime'];
                        }
                        ?>
            </div>
            
   					<div class="form-group">
   						<label for="description">Description</label>
   						<textarea  name="description" class="form-control" id="description" placeholder="Enter description" ><?php echo $news['description'] ?></textarea>
   						<?php
                        if (isset($err['description'])) {
                            echo $err['description'];
                        }
                        ?>
   					</div>
   					
   				<div class="form-group">
   					<label for="isfeatured">Feature Events</label>
            <?php if ($news['isfeatured'] == 1) { ?>
       	 	 		 <input type="radio" name="isfeatured" value="1" checked=""> Yes
       	 	 		<input type="radio" name="isfeatured" value="0" > No

       	 	<?php  } else { ?>
       	 		<input type="radio" name="isfeatured" value="1" > Yes
       		 	 <input type="radio" name="isfeatured" value="0" checked="" > No

       	 	<?php } ?>
   				</div>
   					<input type="submit" name="btnUpdate" class="btn btn-success" value="Update News">

   				</form>
   		</div>
</form>
</div>
</div>
</div>
</div>
</div>
</html>

