<?php
error_reporting(0);
include('connect.php');
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $designation = $_POST["designation"];


     if(!empty($name) && !empty($gender) && !empty($designation) ){
     	$query = $connect->prepare(" INSERT INTO tbl_employee SET name = ?, gender = ?, designation = ? ");
        $query->execute([$name, $gender, $designation]);
        echo "<script type= 'text/javascript'>alert('UPDATE Successful');</script>";
               header('location:userUpdate.php');

     }else{
     	echo "<script>All Fields are required</script>";
     }

  

?>


<!DOCTYPE html>
<html>
<head>
	<title>total employee list update</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" >
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-body">
				<form method="POST">
				<label>Name</label>
					<input type="text" name="name" placeholder="john Brown..." class="form-control" required="text">
					<br>
					<label>Gender</label>
					<input type="text" name="gender" placeholder="male/female..." class="form-control" required="text">
					<br>
					<label>Designation</label>
					<input type="text" name="designation" placeholder="engineer etc..." class="form-control" required="text">
                     <br>
					<button type="submit" value="update" class="btn btn-success">UPDATE</button>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>