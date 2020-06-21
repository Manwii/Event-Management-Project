<html>
<head>
	<title>FeedBacks</title>
<link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<?php
$title='FeedBacks ';
require 'header.php';

	require "connection.php";
	//sql query to select all  categories from database
	$sql = "select * from tbl_message order by id desc ";

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
 						<th>User Name</th>
 						<th>Email</th>
 						<th>Message</th>
 						<th>Action</th>
 					</tr>
 				</thead>
 				
 				
 					<?php foreach($data as $index => $d){ ?>
	 					<tr>
	 						<td><?php echo $index+1; ?></td>
	 						<td><?php echo $d['username'] ?></td>
	 						<td><?php echo $d['email'] ?></td>
	 						<td><?php echo $d['message'] ?></td>
	 					    <td><a class="btn btn-danger" onclick="return confirm ('Are you sure to delete ?')" href="deletemessage.php?id=<?php echo $d['id'] ?>">Delete</a></td>
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

