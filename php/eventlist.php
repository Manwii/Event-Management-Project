
<html>
<head>
	<title>Event List</title>
<link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<?php
$title='Event List';
require 'header.php';

	require "connection.php";
	//sql query to select all  categories from database
	$sql = "select * from tbl_events order by created_at desc ";

	//execute query and get result object: incase of select
	$result = $connect->query($sql);

	//result object: mysqli_result Object ( [current_field] => 0 [field_count] => 2 [lengths] => [num_rows] => 3 [type] => 0 )

	$data = [];
	//for single data
	// $a = $result->fetch_assoc();
	// print_r($a);
	if ($result->num_rows > 0) {
		while ($category = $result->fetch_assoc()) {
			array_push($data, $category);
		}
	}

 ?>
<div class="container">
		<div class="card mt-5">
 		<div class="card-header">
 			<?php echo $title ?>
 <span style="float:right">
      <button class="btn btn-primary" type="button" onclick="parent.location='home.php'">Home</button>
      </span>
 			</div>
 		<div class="card-body">
 			<div class="row">
 			<div class="col-md-12">
 			<div class="table-responsive">
 			<table class="table table-bordered table-hover table-striped ">
 				<thead>
 					<tr class="bg-success">
 						<th>#</th>
 						<th>Image</th>
 						<th>Event Name</th>
 						<th>Event Date</th>
 						<th>Start Time</th>
 						<th>End Time</th>
 						<th>Description</th>
 						<th>Featured</th>
 						<th>Action</th>
 					</tr>
 				</thead>
 				
 				
 					<?php foreach($data as $index => $d){ ?>
	 					<tr>
	 						<td><?php echo $index+1; ?></td>
	 						<td><img src="images/<?php echo $d['image'] ?>" width="90"></td>

	 						<td><?php echo $d['name'] ?></td>
	 						<td><?php echo $d['eventdate'] ?></td>
	 						<td><?php echo $d['starttime'] ?></td>
	 						<td><?php echo $d['endtime'] ?></td>
	 						<td><?php echo $d['description'] ?></td>

	 						<td><?php if ($d['isfeatured'] == 1) { ?>
	 							<span class="text-success">Yes</span>
	 						<?php } else { ?>
	 							<span class="text-danger">No</span>
	 						<?php } ?></td>
	 						<td>

	 							<a class="btn btn-danger" onclick="return confirm ('Are you sure to delete ?')" href="deleteevent.php?id=<?php echo $d['id'] ?>">Delete</a><br><br>

	 							<a class="btn btn-warning"  href="editevent.php?id=<?php echo $d['id'] ?>">Edit</a>

	 						</td>
	 					</tr>
	 					<?php } ?>
 				
 			</table>
 			</div>
 		</div>
 </div>
</div>
</div>
</div>
</head>
</html>

